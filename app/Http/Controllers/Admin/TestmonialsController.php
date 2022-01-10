<?php

namespace App\Http\Controllers\Admin;

use App\FaqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFaqQuestionsRequest;
use App\Http\Requests\Admin\UpdateFaqQuestionsRequest;
Use App\Testmonials;
class TestmonialsController extends Controller
{
    /**
     * Display a listing of FaqQuestion.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('faq_question_access')) {
            return abort(401);
        }

        $user = Testmonials::whereis_status(0)->get();

        return view('admin.testimonials.index', compact('user'));
    }

    /**
     * Show the form for creating new FaqQuestion.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('faq_question_create')) {
            return abort(401);
        }
       // $categories = \App\FaqCategory::get()->pluck('title', 'id')->prepend('Please select', '');

        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created FaqQuestion in storage.
     *
     * @param  \App\Http\Requests\StoreFaqQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('faq_question_create')) {
            return abort(401);
        }
        $faq_question = Testmonials::create($request->all());



        return redirect()->route('admin.testimonials.index');
    }


    /**
     * Show the form for editing FaqQuestion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('faq_question_edit')) {
            return abort(401);
        }
       // $categories = \App\FaqCategory::get()->pluck('title', 'id')->prepend('Please select', '');

        $faq_question = Testmonials::findOrFail($id);

        return view('admin.testimonials.edit', compact('faq_question'));
    }

    /**
     * Update FaqQuestion in storage.
     *
     * @param  \App\Http\Requests\UpdateFaqQuestionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('faq_question_edit')) {
            return abort(401);
        }
        $faq_question = Testmonials::findOrFail($id);
        $faq_question->update($request->all());



        return redirect()->route('admin.testimonials.index');
    }


    /**
     * Display FaqQuestion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('faq_question_view')) {
            return abort(401);
        }
        $faq_question = Testmonials::findOrFail($id);

        return view('admin.testimonials.show', compact('faq_question'));
    }


    /**
     * Remove FaqQuestion from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('faq_question_delete')) {
            return abort(401);
        }
        $faq_question = Testmonials::findOrFail($id);
        $faq_question->is_status=1;
		$faq_question->save();

        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Delete all selected FaqQuestion at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('faq_question_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = FaqQuestion::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
              $faq_question->is_status=1;
		$faq_question->save();
            }
        }
    }

}
