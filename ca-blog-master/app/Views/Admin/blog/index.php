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
    <link href="/<?= CONFIG['site_path']; ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="/<?= CONFIG['site_path']; ?>/assets/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/<?= CONFIG['site_path']; ?>">MORDOR</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <?php
                \uFrame\Menu::show_admin_manu();
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
                    <span class="subheading">Admin panel</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->

<?php
if (isset($data['message'])) {
    echo '<div class="row pt-5 text-center">
<div class="col">
<div class="alert alert-danger"> ' . $data['message'] . '</div>
</div>
</div>';

}
?>


<div class="container">
    <div class="row text-center">
        <div class="col margin-tb">
            <div class="pull-left">
                <h2>BLOG CONTROL</h2>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($data['paginate'] as $post) {
                    echo '
        <tr> <td>' . $post['id'] . '</td> <td>' . $post['title'] . '</td><td>' . $post['body'] . '</td>
        <td>
        <!-- Button UPDATE trigger modal -->
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update_blog">
    Edit
</button>
<!-- UPDATE Modal -->
<div class="modal fade" id="update_blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form action="/' . CONFIG['site_path'] . '/blog/update" method="post">
            <div class="modal-header">
              <span aria-hidden="true"> Title</span>
                <h5 class="modal-title" id="exampleModalLabel"><input name="title" type="text" value ="' . $post['title'] . '"></h5>
                
            </div>
           
            <div class="modal-body">
            <span aria-hidden="true">Body</span>
             <textarea name="body"  class="form-control">' . $post['body'] . ' </textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="update" value="' . $post['id'] . '" class="btn btn-primary">Update</button>
           </form>
            </div>
        </div>
    </div>
</div>
           <!-- Button delete trigger modal -->
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_blog">
    Delete
</button>
<!-- DELETE Modal -->
<div class="modal fade" id="delete_blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">' . $post['title'] . '</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               Do you really want to delete this post  ? 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/' . CONFIG['site_path'] . '/blog/delete/' . $post['id'] . '" class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>
        </td> </tr>
            
                
               
    ';

                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php

$postsPerPage = 5;
echo '<div class="row text-center">
        <div class="col-lg-8 col-md-10 mx-auto">';

for ($i = 0; $i <= ceil(sizeof($data['postList']) / $postsPerPage) - 1; $i++) {
    echo '
        
        <a class="btn btn-outline-primary" href="' . "/" . CONFIG['site_path'] . "/Admin/blog?page=" . ($i + 1) . '">' . ($i + 1) . '</a>
       
        ';

}

?>

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