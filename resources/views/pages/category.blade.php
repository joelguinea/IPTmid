@extends('base')

@section('content')
<div class="container" >
    <div class="card-header text-danger">
        <h1>{{ __($category->category . ' Posts') }}</h1>
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

                              {{-- @foreach (App\Models\Category::whereHas('posts')->get()->sortBy('category') as $category)
                              <li><a class="dropdown-item" href="{{url('categories', ['id'=>$category->id])}}">{{$category->category}}</a></li> 
                              @endforeach --}}
                            </ul>
                          </li>
        
                          
                        </div>
                      </div>
                    </div>
                  </nav>

            </div>
            <div class="container" style="height: 20Fvh;">
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