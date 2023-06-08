@extends('layouts.master')

@section('title','edit post')

@section('content')
<div class="container-fluid px-4">
 
    <div class="card mt-4">
    <h4 class="">Update Post

    <a href="{{url('admin/posts')}}" class="btn btn-danger btn-sm float-end">Back</a>
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

        <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
                <label for="">Category</label>
                <select class="form-control" name="category_id" required >
                <option value="">Select Category</option>
                    @foreach($category as $catitems)
                    <option value="{{$catitems->id}}" {{$post->category_id==$catitems->id ? 'selected':'' }}>
                        {{$catitems->name}}</option>
                    @endforeach -->

                </select>
            </div>
            <div class="mb-3">
                <label for="">Post Name</label>
                <input type="text" class="form-control" name="name" value="{{$post->name}}">
            </div> 
            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{$post->slug}}">
            </div>
          
            <div class="mb-3">
                <label for="">Description</label>
                <textarea  rows="5" class="form-control" id="mySummernote" name="description">{!! $post->description !!}</textarea>
            </div>

            <div class="mb-3">
                <label for="">Youtube Iframe Link</label>
                <input type="text" class="form-control" name="y_iframe" value="{{$post->yt_iframe}}" >
            </div> 
            <h6>SEO Tags</h6>
            <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" class="form-control" name="meta_title" value="{{$post->meta_title}}">
            </div>

            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea  rows="3" class="form-control" name="meta_description" >{!! $post->meta_description !!}</textarea>
            </div>

            <div class="mb-3">
                <label for="">Meta Keyword</label>
                <textarea rows="3" class="form-control" name="meta_keyword">{!! $post->meta_keyword !!}</textarea>
            </div>

            <h6>Status Mode</h6>
            <div class="row">
             
                <div class="col-md-3 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox"  name="status">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </div>


        </form>

    </div>

    </diV>
</div>
@endsection