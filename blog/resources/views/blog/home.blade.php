@extends('blog.inc.layout')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" ></script>


@php

$photos = DB::table('posts')
        ->select('posts.*', 'posts.path as img_path')
        ->orderBy('posts.id', 'desc')
        ->get();
@endphp


{{-- This sets the language of the page--}}
@if( auth()->check() )
    @php
    $lang =  auth()->user()->lang 
    @endphp

    @php
        $agree = DB::table('users')
        ->select('users.*')
        ->where('id', auth()->user()->id)
        ->first();
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
    @if( auth()->check() )
        @if($agree->new_acc == 1)
            @include('blog/inc/agreement');
        @endif
    @endif
   
    <!-- Header -->


    <!-- Main Content -->
    <div class="container mt-4">

        <div class="row">

            <!-- Left Column -->
            <div class="col-md-3">
                <!-- Accordion -->
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <localized-text key="new_users" lang="@php echo $lang @endphp"></localized-text> <span class="sr-only">(current)</span>
                
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                            

                             
                                @if( auth()->check() )
                                    @php
                                    $users = DB::table('users')
                                    ->select('users.*')
                                    ->where('id', '!=', auth()->user()->id)
                                    ->orderBy('users.id', 'desc')
                                    ->get();
                                    @endphp
                                @else
                                    @php
                                    $users = DB::table('users')
                                    ->select('users.*')
                                    ->orderBy('users.id', 'desc')
                                    ->get();
                                    @endphp
                                @endif
                            
        
                            @foreach ($users as $user_all)
                                    <div>
                                     <a href=""><i class="fa fa-user-circle mr-2" ></i> {{ $user_all->username  }}</a>
                                        <hr />
                                    </div>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Popular Posts
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <!-- Your accordion item #1 content here -->
                            </div>
                        </div>
                    </div>
                    <!-- Repeat the structure for additional accordion items -->
                </div>

                

            </div>
            <!-- Left Column -->


            <!-- Scrollable Block -->
            <div class="col-md-6">

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Current Page</li>
                    </ol>
                </nav>


                <div class="scroll-container" >
                    @php
                        $posts = DB::table('posts')
                        ->join('users', 'posts.user_id', '=', 'users.id')
                        ->select('posts.*', 'users.username', 'users.id as uid','posts.id as pid')
                        ->orderBy('posts.id', 'desc')
                        ->get();
                       
                    @endphp

                    @if ($posts->isEmpty()) 
                        <div class="container plates" style="margin-top:-em; max-width:700px">
                        <h5 style="margin-top:4em; line-height:22px; font-family:Arial,Helvetica,sans-serif; padding:5em; color: grey; text-align: center;">Мероприятия не Посты</h5>
                        <h1 style="margin-top:-1em; color:white; background-color: rgba(146,0,0,0.5); text-align: center;" class="rounded"><i class="fa fa-exclamation-triangle" style="margin: 0 auto;"></i></h1><br/>
                        </div>

                    @endif
                        @foreach ($posts as $post)
                   
                        <div class="mt-3 card main-card">
                            <a href="#" >
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
                                <div class="fakeimg rounded" style="background-image: url('{{ $post->path}}'); background-size:cover; height:200px;">Image</div>
                                <h5 class="mt-4 mb-2">{{ $post->title}}</h5>

                                <p>{{ Illuminate\Support\Str::limit($post->description, 400) }}
                                </p>

                                @php
                                    $num_likes = DB::table('likes')->where('post_id', $post->pid)->count();
                                    $num_comments = DB::table('comments')->where('post_id', $post->pid)->count();
                                @endphp

                                @if( auth()->check() )
                                    {{--Like, coomment and read more button when logged in--}}
                                    <div class="form-group" >
                                        <span class="update_like{{$post->pid}}">
                                            <a href="#" class="btn like-btn" id="like_{{ $post->pid }}" style="min-width:70px"><i class="mr-1 fa fa-heart"></i> {{ $num_likes }}</a>
                                            <a href="#" class="btn comment-btn"  id="comment_count_{{ $post->pid }}" style="min-width:70px"><i class="mr-1 fa fa-comment"></i>  {{ $num_comments }}</a>
                                            <a href="{{url('/post')}}?postid={{ $post->pid}}" class="btn float-right read-btn" style="min-width:70px"><i class="mr-1 fa fa-eye"></i> Read More</a>
                                        </span><hr/>
                                    
                                        <form method="post" class="comment_form" id="comment_{{ $post->pid }}">
                                            <input type="text" class="form-control" placeholder="Comment" />
                                            <input type="submit" class="btn btn-info mt-2" value="submit" />
                                        </form>
                                    </div>
                                    {{--Like, coomment and read more button when logged in--}}
                                
                                @else
                                    {{--Like, coomment and read more button when NOT logged in--}}
                                    <div>
                                        <a class="btn"  style="background-color: var(--blue-green); min-width:70px"><i class="ml-2 fa fa-heart"></i> {{ $num_likes }}</a>
                                        <a class="btn"  style="background-color: var(--blue-green); min-width:70px"><i class="ml-2 fa fa-comment"></i> {{ $num_comments }}</a>
                                        <a href="{{url('/post')}}?postid={{ $post->pid}}" class="btn float-right read-btn" style="min-width:70px"><i class="mr-1 fa fa-eye"></i> Read More</a>
                                    </div>
                                     {{--Like, coomment and read more button when NOT logged in--}}

                                @endif


                                {{-- This update the like and Comment button very second--}}
                                <script>
                                    $(document).ready(function () {
                                        // Reload the div content every 5 seconds
                                        setInterval(function () {
                                            var update = $(this).attr('id')
                                            // Replace '#yourDivId' with the actual ID of the div you want to reload
                                            $('#'+update).load(location.href + '#'+update);

                                        }, 1000); // 5000 milliseconds = 5 seconds
                                    });
                                    </script>
                                    {{-- This update the like and Comment button very second--}}

                                                                                                

                                

                            </div>
                            
                        </div>
                   
                        @endforeach
                        
                   
                </div>
                @include('blog/js_inc/scripts');
            </div>

            

            


        


            <!--
            <div class="col-md-3">

              <div class="alert alert-success" role="alert">
                This is a success alert!
              </div>


              <button type="button" class="btn btn-primary">Primary Button</button>

             Cards
              <div class="card mt-3">

              </div>
            </div>  -->

            <!-- Right Column -->
            <div class="col-md-3">
                <!-- Carousel -->
                <!-- Carousel -->
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://buffer.com/library/content/images/size/w1200/2023/10/free-images.jpg" class="d-block w-100" alt="Slide 1" style="height:220px;">

                        </div>

                        @foreach ($photos as $photo)
                        <div class="carousel-item">
                            <div class="fakeimg rounded" style="background-image: url('{{$photo->img_path}}'); background-size:cover; height:220px; border:5px dashed black"></div>
                        </div>
                        @endforeach
                        
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                
            @if( auth()->check() )

            <button type="button" class="mt-3 w-100 btn btn-primary" data-toggle="modal" data-target="#post">
                <i class="fa fa-plus"></i>
                <localized-text key="create" lang="@php echo $lang @endphp"></localized-text>
            </button>

            <div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> <localized-text key="msg" lang="@php echo $lang @endphp"></localized-text></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('add-post') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="modal-body">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"> <localized-text key="post_title" lang="@php echo $lang @endphp"></localized-text></label>
                                    <input type="text" class="form-control mr-sm-2" name="title">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"> <localized-text key="post_image" lang="@php echo $lang @endphp"></localized-text></label>
                                    <input type="file" class="form-control" name="photo">
                                </div>

                                <div class="form-group">
                                    <label for="message-text"  class="col-form-label"><localized-text key="post_desc" lang="@php echo $lang @endphp"></localized-text></label>
                                    <textarea class="form-control" name="description"></textarea>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><localized-text key="p_close" lang="@php echo $lang @endphp"></localized-text></button>
                            <button type="submit" class="btn btn-primary"><localized-text key="p_create" lang="@php echo $lang @endphp"></localized-text></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            @else
                <button type="button" class="btn register_btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Registration</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form action="{{ url('add-user') }}" id="subm"  method="post">
                                        {{ csrf_field() }}
                                        <div class="input-group">
                                            <input type="text" placeholder="Имя пользователя" class="mt-3 form-control" name="username" required="">
                                        </div>

                                        <div class="input-group">
                                            <input type="email" class="mt-3 form-control" placeholder="почты" name="email" required="">
                                        </div>

                                        <div class="input-group">
                                           
                                            <select name="gender" class="mt-3 form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>

                                            </select>
                                        </div>

                                        <div class="input-group">                                   
                                            <input type="date"class="mt-3 form-control" required="" name="dob">
                                        </div>

                                        <div class="input-group"> 
                                            <input type="Password"  id="myInput" class="mt-3 form-control" placeholder="пароль" name="password" required="">
                                        </div>
                                        <br/>

                                        <div class="form-row bottom">
                                            <div class="form-check">
                                                <input type="checkbox" onclick="myFunction()">
                                                <label> показать пароль</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-block" type="submit">Register</button><br/>
                                
                                    </form>
                                </div>

                        </div>
                    </div>
                </div>
            @endif


    </div>

                @include('blog/inc/errors')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Your modal content here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
</div>

