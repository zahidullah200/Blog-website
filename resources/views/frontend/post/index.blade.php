@extends('layouts.app')
@section('title',$category->meta_title)
@section('meta_description',"$category->meta_description")
@section('meta_keyword',"$category->meta_keyword")

@section('content')
<div class="py-5">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="category-heading">
                    <h3>{{$category->name}}</h3>
                    </div>
                    @forelse($post as $postitem)
                    <div class="card card-shadow mt-4 ">
                        <div class="card-body ">
                            
                            <a href="{{url('toturial/'.$category->slug.'/'.$postitem->slug)}}" class="text-decoration-none">
                            <h2 class="post-heading">>> {{$postitem->name}}</h2>
                        </a>
                        {{-- <h6>Posted on: {{$postitem->created_at->format('d-m-Y')}}  <span class="ms-3">Posted By: {{$postitem->user->name}} </span> </h6> --}}
                       
                        <!-- Here user is used defined function which I have created in Post model -->
                        </div>
                    </div>
                 
                    @empty
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <a href="{{url('toturial/'.$category->slug.'/'.$postitem->name)}}" >
                            <h2 class="post-heading">Post Not Available</h2>
                        </a>
                        </div>
                    </div>
                    @endforelse
                    <div class="your-panination mt-4">
                        {{$post->links()}}

                    </div>
                  

                

                </div>
                <div class="col-md-3">
                    <div class="border p-2">
                    <h4>Advertising Area</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection