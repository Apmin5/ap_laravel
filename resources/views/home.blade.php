@extends('welcome');
@section('content')
    
    <div class="container">
        <div class="card">
                    <h5 class="card-header" style = "text-align:center">Content</h5>
                    <div class="card-body">
            @foreach($data as $post)    
                <div>
                    <h5 class="card-title">{{$post->name}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <a href="#" class="btn btn-primary">view</a>
                </div>
                <hr>
            @endforeach
            </div>
        </div>
    </div>
    
    
    
    
@endsection