<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leads extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $fillable = [
        'name',
        'subject',
        'details',
        'phone',
        'img',
        'price',

    ];


    // public function author(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
}
