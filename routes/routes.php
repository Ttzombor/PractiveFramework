<?php

use App\Http\Router;

Router::get('/', 'view');

Router::get('/post', 'post', [\App\Controllers\PostController::class, 'get'], [\App\Http\Middleware\Auth::class]);
Router::post('/posts', 'post', [\App\Controllers\PostController::class, 'get'], [\App\Http\Middleware\Auth::class]);

Router::get('/user', 'user', [\App\Controllers\DashboardController::class, 'get'], [\App\Http\Middleware\Auth::class]);
Router::get(
    '/user/create',
    'user',
    [\App\Controllers\UserController::class, 'post'],
    [\App\Http\Middleware\Auth::class, \App\Http\Middleware\UserGroup::class => 'admin']
);
Router::get('/user/login', 'user', [\App\Controllers\AuthController::class, 'login']);

Router::get('/register', 'registration');
Router::get('/login', 'login');
Router::get('/logout', '', [\App\Controllers\AuthController::class, 'logout']);
