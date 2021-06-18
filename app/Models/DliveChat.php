<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DliveChat extends Model
{
    use HasFactory;
    protected $table = 'dlivechat';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id", "userName", "message", "sendTime", "isDonate", "isSubs", "isReaded"
    ];
    public $timestamps = false;
}
