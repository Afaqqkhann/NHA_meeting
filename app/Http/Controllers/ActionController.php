<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = Action::all();
        return view('Action.index', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Action.create_action');
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
            'action_title' => 'required|string|max:255',
            'action_status' => 'required|string|max:255',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
         // If validation passes, create and save the DocStandard model
    $actions = new Action();
    $actions->action_title = $request->action_title;
    $actions->action_status = $request->action_status;
    $actions->save();

    // Redirect to the index page
    return redirect('/Action')->with('success', 'Action created successfully');
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
        $actions = Action::find($id); // Assuming $id is the ID of the document standard
        return view('Action.edit', ['action' => $actions]);
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
            'action_title' => 'required|string|max:255',
            'action_status' => 'required|string|max:255',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
    
        $action =  Action:: find($id);
        $action->action_title = $request->action_title;
        $action->action_status = $request->action_status;
        $action->update();

    // Redirect to the index page
    return redirect('/Action')->with('success', 'Action update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actions=Action::find($id);
        $actions->delete();
        return back()->withSuccess('delete successfully');
    }
}
