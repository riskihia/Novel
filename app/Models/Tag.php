<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $table = "tags";
    protected $keyType = "string";
    public $timestamps = true;

    public function novels(): BelongsToMany
    {
        return $this->belongsToMany(Novel::class);
    }

    protected $fillable = [
        'nama',
    ];
}
