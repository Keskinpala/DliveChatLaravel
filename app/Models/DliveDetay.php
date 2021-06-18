<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DliveDetay extends Model
{
    use HasFactory;
    protected $table = 'dliveyayinvakitleri';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "Gun","Saniye","Limon","KasaLimon","SubCount","HesapLimonCount"
    ];
    public $timestamps = false;
}
