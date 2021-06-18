<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BtcDataSheet extends Model
{
    use HasFactory;
    protected $table = 'BtcDataSheet';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "Site","BtcTl","BtcUsd","UsdTl","Tarih"
    ];
    public $timestamps = false;
}


