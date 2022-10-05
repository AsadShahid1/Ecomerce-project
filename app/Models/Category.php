<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Category extends Model
{
    use HasFactory;
    use HasSlug;
    protected $fillable = [
        'name',
        'created_at',
    ];
  

    public function getSlugOptions() : SlugOptions{
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_');
    }
    public function products(){
        return $this->hasMany(related:Product::class);
    }

}
