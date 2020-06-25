<?php

$request = $_SERVER['REQUEST_URI'];

 switch ($request) {
     case '/' :
         require __DIR__ . '/templates/home.view.php';
         break;
     case '' :
         require __DIR__ . '/templates/home.view.php';
         break;
     case '/detail/' :
         require __DIR__ . '/templates/detail.view.php';
         break;
     case '/create' :
         require __DIR__ . '/templates/create.view.php';
         break;
     case '/edit' :
         require __DIR__ . '/templates/edit.view.php';
         break;
//     case '/delete' :
//         require __DIR__ . '/templates/delete.view.php';
//         break;
     default:
         http_response_code(404);
         require __DIR__ . '/templates/404.php';
         break;
 }
