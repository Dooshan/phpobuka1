@extends('layouts.app')
@section('content')

    <div class="row mt-5">
        <div class="col-md-8 col-md-offset-2">
            <div class="card transparent">
                <div class="card-header ">
                           
                    <div class="d-flex justify-content">
                        <div class="mr-auto">
                            <a href="/profiles/{{ $thread->creator->name }}"> {{ $thread->creator->name }} </a>  
                              je napisao: <strong class="mx-1"> {{ $thread->title }} </strong>
                        </div>
                        
                        @if (($thread->user_id == auth()->id()))

                            <div class="mx-1">
                                <a href="{{$thread->path()}}/edit" class="btn btn-success btn-sm">Izmeni post</a>
                            </div>  

                            <div>                       
                                <form action="{{$thread->path()}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger btn-sm">Obriši Post</button>
                                </form>
                            </div>  
                        @endif 

                    </div>
                         
                </div>
          
                <div class="card-body">
                   <span class="bodyCK">{!!$thread->body!!}</span> 
                </div>

                </div>

        </div>
    </div>
    
   
    <div class="row mb-3">
        <div class="col-md-8 col-md-offset-2">
    @if (\Auth::check())
            @foreach ($thread->replies as $reply)
            <div class="m-2 ml-5">
                @include('threads.reply')
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST"action="{{$thread->path() . '/replies'}}">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea name="body" id="body" class="form-control transparent" placeholder="Imaš odgovor?"
                        rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Odgovori</button>
            </form>
        </div>
    </div>
    @endif

    @if (Auth::guest())
        <p class="text-center"> Molim te <a href="{{ route('login') }}"> uloguj se </a> da bi učestvovao.</p>
    @endif

@endsection