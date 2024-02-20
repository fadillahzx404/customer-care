<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    public $table = 'support';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = ['id' => 'string'];
    protected $fillable = ['id', 'description', 'users_id', 'photo_support_id', 'id_cat_services', 'status'];

    /**
     * Get the user that owns the Support
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function categoryServices()
    {
        return $this->belongsTo(CategoryServices::class, 'id_cat_services', 'id');
    }

    public function photoSupport()
    {
        return $this->belongsTo(PhotoSupport::class, 'photo_support_id', 'id');
    }

    public function supportDetails()
    {
        return $this->hasMany(SupportDetails::class, 'id_support');
    }
}
