<?php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
 
class Category extends Model 
{ 
 public $table ="category"; 
public $primaryKey = 'category_id'; 
public $fillable = [  'category_name', 'category_description',  ]; 
 $timestamps = false; 
 
} 