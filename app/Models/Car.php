<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'image',
        'is_rented',
        'rental_price',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'is_rented' => 'boolean',
            'rental_price' => 'decimal:2',
        ];
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rentings(): HasMany
    {
        return $this->hasMany(Renting::class);
    }
}
