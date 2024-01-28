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
            <a href="#rents" class="nav-link" data-bs-toggle="tab">Riwayat Penyewaan</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="cars">
            @include('user.data-cars')
        </div>
        <div class="tab-pane fade" id="rents">
            @include('user.data-rents')
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('a[data-bs-toggle="tab"]').on("shown.bs.tab", function(e) {
                var activeTab = $(e.target).text();
                var previousTab = $(e.relatedTarget).text();
            });
        });

        function calculatePrice(price) {
            let rentDate = new Date(document.getElementById("rent_date").value);
            let returnDate = new Date(document.getElementById("return_date").value);

            let timeDifference = returnDate.getTime() - rentDate.getTime();
            let daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));

            if (daysDifference != daysDifference) {
                document.getElementById("total_days").innerHTML = 0;
                document.getElementById("total_price_text").innerHTML = 0;
                document.getElementById("total_price").value = 0;
                return 0;
            }
            if (daysDifference < 0) {
                alert("Tanggal pengembalian tidak boleh kurang dari tanggal peminjaman!");
                document.getElementById("rent_date").value = "";
                document.getElementById("return_date").value = "";
                document.getElementById("total_days").innerHTML = 0;
                return 0;
            }
            let totalPrice = price * daysDifference;
            // format total price with IDR currency
            let formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            });
            document.getElementById("total_price").value = totalPrice;
            document.getElementById("total_price_text").innerHTML = formatter.format(totalPrice);
            document.getElementById("total_days").innerHTML = daysDifference;
            return daysDifference;
        }
    </script>
@endsection
