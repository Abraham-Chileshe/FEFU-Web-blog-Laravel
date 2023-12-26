@extends('blog.inc.layout')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" ></script>


@php

$pid = request()->query('postid'); // Post id gotten from the  URL

$comments= DB::table('comments')
        ->join('users', 'comments.commenter', '=', 'users.id')
        ->select('comments.*', 'comments.id as uid', 'users.username as commentern')
        ->where('comments.post_id', $pid)
        ->orderBy('comments.id', 'desc')
        ->get();


$posts = DB::table('posts')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*', 'users.username', 'users.id as uid')
        ->where('posts.id', $pid)
        ->orderBy('posts.id', 'desc')
        ->get();
@endphp

@if (!$pid)
    
@endif


{{-- This sets the language of the page--}}
@if( auth()->check() )
    @php
    $lang =  auth()->user()->lang 
    @endphp

@else
    @php 
        $lang = "en";
    @endphp

@endif
{{-- This sets the language of the page--}}


@section('content')

    <!-- Header -->
    @include('blog/inc/navbar');
    <!-- Header -->


    <!-- Main Content -->
    <div class="container mt-4">

        <div class="row">

            <!-- Scrollable Block -->
            <div class="col-md-8">

                <div class="scroll-container" style="height:1000px">
                    @php
                       
                    @endphp

                    @if ($posts->isEmpty()) 
                        <div class="container plates" style="margin-top:-em; max-width:700px">
                        <h5 style="margin-top:4em; line-height:22px; font-family:Arial,Helvetica,sans-serif; padding:5em; color: grey; text-align: center;">Мероприятия не Посты</h5>
                        <h1 style="margin-top:-1em; color:white; background-color: rgba(146,0,0,0.5); text-align: center;" class="rounded"><i class="fa fa-exclamation-triangle" style="margin: 0 auto;"></i></h1><br/>
                        </div>

                    @endif

                    @foreach ($posts as $post)
                        <div class="mt-3 card main-card">
                            <div class="post">
                                @if( auth()->check() )
                                    @if ($post->uid == auth()->user()->id)
                                    <a href="" style="text-transform: capitalize"> <localized-text key="you" lang="@php echo $lang @endphp"></localized-text> <span class="sr-only">(current)</span>
                                    </a>
                                    @else
                                    <a href="" style="text-transform: capitalize">{{$post->username}}<span class="sr-only">(current)</span>
                                    </a>
                              
                                    @endif
                                @else
                                    <a href="" style="text-transform: capitalize">{{$post->username}}<span class="sr-only">(current)</span>
                                    </a>
                              
                                @endif

                                <h6>Today: {{ $post->date}} </h6>
                                <div class="fakeimg rounded" style="background-image: url('{{ $post->path}}'); background-size:cover; height:300px;"></div>
                                
                                @php
                                    $num_likes = DB::table('likes')->where('post_id', $pid)->count();
                                    $num_comments = DB::table('comments')->where('post_id', $pid)->count();
                                @endphp

                                @if( auth()->check() )
                                
                                    {{--Like, coomment and read more button when logged in--}}
                                    <div class="form-group" >
                                        <span class="mt-3 update_like{{$pid}}">
                                            <a href="#" class="btn mt-2 like-btn" id="like_{{ $pid }}" style="min-width:70px"><i class="mr-1 fa fa-heart"></i> {{ $num_likes }}</a>
                                        </span><hr/>
                                    </div>
                                    {{--Like, coomment and read more button when logged in--}}
                                    
                                @else
                                  {{--Like, coomment and read more button when NOT logged in--}}
                                  <div class="form-group" >
                                    <a class="btn mt-2"  style="background-color: var(--blue-green); min-width:70px"><i class="ml-2 fa fa-heart"></i> {{ $num_likes }}</a>
                                  </div>
                                  {{--Like, coomment and read more button when NOT logged in--}}

                                @endif

                                <h5 class="mt-4 mb-2">{{ $post->title}}</h5>
                                <p>{{$post->description}}</p>
                                                                                            
                            </div>
                        </div>
                    @endforeach
                   
                </div>
            </div>
            <!-- Scrollable Block -->

            
            <!-- Right Column -->
            <div class="col-md-4">
                <div class="">
                    <div class="mt-3 card main-card">
                        <div class="container">
                            <h4 class="mt-2 comment_btn">Comments -  {{ $num_comments }}  </h4>
                            <hr/>
                        
                            @if( auth()->check() )
                                <div id="all_coms" class="comment-thread  scroll-container" style="height:800px">
                                    @if ($comments->isEmpty()) 
                                        <div class="container" style="margin-top:5em; max-width:700px">
                                        <h5 style="margin-top:4em; line-height:22px; font-family:Arial,Helvetica,sans-serif; padding-top:5em; padding-bottom:2em; color: grey; text-align: center;">No comments</h5>
                                        <h3 style="margin-top:-1em; color:white; background-color: rgba(34, 34, 34, 0.5); text-align: center;" class="rounded"><i class="fa fa-exclamation-triangle" style="margin: 0 auto;"></i></h3><br/>
                                        </div>
                                    @endif

                                    @foreach ($comments as $comment)
                                        <!-- Comment 1 start -->
                                        <div class="comment" id="comment-1">
                                            <a href="#comment-1" class="comment-border-link">
                                                <span class="sr-only">Jump to comment-1</span>
                                            </a>
                                            <div class="comment-heading">
                                                <div class="comment-voting">
                                                    <button type="button">
                                                        <span aria-hidden="true">&#9650;</span>
                                                        <span class="sr-only">Vote up</span>
                                                    </button>
                                                    <button type="button">
                                                        <span aria-hidden="true">&#9660;</span>
                                                        <span class="sr-only">Vote down</span>
                                                    </button>
                                                </div>
                                                <div class="comment-info">
                                                    <a href="#" class="comment-author"  style="text-transform: capitalize;">{{ $comment->commentern}}</a>
                                                    <p class="m-0">
                                                        &bull; {{ $comment->added_at}}
                                                    </p>
                                                </div>
                                            </div>
                                    
                                            <div class="comment-body">
                                                <p>
                                                    {{ $comment->text}}
                                                </p>
                                                <button type="button">Like</button>
                                                
                                            </div>
                                    
                                        
                                        </div>
                                        <!-- Comment 1 end -->

                                    @endforeach
                                </div>
                                
                                <div class="form-group mt-3" >
                                    <form method="post" class="comment_form" id="comment_{{ $pid }}">
                                        <input type="text" class="form-control" placeholder="Comment" />
                                        <input type="submit" class="btn btn-info mt-2" value="submit" />
                                    </form>
                                </div>

                            @else
                                <div id="all_coms" class="comment-thread " style="height:800px">
                                    <div class="container" style="margin-top:7em; max-width:700px">
                                        <h5 style="margin-top:4em; line-height:22px; font-family:Arial,Helvetica,sans-serif; padding-top:5em; padding-bottom:2em; color: grey; text-align: center;">You need to register to view comments</h5>
                                        <h3 style="margin-top:-1em; color:white; background-color: rgba(34, 34, 34, 0.5); text-align: center;" class="rounded"><i class="fa fa-exclamation-triangle" style="margin: 0 auto;"></i></h3><br/>
                                    </div>
                                </div>

                            @endif
                            

                           
                    
                        </div>
                    </div>
                </div>   
            </div>
            

             {{-- This update the like and Comment button very second--}}
             <script>
                $(document).ready(function () {
                    // Reload the div content every 5 seconds
                    setInterval(function () {
                        // Replace '#yourDivId' with the actual ID of the div you want to reload
                       //$('#all_coms').load(location.href + 'all_coms');

                    }, 1000); // 5000 milliseconds = 5 seconds
                });
                </script>
                {{-- This update the like and Comment button very second--}}

    </div>



     @include('blog/js_inc/scripts');
  

     

</div>
</div>
</div>

