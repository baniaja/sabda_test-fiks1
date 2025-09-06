@extends('layouts.app')

@section('title', 'Buat Pesanan Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4><i class="bi bi-plus-circle me-2"></i>Buat Pesanan Baru</h4>
            </div>
            <div class="card-body">
                <form id="orderForm" action="{{ route('order.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="customer_name" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                   id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="table_number" class="form-label">Nomor Meja</label>
                            <input type="text" class="form-control @error('table_number') is-invalid @enderror"
                                   id="table_number" name="table_number" value="{{ old('table_number') }}" required>
                            @error('table_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h6 class="mb-3">Item Pesanan</h6>
                    <div id="orderItems">
                        <div class="order-item mb-3 p-3 border rounded">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-label">Menu</label>
                                    <select class="form-select menu-select" name="items[0][menu_id]" required>
                                        <option value="">Pilih Menu</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" data-price="{{ $menu->harga }}">
                                                {{ $menu->nama_makanan }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" class="form-control quantity-input" name="items[0][quantity]" min="1" value="1" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Subtotal</label>
                                    <input type="text" class="form-control subtotal-display" readonly>
                                </div>
                                <div class="col-md-1">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="button" class="btn btn-danger remove-item d-none">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="addItem" class="btn btn-outline-primary mb-3">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Item
                    </button>

                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5>Total: <span id="totalPrice">Rp 0</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('order.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i>Buat Pesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let itemCount = 1;

    // Add new item
    document.getElementById('addItem').addEventListener('click', function() {
        const orderItems = document.getElementById('orderItems');
        const newItem = document.querySelector('.order-item').cloneNode(true);

        // Update names and IDs
        const selects = newItem.querySelectorAll('select');
        const inputs = newItem.querySelectorAll('input');
        const removeBtn = newItem.querySelector('.remove-item');

        selects.forEach(select => {
            select.name = select.name.replace(/\[\d+\]/, `[${itemCount}]`);
            select.value = '';
        });

        inputs.forEach(input => {
            if (input.name) {
                input.name = input.name.replace(/\[\d+\]/, `[${itemCount}]`);
                if (input.classList.contains('quantity-input')) {
                    input.value = '1';
                } else if (input.classList.contains('subtotal-display')) {
                    input.value = '';
                }
            }
        });

        removeBtn.classList.remove('d-none');
        removeBtn.addEventListener('click', function() {
            newItem.remove();
            calculateTotal();
        });

        orderItems.appendChild(newItem);
        itemCount++;
    });

    // Calculate subtotal and total
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('menu-select') || e.target.classList.contains('quantity-input')) {
            const item = e.target.closest('.order-item');
            const menuSelect = item.querySelector('.menu-select');
            const quantityInput = item.querySelector('.quantity-input');
            const subtotalDisplay = item.querySelector('.subtotal-display');

            if (menuSelect.value && quantityInput.value) {
                const selectedOption = menuSelect.options[menuSelect.selectedIndex];
                const price = parseFloat(selectedOption.getAttribute('data-price'));
                const quantity = parseInt(quantityInput.value);
                const subtotal = price * quantity;

                subtotalDisplay.value = 'Rp ' + subtotal.toLocaleString('id-ID');
            }

            calculateTotal();
        }
    });

    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('.subtotal-display').forEach(display => {
            const value = display.value.replace('Rp ', '').replace(/\./g, '');
            if (value) {
                total += parseFloat(value);
            }
        });
        document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
    }
});
</script>
@endpush
@endsection
