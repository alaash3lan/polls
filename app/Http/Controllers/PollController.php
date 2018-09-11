<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Question;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Poll as pollresource;
class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

return response()->json(Poll::all(), 200);


    //   $questions = Question::all();
    //
    // // return $questions;
    //
    //   foreach ($questions as $question) {
    //     echo $question->poll->title;
    //     echo "    ::  :      ";
    //
    //
    //     echo $question->question;
    //     echo "    ...???......    ";
    //
    //     echo $question->answer->answer;
    //
    //
    //     echo "    ,,    ,,,    ";
    //   }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        'title' => 'required|max:30',
      ];
$validiator  = Validator::make($request->all(),$rules );
if ($validiator->fails()) {
 return response()->json($validiator->errors(), 404);

  // code...
}
        $poll = Poll::create($request->all());
        return response()->json($poll , 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  $poll =   poll::find($id);

  if (is_null($poll)) {
  return response()->json(['msg' => "empty"], 404);
  }
$response = new pollresource(poll::with('question')->find($id), 200);
         return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
      $poll->update($request->all());
      $poll->save();
      return response()->json($poll, 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {

$poll->delete();
return response()->json(null, 204);
    }


    public function error(Poll $poll)
    {

    $poll->delete();
    return response()->json(['msf' =>"is required"], 501);
    }

public function question  (Request $request, Poll $poll){
$questions = $poll->question;
  return response()->json($questions, 200);



}

}
