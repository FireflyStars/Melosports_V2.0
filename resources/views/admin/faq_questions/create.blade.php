@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.faq-questions.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.faq_questions.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question', 'Question*', ['class' => 'control-label']) !!}
						 {!! Form::text('questions', old('questions'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
            </div>
         <!--   <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('answer', 'Answer*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('answer', old('answer'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question_text'))
                        <p class="help-block">
                            {{ $errors->first('question_text') }}
                        </p>
                    @endif
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('answer_text', 'Answer*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('answer', old('answer'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('answer_text'))
                        <p class="help-block">
                            {{ $errors->first('answer_text') }}
                        </p>
                    @endif
                </div>
            </div>
			<input type="hidden" class="form-control" name="is_status" value="0">
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

