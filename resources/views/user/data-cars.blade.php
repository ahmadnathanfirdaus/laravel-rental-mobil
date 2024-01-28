@if (count($cars) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Tahun</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $i => $car)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $car->brand->name }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->year }}</td>
                    <td>Rp{{ number_format($car->price, 2, ',', '.') }}</td>
                    <td><span
                            class="badge {{ $car->status == 'available' ? 'bg-success' : 'bg-danger' }}">{{ $car->status }}</span>
                    </td>
                    @if ($car->status == 'available')
                        <td>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#car-{{ $i }}">Sewa</button>
                        </td>
                    @endif
                </tr>
                @include('user.rent-modal')
            @endforeach
        </tbody>
    </table>
@else
    <p class="alert alert-danger">Tidak ada data</p>
@endif
