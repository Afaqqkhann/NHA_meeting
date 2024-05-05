<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingDocument extends Model
{
   
    protected $table = 'tbl_meeting_doc';
    protected $primaryKey = "md_id";
    protected $fillable=[
        'meeting_id',
        'doc_id',
        'md_title',
        'md_status',
        'md_edoc',
        'md_upload_date'
    ];
    public $timestamps = false;
    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }
    public function docstandard()
    {
        return $this->belongsTo(DocStandard::class);
    }
}
