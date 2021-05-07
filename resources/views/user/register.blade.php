@extends('layouts.app')
@section('content')
    <div class="container my-5">
        @if (session('registerFailstatus'))
            <div class="col-12 col-md-6 offset-md-3">
                <div class="alert alert-danger">
                    {{ session('registerFailstatus') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        register an account
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.storeUser') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="user_name" class="form-control" placeholder="Enter name">
                                @error('user_name')
                                    <small class="text-danger">
                                        {{$message}}*
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="user_email" class="form-control" placeholder="Enter email">
                                @error('user_email')
                                <small class="text-danger">
                                    {{$message}}*
                                </small>
                            @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Enter password" name="password" class="form-control">
                                @error('password')
                                <small class="text-danger">
                                    {{$message}}*
                                </small>
                            @enderror
                            </div>
                            <input type="submit" class="btn btn-sm btn-primary" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection