@extends('layouts.app')
@section('content')

  
    <div class="row justify-content-center">
        <div class="page-header">
            
                <div class="my-5">
                        <img class="img-thumbnail ml-5" src="/storage/avatars/{{ Auth::user()->avatar }}" width="200" />
                    </div>
                    <form action="/profiles/{user}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">Maksimalna veličina slike je 2MB.</small>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Izmeni avatar</button>
                    </div>
                    </form>
            <h1>
                {{ $profileUser->name }}
                <small class="ml-5">registered {{ $profileUser->created_at->diffForHumans() }}</small>
            </h1>
        </div>
    </div>

    <div>
        <h2>Teme</h2>
            @foreach($threads as $thread)
            <div class="panel-heading">
                <div class="level">
                    <span class="my-2">
                <strong><a href="{{$thread->path()}}"> {{$thread->title}} </a></strong>
                </span>
                <span class="pull-right">{{$thread->created_at->diffForHumans()}}</span>
            </div>
    </div>
    <div class="panel-body">
        {!!$thread->body!!}
    </div>

    @endforeach

</div>
{{$threads->links("pagination::bootstrap-4")}}

@endsection