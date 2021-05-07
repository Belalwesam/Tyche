@extends('layouts.admin')
@section('content')
      <div class="container">
          <div class="row">
              @if (session('status'))
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                </div>
              @endif
              <div class="col-12 col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Add an item to Inventory
                        <a href="{{ route('dashboard.index') }}" class="btn btn-sm btn-warning text-white"><i class="fas fa-arrow-alt-circle-left"></i> Go back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Product Title</label>
                                <input type="text" class="form-control" name="product_title" required>   
                            </div>
                            <div class="form-group">
                                <label for="desc">Product Description</label>
                                <input type="text" class="form-control" name="product_desc" required>   
                            </div>
                            <div class="form-group">
                                <label for="Price">Product Price</label>
                                <input type="text" class="form-control" name="product_price" required>   
                            </div>
                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <input type="file" name="product_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-primary btn-block" value="Add Item">
                            </div>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
@endsection