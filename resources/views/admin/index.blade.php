@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <h4>Welcome, {{ auth()->user()->name }}!</h4>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    @include('layouts.alert')

    <ul id="myTab" class="nav nav-tabs">
        <li class="nav-item">
            <a href="#cars" class="nav-link active" data-bs-toggle="tab">Data Mobil</a>
        </li>
        <li class="nav-item">
            <a href="#rents" class="nav-link" data-bs-toggle="tab">Data Penyewaan</a>
        </li>
        <li class="nav-item">
            <a href="#users" class="nav-link" data-bs-toggle="tab">Data User</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="cars">
            @include('admin.data-cars')
        </div>
        <div class="tab-pane fade" id="rents">
            @include('admin.data-rents')
        </div>
        <div class="tab-pane fade" id="users">
            @include('admin.data-users')
        </div>
    </div>

    @include('admin.add-car-modal')
    @include('admin.add-brand-modal')

    <script>
        $(document).ready(function() {
            $('a[data-bs-toggle="tab"]').on("shown.bs.tab", function(e) {
                var activeTab = $(e.target).text();
                var previousTab = $(e.relatedTarget).text();
            });
        });
    </script>
@endsection
