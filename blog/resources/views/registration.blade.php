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
                    <h2>зарегистрировать</h2>
                    <form action="{{ url('add-user') }}" id="subm"  method="post">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="text" placeholder="Имя пользователя" name="username" required="">
                        </div>

                        <div class="input-group">
                            <span><i class="fas fa-envelope" aria-hidden="true"></i></span>
                            <input type="email" placeholder="почты" name="email" required="">
                        </div>

                        <div class="input-group">
                            <span><i class="fas fa-key" aria-hidden="true"></i></span>
                            <select name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            
                            </select>
                        </div>

                        <div class="input-group">
                            <span><i class="fas fa-calendar" aria-hidden="true"></i></span>
                            <input type="date" required="" name="dob">
                        </div>

                        <div class="input-group">
                            <span><i class="fas fa-key" aria-hidden="true"></i></span>
                            <input type="Password"  id="myInput" placeholder="пароль" name="password" required="">
                        </div>
                        <br/>

                        <div class="form-row bottom">
                            <div class="form-check">
                                <input type="checkbox" onclick="myFunction()">
                                <label> показать пароль</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">вход</button><br/>
                        <center><a class="mt-2" href="{{ url('login')}}">у вас уже ест? Войдите здесь</a></center>
                    </form>
                    
                </div>
            </div>
            <!-- //main content -->
        </div>
        <!-- //container -->


        <!-- Modal HTML -->
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
        
    </div>

    
    <script>

        $('#submitform').submit(function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "{{ url('add-user') }}",
            data: $(this).serialize(),
            success: function (data) {

                $(document).ready(function (){
                    $('#myModal').modal('show');
                });

            }
            });
        });
    
        </script>


    <!-- fontawesome v5-->
    <script src="js/fontawesome.js"></script>

</body>

</html>