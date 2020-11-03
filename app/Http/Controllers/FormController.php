<?php

namespace App\Http\Controllers;

use App\Form;
use App\Http\Requests;
use App\Http\Resources\Form as FormResource;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Forms
        $forms = Form::all();

        // Return collection of forms as a resource
        return FormResource::collection($forms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->isMethod('put') ? Form::findOrFail($request->formId) : new Form;

        $form->id = $request->input('formId');
        $form->title = $request->input('title');

        if ($form->save()) {
            return new FormResource($form);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get Form
        $form = Form::findOrFail($id);

        // Return single form as a resource
        return new FormResource($form);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get Form
        $form = Form::findOrFail($id);

        // Delete single form
        if ($form->delete()) {
            return new FormResource($form);
        }
    }
}
