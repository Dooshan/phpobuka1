@extends('layouts.app')
@section('content')
  <div class="row">

        <div class="col-md-7">
            <h1 class="nauci animated bounceInDown">nauči</h1>
            <h2 class="php animated slideInLeft">PHP</h2>
        </div>

        <div class="col-md-5">
            <h3 class="dobrodosli animated fadeIn slower delay-1s">Dobro došli na forum polaznika php obuke</h3>
              <a class="btn btn-info btn-block btn-lg" href="/register" role="button">Registruj se</a>
              <a class="btn btn-success btn-block btn-lg" href="/login" role="button">Uloguj se</a>            
                </div> 
    </div>
     
        
    <div class="row">   
        <div class="col-md-6">
            <div>
                <div class="display-3">Poslednje teme</div>

                  @foreach ($threads as $thread)
                  <article class="d-flex align-items-center">
                      
                      <div class="p-2"><img class="img-thumbnail" src="/storage/avatars/{{ $thread->creator->avatar}}" width="50" alt="slika"/></div>
                      <div class="p-2 mr-5"> od <a href="../profiles/{{$thread->creator->name}}"> {{$thread->creator->name}} </a></div>
                      <div class="p-2"><a href="{{$thread->path()}}"> {{$thread->title}} </a><span class="">{{$thread->created_at->diffForHumans()}}</span></div>
                     
                  </article>
                      
                  @endforeach  
                 
                </div>
            </div>
        </div>
  

@endsection