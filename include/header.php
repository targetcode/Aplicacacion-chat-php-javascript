<?php
if(!isset($_SESSION)) session_start();

$url = 'http://localhost/chat/';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Material Icon CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url; ?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/main.css">
    <title>Chat aplication</title>
</head>