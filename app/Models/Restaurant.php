<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }
}
