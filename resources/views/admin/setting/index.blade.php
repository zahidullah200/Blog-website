@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="container-fluid px-4">
      
        <div class="row">
            <div class="col-md-12">
                @if(session('message'))
                    <h4 class="alert alert-warning">{{ session('message') }}</h4>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h1>Website Setting</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label>Website Name</label>
                                <input type="text" name="website_name" @if($setting) value="{{ $setting->website_name }}" @endif required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Website Logo</label>
                                <input type="file" name="logo"  class="form-control">
                                @if($setting)
                                <img src="{{ asset('uploads/settings/'.$setting->logo) }}" alt="Logo" height="70px" width="100px">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>Favicon</label>
                                <input type="file" name="favicon" class="form-control">
                                @if($setting)
                                <img src="{{ asset('uploads/settings/'.$setting->favicon) }}" alt="Logo" height="100px" width="70px">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control" > @if($setting) {{ $setting->description }} @endif</textarea>
                            </div>
                            <h4>SEO Meta Tags</h4>
                            <div class="mb-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" @if($setting) value="{{ $setting->meta_title }}" @endif required class="form-control" >
                           </div>

                           <div class="mb-3">
                            <label>Meta Keywords</label>
                            <textarea name="meta_keyword" rows="3" class="form-control">@if($setting) {{ $setting->meta_keyword }} @endif </textarea>
                           </div>
                           <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_descrition" rows="3"  class="form-control"> @if($setting) {{ $setting->meta_descrition }}  @endif</textarea>
                           </div>

                           <div class="mb-3">
                           
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>


                        </form>
                    </div>
                </div>

            </div>

        </div>


    </div>




@endsection
