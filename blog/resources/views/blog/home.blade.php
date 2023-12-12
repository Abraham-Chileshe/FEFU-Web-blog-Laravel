@extends('blog.inc.layout')

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
            @if( auth()->check() )
                <button type="button" class="mt-5 btn btn-primary" data-toggle="modal" data-target="#post">
                    <i class="fa fa-plus"></i>
                    <localized-text key="create" lang="@php echo auth()->user()->lang @endphp"></localized-text>
                </button>
            @endif

            <div class="row">

                <div class="col-lg-9 col-md-9">

                    @foreach ($posts as $post)
                        <div class="mt-5 card">
                            <h5 style="text-transform: capitalize">{{ $post->name}}</h5>
                            <h6 style="color:grey">{{ $post->date}}</h6>
                            <div class="fakeimg" style="height:200px;">Image</div>
                            <h5 class="mt-4 mb-2">{{ $post->title}}</h5>

                            <p>{{ $post->description}}</p>

                        </div>
                    @endforeach

                </div>

                <div class="col-lg-3 col-md-3">
                    <div class="mt card">
                        <h2>Hello</h2>
                    </div>
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
                        <a href="{{ url('logout-user')}}" class="btn btn-primary">Да</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('add-post') }}" method="post">
                        {{ csrf_field() }}
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" name="title" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text"  class="col-form-label">Message:</label>
                                <textarea class="form-control" name="description" id="message-text"></textarea>
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




        <script>

            $("#russian").click(function () {
                alert("The paragraph was clicked.");
            });

        </script>




