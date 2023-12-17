@extends('blog.inc.layout')

@if( auth()->check() )

@else
    <script>window.location.href = "{{ url('/login') }}";</script>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" ></script>

@if(  auth()->user()->new_acc == 1 )
    <script>
        $(document).ready(function (){
            $('#myModal').modal('show');
        });

    </script>
@endif


@section('content')

    <nav class="navbar navbar-expand-md navbar-dark black-bg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> iLearn</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav">
                <span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <localized-text key="home" lang="@php echo auth()->user()->lang @endphp"></localized-text>
                        </a>
                    </li>

                    @if( auth()->check() )

                        <li class="nav-item">
                            <a data-toggle="modal" data-target="#exampleModalCenter" class="nav-link"
                               style="cursor:pointer">
                                <localized-text key="logout" lang="@php echo auth()->user()->lang @endphp"></localized-text>
                            </a>
                        </li>

                        <li class="nav-item">
                            @if(auth()->user()->lang == "en")
                                <a href="{{ url('lang-update') }}" class="nav-link">Ru</a>
                            @else
                                <a href="{{ url('lang-update') }}" class="nav-link">En</a>
                            @endif
                        </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <div id="slides" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>

        </ol>
        {{--
      <div class="carousel-inner">
          <div class="carousel-item active">
          <img src="https://wallpapers.com/images/high/dark-theme-background-dutvk1qfunkczobq.webp" width="100%" height="200px" max-width="700px">
              <div class="carousel-caption">
                <h1 style="margin-top:3.5em" class="display-2">добро пожаловать</h1>

                @if( auth()->check() )
                  <h2 class="mt-2" style="font-family: sans-serif ; text-transform: capitalize">{{ auth()->user()->name }}</h2>
                @else
                  <a href="{{ url('login')}}" class="mt-3 mb-5 btn btn-outline-light btn-lg">Login</a>

                @endif
              </div>
          </div>

          <div class="carousel-item" style="width: 100%">
          <img src="https://wallpapers.com/images/high/dark-theme-background-kllx9wmu61h84fkl.webp" width="100%" height="700px">
            <div class="carousel-caption">
              <h1 class="display-2">Enroll Now</h1>
              <h3 class="mt-3" >Chileshe Abraham</h3>
              <button type="button" class="mt-3 mb-5 btn btn-outline-light btn-lg">enroll</button>

            </div>
        </div>
          </div>
      </div>--}}


        <div class="container">


            <div class="row">

                <div class="col-lg-9 col-md-9">

                    @if( auth()->check() )
                        <button type="button" class="mt-5 btn btn-primary" data-toggle="modal" data-target="#post">
                            <i class="fa fa-plus"></i>
                            <localized-text key="create" lang="@php echo auth()->user()->lang @endphp"></localized-text>
                        </button>
                    @endif

                    @foreach ($posts as $post)
                        <div class="mt-5 card" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;">
                            <h5 style="text-transform: capitalize">{{ $post->name}}</h5>
                            <h6 style="color:grey">{{ $post->date}}</h6>
                            <div class="fakeimg" style="height:200px;">Image</div>
                            <h5 class="mt-4 mb-2">{{ $post->title}}</h5>

                            <p>{{ $post->description}}</p>

                            <a href="{{ auth()->user()->vk }}" target="_blank" class="btn btn-primary" style="width:200px">
                                <localized-text key="like" lang="@php echo auth()->user()->lang @endphp"></localized-text>
                            </a>

                        </div>
                    @endforeach

                </div>

                <div class="mt-3 col-lg-3 col-md-3">
                    @if( auth()->check() )

                        <div class="card" style="width: 18rem; ">
                            @if(auth()->user()->gender == "Male")
                                <img src="https://static.vecteezy.com/system/resources/thumbnails/019/900/322/small/happy-young-cute-illustration-face-profile-png.png" class="card-img-top img-fluid" alt="...">
                            @else
                                <img src="data:image/jpeg;base64,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" class="card-img-top img-fluid" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ auth()->user()->name }}</h5>
                               {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <localized-text key="gender" lang="@php echo auth()->user()->lang @endphp"></localized-text>


                                    {{ str_limit( auth()->user()->gender, $limit = 10, $end = '') }}
                                </li>

                                <li class="list-group-item">
                                    <localized-text key="joined" lang="@php echo auth()->user()->lang @endphp"></localized-text>:

                                    {{ str_limit( auth()->user()->created_at, $limit = 10, $end = '') }}
                                </li>

                                <li class="list-group-item">
                                    <localized-text key="dob" lang="@php echo auth()->user()->lang @endphp"></localized-text>

                                    {{ str_limit( auth()->user()->dob, $limit = 10, $end = '') }}
                                </li>

                            </ul>
                            <div class="card-body">
                                <a href="{{ auth()->user()->vk }}" target="_blank" class="btn btn-primary">
                                    <localized-text key="VK" lang="@php echo auth()->user()->lang @endphp"></localized-text>
                                </a>

                            </div>
                        </div>



                    @endif


                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Confirm your login
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        вы уверены, что хотите выйти из системы?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                        <a href="{{-- url('logout-user')--}}" class="btn btn-primary">Да</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> <localized-text key="msg" lang="@php echo auth()->user()->lang @endphp"></localized-text></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('add-post') }}" method="post">
                        {{ csrf_field() }}
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label"> <localized-text key="post_title" lang="@php echo auth()->user()->lang @endphp"></localized-text></label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="message-text"  class="col-form-label"><localized-text key="post_desc" lang="@php echo auth()->user()->lang @endphp"></localized-text></label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    {{-- Welcome window --}}

    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <h4>успешный</h4>

                    <p>ваша учетная запись была успешно создана</p>
                    <a class="btn btn-success" href="{{ url('home')}}" ><span>продолжить</span> <i class="material-icons">&#xE5C8;</i></a>
                </div>
            </div>
        </div>
    </div>
    {{-- Welcome window --}}




    <script>

            $("#russian").click(function () {
                alert("The paragraph was clicked.");
            });

        </script>




