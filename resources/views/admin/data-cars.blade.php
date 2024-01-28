<button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addCar">Tambah Mobil</button>
<button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addBrand">Tambah Merk</button>
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
                    <td>
                        <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#car-{{ $i }}">Edit</button>
                        <form action="{{ route('cars.destroy', ['car' => $car]) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @include('admin.edit-car-modal')
            @endforeach
        </tbody>
    </table>
@else
    <p class="alert alert-danger">Tidak ada data</p>
@endif
