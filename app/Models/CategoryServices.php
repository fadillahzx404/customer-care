<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryServices extends Model
{
    use HasFactory;
    public $table = 'category_services';
    protected $fillable = ['name_services'];
}
