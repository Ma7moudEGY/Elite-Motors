<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Renting extends Model {
    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'price',
    ];

    protected function casts(): array {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'price' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function car(): BelongsTo {
        return $this->belongsTo(Car::class);
    }

    public function calculateTotalPrice() {
        $days = $this->end_date->diffInDays($this->start_date);

        return $days * $this->car->rental_price;
    }
}
