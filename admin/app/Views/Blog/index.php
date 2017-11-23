<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
     <div class="articles">
                            <div class="article">
                                <?php
                                foreach ($data['postList'] as $post) {

                                    echo'
                                    <div class="blog-date triangle triangle--big wow slideInLeft" data-wow-delay="0.7s" data-wow-duration="1.5s">



                                    <div class="blog-date__num">
                                    Date
                                    </div>
                                    <div class="blog-date__month-year">'
                                    .  $post['date'] . 
                                    '</div>
                                    <div class="blog-date__month-year">

                                    </div>
                                    </div>
                                    <div class="article__img wow slideInLeft" data-wow-delay="0.7s" data-wow-duration="1.5s">
                                    <img src="media/blog/blog1.jpg" alt="blog" class="img-responsive" />
                                    </div>
                                    <div class="article__comments-author wow slideInUp" data-wow-delay="0.7s" data-wow-duration="1.5s">

                                    </div>
                                    <h3 class="article-title wow slideInUp" data-wow-delay="0.7s" data-wow-duration="1.5s">' . $post['title'] . '</h3>
                                    <p class="blog-text blog-text--article wow slideInUp" data-wow-delay="0.7s" data-wow-duration="1.5s">' .
                                    $post['body'] .
                                    '</p>


                                    <a href="/' . CONFIG['site_path'] . "/Blog/show/" . $post['id'] . '" class="btn button button--main button--grey transparent wow slideInLeft" data-wow-delay="0.7s" data-wow-duration="1.5s">Read More</a>
                                    <span class="line line--title line--blog-title line--article wow slideInLeft" data-wow-delay="0.7s" data-wow-duration="1.5s"><span class="line__first"></span><span class="line__second"></span></span>';
                                }
                                ?>
                            </div>


</body>
</html>