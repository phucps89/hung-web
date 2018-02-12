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
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function list(CategoryRepository $categoryRepository){
        return view('category.list', [
            'categories' => $categoryRepository->makeModel()->whereNull('parent')->paginate()
        ]);
    }

    function add(CategoryRepository $categoryRepository){
        return view('category.add_edit', [
            'rootCates' => $categoryRepository->makeModel()->whereNull('parent')->get()
        ]);
    }

    function edit(CategoryRepository $categoryRepository, $idCate){
        return view('category.add_edit', [
            'category' => $categoryRepository->find($idCate),
            'rootCates' => $categoryRepository->makeModel()->whereNull('parent')->get()
        ]);
    }

    function addEditPost(CategoryRepository $categoryRepository, Request $request, $idCate = null){
        $request->validate([
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'parent' => 'required',
        ]);

        $data = $request->only([
            'name',
            'description',
            'parent',
            'title',
            'image',
            'tags'
        ]);
        $cate = $categoryRepository->firstOrNew([
            'id' => $idCate
        ]);
        $cate->name = $data['name'];
        $cate->parent = $data['parent'] == 0 ? null : $data['parent'];
        $cate->title = $data['title'];
        $cate->tags = $data['tags'];
        $cate->description = $data['description'];
        $cate->image = $data['image'];
        $cate->save();
        return redirect()->route(ADMIN_CATEGORY_LIST);
    }
}