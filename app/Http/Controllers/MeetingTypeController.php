<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\MeetingType;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MeetingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $meeting_type = MeetingType::all();
        return view('meeting_types.index', compact('meeting_type'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view ('meeting_types.CreateMeeting');
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
            'mt_title' => 'required|string|max:255',
            'mt_status' => 'required|string|max:255',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
         // If validation passes, create and save the DocStandard model
    $meeting_type = new MeetingType();
    $meeting_type->mt_title = $request->mt_title;
    $meeting_type->mt_status = $request->mt_status;
    $meeting_type->save();

    // Redirect to the index page
    return redirect('/meeting')->with('success', 'Meeting Type created successfully');
     }
     
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meeting_type = MeetingType::find($id); // Assuming $id is the ID of the document standard
        return view('meeting_types.edit', ['meeting_types' => $meeting_type]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'mt_title' => 'required|string|max:255',
            'mt_status' => 'required|string|max:255',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
    
        $meeting_types =  MeetingType:: find($id);
        $meeting_types->mt_title = $request->mt_title;
        $meeting_types->mt_status = $request->mt_status;
        $meeting_types->update();

    // Redirect to the index page
    return redirect('/meeting')->with('success', 'Document standard update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting_type=MeetingType::find($id);
        $meeting_type->delete();
        return back()->withSuccess('delete successfully');
    }
}
