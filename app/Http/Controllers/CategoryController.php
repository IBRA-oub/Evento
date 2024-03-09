<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // _____________affichage de categories pour l'admin__________
    public function redCategoriesAdmin(){
        $categories = Category::all();

        return view('admin-pages.categories',['categories' => $categories]);
       
    }

    // _____________affichage de categories pour l'organisateur pour choiser__________
    public function redCategoriesOrga(){
        $categories = Category::all();

        return view('organisateur-pages.creat-event',['categories' => $categories]);
       
    }
    // _______________creation de category_______________
    public function creatCategories(Request $request){

        $request->validate([
            'name'=> 'required'
        ]);
        
        $category = new Category();
        $category->name = $request->input('name');

        $category->save();

        
        return redirect()->route('categories')->with('success','add category successfuly');
    }

    // ___________________affichage de page d'edite avec old value______
    public function editCategories($id){
        $category =  Category::findOrFail($id);
        return view('admin-pages.update-category',['category' => $category]);
    }
    // ___________________edit d'une category______________

    public function updateCategories(Request $request,$id){
        
        $request->validate([
            'name'=> 'required'
        ]);

        $updateCategory = Category::findOrFail($id);
        $updateCategory->name = $request->input('name');
        
        $updateCategory->save();
        
        return redirect()->route('categories')->with('success','update category successfuly');
    }

    // ________________________delete category_________________

    public function destroyCategory($id)
    {
        $deleteCategory = Category::findOrFail($id);
        $deleteCategory->delete();
        return redirect()->route('categories')->with('success','delete category successfuly');
    }
}