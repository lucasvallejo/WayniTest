<?php
    session_start();
    require_once(base_path('resources/views/src/Google_Client.php'));
    require_once(base_path('resources/views/functions.php'));
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wayni Test</title>

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

            header{
                width: 97.9%;
                background-color: #e4e4e4;
                padding: 15px;
            }

            
            a:link,a:visited,a:hover,a:active {
              color: #808080;
              font-size: 24px;
            }

           

            .content {
                text-align: left;
                padding: 50px;
            }

            #head{
                text-transform: capitalize;
                background-color:#444444;
                color:#fff;
                padding: 5px;
            }

        </style>
    </head>
    <body>
        
<header><?php login(); ?></header>

            <div class="content">
              

<?php contacts(); ?>




                
            </div>
        
    </body>
</html>
