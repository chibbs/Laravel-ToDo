<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * only authenticated users may use the application
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * -> get all the todo items for a single user
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Auth::user()->categories()->get();
        if(!$result->isEmpty()){;
            return view('category.category',['categories'=>$result]);
        } else {
            return view('category.category',['categories'=>false]);
        }
    }

    /**
     * validate the form fields and make sure that these fields are not empty
     */
    protected function validator(array $request)
    {
        return Validator::make($request, [
            'category' => 'required'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
            $user = Auth::user()->id;
            $category = new Category;
            $category->category = $request->category;
            $category->user_id = $user;

            $category->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.category',['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //return view('category.editcategory',['category' => $category]);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($category->fill($request->all())->save()){
            return $this->show($category);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return back();
        }
    }
}
