<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/31/2017
 * Time: 7:48 PM
 */

namespace App\Http\Controllers\Admin;


use App\Entities\Permission;
use App\Entities\Role;
use App\Mail\ResetPasswordMail;
use App\Repositories\PermissionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function list(UserRepository $repository){
        return view('user.list', [
            'users' => $repository->makeModel()->whereRaw('id != 1')->paginate()
        ]);
    }

    function add(){
        return view('user.add_edit', [
        ]);
    }

    function edit(UserRepository $userRepository, $idUser){
        return view('user.add_edit', [
            'user' => $userRepository->find($idUser)
        ]);
    }

    function addEditPost(UserRepository $userRepository, Request $request, $idUser = null){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:'.$userRepository->makeModel()->getTable().',email,'.$idUser,
        ]);
        $user = null;
        if($idUser != null){
            $user = $userRepository->find($idUser);
        }
        else{
            $user = $userRepository->makeModel();
        }
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password = null;
        if($user->password == null){
            $password = str_random(8);;
            $user->password = $password;
        }
        $user->save();
        if($password != null){
            Mail::send(new ResetPasswordMail($user->email, $user->name, $password));
        }
        return redirect()->route(ADMIN_USER_LIST);
    }

    function permission(UserRepository $userRepository, PermissionRepository $permissionRepository, $idUser){
        $user = $userRepository->find($idUser);
        $permissions = $permissionRepository->findWhere(['guard_name' => AUTH_GUARD_USER]);
        $userHasPermission = $user->getAllPermissions();
        return view('user.permission', compact('user', 'permissions', 'userHasPermission'));
    }

    function permissionPost(Request $request, UserRepository $userRepository, PermissionRepository $permissionRepository, $idUser){
        $user = $userRepository->find($idUser);
        $permissions = $permissionRepository->findWhereIn('id', array_keys($request->get('permission') ?? []));
        $user->syncPermissions($permissions->pluck('name'));
        return redirect()->route(ADMIN_USER_LIST);
    }
}