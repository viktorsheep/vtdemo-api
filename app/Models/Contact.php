<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nickname',
        'location',
        'gender',
        'age',
        'baptism_date',
        'current_prayer_request',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [];

    protected $casts = [
        // 'baptism_date' => 'date:d M y'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
