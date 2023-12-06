<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap page navbar and slider</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

	<nav class="navbar navbar-expand-md navbar-dark black-bg sticky-top">  
    <div class="container-fluid">  
       <a class="navbar-brand" href="#"> iLearn</a>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav">  
        <span class="navbar-toggler-icon"></span></button>  
          
          <div class="collapse navbar-collapse" id="mynav">  
              <ul class="navbar-nav ml-auto">  
               <li class="nav-item active" >    
                <a  class="nav-link" href="#">Home</a>  
                </li>  
                <li class="nav-item " > 
                <a  class="nav-link" href="#">Link1</a>  
                </li>  
                <li class="nav-item" >  
                <a  class="nav-link" href="#">Link2</a>  
                </li>  
                <li class="nav-item" >  
                <a  class="nav-link" href="#">Link3</a>  
                </li>  
                @if( auth()->check() )

                  <li class="nav-item" >  
                  <a  data-toggle="modal" data-target="#exampleModalCenter" class="nav-link" style="cursor:pointer">выход</a>  
                  </li> 
                  
                  <li class="nav-item" >  
                    <a  class="nav-link" href="#"><i class="mr-2 fa fa-user"></i> {{ auth()->user()->username }}</a>  
                  </li>  

                   
                @endif
              </ul>  
            </div>
        </div>
    </nav> 


        <div id="slides" class="carousel slide" data-ride="carousel">  
          <ol class="carousel-indicators">   
              <li data-target="#slides" data-slide-to="0" class="active"></li>  
              <li data-target="#slides" data-slide-to="1" ></li>  
                
          </ol>  
          <div class="carousel-inner">  
              <div class="carousel-item active">  
              <img src="https://wallpapers.com/images/high/dark-theme-background-dutvk1qfunkczobq.webp" width="100%" height="700px" max-width="700px">  
                  <div class="carousel-caption">  
                    <h1 style="margin-top:-3.5em" class="display-2">добро пожаловать</h1> 
                    
                    @if( auth()->check() )
                      <h3 class="" >{{ auth()->user()->username }}</h3> 
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
          </div>  


          <section>
            <div class="mt-5 container">
              <h2 class="text-center">WELCOME</h2>

              <div class="mt-5 row">

                <div class="container card shadow p-3 mb-5 bg-white rounded col-lg-3 col-md-4 col-sm-2" >
                  <img src="https://wallpapers.com/images/high/dark-theme-background-kllx9wmu61h84fkl.webp" width="100%" > 
                  <div class="card-body">
                    <h5 class="card-title">Abraham Chileshe</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>

               <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>

                <div class="container card shadow p-3 mb-5 bg-white rounded col-lg-3 col-md-4 col-sm-2" >
                  <img src="https://wallpapers.com/images/high/dark-theme-background-kllx9wmu61h84fkl.webp" width="100%" > 
                  <div class="card-body">
                    <h5 class="card-title">Abraham Chileshe</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>

                <div class="container card shadow p-3 mb-5 bg-white rounded col-lg-3 col-md-4 col-sm-2" >
                  <img src="https://wallpapers.com/images/high/dark-theme-background-kllx9wmu61h84fkl.webp" width="100%" > 
                  <div class="card-body">
                    <h5 class="card-title">Abraham Chileshe</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>


              </div>

              <div class="mt-5 row">

                <div class="shadow p-3 mb-5 bg-white rounded col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="container"></div>
                    <h2 class="text-center">Registration</h2>  
                      <form class="mt-5 container">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          submit
                        </button>
                      </form>
                    <div>
                  </div>
                </div>

                <div class="scrollable-block shadow p-3 mb-5 bg-white rounded col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <img src="https://wallpapers.com/images/high/dark-theme-background-kllx9wmu61h84fkl.webp" width="100%" > 
                  <p class="mt-4">Wikipedia[note 3] is a free-content online encyclopedia written and maintained by a community of volunteers, collectively known as Wikipedians, through open collaboration and using a wiki-based editing system called MediaWiki. Wikipedia is the largest and most-read reference work in history.[3][4] It has consistently been one of the 10 most popular websites in the world, and, as of 2023, ranks as the 4th most viewed website by Semrush.[5][6] Founded by Jimmy Wales and Larry Sanger on January 15, 2001, it is hosted by the Wikimedia Foundation, an American nonprofit organization.Initially only available in English, editions in other languages were quickly developed. Wikipedia's editions when combined, comprise more than 62 million articles, attracting around 2 billi</p>
                  <p>Wikipedia[note 3] is a free-content online encyclopedia written and maintained by a community of volunteers, collectively known as Wikipedians, through open collaboration and using a wiki-based editing system called MediaWiki. Wikipedia is the largest and most-read reference work in history.[3][4] It has consistently been one of the 10 most popular websites in the world, and, as of 2023, ranks as the 4th most viewed website by Semrush.[5][6] Founded by Jimmy Wales and Larry Sanger on January 15, 2001, it is hosted by the Wikimedia Foundation, an American nonprofit organization.Initially only available in English, editions in other languages were quickly developed. Wikipedia's editions when combined, comprise more than 62 million articles, attracting around 2 billi</p>
                </div>
              </div>


            
            </div>
          </section>
        

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <a href="{{ url('logout-user')}}"  class="btn btn-primary">Да</a>
      </div>
    </div>
  </div>
</div>
        

        <!-- Bootstrap -->
          <footer class="text-center text-lg-start">
            <div class="container d-flex justify-content-center py-5">
              <button type="button" class="btn btn-dark btn-lg btn-floating mx-2">
                <i class="fa fa-camera"></i>
              </button>
              <button type="button" class="btn btn-dark btn-lg btn-floating mx-2">
                <i class="fa fa-phone"></i>
              </button>
              <button type="button" class="btn btn-dark btn-lg btn-floating mx-2">
                <i class="fa fa-envelope"></i>
              </button>
            </div>

            <!-- Copyright -->
            <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              <span>© 2023 Abraham Chileshe</span>
            </div>
          </footer>
        
        <!-- // Bootstrap -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>  
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>  
  </body>
</html>