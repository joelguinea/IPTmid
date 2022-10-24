@extends('base')

@section('content')


  {{-- <div class="row">
      <div class="col">
          <select class="form-select" name="gender">
              <option value="all">All</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
          </select>
      </div>

      <div class="col">
          <input class="form-control" placeholder="Search" type="search"> 
      </div>
  </div> --}}

<div class="container" >
    <div class="card-header">
        <h3>Recent Posts</h3>
    </div>

    <div class="row">
    @foreach ($posts as $post)
    <div class="col-md-4 mt-1">
    
        <div class="card {{$post->user->gender === 'female'? 'f1' : 'm1'}}" >
            <div class="card-header">
                <nav class="navbar navbar-expand-lg text-info mb-2">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="">{{$post->user->name}}</a>
                     
                      <div class="collapse navbar-collapse" id="navbarNavAlt">
                        <div class="navbar-nav ms-auto">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{$post->category->category}}
                            </a>
                            <ul class="dropdown-menu">
                              @foreach  (App\Models\User::byCategory($post->category_id) as $user)
                              <li><a class="dropdown-item" href="{{url('authors', ['id'=>$user->id])}}">{{$user->name}}</a></li>
                              @endforeach
                            </ul>
                          </li>
        
                          
                        </div>
                      </div>
                    </div>
                  </nav>

            </div>
            <div class="card m-3" style="height: 20vh;">
                <div class="card-body">
                    <h4>{{$post->post}}</h4>
                </div>
            </div>
            
            <div class="card-footer">
                <p>Published: {{$post->created_at}}</p>
            </div>
        </div>
   
    </div>
    @endforeach
</div>

    <div class="offset-md-5">
        {{ $posts->links() }}
    </div>
</div> 


<style>
    .f1{
        background-color: pink; 
    }
    
    .m1{
        background-color: blue;
    }
</style>
@endsection