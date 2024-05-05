<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
   
    protected $table = 'tbl_action';
    protected $primaryKey = "action_id";
    protected $fillable=[
        'action_title',
        'action_status'
    ];
    public $timestamps = false;
    public function meetingagenda()
    {
        return $this->hasMany(MeetingAgenda::class);
    }
}
