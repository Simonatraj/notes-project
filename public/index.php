<?php

const BASE_PATH = __DIR__.'/../';

require BASE_PATH.'functions.php';

spl_autoload_register(function ($class) {
    require base_path("core/" . $class . '.php');
});

require base_path('router.php');






// $id=$_GET['id'];
// $query="select * from notes where id=?";
// $posts = $db->query($query,[$id])->fetch();


