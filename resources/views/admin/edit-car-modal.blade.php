<div class="modal fade" id="car-{{ $i }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="car-{{ $i }}Label">{{ $car->brand->name . ' ' . $car->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cars.update', ['car' => $car]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="brand">Merk</label>
                        <select name="brand" id="brand" class="form-control">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ $car->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">Tipe</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $car->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="year">Tahun</label>
                        <input type="number" class="form-control" id="year" name="year"
                            value="{{ $car->year }}">
                    </div>
                    <div class="mb-3">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ $car->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="available" {{ $car->status == 'available' ? 'selected' : '' }}>Available
                            </option>
                            <option value="unavailable" {{ $car->status == 'unavailable' ? 'selected' : '' }}>
                                Unavailable</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
