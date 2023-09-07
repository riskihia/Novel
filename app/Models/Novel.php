<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Novel extends Model
{
    use HasFactory;

    protected $table = "novels";
    protected $keyType = "string";
    public $timestamps = true;

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    protected $fillable = [
        'judul',
        'avatar',
        'link',
        'sinopsis',
        'status',
        'author_name',
    ];
}
