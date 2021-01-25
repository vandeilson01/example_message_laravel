<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['body', 'title', 'id_user'];

    public function message(){
        return $this->belongsTo(Message::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
