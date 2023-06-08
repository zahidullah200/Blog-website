@extends('layouts.master')

@section('title','add post')

@section('content')
<div class="container-fluid px-4">
 
    <div class="card mt-4">
    <h4 class="">Add Post

    <a href="{{url('admin/posts')}}" class="btn btn-primary btn-sm float-end">View Posts</a>
    </h4>
        <div class="card-header">
        


        </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
    </div>
        @endif

        <form action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
                <label for="">Category</label>
                <select class="form-control" name="category_id">
                    @foreach($category as $catitems)
                    <option value="{{$catitems->id}}">{{$catitems->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="">Post Name</label>
                <input type="text" class="form-control" name="name">
            </div> 
            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug">
            </div>
          
            <div class="mb-3">
                <label for="">Description</label>
                <textarea  rows="5" class="form-control" name="description" id="mySummernote"></textarea>
            </div>

            <div class="mb-3">
                <label for="">Youtube Iframe Link</label>
                <input type="text" class="form-control" name="y_iframe">
            </div> 
            <h6>SEO Tags</h6>
            <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" class="form-control" name="meta_title">
            </div>

            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea  rows="3" class="form-control" name="meta_description"></textarea>
            </div>

            <div class="mb-3">
                <label for="">Meta Keyword</label>
                <textarea rows="3" class="form-control" name="meta_keyword"></textarea>
            </div>

            <h6>Status Mode</h6>
            <div class="row">
             
                <div class="col-md-3 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox"  name="status">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Post</button>
                </div>
            </div>


        </form>

    </div>

    </diV>
</div>
@endsection