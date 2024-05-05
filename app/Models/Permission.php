<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = "id";
    protected $fillable=[
        'name',
        'display_name',
        'description',
        'created_at',
        'updated_at',
        'parent',
        'icon',
        'link',
        'sort'
    ];
    // public $timestamps = false;
}
