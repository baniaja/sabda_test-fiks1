<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_customer',
        'nama_customer',
        'alamat',
        'telepon',
        'email',
    ];

    public static function rules()
    {
        return [
            'kode_customer' => 'required|string|max:50|unique:customers,kode_customer',
            'nama_customer' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ];
    }
}
