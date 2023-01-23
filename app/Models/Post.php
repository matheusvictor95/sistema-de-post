<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fillable = ['title','content','image','categoria_id'];


   public function categoria(){
       return $this->belongsTo(Categoria::class, 'categoria_id');
   }
}

