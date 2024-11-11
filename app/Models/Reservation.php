<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $guarded = ['id'];

    ##---------------------------RELATIONSHIPS
    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
