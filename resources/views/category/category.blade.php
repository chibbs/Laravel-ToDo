@extends('layouts.app')
//@section('title', 'Category List')
@section('content')
      <div class="row">
            <div class="col-md-6">
                  <form method="post" action="{{action('CategoryController@store')}}">@csrf
                  <div class="form-row">
                        <div class="col-auto">
                              <label for="category" class="form-control-label">Add new Category</label>
                              <input type="text" class="form-control mb-2" id="category" name="category" value="{{ old('category') }}">
                        </div>
                  </div>
                  <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Add</button>
                  </div>
                  </form>
            </div>
      </div>   
    
      <div class="row">
            <div class="col-md-6">
                  @if($categories != false)
                  <table class="table table-striped">
                        <thead><tr>
                              <th>Category</th>
                              <th>Action</th>
                        </tr></thead>
                        <tbody>
                              @foreach ($categories as $category)
                              <tr><td>{{$category->category}}</td>
                                    <td>
                                          <form id="delete-form" action="{{action('CategoryController@destroy', $category)}}" method="post">@csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                          </form>
                                    </td>
                              </tr>
                              @endforeach
                        </tbody>
                  </table>

                  @else
                  <ul class="list-group">
                        <li class="list-group-item"> No Category added yet.</li>
                  </ul>
                  @endif

            </div>
      </div>

@endsection