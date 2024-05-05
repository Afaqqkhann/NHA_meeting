<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DocStandard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DocStandardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docStandards = DocStandard::all();
        return view('Document.main', compact('docStandards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Document.create_doc');
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
            'doc_title' => 'required|string|max:255',
            'doc_status' => 'required|string|max:255',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
         // If validation passes, create and save the DocStandard model
    $docStandards = new DocStandard();
    $docStandards->doc_title = $request->doc_title;
    $docStandards->doc_status = $request->doc_status;
    $docStandards->save();

    // Redirect to the index page
    return redirect('/doc-standards')->with('success', 'Document standard created successfully');
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
        $docStandard = DocStandard::find($id); // Assuming $id is the ID of the document standard
        return view('Document.edit', ['docStandards' => $docStandard]);
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
            'doc_title' => 'required|string|max:255',
            'doc_status' => 'required|string|max:255',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
    
        $docStandards =  DocStandard:: find($id);
        $docStandards->doc_title = $request->doc_title;
        $docStandards->doc_status = $request->doc_status;
        $docStandards->update();

    // Redirect to the index page
    return redirect('/doc-standards')->with('success', 'Document standard update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $docStandard=DocStandard::find($id);
        $docStandard->delete();
        return back()->withSuccess('delete successfully');
    }
}
