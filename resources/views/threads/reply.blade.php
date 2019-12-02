<div class="panel panel-default"> 
    <div class="panel-body">
      <a href="/profiles/{{$reply->owner->name}}">{{$reply->owner->name}} </a>
      je odgovorio {{ $reply->created_at->diffForHumans() }}
    </div> 
    <div class="panel-body">
        {{$reply->body}}       
    </div>   
  </div>