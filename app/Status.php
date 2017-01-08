<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
        return $query->orderBy('created_at', 'ASC');
    }

    public function scopeMine($query, Request $request)
    {
        return $query->where('user_id', $request->user()->id);
    }

    public function getDueDateAttribute()
    {
        return $this->attributes['due_date'];
    }

    public function expired()
    {
        return \Carbon\Carbon::parse($this->due_date)->isPast();
    }
}
