@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">	 <?php  $site=App\SiteSetting::findorfail(1)?>
       <li><a href="#"><i class="fa fa-home"></i>{{$site->site_name}}  Point System</a></li>
       <li class="active">Edit</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Publish Upcoming Matches</h3>
    </div>     
   </div>
	{{--  @can('income_create')
    <p>
      <a href="{{ route('admin.incomes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan  --}}
    @include('admin.flash')
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body lr-table table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th>Match Id</th>
                        <th>Date </th>
                        <th>Team 1</th>
                        <th>Team 2</th>
                        <th>Match Type</th>
                        <th>Match Start</th>
                        <th>Squad Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php($pay_apikey=App\SocialSetting::findorfail(1))
@php($api=$pay_apikey->cric_api_key)
                <tbody>
                <?php  
   
   $cricketMatchesTxt = file_get_contents('http://apizipper.com/api/matchlists/?apikey='.$api.'&v=2');
   $cricketMatches = json_decode($cricketMatchesTxt); 

    ?>
       @if (isset($cricketMatches->data))
                        @foreach ($cricketMatches->data as $match_list)
					<?php 
					$datechk=substr($match_list->date,0,10);
					$today=date('Y-m-d');
					if($datechk >= $today)
					{

					?>
                        
                          <tr>
                                <td>{{ $match_list->unique_id }}</td>
                                <td>{{ $match_list->dateTimeGMT }}</td>
                                <td><?php echo $match_list->team_1 ?></td>
                                <td><?php echo $match_list->team_2 ?></td>
                                <td><?php echo $match_list->type  ?></td>
                                @if(array_key_exists('matchStarted',$match_list))
                                <td>@if($match_list->matchStarted==1) YES @else NO @endif  </td>
                                
                            @else
                         <td> Yes  </td>
                            @endif
                            <td>@if($match_list->apizipper_squad==1) YES @else NO @endif  </td>
                                <td>
                                 @can('matches_view')
                                 <form method="post" action="{{URL::to('admin/match-contest-publish')}}" >
                                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  <input type="hidden" value="{{$match_list->unique_id}}" name="unique_id">
                                 <input type="hidden" value="{{$match_list->dateTimeGMT}}" name="date">
                                 <input type="hidden" value="<?php echo $match_list->team_1 ?>" name="team_1">
                                 <input type="hidden" value="<?php echo $match_list->team_2 ?>" name="team_2">
                                 <input type="hidden" value="<?php echo $match_list->type ?>" name="match_type">
                                @php($match=App\Match::whereunique_id($match_list->unique_id)->first())
                            @if($match_list->apizipper_squad!=1)
								<a  class="btn btn-xs btn-danger" >Squad Unknown</a>
							
							@elseif(!$match)                                
                                 <button  class="btn btn-xs btn-primary">Publish</button>@else
                                 <a  class="btn btn-xs btn-danger" >Already Published</a>@endif
                                 </form>
                                 {{--  <a href="{{ url('admin/match-contest-publish',[$match_list->unique_id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>--}}
                                    @endcan
                                    {{--  @can('matches_edit')
                                    <a href="{{ url('match-list-publish',$match_list->unique_id) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan --}}
                                   {{--  @can('matches_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.incomes.destroy', $income->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan --}}
                                </td>
                            </tr>
                        
					<?php  } ?>
						@endforeach
                        @endif
                     
                  
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('income_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.incomes.mass_destroy') }}';
        @endcan

    </script>
@endsection