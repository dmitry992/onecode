<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
class PostController extends Controller
{
    public function index()
    {
        return 'Страница списка постов';
    }

    public function create()
    {
        return 'Страница создания поста';
    }
    public function store()
    {
        return 'Запрос создания поста';
    }
    public function show($post)
    {
        return "Страница просмотра поста $post";
    }
    public function edit($post)
    {
        return 'Страница изменения поста ' . $post;
    }
}
