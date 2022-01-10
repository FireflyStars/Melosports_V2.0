@extends('layouts.app')

@section('content')
    <h3 class="page-title">Show Testimonial</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        
                        <tr>
                            <th>Name</th>
                            <td>{!! $faq_question->name !!}</td>
                        </tr>
                        <tr>
                            <th>Testimonial</th>
                            <td>{!! $faq_question->description !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop