<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = "meal_category_id";
    public $table = "meal_category";

    protected $fillable = [
        'category_nm',
    ];

    public function meal_options()
    {
       return  $this->hasMany(Meal_Options::class,'category_id','meal_category_id');
    }
}
