<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ff4d152faa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/sass/style.css">
    <title>Tyche</title>
</head>
<body>
    <div class="dashboard">
        <div class="side-nav">
             <a href="#"><h4 class="text-white text-center"> <i class="fas fa-home"></i> Dashboard</h4></a>
             <ul class="list-unstyled">
                 <li>
                     <a href="#"><i class="fas fa-shopping-cart mr-1"></i> Orders</a>
                 </li>
                 <li>
                     <a href="#"><i class="fas fa-layer-group mr-1"></i> Categories</a>
                 </li>
                 <li>
                     <a href="/dashboard"><i class="fas fa-truck-moving mr-1"></i> Inventory</a>
                 </li>
             </ul>
        </div>
        <div class="inventory">
            @yield('content')
        </div>
     </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/script/script.js"></script>
</body>
</html>