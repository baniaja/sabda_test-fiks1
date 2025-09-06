<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Makanan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('items.menu')->get();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Makanan::all();
        return view('order.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'table_number' => 'required|string|max:10',
            'items' => 'required|array',
            'items.*.menu_id' => 'required|exists:makanans,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $totalPrice = 0;
        foreach ($request->items as $item) {
            $menu = Makanan::find($item['menu_id']);
            $totalPrice += $menu->harga * $item['quantity'];
        }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'table_number' => $request->table_number,
            'total_price' => $totalPrice,
        ]);

        foreach ($request->items as $item) {
            $menu = Makanan::find($item['menu_id']);
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
                'subtotal' => $menu->harga * $item['quantity'],
            ]);
        }

        return redirect()->route('order.index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('items.menu');
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $menus = Makanan::all();
        $order->load('items.menu');
        return view('order.edit', compact('order', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'table_number' => 'required|string|max:10',
            'items' => 'required|array',
            'items.*.menu_id' => 'required|exists:makanans,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $totalPrice = 0;
        foreach ($request->items as $item) {
            $menu = Makanan::find($item['menu_id']);
            $totalPrice += $menu->harga * $item['quantity'];
        }

        $order->update([
            'customer_name' => $request->customer_name,
            'table_number' => $request->table_number,
            'total_price' => $totalPrice,
        ]);

        $order->items()->delete(); // Delete existing items

        foreach ($request->items as $item) {
            $menu = Makanan::find($item['menu_id']);
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
                'subtotal' => $menu->harga * $item['quantity'],
            ]);
        }

        return redirect()->route('order.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully.');
    }

    /**
     * Display the receipt (struk) for the specified order.
     */
    public function struk(Order $order)
    {
        $order->load('items.menu');
        return view('order.struk', compact('order'));
    }
}
