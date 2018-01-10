<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/10/2018
 * Time: 2:10 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Repositories\SizeRepository;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    function list(SizeRepository $sizeRepository){
        return view('size.list', [
            'sizes' => $sizeRepository->paginate()
        ]);
    }

    function add(){
        return view('size.add_edit', [
        ]);
    }

    function edit(SizeRepository $sizeRepository, $idSize){
        return view('size.add_edit', [
            'size' => $sizeRepository->find($idSize)
        ]);
    }

    function addEditPost(SizeRepository $sizeRepository, Request $request, $idSize = null){
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255|unique:'.$sizeRepository->makeModel()->getTable().',code,'.$idSize,
        ]);

        $size = null;
        if($idSize != null){
            $size = $sizeRepository->find($idSize);
        }
        else{
            $size = $sizeRepository->makeModel();
        }
        $size->name = $request->get('name');
        $size->code = $request->get('code');
        $size->save();
        return redirect()->route(ADMIN_SIZE_LIST);
    }
}