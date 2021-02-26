<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_file extends Model
{   
    use HasFactory;
    public $table = 'tb_file'; 
    protected $fillable = [
        'name',
        'ori_name',
        'type',
        'path'
    ];
}
