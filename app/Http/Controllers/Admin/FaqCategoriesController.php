<?php

namespace App\Http\Controllers\Admin;

use App\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFaqCategoriesRequest;
use App\Http\Requests\Admin\UpdateFaqCategoriesRequest;

class FaqCategoriesController extends Controller
{
    /**
     * Display a listing of FaqCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('faq_category_access')) {
            return abort(401);
        }

        $faq_categories = FaqCategory::all();

        return view('admin.faq_categories.index', compact('faq_categories'));
    }

    /**
     * Show the form for creating new FaqCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('faq_category_create')) {
            return abort(401);
        }
        return view('admin.faq_categories.create');
    }

    /**
     * Store a newly created FaqCategory in storage.
     *
     * @param  \App\Http\Requests\StoreFaqCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqCategoriesRequest $request)
    {
        if (! Gate::allows('faq_category_create')) {
            return abort(401);
        }
        $faq_category = FaqCategory::create($request->all());



        return redirect()->route('admin.faq_categories.index');
    }


    /**
     * Show the form for editing FaqCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('faq_category_edit')) {
            return abort(401);
        }
        $faq_category = FaqCategory::findOrFail($id);

        return view('admin.faq_categories.edit', compact('faq_category'));
    }

    /**
     * Update FaqCategory in storage.
     *
     * @param  \App\Http\Requests\UpdateFaqCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqCategoriesRequest $request, $id)
    {
        if (! Gate::allows('faq_category_edit')) {
            return abort(401);
        }
        $faq_category = FaqCategory::findOrFail($id);
        $faq_category->update($request->all());



        return redirect()->route('admin.faq_categories.index');
    }


    /**
     * Display FaqCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('faq_category_view')) {
            return abort(401);
        }
        $faq_questions = \App\FaqQuestion::where('category_id', $id)->get();

        $faq_category = FaqCategory::findOrFail($id);

        return view('admin.faq_categories.show', compact('faq_category', 'faq_questions'));
    }


    /**
     * Remove FaqCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('faq_category_delete')) {
            return abort(401);
        }
        $faq_category = FaqCategory::findOrFail($id);
         if(!env('DEMO_MODE')) {
        $faq_category->delete();
       }

        return redirect()->route('admin.faq_categories.index');
    }

    /**
     * Delete all selected FaqCategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('faq_category_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = FaqCategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                 if(!env('DEMO_MODE')) {
                $entry->delete();
              }
            }
        }
    }

}
