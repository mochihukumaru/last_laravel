<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $fillable = [ 'category_id', 'first_name','last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail', ];
    
    public function category(){
    return $this->belongsTo(Category::class); }
}