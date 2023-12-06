<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" ></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/login_style.css') }}" type="text/css" media="all" />
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</head>

<body>
    <div class="signinform">

        <!-- container -->
        <div class="container">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h2>вход в систему </h2>
                    @if($errors->any())
                        <script>
                             $(document).ready(function (){
                            $('#myModal').modal('show');
                        });
                        </script>
                    @endif
                    <form action="{{ url('login-user') }}" method="post">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="email" placeholder="Имя пользователя или почты" name="email" required="">
                        </div>
                        <div class="input-group">
                            <span><i class="fas fa-key" aria-hidden="true"></i></span>
                            <input type="Password"  id="myInput" placeholder="пароль" name="password" required="">
                        </div>
                        <div class="form-row bottom">
                            <div class="form-check">
                                <input type="checkbox" onclick="myFunction()">
                                <label> показать пароль</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">вход</button><br/>
                        <center><a class="mt-2" href="{{ url('/')}}">зарегистрировать</a></center>
                    </form>
                

                    
                </div>
            </div>
            <!-- //main content -->
        </div>
        <!-- //container -->
        
    </div>


    
        <!-- Modal HTML -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div style="background-color:Red" class="modal-header justify-content-center">
                        <div class="icon-box">
                            <i class="material-icons">&#xE876;</i>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>ошибка входа</h4>	
                        
                        <p>либо ваш адрес электронной почты, либо пароль неверны</p>
                        
                    </div>
                </div>
            </div>
        </div>  

    <!-- fontawesome v5-->
    <script src="js/fontawesome.js"></script>

</body>

</html>