<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Item list</title>

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

            .title {
                font-size: 84px;
                margin: 0px;
            }

            .items {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .information {
                margin-bottom: 50px;
            }

            .items > a{
                color: #3b3c3d;
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
        <div class = "items">
            <div class="title m-b-md">
                {{$item->name}}
             </div>


            <div class = "information">
                <h3>
                    {{$item->information}}
                </h3>
            </div>


            <h4>
                Price: {{$item->price}}$
            </h4>

            <a href="/laravel_learning/public/">[Return]</a>
        </div>

 
      
    </body>
</html>
