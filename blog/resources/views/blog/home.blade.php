@extends('blog.inc.layout')

@section('content')

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Username" aria-label="Search">
                <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Search">
                <button class="btn my-2 my-sm-0" type="submit">Login</button>
            </form>
        </div>
    </nav>
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
                                    New Users
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                @for ($i = 1; $i <5; $i++)
                                    <div>
                                     <a href="">{{ $i  }}. Abraham Chileshe</a>
                                        <hr />
                                    </div>
                                @endfor
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

                <div class="card post mt-4">
                    <h3>Registration</h3>
                <form>
                    <div class="mb-3">
                        <input type="email" placeholder="Enter Email Address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Enter username" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">

                        <input type="password" placeholder="Enter Password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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

                    @for ($i = 1; $i <8; $i++)
                    <div class="mt-3 card main-card">
                        <div class="post">
                            <a href="">Abraham Chileshe</a>
                            <h6>Today: 05/10/2023</h6>
                            <div class="fakeimg rounded" style="height:200px;">Image</div>
                            <h5 class="mt-4 mb-2">Woman who threw bowl of food at Chipotle worker sentenced to work 2 months in fast food job </h5>

                            <p>{{ Illuminate\Support\Str::limit('New York
                                CNN
                                —
                                A woman who threw a bowl of hot food in the face of a Chipotle worker has been sentenced to a month in jail — and two months working a fast food job.

                                Videos of the woman, Rosemary Hayne, berating Chipotle worker Emily Russell on September 5 and then throwing the food in her face at close range, went viral after the incident. Hayne, a 39-year old mother of four, pleaded guilty to a misdemeanor assault charge and received the sentence last week in the Parma, Ohio, municipal court. Judge Timothy Gilligan gave her the choice of a 90-day jail sentence or a 30-day sentence on top of 60 days working in a fast food job.

                                Do you want to walk in her shoes for two months and learn how people should treat people, or do you want to do your jail time?” Gilligan asked Hayne at the hearing.', 500) }}
                                </p>

                                <a href="#" target="_blank" class="btn like-btn " style="width:200px">
                                    <i class="fa fa-thumbs-up"></i> Likes
                                </a>

                                <a href="#" target="_blank" class="btn like-btn " style="float:right; width:200px">
                                    <i class="fa fa-comment"></i> Likes
                                </a>

                        </div>

                    </div>
                    @endfor
                </div>
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
                            <img src="https://buffer.com/library/content/images/size/w1200/2023/10/free-images.jpg" class="d-block w-100" alt="Slide 1">

                        </div>
                        <div class="carousel-item">
                            <img src="https://buffer.com/library/content/images/size/w1200/2023/10/free-images.jpg" class="d-block w-100" alt="Slide 1">

                        </div>
                        <div class="carousel-item">
                            <img src="https://buffer.com/library/content/images/size/w1200/2023/10/free-images.jpg" class="d-block w-100" alt="Slide 1">

                        </div>
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




        </div>
    </div>



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