<?php

namespace App\Http\Controllers;

use App\Question;
use App\Http\Requests;
use App\Http\Resources\Question as QuestionResource;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get questions
        $questions = Question::all();

        // Return collection of questions as a resource
        return QuestionResource::collection($questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = $request->isMethod('put') ? Question::findOrFail($request->questionId) : new Question;

        $question->id = $request->input('questionId');
        $question->title = $request->input('title');

        if ($question->save()) {
            return new QuestionResource($question);
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
        // Get Question
        $question = Question::findOrFail($id);

        // Return single question as a resource
        return new QuestionResource($question);
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
        // Get Question
        $question = Question::findOrFail($id);

        // Delete single question
        if ($question->delete()) {
            return new QuestionResource($question);
        }
    }
}
