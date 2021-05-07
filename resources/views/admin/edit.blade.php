@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        @if (session('editStatus'))
          <div class="col-12 col-md-6 offset-md-3">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('editStatus') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
          </div>
        @endif
        <div class="col-12 col-md-6 offset-md-3">
          <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                 Edit item
                  <a href="{{ route('dashboard.index') }}" class="btn btn-sm btn-warning text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go back</a>
              </div>
              <div class="card-body">
                  <form action="{{ route('dashboard.update' , $product->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                          <label for="name">Product Title</label>
                          <input type="text" class="form-control" name="product_title" required value="{{$product->product_title}}">   
                      </div>
                      <div class="form-group">
                          <label for="desc">Product Description</label>
                          <input type="text" class="form-control" name="product_desc" required value="{{$product->product_desc}}">   
                      </div>
                      <div class="form-group">
                          <label for="Price">Product Price</label>
                          <input type="text" class="form-control" name="product_price" required value="{{$product->product_price}}">   
                      </div>
                      <div class="form-group">
                          <label for="image">Product Image</label>
                          <input type="file" name="product_image" class="form-control">
                      </div>
                      <div class="form-group">
                          <input type="submit" class="btn btn-sm btn-primary btn-block" value="Save changes">
                      </div>
                  </form>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection