<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_makanan',
        'kategori',
        'harga',
        'deskripsi',
        'gambar',
        'stok',
        'status'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer',
        'status' => 'boolean',
    ];

    // Relationship with OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Accessor for formatted price
    public function getHargaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    // Scope for active menu items
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    // Scope for category
    public function scopeByCategory($query, $category)
    {
        return $query->where('kategori', $category);
    }

    // Get available categories
    public static function getCategories()
    {
        return ['makanan', 'minuman', 'dessert'];
    }

    // Validation rules
    public static function rules()
    {
        return [
            'nama_makanan' => 'required|string|max:100',
            'kategori' => 'required|in:makanan,minuman,dessert',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string|max:500',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stok' => 'required|integer|min:0',
            'status' => 'boolean'
        ];
    }
}
