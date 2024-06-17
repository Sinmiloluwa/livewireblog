<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Homepage::class);
Route::get('/post/{slug}', \App\Livewire\PageView::class);
Route::get('/category/{category}', \App\Livewire\CategoryPost::class);
