@extends('layouts.app')
@section('content')
  <div class="row">

        <div class="col-md-7">
            <h1 class="nauci animated bounceInDown">nauči</h1>
            <h2 class="php animated slideInLeft">PHP</h2>
        </div>

        <div class="col-md-5">
            <h3 class="dobrodosli animated fadeIn slower delay-1s">Dobro došli na forum polaznika php obuke</h3>
              <a class="btn btn-info btn-block btn-lg mt-3" href="/register" role="button">Registruj se</a>
              <a class="btn btn-success btn-block btn-lg" href="/login" role="button">Uloguj se</a>            
          </div> 
  </div>

@endsection