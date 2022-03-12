<?php

use Diglactic\Breadcrumbs\Breadcrumbs;


Breadcrumbs::for('dashboard', function ($trail){
    $trail->push('Dashboard',route('dashboard'));
});

Breadcrumbs::for('kph', function ($trail){
    $trail->parent('dashboard');
    $trail->push('KPH', route('kph'));
});

Breadcrumbs::for('kph.create', function ($trail){
    $trail->parent('kph');
    $trail->push('Tambah Data KPH', route('kph.create'));
});

Breadcrumbs::for('kph.show', function ($trail, $kph){
    $trail->parent('kph');
    $trail->push($kph->name, route('kph.show', $kph));
});

Breadcrumbs::for('kph.edit', function ($trail, $kph){
    $trail->parent('kph');
    $trail->push('Edit Data KPH' , route('kph.edit' , $kph));
});

Breadcrumbs::for('category', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Categories' , route('category'));
});

Breadcrumbs::for('user', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Users' , route('user'));
});

Breadcrumbs::for('user.create', function ($trail){
    $trail->parent('user');
    $trail->push('Tambah User' , route('users.create'));
});

Breadcrumbs::for('user.show', function ($trail, $user){
    $trail->parent('user');
    $trail->push($user->nama , route('users.show', $user));
});

Breadcrumbs::for('user.edit', function ($trail, $user){
    $trail->parent('user');
    $trail->push('Edit Data user' , route('users.edit', $user));
});

Breadcrumbs::for('user.nonaktif', function ($trail){
    $trail->parent('user');
    $trail->push('Nonaktif User', route('nonaktif'));
});

Breadcrumbs::for('assets', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Data Assets' , route('assets'));
});

Breadcrumbs::for('assets.create', function ($trail){
    $trail->parent('assets');
    $trail->push('Tambah Data Assets' , route('assets.create'));
});

Breadcrumbs::for('assets.show', function ($trail, $asset){
    $trail->parent('assets');
    $trail->push($asset->name , route('assets.show', $asset));
});

Breadcrumbs::for('assets.edit', function ($trail, $assets){
    $trail->parent('assets');
    $trail->push('Edit Data Aset', route('assets.edit', $assets));
});

Breadcrumbs::for('assets.trash', function ($trail){
    $trail->parent('assets');
    $trail->push('Trash', route('trash'));
});

Breadcrumbs::for('approve', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Approve', route('approve'));
});

Breadcrumbs::for('approve.show', function ($trail, $asset){
    $trail->parent('approve');
    $trail->push($asset->name, route('approve.show', $asset));
});