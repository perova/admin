<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
        
 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <table class="table table-striped">
      <thead>
        <tr>

          <th>GIMIMO_METAI</th>
          <th>GIMIMO_VALSTYBE</th>
          <th>LYTIS</th>
          <th>SEIMOS_PADETIS</th>
          <th>KIEK_TURI_VAIKU</th>
          <th>SENIUNIJA</th>
          <th>GATVE</th>
          <th>SENIUNNR</th>
          <th>TER_REJ_KODAS</th>
          <th>GATV_K</th>
          <th>GAT_ID</th>
          <th>#</th>
          
      </tr>
  </thead>
  <tbody>
     <?php
        

 

    
    foreach ($data['paginate'] as $post) {
         echo ' <tr>

      <td>'.  $post['GIMIMO_METAI'] . '</td>
      <td>' .$post['GIMIMO_VALSTYBE'] .'</td>
       <td>' .$post['LYTIS'] .'</td>
     <td>' .$post['SEIMOS_PADETIS'] .'</td>
     <td>' .$post['KIEK_TURI_VAIKU'] .'</td>
       <td>' .$post['SENIUNIJA'] .'</td>
      <td>' .$post['GATVE'] .'</td>
     <td>' .$post['SENIUNNR'] .'</td>
       <td>' .$post['TER_REJ_KODAS'] .'</td>
       <td>' .$post['GATV_K'] .'</td>
       <td>' .$post['GAT_ID'] .'</td>
       <td> delete </td>
      

  </tr>';}
?>
</tbody>
</table>
<?php 
    // do not paginate when searching
    if (!isset($_GET['query'])) {
        $postsPerPage = 20;
        echo '<div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">';

        for ($i = 0; $i <= ceil(sizeof($data['postList']) / $postsPerPage) - 1; $i++) {
            echo '
        
        <a class="btn btn-outline-primary" href="' . "/" . CONFIG['site_path'] . "/Blog/list?page=" . ($i + 1) . '">' . ($i + 1) . '</a>
       
        ';

        }

      }
       if (isset($data['message'])) {
        echo '<div class="row pt-5 text-center">
<div class="col">
<div class="alert alert-danger"> ' . $data['message'] . '</div>
</div>
</div>';}
  ?>
  

</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>