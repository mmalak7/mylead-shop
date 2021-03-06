<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
                margin-bottom: 30px;
            }

            .btn {
                margin-top: 10px;
                margin-bottom: 10px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Add new product!
                </div>
                <div class="wrapper create-product">
                    <h1>Pleaser provide the details of the product</h1>
                    <form action="/products" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="type">Type of product: </label>
                            <input class="form-control" type="text" name="type" id="type">
                        </div>
                        <div class="form-group">
                            <label for="name">Name of product: </label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="price">Price of product</label>
                            <input class="form-control" type="number" name="price" id="price">
                        </div>
                        <div class="form-group">
                            <label for="description">Description of the product</label>
                            <input class="form-control" type="text" name="description" id="description">
                        </div>
                        <div class="form-group">
                            <label for="image">Input photo</label>
                            <input name="image" type="file" class="form-control-file">
                        </div>
                        <input type="submit" value="add product" class="btn btn-success btn-lg active">
                    </form>
                </div>
                <a href="/" class="btn btn-secondary btn-lg active">Back to main page!</a>
        </div> 
    <body>
</html>