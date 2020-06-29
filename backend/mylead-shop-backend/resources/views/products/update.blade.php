<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Edit product!
                </div>
                <div class="wrapper create-product">
                    <h1>Please provide the details to be updated</h1>
                    <form action="/products/update/{{ $product->id }}" method="POST">
                        {{ method_field('PUT') }}
                        @csrf
                        <label for="type">Type of product: </label>
                        <input type="text" name="type" id="type" value='{{ $product->type }}'>
                        <label for="name">Name of product: </label>
                        <input type="text" name="name" id="name" value='{{ $product->name }}'>
                        <label for="price">Price of product</label>
                        <input type="number" name="price" id="price" value='{{ $product->price }}'>
                        <label for="description">Description of the product</label>
                        <input type="text" name="description" id="description" value='{{ $product->description }}'>
                        <input type="submit" value="Update">
                    </form>
                </div>
                <a href="/products">Back to list of products!</a>
            </div>  
        </div> 