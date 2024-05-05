<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingAgenda extends Model
{
    protected $table = 'tbl_meeting_agenda';
    protected $primaryKey = "ma_id";
    protected $fillable=[
        'meeting_id',
        'action_id',
        'ma_title',
        'ma_status',
        'ma_edoc',
        'ma_upload_date'
    ];
    public $timestamps = false;
    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
    public function action()
    {
        return $this->belongsTo(Action::class);
    }
}
