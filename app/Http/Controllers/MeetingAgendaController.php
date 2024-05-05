<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\MeetingAgenda;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MeetingAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetingagenda = MeetingAgenda::with('meeting','action')->get();
        return view('meeting_agenda.index', compact('meetingagenda'));
        //return view('meeting.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('meeting_agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'ma_title' => 'required|string|max:255',
            'ma_status' => 'required|string|max:255',
            'ma_edoc' => 'required|string|max:255',
            'ma_upload_date' => 'required|string|max:255',
            'action_id'=> 'required|string|max:255',
            'meeting_id'=> 'required|string|max:255',

        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
         // If validation passes, create and save the DocStandard model
    $meetingagenda = new MeetingAgenda();
    $meetingagenda->ma_title = $request->ma_title;
    $meetingagenda->ma_status = $request->ma_status;
    $meetingagenda->ma_edoc = $request->ma_edoc;
    $meetingagenda->ma_upload_date = $request->ma_upload_date;
    $meetingagenda->action_id = $request->action_id;
    $meetingagenda->meeting_id = $request->meeting_id;
    $meetingagenda->save();

    // Redirect to the index page
    return redirect('/meetingagenda')->with('success', 'Document standard created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meetingagenda = MeetingAgenda::find($id);

    // if (!$meetingagenda) {
    //     abort(404); // Or handle the error appropriately
    // }
        dd($meetingagenda);
    // return view('meeting_agenda.show', compact('meetingagenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $meeting_agenda = MeetingAgenda::find($id); // Assuming $id is the ID of the document standard
        return view('meeting_agenda.edit', ['meeting_agendas' => $meeting_agenda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'ma_title' => 'required|string|max:255',
            'ma_status' => 'required|string|max:255',
            'ma_edoc' => 'required|string|max:255',
            'ma_upload_date' => 'required|string|max:255',
            'action_id'=> 'required|string|max:255',
            'meeting_id'=> 'required|string|max:255',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
    
        $meeting_agendas =  MeetingAgenda:: find($id);
        $meeting_agendas->ma_title = $request->ma_title;
        $meeting_agendas->ma_status = $request->ma_status;
        $meeting_agendas->ma_edoc = $request->ma_edoc;
        $meeting_agendas->ma_upload_date = $request->ma_upload_date;
        $meeting_agendas->action_id = $request->action_id;
        $meeting_agendas->meeting_id = $request->meeting_id;
        $meeting_agendas->update();

    // Redirect to the index page
    return redirect('/meetingagenda')->with('success', 'Meeting Agenda standard update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting_agenda=MeetingAgenda::find($id);
        $meeting_agenda->delete();
        return back()->withSuccess('delete successfully');
    }
}
