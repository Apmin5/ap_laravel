@extends('welcome');
@section('content')
    <div class="container">
        <div class="card">
                    <h5 class="card-header" style = "text-align:center">New Post</h5>
            <div class="card-body">   
                
                <form action = "/posts" method = "post">
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
                <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{old('name')}}">
                        <!-- @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror -->
                        <br>
                        <textarea name="description" class="form-control" placeholder="Enter Description">{{old('description')}}</textarea>
                        <!-- @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror -->
                        <br>
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                <option value=""  class="form-group">selected</option>
                               @foreach($category as $cat)
                               <option value="{{$cat->id}}"  class="form-group">{{$cat->name}}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/posts" class="btn btn-success">Back</a>
            
                </form>
            </div>    
        </div>        
    </div>
@endsection