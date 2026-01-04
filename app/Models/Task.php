<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @var string $table */
    protected $table = 'tasks';

    /** @var string[] $fillable */
    protected $fillable = [
        'title'
    ];

    /**
     * @return BelongsToMany
     */
    public function certificates(): BelongsToMany
    {
        return $this->belongsToMany(
            Certificate::class,
            'tasks_certificate'
        );
    }
}
