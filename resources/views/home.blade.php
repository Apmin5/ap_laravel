@extends('welcome');
@section('content')
    
    <div class="container">
       <div>
            <a href="/posts/create" class="btn btn-success">New Post</a>
            <a href="logout" class="btn btn-danger">Logout</a>
            <h4 style="float:right">{{Auth::user()->name}}</h4>
       </div>

        
        <br>
        <div>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                    <strong>Success!</strong>{{ session('status') }}
                    <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
                </div>
            @endif
        </div>
        <div class="card">
                    <h5 class="card-header" style = "text-align:center">Content</h5>
                    <div class="card-body">
            @foreach($data as $post)    
                <div>
                    <h5 class="card-title">{{$post->name}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <a href="/posts/{{ $post->id }}" class="btn btn-primary">view</a>
                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">edit</a>
                    
                    <form style="display:inline": action="/posts/{{ $post->id }}" method = "post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Del</button>
                    </form>

                </div>
                <hr>
            @endforeach
            </div>
        </div>
    </div>
    
    
    
    
@endsection