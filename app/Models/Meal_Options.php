<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal_Options extends Model
{
    use HasFactory;

    protected $primaryKey = "meal_option_id";
    public $table = "meal_options";

    protected $fillable = [
        "option_nm",
        "category_id"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function choice()
    {
        return $this->belongsTo(Meal_Choices::class);
    }

}
