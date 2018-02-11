<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['created_at_diff_for_humans'];

    /**
     * Define the relationship between an activity log and its user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the readable time for humans between now and the creation date.
     *
     * @return bool
     */
    public function getCreatedAtDiffForHumansAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
