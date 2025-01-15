<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Product extends Model
{
    use HasFactory;
    use HasTags;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'discount',
        'dimensions',
        'weight',
        'cover',
        'quantity',
        'category_id',
        'stock_status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->product_number = 'P' . str_pad(Product::max('id') + 1, 6, '0', STR_PAD_LEFT);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getFormattedPriceAttribute()
    {
        return '€ ' . number_format($this->price / 100, 2, ',', '.');
    }

    public function getFormattedDiscountPriceAttribute()
    {
        return '€ ' . number_format($this->discountPrice() / 100, 2, ',', '.');
    }

    public function getFormattedDiscountSavingsAttribute()
    {
        return '€ ' . number_format($this->discountSavings() / 100, 2, ',', '.');
    }

    public function discountPrice()
    {
        if ($this->discount > 0) {
            return $this->price * (1 - $this->discount / 100);
        }
        return $this->price;
    }

    public function discountSavings()
    {
        return $this->price - $this->discountPrice();
    }
}
