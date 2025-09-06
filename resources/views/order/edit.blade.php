@extends('layouts.app')

@section('title', 'Edit Pesanan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4><i class="bi bi-pencil me-2"></i>Edit Pesanan #{{ $order->id }}</h4>
            </div>
            <div class="card-body">
                <form id="orderForm" action="{{ route('order.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="customer_name" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                   id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" required>
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="table_number" class="form-label">Nomor Meja</label>
                            <input type="text" class="form-control @error('table_number') is-invalid @enderror"
                                   id="table_number" name="table_number" value="{{ old('table_number', $order->table_number) }}" required>
                            @error('table_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h6 class="mb-3">Item Pesanan</h6>
                    <div id="orderItems">
                        @foreach($order->items as $index => $item)
                            <div class="order-item mb-3 p-3 border rounded">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Menu</label>
                                        <select class="form-select menu-select" name="items[{{ $index }}][menu_id]" required>
                                            <option value="">Pilih Menu</option>
                                            @foreach($menus as $menu)
                                                <option value="{{ $menu->id }}" data-price="{{ $menu->harga }}"
                                                        {{ $item->menu_id == $menu->id ? 'selected' : '' }}>
                                                    {{ $menu->nama_makanan }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" class="form-control quantity-input" name="items[{{ $index }}][quantity]"
                                               min="1" value="{{ old('items.' . $index . '.quantity', $item->quantity) }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Subtotal</label>
                                        <input type="text" class="form-control subtotal-display"
                                               value="Rp {{ number_format($item->subtotal, 0, ',', '.') }}" readonly>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="form-label">&nbsp;</label>
                                        <button type="button" class="btn btn-danger remove-item {{ $loop->first ? 'd-none' : '' }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" id="addItem" class="btn btn-outline-primary mb-3">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Item
                    </button>

                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5>Total: <span id="totalPrice">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('order.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-check-circle me-1"></i>Perbarui Pesanan
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
    let itemCount = {{ $order->items->count() }};

    // Add new item
    document.getElementById('addItem').addEventListener('click', function() {
        const orderItems = document.getElementById('orderItems');
        const template = document.querySelector('.order-item').cloneNode(true);

        // Reset values
        const selects = template.querySelectorAll('select');
        const inputs = template.querySelectorAll('input');
        const removeBtn = template.querySelector('.remove-item');

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
            template.remove();
            calculateTotal();
        });

        orderItems.appendChild(template);
        itemCount++;
    });

    // Remove item functionality for existing items
    document.querySelectorAll('.remove-item:not(.d-none)').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.order-item').remove();
            calculateTotal();
        });
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

    // Initial calculation
    calculateTotal();
});
</script>
@endpush
@endsection
