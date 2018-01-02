<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/31/2017
 * Time: 7:48 PM
 */

namespace App\Http\Controllers\Admin;


use App\Repositories\UserRepository;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    function list(UserRepository $repository){
        return view('user.list', [
            'users' => $repository->paginate()
        ]);
    }

    function edit(UserRepository $userRepository, $idUser){

    }
}