<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Product extends Model
{
    use HasFactory;
    use HasSlug;
    protected $fillable = [
        'name',
        'standard',
        'premium',
        'gold',
        'in_stock',
        'category_id',
        'brand_id'
    ];
    public function getSlugOptions() : SlugOptions{
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_');
    }
    
    public function brand(){
        return $this->belongsTo(related: Brand::class);
    }

    public function category(){
        return $this->belongsTo(related: Category::class);
    }
    public function getColors(){
        return json_decode($this->color , true);
    }
}