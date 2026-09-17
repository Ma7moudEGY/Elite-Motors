<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model {
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

    protected function casts(): array {
        return [
            'year' => 'integer',
            'is_rented' => 'boolean',
            'rental_price' => 'decimal:2',
        ];
    }

    public static function availableFor(User $user, ?int $carId = null): Collection {
        return static::where(function ($query) use ($user) {
                $query->where('user_id', '!=', $user->id)
                    ->orWhereNull('user_id');
            })
            ->when($carId !== null, function ($query) use ($carId) {
                $query->where('id', $carId);
            })
            ->orderBy('make')
            ->orderBy('model')
            ->get();
    }

    public function owner(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rentings(): HasMany {
        return $this->hasMany(Renting::class);
    }
}
