<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php

                foreach ($data['paginate'] as $page) {
                    echo '
        <tr> <td>' . $page['id'] . '</td> <td>' . $page['username'] . '</td><td>' . $page['password'] . '</td><td>' . $page['level'] . '</td>
        <td>
        <a class="btn btn-primary" href="/' . CONFIG['site_path'] . '/admin/user"> Edit</a>
         <a class="btn btn-warning" href="/' . CONFIG['site_path'] . '/admin/user"> Show</a>
          <a class="btn btn-danger" href="/' . CONFIG['site_path'] . '/admin/user"> Delete</a>
        </td> </tr>
            
                
               
    ';

                }

                ?>
</body>
</html>