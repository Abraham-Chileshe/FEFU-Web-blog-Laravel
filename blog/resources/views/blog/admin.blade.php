@extends('blog.inc.layout')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" ></script>

@php
    $answers = DB::table('survey')
    ->select('survey.*')
    ->orderBy('survey.id', 'desc')
    ->get();
@endphp


{{-- This sets the language of the page--}}
@if( auth()->check() )
    @php
    $lang =  auth()->user()->lang 
    @endphp

@else
    @php 
        $lang = "en"
    @endphp

@endif
{{-- This sets the language of the page--}}

@if( auth()->check() )
    @php
        $admin = DB::table('admins')
        ->select('admins.*')
        ->where('user_id', auth()->user()->id)
        ->first();
    @endphp
@endif


@section('content')

    <!-- Header -->
    @include('blog/inc/navbar');
    <!-- Header -->


    <!-- Main Content -->
    <div class="container mt-4">
        <h1><localized-text key="adminpanel" lang="@php echo $lang @endphp"></localized-text></h1>
        <div class="row">

            <div class="col-lg-3">
                {{-- New Users Accordion--}}
                <div class="mt-3 " id="accordion_users">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <localized-text key="new_users" lang="@php echo $lang @endphp"></localized-text> <span class="sr-only">(current)</span>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_users">
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
                                        <a href=""><i class="fa fa-user-circle mr-2" ></i> {{ $user_all->username  }} </a>
                                        <a href="{{url('delete-user')}}?userid={{$user_all->id}}" class="btn float-right delete-btn" style="min-width:20px; height: 40px"><i class="mr-1 fa fa-trash"></i></a>
                                        <a href="{{url('add-admin')}}?userid={{$user_all->id}}" class="btn float-right delete-btn" style="min-width:20px; height: 40px"><i style="color:green" class="mr-1 fa fa-user-plus"></i></a>
                                     
                                        
                                       
                                        <hr />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {{-- New Users Accordion--}}
            </div>
            <!-- Scrollable Block -->
            <div class="col-md-8">

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">age</th>
                        <th scope="col">country</th>
                        <th scope="col">rating</th>
                        <th scope="col">visits</th>
                        <th scope="col">news</th>
                        <th scope="col">posts</th>
                        <th scope="col">design</th>
                        <th scope="col">comments</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($answers as $answer)
                      <tr>
                        <th scope="row"></th>
                        <td>{{ $answer->name}}</td>
                        <td>{{ $answer->age}}</td>
                        <td> {{ $answer->country}}</td>
                        <td> {{ $answer->rating}}</td>
                        <td> {{ $answer->visits}}</td>
                        <td>
                            @if ( $answer->news == 0)
                            <i style="color:rgb(179, 13, 13)" class="mr-1 fa fa-close"></i>
                            @else
                            <i style="color:rgb(16, 189, 53)" class="mr-1 fa fa-check"></i>
                            @endif

                        </td>
                        <td>
                            @if ( $answer->posts == 0)
                            <i style="color:rgb(179, 13, 13)" class="mr-1 fa fa-close"></i>
                            @else
                            <i style="color:rgb(16, 189, 53)" class="mr-1 fa fa-check"></i>
                            @endif

                        </td>

                        <td>
                            @if ( $answer->news == 0)
                            <i style="color:rgb(179, 13, 13)" class="mr-1 fa fa-close"></i>
                            @else
                            <i style="color:rgb(16, 189, 53)" class="mr-1 fa fa-check"></i>
                            @endif
                        </td>

                        <td>{{ $answer->comments}}</td>
                      </tr>

                     
                    @endforeach
                      
                    </tbody>
                  </table>
            </div>
                
            </div>
            <!-- Scrollable Block -->

            
            <!-- Right Column -->
            <div class="col-md-4">
             
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



     @include('blog/js_inc/scripts')
  

     

</div>
</div>
</div>

