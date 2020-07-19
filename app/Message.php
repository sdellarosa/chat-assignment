<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];

    /**
     * Get the user that created the message.
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that received the message.
     */
    public function recipient()
    {
        return $this->belongsTo(User::class);
    }
}
