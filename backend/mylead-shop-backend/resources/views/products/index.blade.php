<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /* height: 100%; */
                margin: 0;
            }

            .full-height {
                height: 100%;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-top: 30px;
                margin-bottom: 30px;
            }

            .btn {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    Products Available
                </div>

                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q"
                            placeholder="Search product"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-secondary btn-lg active">Search</button>
                        </span>
                    </div>
                </form>

                <p class="msgSearch">{{ session('msgSearch') }}</p>
                
                <div class="container">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-sm-12 col-md-3">
                            <!-- <p><a href="/products/{{ $product->id }} "> {{$product -> name}} </a>-  {{$product -> description}} - {{$product -> price}}</p> -->
                            <div class="card bg-light mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product -> name}}</h5>
                                    <p class="card-text">{{$product -> description}}</p>
                                    <a href="/products/{{ $product->id }} " class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <a href="/" class="btn btn-secondary btn-lg active">Back to main page!</a>
        </div>
    </body>
</html>
