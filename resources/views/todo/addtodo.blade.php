@extends('layouts.app')

@section('title', 'Add New Todo')

@section('content')
              <h1>Add New ToDo</h1>
              <form method="post" action="{{url('/todo')}}">
                {{ csrf_field() }}

                <div class="form-group row">
                  <label for="todo" class="col-sm-2 col-form-label">Todo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="todo" name="todo" placeholder="todo" value="{{ old('todo') }}">
                    @if ($errors->has('todo'))
                      <span class="help-block">
                          <strong>{{ $errors->first('todo') }}</strong>
                      </span>
                  @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label for="due" class="col-sm-2 col-form-label">Due Date</label>
                  <div class="col-sm-2">  
                    <input class="date form-control"  type="text" id="due" name="due" value="{{ old('due') }}"> 
                    @if ($errors->has('due'))
                      <span class="help-block">
                          <strong>{{ $errors->first('due') }}</strong>
                      </span>
                  @endif
                  </div>
                
                  <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-6">
                    <select name="category_id" id="category_id" class="form-control" autofocus>
                      <option value=""></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="row">
                  <button type="submit" class="btn btn-default btn-primary col-sm-2">Add</button>
                </div>
                </form>
@endsection