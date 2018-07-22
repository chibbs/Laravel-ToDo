@extends('layouts.app')

@section('title', 'ToDo List')

@section('content')
    <h1>ToDo-Liste</h1>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <!--<ul class="list-group">
        @if($todos != false)
            @foreach ($todos as $todo)

        <li class="list-group-item">
            <a class="secondary-content" href="{{url('/todo/'.$todo->id).'/edit'}}"><span class="fas fa-pencil-alt"></span></a>
            <a href="#" class="secondary-content" onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();"><span class="fas fa-trash-alt"></span></a>
            <form id="delete-form" action="{{url('/todo/'.$todo->id)}}" method="POST" style="display: none;">
                            {{ method_field('DELETE') }}{{ csrf_field() }}
                                </form> {{$todo->todo}} 
        </li>

    @endforeach
    @else
    <li class="list-group-item"> No Todo added yet <a href="{{ url('/todo/create') }}"> click here</a> to add new todo. </li>
    @endif
        </ul>-->

        @if($todos != false)
        <table class="table table-striped">
        <thead>
          <tr>
              <th>Category</th>
              <th></th>
              <th>Task</th>
              <th>Due Date</th>
              <th>Edit</th>
              <th>delete</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($todos as $todo)
            @if(!$todo->done)
          <tr>
            <td>
                {{$todo->cat_id}}
                {{$todo->category->category}}
            </td>
            <td>
            @if(!$todo->done)
            <input type="checkbox" name="done1">
              @else
              <input type="checkbox" name="done1" checked>
              @endif
            </td>
            <td>{{$todo->todo}}</td>
            <td>{{$todo->due}}</td>
            <td><a class="secondary-content" href="{{url('/todo/'.$todo->id).'/edit'}}"><span class="fas fa-pencil-alt"></span></a></td>
            <td>
            <a href="#" class="secondary-content" onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();"><span class="fas fa-trash-alt"></span></a>
            <form id="delete-form" action="{{url('/todo/'.$todo->id)}}" method="POST" style="display: none;">
                            {{ method_field('DELETE') }}{{ csrf_field() }}
                                </form>
            </td>


          </tr>
          @endif
          @endforeach
        
  
        </tbody>
      </table>
      @else
            <ul><li class="list-group-item"> No Todo added yet <a href="{{ url('/todo/create') }}"> click here</a> to add new todo. </li></ul>
          @endif


<!-- <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons ">chevron_left</i></a></li>
    <li class="active  #64b5f6 blue lighten-2"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
</ul> -->


      </div>
    </div>
@endsection