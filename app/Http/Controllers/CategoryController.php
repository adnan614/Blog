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
}
