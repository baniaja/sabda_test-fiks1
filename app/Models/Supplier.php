<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_supplier',
        'name_pt',
        'alamat',
        'telepon',
    ];

    public static function rules()
    {
        return [
            'kode_supplier' => 'required|string|max:50|unique:suppliers,kode_supplier',
            'name_pt' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
        ];
    }
}
