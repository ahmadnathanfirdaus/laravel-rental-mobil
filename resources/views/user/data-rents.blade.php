@if (count($rents) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Mobil</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Pengembalian</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rents as $i => $rent)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $rent->car->brand->name . ' ' . $rent->car->name }}</td>
                    <td>{{ $rent->rent_date }}</td>
                    <td>{{ $rent->return_date }}</td>
                    <td>Rp{{ number_format($rent->total_price, 2, ',', '.') }}</td>
                    <td>
                        @if ($rent->status == 'pending')
                            <span class="badge bg-warning">{{ $rent->status }}</span>
                        @elseif ($rent->status == 'approved')
                            <span class="badge bg-success">{{ $rent->status }}</span>
                        @else
                            <span class="badge bg-danger">{{ $rent->status }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="alert alert-danger">Tidak ada data</p>
@endif
