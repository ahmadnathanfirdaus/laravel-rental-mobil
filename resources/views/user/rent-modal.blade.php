<div class="modal fade" id="car-{{ $i }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="car-{{ $i }}Label">{{ $car->brand->name . ' ' . $car->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('rents.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" id="car_id" name="car_id" value="{{ $car->id }}">
                    <input type="hidden" id="total_price" name="total_price" value="{{ $car->price }}">
                    <div class="mb-3">
                        <label for="rent_date">Rent Date:</label>
                        <input type="date" class="form-control" id="rent_date" name="rent_date"
                            onchange="calculatePrice({{ $car->price }})">
                    </div>
                    <div class="mb-3">
                        <label for="return_date">Return Date:</label>
                        <input type="date" class="form-control" id="return_date" name="return_date"
                            onchange="calculatePrice({{ $car->price }})">
                    </div>
                    <p class="mb-3">
                        <strong>Total hari:</strong> <span id="total_days">0</span> hari
                    </p>
                    <p class="mb-3">
                        <strong>Total harga:</strong> <span id="total_price_text">Rp 0</span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Konfirmasi Penyewaan</button>
                </div>
            </form>
        </div>
    </div>
</div>
