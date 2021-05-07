@extends('layouts.admin')
@section('content')
<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Inventory</h4>
            <a href="{{ route('dashboard.add') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Add Item</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    <tbody>
                       @if ($products->count() > 0)
                            @foreach ($products as $product)
                            <tr class="align-items-center" id = 'row-{{$product->id}}'>
                                <td scope="col">{{$product->id}}</td>
                                <td scope="col"><img src="/images/product-main.png" alt="image" height="60" width="60"></td>
                                <td scope="col">{{$product->product_title}}</td>
                                <td scope="col">${{$product->product_price}}</td>
                                <td scope="col"><a href="/product/edit/{{$product->id}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <form class="d-inline mx-2" action="{{ route('dashboard.destroy' , $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button data-id="{{$product->id}}" type ="submit" class="btn btn-sm btn-danger deleteBtn"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                       @endif
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection