@extends('welcome');
@section('content')
    <div class="container">
        <div class="card">
                    <h5 class="card-header" style = "text-align:center">Edit Post</h5>
            <div class="card-body">   
                
                <form action = "/posts/{{$post->id}}" method = "post">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                @method('PUT')
                <div class="form-group">
                        <input value ="{{ old('name', $post->name)}}" type="text" class="form-control" name="name" placeholder="Enter Name" ><br>
                        <textarea name="description" class="form-control" placeholder="Enter Description">{{old('description',$post->description)}}</textarea>    
                    </div>
                    <div class="form-group">
                            <select name="category_id" class="form-group">
                                <option value="">selected</option>
                               @foreach($category as $cat)
                               <option value="{{$cat->id}}" {{$cat->id==$post->category_id ?'selected':""}}>{{$cat->name}}</option>
                               @endforeach
                            </select>
                        </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/posts" class="btn btn-success">Back</a>
            
                </form>
            </div>    
        </div>        
    </div>
@endsection