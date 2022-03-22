<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|min:3|max:255',
            'imgpath' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if($imgpath = $request->file('imgpath')) {
            $imageDestinationPath = 'images/';
            $categoryImage = date('YmdHis') . "." . $imgpath->getClientOriginalExtension();
            $imgpath->move($imageDestinationPath, $categoryImage);
            $input['imgpath'] = "$categoryImage";
        }

        Category::create($input);

        return redirect()->route('categories.index')->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view ('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category' => 'required|min:3|max:255',
            'imgpath' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if($imgpath = $request->file('imgpath')) {
            $imageDestinationPath = 'images/';
            $categoryImage = date('YmdHis') . "." . $imgpath->getClientOriginalExtension();
            $imgpath->move($imageDestinationPath, $categoryImage);
            $input['imgpath'] = "$categoryImage";
        } else {
            unset($input['imgpath']);
        }

        $category->update($input);

        return redirect()->route('categories.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $id = $category->id;
        DB::table('categories')->where('id', $id)->delete();
        // $id = $category->id;
        // $category = Category::find($id);
        // $category->delete();
        return redirect()->route('categories.index')->with('success','Category deleted successfully');;
    }
}
  