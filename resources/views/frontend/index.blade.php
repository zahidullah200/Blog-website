@extends('layouts.app')
{{-- @section('title', "$setting->meta_title") --}}
{{-- @section('meta_description', "$setting->meta_descrition ")
@section('meta_keyword', "$setting->meta_keyword ") --}}



@section('content')


    <div class="py-5" style="background-color: rgb(52, 2, 2);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel category-carousel owl-theme">
                        @foreach ($all_categories as $catitems)
                            <div class="item">
                                <a href="{{ url('toturial/' . $catitems->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset('uploads/category/' . $catitems->image) }}" alt="Image"
                                            width="250px" height="230px">
                                        <div class="card-body text-center">
                                            <h5 class="text-dark">{{ $catitems->name }}</h5>

                                        </div>
                                </a>
                            </div>

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="py-5">
        <div class="contailer bg-light ">
            <div class="border text-center p-3">
                <h3>Advetise Here</h3>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Sherzad Fundamentals</h3>
                </div>
                <div class="underline">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum dolore incidunt, vel, voluptatibus
                        saepe natus doloremque neque et eaque totam possimus impedit quibusdam placeat expedita sapiente
                        libero necessitatibus non maiores.</p>
                </div>
            </div>
        </div>
    </div>



    <div class="py-5 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h3>All Categories</h3>
                </div>
                <div class="underline">

                </div>
                @foreach ($all_categories as $all_cat_items)
                    <div class="col-md-3">

                        <div class="card card-body">
                            <a href="{{ url('toturial/' . $all_cat_items->slug) }}" class="text-decoration-none">
                                <h4>{{ $all_cat_items->name }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="py-5 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h3>Latest Posts</h3>
                </div>
                <div class="underline">

                </div>
                <div class="col-md-8">
                    @foreach ($latest_post as $latest_post)
                        <div class="col-md-12 ">

                            <div class="card card-body mt-3 bg-gray shadow">
                                <a href="{{ url('toturial/' . $latest_post->category->slug . '/' . $latest_post->slug) }}"
                                    class="text-decoration-none">
                                    <h4>{{ $latest_post->name }}</h4>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="col-md-4">
                    <div class="border text-center p-5 mb-3">
                        <h3>Advetise Here</h3>
                    </div>
                    <div class="border text-center p-3 mb-3">
                        <h3>Advetise Here</h3>
                    </div>
                    <div class="border text-center p-3 mb-3">
                        <h3>Advetise Here</h3>
                    </div>
                </div>

                
                


            </div>
        </div>
    </div>
@endsection
