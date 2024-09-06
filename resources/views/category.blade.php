<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h1>Ini adalah Halaman untuk Menampilkan Daftar Product</h1>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
            }
            .category-list {
                list-style-type: none;
                padding: 0;
            }
            .category-list li {
                margin-bottom: 10px;
            }
            .category-list a {
                text-decoration: none;
                color: #007BFF;
                font-size: 18px;
            }
            .category-list a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Product Categories</h1>
            <ul class="category-list">
                <li><a href="{{ route('category.food-beverage') }}">Food & Beverage</a></li>
                <li><a href="{{ route('category.home-care') }}">Home Care</a></li>
                <li><a href="{{ route('category.beauty-health') }}">Beauty & Health</a></li>
                <li><a href="{{ route('category.baby-kid') }}">Baby & Kid</a></li>
            </ul>
            <a href="{{ route('home') }}">Back to Home</a>
        </div>
    </body>
</html>