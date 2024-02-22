<?php

$config=require("config.php");
$db = new Database($config['database']);


$note=$db->query('select * from notes where user_id= :id',[':id'=>$_GET['id']])->findOrFail();


$currentUserId=1;
autorize($note['user_id']!==$currentUserId);

$heading = 'Note';

require "views/note.view.php";