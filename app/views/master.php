<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ShortnR - Short URLs made simple.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link href="/css/bootstrap-responsive.min.css" rel="sylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="/">ShortnR</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">

    <?php
        require_once 'pages/' . $requestedPage . '.php';
    ?>

</div> <!-- /container -->

<script src="js/bootstrap.min.js"></script>

</body>
</html>
