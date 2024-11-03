<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class ListeningParty extends Model
{
    /** @use HasFactory<\Database\Factories\ListeningPartyFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function episode() : BelongsTo
    {
        return $this->belongsTo(Episode::class);
    }

    public function podcast(): HasOneThrough
    {
        return $this->hasOneThrough(Podcast::class, Episode::class, 'id','id','episode_id','podcast_id');
    }

   public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }
}
