<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SurveyQuestion;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Survey $survey)
    {
        $questions=$survey->questions()->latest()->paginate(25);
       return view('Admin.survey.question.index',compact('questions','survey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Survey $survey)
    {
        return view('Admin.survey.question.create',compact('survey'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Survey $survey)
    {
        $question=$survey->questions()->create([
            'name'=>$request->name,
        ]);
        foreach($request->groupa as $key=>$value )
        {
            $question->options()->create([
                'part'=> $key+1,
                'name'=>$value['names'],
                'value'=>$value['value'],
            ]);
        }
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyQuestion $surveyQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey,SurveyQuestion $question)
    {
        $options=$question->options()->get();
        return view('Admin.survey.question.edit',compact('question','survey','options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey, SurveyQuestion $question)
    {
        $question->update([
            'name'=>$request->name,
        ]);
        $question->options()->delete();
        foreach($request->groupa as $key=>$value )
        {
            $question->options()->create([
                'part'=> $key+1,
                'name'=>$value['names'],
                'value'=>$value['value'],
            ]);
        }
            alert()->success('ویرایش  با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
            return redirect(route('admin.survey.question.index',$survey));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyQuestion  $surveyQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy( Survey $survey, SurveyQuestion $question)
    {
        $question->delete();
        alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return back();
    }
    public function DeleteAll(Request $request)
    {
        $ids = $request->ids;
        SurveyQuestion::query()->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"اطلاعات با موفقیت حذف شد."]);
    }
}
