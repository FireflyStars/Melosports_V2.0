@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.faq-categories.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.faq-categories.fields.title')</th>
                            <td>{{ $faq_category->title }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#faqquestions" aria-controls="faqquestions" role="tab" data-toggle="tab">Questions</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="faqquestions">
<table class="table table-bordered table-striped {{ count($faq_questions) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.faq-questions.fields.category')</th>
                        <th>@lang('quickadmin.faq-questions.fields.question-text')</th>
                        <th>@lang('quickadmin.faq-questions.fields.answer-text')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($faq_questions) > 0)
            @foreach ($faq_questions as $faq_question)
                <tr data-entry-id="{{ $faq_question->id }}">
                    <td>{{ $faq_question->category->title or '' }}</td>
                                <td>{!! $faq_question->question_text !!}</td>
                                <td>{!! $faq_question->answer_text !!}</td>
                                <td>
                                    @can('faq_question_view')
                                    <a href="{{ route('admin.faq_questions.show',[$faq_question->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('faq_question_edit')
                                    <a href="{{ route('admin.faq_questions.edit',[$faq_question->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('faq_question_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.faq_questions.destroy', $faq_question->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.faq_categories.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop