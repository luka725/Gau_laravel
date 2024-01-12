<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = ['file_path', 'file_name', 'mime_type', 'size'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
