<?php

declare(strict_types=1);

use App\Router\Router;

$router->get('/', function(){
  return view('home');
});

$router->get('/about', function(){
  return view('about');
});

$router->get('/skills', function(){
  return view('skills');
});

$router->get('/projects', function(){
  return view('projects');
});

$router->get('/experience', function(){
  return view('experience');
});

$router->get('/services', function(){
  return view('services');
});

$router->get('/contact', function(){
  return view('contact');
});

$router->post('/contact', function(){
 require('404.php');
});
