@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="display-4">Izmeni temu</div>

                <div class="panel-body bodyCK">

                <form method="POST" action={{$thread->path()}}>
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
            
                  <div class="form-group">
                      <label for="title">Title:</label>
                      <input type="text" class="form-control" id="title" name="title" value="{{$thread->title}}">
                  </div>

                  <div class="form-group">
                      <label>Sadržaj</label>
                      <textarea name="body" class="form-control" id="summary-ckeditor" rows="8" >{!!$thread->body!!}</textarea>
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
                    <button type="submit" class="btn btn-primary">Izmeni</button>
                  </div>

                  @if(count($errors))
                  <ul class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                      @endforeach                    
                  </ul>
                
                @endif 
              </form>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection