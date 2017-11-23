<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= CONFIG['site_title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/<?= CONFIG['site_path']; ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/<?= CONFIG['site_path']; ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="/<?= CONFIG['site_path']; ?>/assets/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/<?= CONFIG['site_path']; ?>">MORDOR</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <?php
                \uFrame\Menu::show();
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('/<?= CONFIG['site_path']; ?>/assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?= CONFIG['site_title']; ?></h1>
                    <span class="subheading">BLOG</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">

    <?php

        echo '
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <a href="">
                    <h2 class="post-title">
                       ' . $data['singlePost']['title'] . '
                    </h2>
                    <h3 class="post-subtitle">
                       ' . $data['singlePost']['body'] . '
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">Start Bootstrap</a>
                    on July 8, 2017</p>
            </div>
            <hr>
        </div>
    </div>';

    ?>
</div>
<div class="container">
    <div class="row pt-5">
        <?php
        foreach ($data['banner'] as $data) {
            echo '<div class="col">
                    <div class="card">
          <img class="card-img-top" src="' . $data['image'] . '" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">  ' . $data['name'] . ' </h4>

            <a href="' . $data['link'] . '"  target="_blank" class="btn btn-primary">Visit us</a>
          </div>
        </div>
        </div>
            ';

        }
        ?>
    </div>
</div>


<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2017</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/<?= CONFIG['site_path']; ?>/assets/jquery/jquery.min.js"></script>
<script src="/<?= CONFIG['site_path']; ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="/<?= CONFIG['site_path']; ?>/assets/js/clean-blog.min.js"></script>

</body>

</html>



<!--<!doctype html>
<html lang="en">
<head>
    <title><?/*= 'BLOG || '. CONFIG['site_title']; */?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/<?/*= CONFIG['site_path']; */?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?/*= CONFIG['site_path']; */?>/assets/css/style.css">
</head>
<body>
<div class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="display-3"><?/*= CONFIG['site_title']; */?></h1>
                <p class="lead">A good place to start with PHP MVC</p><br/>
                <a class="btn btn-sm btn-outline-light" href="/<?/*= CONFIG['site_path']; */?>">Home</a>
                <a class="btn btn-sm btn-outline-light" href="/<?/*= CONFIG['site_path']; */?>/Home/hello">Hello world</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col content">
            <h2><?/*= $data['singlePost']['title']; */?></h2>
            <hr>
            <?/*= $data['singlePost']['body']; */?>
        </div>
    </div>
</div>
<script src="/<?/*= CONFIG['site_path']; */?>/assets/js/script.js"></script>
</body>
</html>-->