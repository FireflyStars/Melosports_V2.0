@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contacts.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.company')</th>
                            <td>{{ $contact->company->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.first-name')</th>
                            <td>{{ $contact->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.last-name')</th>
                            <td>{{ $contact->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.phone1')</th>
                            <td>{{ $contact->phone1 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.phone2')</th>
                            <td>{{ $contact->phone2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.email')</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.skype')</th>
                            <td>{{ $contact->skype }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacts.fields.address')</th>
                            <td>{{ $contact->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contacts.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop