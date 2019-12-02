@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="display-4">Kreiraj novu temu</div>

                <div class="panel-body">

                <form method="POST" action="/threads">
                  {{ csrf_field() }}

                  <div class="form-group">
                      <label for="title">Naslov:</label>
                      <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                  </div>

                  {{-- <div class="form-group">
                        <label for="title">Category</label>
                        <input type="text" class="form-control" id="title" name="category">
                    </div> --}}

                  <div class="form-group">
                      <label>Sadržaj:</label>
                      <textarea name="body" id='summary-ckeditor' class="form-control" rows="8" value="{{old('body')}}"></textarea>
                  </div>

                  <div class="form-group">
                        <label for="category_id">Izaberi kategoriju</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Izaberi kategoriju</option>
                            @foreach(App\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Objavi</button>
                  </div>

                  @if(count($errors))
                  <ul class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                      @endforeach                    
                  </ul>
                
                @endif 
              </form>

             
        
            

              {{-- @if(count($errors) > 0 )
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="p-0 m-0" style="list-style: none;">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif --}}

                            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection