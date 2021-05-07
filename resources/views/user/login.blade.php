@extends('layouts.app')
@section('content')
    @guest
    <div class="container my-4">
        <h3 class="my-3">My Account</h3>
        <div class="row">
            <div class="col-12 col-md-4">
                @if (session('status'))
                    <div class="alert alert-danger">
                       {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('user.attemptlogin') }}" method="post">
                    @csrf
                   <div class="form-group">
                        <input type="email" class="form-control" name="user_email" placeholder="Email" required>
                   </div>
                   <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                   </div>
                    <input type="submit" class="btn text-white" style="background-color: orange;" value="Login">
                    <small class="d-block my-1">Don't have an account ? <a href="/register">Regsiter from here</a></small>
                </form>
            </div>
        </div>
    </div>
    @endguest
    @auth
        <div class="container my-4">
            <form action="{{ route('user.logout') }}" method="post">
                @csrf
                <input type="submit" value="Logout" class="btn btn-danger btn-lg">
            </form>
        </div>
        <div class="container">
            <h3 class="mb-3">Your cart <span id="cart-counter">( {{$cart_items->count()}} items)</span></h3>
            @if (count($cart_products) <= 0)   
                <p>There are no items in your cart </p> 
            @else
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                    </tr>
                    <tbody>
                        <?php $i = 0; $Total = 0; ?>
                        @foreach ($cart_products as $cart_product)
                        <tr class="align-items-center" id = 'row-{{$cart_items[$i]->id}}'>
                            <td scope="col"><img src="/images/product-main.png" alt="image" height="60" width="60"></td>
                            <td scope="col">{{$cart_product->product_title}}</td>
                            <td scope="col">${{$cart_product->product_price}}</td>
                            <td scope="col">
                                <form class="d-inline mx-2" action="{{ route('user.removeCartItem' , $cart_items[$i]->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button data-id="{{$cart_items[$i]->id}}" type ="submit" class="btn btn-sm btn-danger cart-item-delete-btn"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php $i= $i + 1; $Total = $Total + (float)$cart_product->product_price;?>
                         @endforeach
                         <tr scope ="col">
                             <th>Total</th>
                             <td></td>
                             <td></td>
                             <td style="font-weight: bolder;">$ <span id="total"><?php echo $Total;?></span></td>
                         </tr>
                    </tbody>
                </thead>
            </table>
            @endif
        </div>
    @endauth
@endsection