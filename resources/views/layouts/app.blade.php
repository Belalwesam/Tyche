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
    <div class="top-info">
        <div class="container d-flex justify-content-between align-items-center flex-column flex-md-row justify-content-start">
            <div class="mail">
                <p><span><i class="fas fa-envelope"></i></span> tyche@gmail.com</p>
            </div>
            <div class="top-creds">
                 <div class="top-creds-inner">
                     <form action="#" method="POST">
                         @csrf
                         <div class="form-group m-0" style="position: relative;">
                             <input type="text" placeholder="Search">
                             <button type="submit"><i class="fas fa-search"></i></button>
                         </div>
                     </form>
                     <div class="account-item">
                         <a href="{{route('user.login')}}" class="account-link"><i class="fas fa-user"></i>@auth
                             {{auth()->user()->user_name}}
                         @endauth
                        @guest
                            Account
                        @endguest
                        </a>
                     </div>
                     <div class="top-cart">
                         <a href="{{ route('user.login') }}">
                            <i class="fas fa-shopping-cart"></i> My Cart <span id ="number_of_items">
                              
                            </span>
                         </a>
                     </div>
                 </div>
            </div>
        </div>
    </div>
    {{--Start of the nav and logo--}}
    <div class="top-nav">
        <div class="container">
            <div class="logo">
                <a href="/"><img src="/images/logo.webp" alt="Logo" class="img-fluid"></a>
            </div>
            <div class="top-nav-links">
                <ul class="list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li><a href="/shop">Shop</a></li>
                </ul>
            </div>
        </div>
    </div>
    {{--End of the nav and logo--}} 
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/script/script.js"></script>
</body>
</html>