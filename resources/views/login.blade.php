@extends('layouts.app')
@section('content')
{{-- Create a centered vertical and horizontal login page using bootstrap --}}
<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                            @error('username')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="w-100 btn btn-primary">Login</button>
                        <p class="text-center mt-3">
                            Don't have an account? <a href="{{ route('register') }}">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
