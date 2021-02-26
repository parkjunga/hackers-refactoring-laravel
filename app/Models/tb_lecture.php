<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_lecture extends Model
{
    use HasFactory;
    
    public $table = 'tb_lecture';

    protected $guarded = [];
}
