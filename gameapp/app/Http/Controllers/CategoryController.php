<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $categories = Category::paginate(20);
    return view('categories.index', ['categories' => $categories]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( CategoryRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        if($request->hasFile('photo')) {
            $photo = time() .'.' .$request->photo->extension();
            $request->photo->move(public_path('images'), $photo);
        }else{
            $photo = $request->originPhoto;
        }
        $category->document = $request->document;
        $category->fullname = $request->fullname;
        $category->gender = $request->gender;
        $category->birthdate = $request->birthdate;
        $category->photo = $photo;
        $category->phone = $request->phone;
        $category->email = $request->email;
        
        if($category->save()) {
            return redirect('categories')
            ->with('message', 'The category: '. $category->fullname .' was successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->delete()) {
            return redirect('categories')
            ->with('message', 'The category: '. $category->fullname .' was successfully deleted!');
        }
    }

    public function search(Request $request)
    {
        $categories = Category::names($request-> q)->paginate(20);
        return view('categories.search')->with('categories', $categories);
    }
}