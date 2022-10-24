@extends('base')

@section('content')
<div class="container">
  <div class="row" >
    @foreach ($users as $user)
    <div class="col-md-4 mb-1">
     
        <div class="card {{$user->gender === 'female'? 'f1' : 'm1' }}">
            <div class="card-header">
              <h4>{{$user->name}}</h4>
            </div>

            <a href="{{url('authors', ['id'=>$user->id])}}">
            
                <div class="card-body" >
                  <img class="card" id="pf1" src="{{$user->gender === 'female' ? asset('img/girl.png') : asset('img/boy.jpg')}}" alt="photo">
                </div>
              
            </a>
            
            <div class="card-footer">
                <p>Total Posts: {{$user->posts()->count()}}</p>
            </div>
        </div>
     
    </div>
    @endforeach
    <div class="offset-md-5 mt-3">
        {{ $users->links() }}
    </div>
</div>
</div>

<style>
  #pf1{
    height: 250px;
    width: 350px;
  }
  .f1{
      background-color: lightpink; 
  }
  .m1{
      background-color: lightblue;
  }
  
</style>
    
@endsection