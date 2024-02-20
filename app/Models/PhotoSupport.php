<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoSupport extends Model
{
    use HasFactory;
    public $table = 'photo_support';
    protected $fillable = ['photo'];
}
