@extends('layouts.app')

@section('title', 'Add New Todo')

@section('content')
         <div class="row">
            <div class="col-m-6">
              <form class="form-horizontal" method="post" action="{{url('/todo')}}">
                {{ csrf_field() }}
  <div class="form-group">
    <label for="todo" class="col-sm-2 control-label">Todo</label>
    <div class="col-md-5">
      <input type="text" class="form-control" id="todo" name="todo" placeholder="todo" value="{{ old('todo') }}">
      @if ($errors->has('todo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('todo') }}</strong>
                                    </span>
     @endif
    </div>
  </div>

  <div class="form-group">
    <label for="due" class="col-sm-2 control-label">Due Date</label>
    <div class="col-md-5">
      <input type="date" class="form-control" id="due" name="due" value="{{ old('due') }}">
      @if ($errors->has('due'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('due') }}</strong>
                                    </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control" autofocus>
          @foreach($categories as $category)
              <option value="">Keine</option>
              <option value="{{ $category->id }}">{{ $category->category }}</option>
          @endforeach
        </select>
    </div>
  
  <!--<div class="form-group">
    <label for="category" class="col-sm-2 control-label">Category</label>
    <div class="col-md-5">
      <input type="text" class="form-control" id="category" name="category" placeholder="category" value="{{ old('category') }}">
      @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
     @endif
    </div>
  </div>-->
  <!--<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-md-5">
      <textarea class="form-control" id="description" name="description" placeholder="category" value="{{ old('description') }}"></textarea>
      @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
     @endif
    </div>
  </div>-->
  <div class="form-group">
    <div class="col-sm-offset-2 col-md-5">
      <button type="submit" class="btn btn-default">Add</button>
    </div>
  </div>
</form>
    </div>
  </div>
@endsection