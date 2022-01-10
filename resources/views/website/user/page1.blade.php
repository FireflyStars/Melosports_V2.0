

@include('website.user.header')


@include('website.user.menu1')

<div class="cd-main-content sub-nav">

	<div class="container" style="padding-top:10px">
 <br>
 @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
@if ($messages = Session::get('match_success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $messages }} </strong>
</div>
@endif
@if ($messages = Session::get('match_fail'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $messages }} </strong>
</div>
@endif
				@include('website.user.match')

				
				@include('website.user.friends')

			<div class="row">
			
				<div class="col_contest">	
				{{--@include('website.user.create_team')--}}
					<div id='contest-ajax1'>
					 @include('website.user.contest')
					
				</div>
				</div>
				
			</div>
		
		</div>
     
    </div>
    <!--//page_container-->
	
	
@include('website.user.footer')


