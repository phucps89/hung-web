<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/13/2018
 * Time: 10:48 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    function list(CategoryRepository $categoryRepository){
        return view('category.list', [
            'categories' => $categoryRepository->makeModel()->whereNull('parent')->paginate()
        ]);
    }

    function add(){
        return view('category.add_edit', [
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