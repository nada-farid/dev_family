<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\QuestionnaireBeneficiar;
use App\Models\QuestionnaireCertificate;
use App\Models\QuestionnaireCourse;
use App\Models\QuestionnaireMember;
use App\Models\QuestionnaireTraning;
use App\Models\QuestionnaireVolunteer;
use Illuminate\Http\Request;
use Alert;

class QuestionnaireController extends Controller
{
    //
    public function questionnaire($type)
    {
        $title = 'قياس أثر التدريب للموظف';
        $view = 'traning';
        if ($type == 'traning') {
            $title = 'قياس أثر التدريب للموظف';
            $view = 'traning';
        } elseif ($type == 'volunteers') {
            $title = 'قياس رضا المتطوعين';
            $view = 'volunteers';
        } elseif ($type == 'courses') {
            $title = 'تقييم دورة تدريبية بمكتب التطوير المؤسسي';
            $view = 'courses';
        } elseif ($type == 'courses_2') {
            $title = 'تقييم دورة تدريبية بمكتب التطوير المؤسسي (قسم الجودة)';
            $view = 'courses_2';
        } elseif ($type == 'members') {
            $title = 'استبيان قياس رأي أعضاء الجمعية العمومية';
            $view = 'members';

        } elseif ($type == 'beneficiaries') {
            $title = 'استبيان قياس رضا المستفدين ';
            $view = 'beneficiaries';
        } else {
            abort(404);
        }
        return view('frontend.questionnaire.' . $view, compact('type', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'in:traning,volunteers,courses,members,courses_2,beneficiaries'
        ]);

        if ($request->type == 'traning') {
            QuestionnaireTraning::create($request->all());
        } elseif ($request->type == 'volunteers') {
            QuestionnaireVolunteer::create($request->all());
        } elseif ($request->type == 'courses') {
            QuestionnaireCourse::create($request->all());
        } elseif ($request->type == 'courses_2') {
            QuestionnaireCourse::create($request->all());
        } elseif ($request->type == 'members') {
            QuestionnaireMember::create($request->all());
        }
        elseif ($request->type == 'beneficiaries') {
            QuestionnaireBeneficiar::create($request->all());
        }
        
        Alert::success(trans('تم أرسال التقييم بنجاح'), trans('flash.store.body'));
        return redirect()->back();


    }
}
