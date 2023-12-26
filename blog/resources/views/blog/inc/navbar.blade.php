<!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{ url('/')}}"> <localized-text key="blog" lang="@php echo $lang @endphp"></localized-text> <span class="sr-only">(current)</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/')}}">  
                        <localized-text key="home" lang="@php echo $lang @endphp"></localized-text> <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

                @if( auth()->check() )
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <localized-text key="language" lang="@php echo $lang @endphp"></localized-text> <span class="sr-only">(current)</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{ url('lang-update') }}" class="dropdown-item"><localized-text key="russian" lang="@php echo $lang @endphp"></localized-text> <span class="sr-only">(current)</span>
                        </a>
                        <a href="{{ url('lang-update') }}" class="dropdown-item"><localized-text key="english" lang="@php echo $lang @endphp"></localized-text> <span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
              

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('logout') }}" tabindex="-1" aria-disabled="true">
                        <localized-text key="logout" lang="@php echo $lang @endphp"></localized-text> <span class="sr-only">(current)</span>
                    </a>
                </li>
                @endif
            </ul>

            @if( auth()->check() )
                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true" style="text-transform:uppercase"><i class="fa fa-user mr-2" ></i> {{ auth()->user()->username }}</a>
            @else
            
            <form action="{{ url('login') }}" method="post" class="form-inline my-2 my-lg-0">
                {{ csrf_field() }}
                <input class="form-control mr-sm-2" type="email" name="email" placeholder="email" aria-label="Search" required>
                <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password" aria-label="Search" required>
                <button class="btn my-2 my-sm-0" type="submit">Login</button>
            </form>
            @endif
           
        </div>
    </nav>
    <!-- Header -->