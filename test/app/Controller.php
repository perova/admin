<?php
function __autoload($className){
    include_once("models/$className.php");
}

$users=new User("your_host","your_user","your_password","your_database");

if(!isset($_POST['action'])) {
    print json_encode(0);
    return;
}

switch($_POST['action']) {
}

exit();