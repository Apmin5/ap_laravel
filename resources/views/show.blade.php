@extends('welcome');
@section('content')
    
    <div class="container">
        
        
        <div class="card">
                    <h5 class="card-header" style = "text-align:center">Content</h5>
            <div class="card-body">
                <h5 class="card-title">{{$post->name}}</h5>
                <p class="card-text">{{$post->description}}</p>
                <p class="card-text" style = "font-style:oblique">{{'category: ' . $post->categories->name}}</p>
                <div style="display:flex">
                <div style="margin-right:10px"><a href="/posts" class="btn btn-success">Back</a></div>
                <div>
                <form action="/posts/{{ $post->id }}" method = "post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Del</button>
                </form>
                </div>
                </div>
            </div>
            
        </div>
    </div>
    
    
    
    
@endsection