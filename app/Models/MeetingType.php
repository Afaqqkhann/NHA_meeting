<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingType extends Model
{
    protected $table = 'tbl_meeting_type';
    protected $primaryKey = "mt_id";
    protected $fillable=[
        'mt_title',
        'mt_status'
    ];
    public $timestamps = false;

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
}
