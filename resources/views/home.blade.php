<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
?>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h1>Selamat Datang di POS Syava</h1>
        <p>Syava Aprilia Puspitasari_2241760129</p>

        <h2>Profile User</h2>
        <a href="{{ route('user.profile', ['id' => 24, 'name' => 'Syava Aprilia P']) }}">Halaman Profil</a><br>

        <h2>Daftar Kategori Produk</h2>

        <a href="{{ route('category.food-beverage') }}">Food & Beverage</a><br>
        <a href="{{ route('category.beauty-health') }}">Beauty & Health</a><br>
        <a href="{{ route('category.home-care') }}">Home Care</a><br>
        <a href="{{ route('category.baby-kid') }}">Baby & Kid</a><br>

        <h2>Transaksi POS</h2>
        <a href="{{ route('sales.index') }}">Halaman POS</a><br>


    </body>
</html>