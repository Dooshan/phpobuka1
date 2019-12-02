
@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 mx-auto mt-4">
            <div>
                <div class="display-4 mb-4">Svi Profili</div>

                <div>
                  @foreach ($profiles as $profile)
                  <ul>
                    <li>                
                    <img class="img-thumbnail mr-4 ml-2" src="/storage/avatars/{{ $profile->avatar}}" width="40" alt="slika">
                    <a href="/profiles/{{ $profile->name }}">{{ $profile->name }}</a>                   
                    </li>
                  </ul>  
                  @endforeach                   
                </div>
            </div>
        </div>
    </div>



@endsection