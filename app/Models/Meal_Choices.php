<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal_Choices extends Model
{
    use HasFactory;

    protected $primaryKey = "meal_choice_id";
    public $table = "meal_choices";

    protected $fillable = [
      'user_id',
      'option_id',
      'date',
    ];

    public function user() {
       return  $this->belongsTo(User::class,'user_id');
    }

    public function option() {
       return  $this->belongsTo(Meal_Options::class,"option_id");
    }


}
