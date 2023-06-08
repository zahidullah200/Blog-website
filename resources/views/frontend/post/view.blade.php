@extends('layouts.app')

@section('title',$post->meta_title)
@section('meta_description',"$post->meta_description")
@section('meta_keyword',"$post->meta_keyword")


@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="category-heading">
                        <h3>{!! $post->name !!}</h3>
                        <div>{{ $post->category->name }}</div>
                    </div>
                  
                    <div class="card card-shadow mt-4 ">
                        <div class="card-body post-description">
                            <h5>{!!  $post->description  !!}</h5>
                        </div>
                    </div>
                    <div class="comment-area mt-4">
                        @if(session('message'))
                            <h6 class="alert alert-warning">{{ session('message') }}</h6>
                        @endif
                        <div class="card c ard-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{ url('commnets') }}" method="POST">
                             @csrf
                                <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                        
                        @forelse ($post->comments as $comment)
                        
                        <div class="comment-container card card-body shadow-sm mt-3">
                            <div class="detial-area">
                                <h6>
                                    @if($comment->user)
                                        {{ $comment->user->name }}
                                    @endif
                                    User
                                    <small>Commented on : {{ $comment->created_at->format('d-m-Y') }}</small>
                                </h6>
                                <p class="user-comment mb">
                                    {!! $comment->comment_body !!}
                                </p>
                                @if(Auth::check() && Auth::id()==$comment->user_id)
                                <div>
                                        <button type="button" href="" value="{{ $comment->id }}" class=" deleteComment btn btn-danger btn-sm me-5 mt-2">Delete</button>
                                </div>
                                @endif
                            </div>
                      
                        </div>
                        @empty
                    
                        <h6> No Comments</h6>
                    
                            
                        @endforelse
                     
                        
                    </div>
                </div>
             
               
                <div class="col-md-3">
                    <div class="border p-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2">
                        <h4>Advertising Area</h4>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latest_post as $latestitem)
                                
                            <a href="{{ url('toturial/'.$latestitem->category->slug.'/'.$latestitem->slug) }}" class="text-decoration-none">
                                <h6> > {{ $latestitem->name }}</h6>
                            </a>
                            @endforeach
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection



@section("scripts")

<script>
// Ajax setup
$(document).ready(function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });
});


    $(document).ready(function(){
        $(document).on('click','.deleteComment',function(){
                if(confirm('Are Your Sure To Delete This Comment ? '))
                {
                    var thisClicked=$(this);
                    var comment_id=thisClicked.val();

                    $.ajax({
                        type:"POST",
                        url:"/delete-comment",
                        data:{
                            'comment_id':comment_id

                        },
                        success:function(res){
                            if(res.status==200){
                                thisClicked.closest('.comment-container').remove();
                                alert(res.message);
                            }
                            else{
                                alert(res.message);

                            }
                        }

                    });


                    
                }
        }); 
    });
</script>
@endsection