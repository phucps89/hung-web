<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/10/2018
 * Time: 2:10 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Repositories\ColorRepository;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    function list(ColorRepository $colorRepository){
        return view('color.list', [
            'colors' => $colorRepository->paginate()
        ]);
    }

    function add(){
        return view('color.add_edit', [
        ]);
    }

    function edit(ColorRepository $colorRepository, $idColor){
        return view('color.add_edit', [
            'color' => $colorRepository->find($idColor)
        ]);
    }

    function addEditPost(ColorRepository $colorRepository, Request $request, $idColor = null){
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255|unique:'.$colorRepository->makeModel()->getTable().',code,'.$idColor,
        ]);

        $color = null;
        if($idColor != null){
            $color = $colorRepository->find($idColor);
        }
        else{
            $color = $colorRepository->makeModel();
        }
        $color->name = $request->get('name');
        $color->code = $request->get('code');
        $color->save();
        return redirect()->route(ADMIN_COLOR_LIST);
    }
}