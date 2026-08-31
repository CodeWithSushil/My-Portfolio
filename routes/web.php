<?php

declare(strict_types=1);

$router->get('/', function () {
    return view('home');
});

$router->get('/home', function(){
    return view('home');
});

$router->get('/about', function () {
    return view('pages/about');
});

$router->get('/skills', function () {
    return view('pages/skills');
});

$router->get('/projects', function () {
    return view('pages/projects');
});

$router->get('/experience', function () {
    return view('pages/experience');
});

$router->get('/services', function () {
    return view('pages/services');
});

$router->get('/contact', function () {
    return view('pages/contact');
});

$router->post('/contact', function () {
    require '404.php';
});
