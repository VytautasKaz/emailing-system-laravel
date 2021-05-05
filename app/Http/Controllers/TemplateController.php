<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('templates.index', ['templates' => Template::orderBy('subject')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|max:60',
            'content' => 'required',
        ]);

        $customer = new Template();
        $customer->fill($request->all());
        $customer->save();
        return ($customer->save() == 1)
            ? redirect()->route('templates.index')->with('status_success', 'Template created successfully!')
            : redirect()->route('templates.index')->with('status_error', 'Template creation failed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        return view('templates.edit', ['template' => $template]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        $this->validate($request, [
            'subject' => 'required',
            'content' => 'required',
        ]);

        $template->fill($request->all());
        return ($template->save() == 1)
            ? redirect()->route('templates.index')->with('status_success', 'Template updated successfully!')
            : redirect()->route('templates.index')->with('status_error', 'Template update failed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('templates.index')->with('status_success', 'Template removed successfully!');
    }
}
