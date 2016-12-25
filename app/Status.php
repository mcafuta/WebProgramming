<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [ 'name', 'type', 'value', 'user_id', 'due_date' ];

    protected $dates = [ 'due_date' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeByDate($query)
    {
        return $query->orderBy('due_date', 'ASC');
    }

    public function getDueDateAttribute()
    {
        return $this->attributes['due_date'];
    }
}
