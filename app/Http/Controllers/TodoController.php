<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
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
        $result = Auth::user()->todo()->get();
        if(!$result->isEmpty()){
            //return view('todo.dashboard',['todos'=>$result,'image'=>Auth::user()->userimage]);
            return view('todo.dashboard',['todos'=>$result,'image'=>false]);
        } else {
            return view('todo.dashboard',['todos'=>false,'image'=>false]);
        }
    }

    /**
     * validate the form fields and make sure that these fields are not empty
     */
    protected function validator(array $request)
    {
        return Validator::make($request, [
            'todo' => 'required',
            'due' => 'required',
            //'category' => 'required'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = Auth::user()->categories()->get();
        if(!$result->isEmpty()){
            return view('todo.addtodo', ['categories'=>$result]);
        } else {
            return view('todo.addtodo',['categories'=>false]);
        }
    }

    /**
     * Store a newly created resource in storage.
     * ->  first validates that all the fields are valid and not empty. Then, it saves the data in the Todo table, corresponding to the authenticated user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        if(Auth::user()->todo()->Create($request->all())){
            return $this->index();
        }
    }

    /**
     * Display the specified resource.
     * -> 
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todo.todo',['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     * -> return the form for editing a single todo
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        $result = Auth::user()->categories()->get();
        $result2 = $todo->category()->get();
        $cat = ($result2->isEmpty()) ? "" : $result2[0]->category;
        if(!$result->isEmpty()){
            return view('todo.edittodo',['todo' => $todo, 'cat' => $cat, 'categories'=>$result]);
        } else {
            return view('todo.edittodo',['todo' => $todo, 'cat' => $cat, 'categories'=>false]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     * -> first check that the required fields are not empty, and then update the todo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->validator($request->all())->validate();
        $cat = $todo->category()->get();
        if($todo->fill($request->all())->save()){
            //return $this->show($todo);
            return redirect('todo')->with('success', 'Information has been added');
        }
        /*if($cat->todo()->associate($todo)) {
            return $this->show($todo);
        }*/
    }

    /**
     * Remove the specified resource from storage.
     * -> will delete a todo item.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        if($todo->delete()){
            return back();
        }
    }
}
