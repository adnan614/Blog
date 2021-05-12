<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'cat_name' => 'required'
            ],
            [
                'cat_name.required' => 'Category Name input field is required!'
            ]
        );
        Category::create($request->all());
    }

    public function all_category()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
