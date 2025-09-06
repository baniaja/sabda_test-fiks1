<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt #{{ $order->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Courier New', monospace;
            background-color: #f8f9fa;
        }
        .receipt {
            max-width: 400px;
            margin: 20px auto;
            background: white;
            border: 1px solid #dee2e6;
            padding: 20px;
        }
        .receipt-header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .receipt-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .receipt-subtitle {
            font-size: 14px;
            color: #6c757d;
        }
        .order-info {
            margin-bottom: 20px;
        }
        .item-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 14px;
        }
        .total-row {
            border-top: 1px solid #000;
            padding-top: 10px;
            font-weight: bold;
            font-size: 16px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #6c757d;
        }
        @media print {
            body {
                background: white;
            }
            .receipt {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="receipt-header">
            <div class="receipt-title">🍽️ My Resto</div>
            <div class="receipt-subtitle">Sistem Manajemen Restoran</div>
        </div>

        <div class="order-info">
            <div class="item-row">
                <span>Order ID:</span>
                <span>#{{ $order->id }}</span>
            </div>
            <div class="item-row">
                <span>Date:</span>
                <span>{{ $order->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <div class="item-row">
                <span>Customer:</span>
                <span>{{ $order->customer_name }}</span>
            </div>
            <div class="item-row">
                <span>Table:</span>
                <span>{{ $order->table_number }}</span>
            </div>
        </div>

        <div class="order-items">
            @foreach($order->items as $item)
                <div class="item-row">
                    <span>{{ $item->menu->nama_barang }} ({{ $item->quantity }}x)</span>
                    <span>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                </div>
            @endforeach
        </div>

        <div class="total-row">
            <div class="item-row">
                <span>TOTAL:</span>
                <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="footer">
            <p>Thank you for your order!</p>
            <p>Visit us again soon! 🍔🥤</p>
        </div>
    </div>

    <div class="text-center mt-3 d-print-none">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="bi bi-printer me-1"></i>Print Receipt
        </button>
        <button onclick="window.close()" class="btn btn-secondary ms-2">
            <i class="bi bi-x-circle me-1"></i>Close
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
