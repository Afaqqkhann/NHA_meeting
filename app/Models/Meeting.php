<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = 'tbl_meeting';
    protected $primaryKey = "meeting_id";
    protected $fillable=[
        'meeting_date',
        'meeting_no',
        'meeting_type',
        'meeting_status',
        'meeting_edoc',
        'meeting_upload_date'
    ];
    
    public function meetingType()
    {
        return $this->belongsTo(MeetingType::class);
    }

    public function meetingagenda()
    {
        return $this->hasMany(MeetingAgenda::class);
    }
    // public function meetingdocument()
    // {
    //     return $this->hasMany(MeetingDocument::class);
    // }
}
