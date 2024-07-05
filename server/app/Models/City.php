<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Reports;
use App\Models\TouristFlat;

class City extends Model
{
    use HasFactory;

    protected $casts = [
        'map' => 'array',
    ];

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function touristFlats(): HasMany
    {
        return $this->hasMany(TouristFlat::class);
    }
}
