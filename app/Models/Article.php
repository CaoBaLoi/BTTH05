<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='baiviet';
    protected $primaryKey = 'ma_bviet';
    public $timestamps = false;
    use HasFactory;
}
