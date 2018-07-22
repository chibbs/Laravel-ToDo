@extends('layouts.app')

@section('title', 'ToDo List')

@section('content')
    <h1>ToDo-Liste</h1>
    <div class="row justify-content-center">
      <div class="col-md-12">
        @if($todos != false)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Category</th>
                <th>Task</th>
                <th>Due Date</th>
                <th>Action</th>
                <th></th>
                <th>Done</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($todos as $todo)
            @if(!$todo->done)
                <tr>
                    <td>
                    @if($todo->category_id != false)
                        {{$todo->category->category}}
                    @endif
                    </td>
                    <td>{{$todo->todo}}</td>
                    <td>{{$todo->due}}</td>
                    <td><a href="{{action('TodoController@edit', $todo)}}" class="btn btn-success">Edit</a></td>
                    <td>
                        <form id="delete-form" action="{{action('TodoController@destroy', $todo)}}" method="post">@csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form id="update-status" action="{{action('TodoController@updateStatus', $todo->id)}}" method="post" onChange="this.submit()">@csrf 
                        <input type="hidden" name="id" value="$todo->id"/>
                    @if(!$todo->done)
                        <input type="checkbox" name="done1">
                    @else
                        <input type="checkbox" name="done1" checked>
                    @endif
                        </form>
                    </td>
                </tr>
            @endif
            @endforeach
            </tbody>
        </table>

        @else
        <ul class="list-group">
            <li class="list-group-item"> No Todo added yet. &nbsp; <a href="{{ url('/todo/create') }}"> Click here</a> &nbsp; to add new todo. </li>
        </ul>
        @endif


      </div>
    </div>
@endsection