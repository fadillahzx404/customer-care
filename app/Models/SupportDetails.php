<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportDetails extends Model
{
    use HasFactory;
    public $table = 'support_details';
    protected $fillable = ['id', 'photo_details', 'id_support', 'users_id', 'description'];

    public function support()
    {
        return $this->belongsTo(SupportDetails::class, 'id_support');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
