@extends('layouts.app')

@section('content')

<div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">FAQ</li>
     </ul>
   </div> 

   <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6 lr-title-user">
      <h3 class="page-title">FAQ</h3>
    </div> 

    <div class="col-md-6 col-sm-6 col-xs-6 lr-add_new clearfix">
    @can('faq_question_create')
     <p class="lr-add"> <a href="{{ route('admin.faq_questions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a> </p>
    @endcan
    </div>     
   </div>
   <!-- breadcrumb section -->

   

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body lr-table table-responsive">
            <table class="table table-bordered table-striped {{ count($faq_questions) > 0 ? 'datatable' : '' }} @can('faq_question_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('faq_question_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>Question</th>
                        <th>Answer</th>
                    <!--    <th>@lang('quickadmin.faq-questions.fields.answer-text')</th> -->
                        <th width="380px">&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($faq_questions) > 0)
                        @foreach ($faq_questions as $faq_question)
                            <tr data-entry-id="{{ $faq_question->id }}">
                                @can('faq_question_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $faq_question->questions }}</td>
                                <td>{!! $faq_question->answer !!}</td>
                            <!--    <td>{!! $faq_question->answer_text !!}</td> -->
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
@stop

@section('javascript') 
    <script>
        @can('faq_question_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.faq_questions.mass_destroy') }}';
        @endcan

    </script>
@endsection