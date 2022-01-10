@include('website.user.header')


@include('website.user.menu1')

<div class="page_container">

	<div class="container" style="padding-top:10px">
	
			 <span id="left_credit_point" style="color:red"> </span>

			@include('website.user.edit_criteria')
 
	
		<div class="dd3">
		
			@include('website.user.edit_player_select')

			 
			
			 

			@include('website.user.edit_active_player')

			 	
				
		</div>	
		
	</div>
     
</div>
    <!--//page_container-->		
	<script>  
	var batsman=0;
var bowler=0;
var allrounder=0;
var wicketkeeper=0;

  
var credit=100;



	$(".select_tick").each(function(){	
	
	if($(this).hasClass('active'))
	{
	var pid=  $(this).closest('tr').find('#pid').val();
	var pname=$(this).closest('tr').find('#pname').val();
    var pteamname=$(this).find('#pteamname').val();	
	var prole=$(this).closest('tr').find('#prole').val(); 
	//var matchid=$(this).closest('tr').find('#matchid').val(); 
	var matchid=$(this).closest('tr').find('#match_id').val();
	var teamno=$(this).closest('tr').find('#team_no').val(); 
	var credit_point=$(this).closest('tr').find('#credit_point').val(); 
	 var type=$(this).closest('tr').find('#player_type').val();
	
	if((type=="batsman"))
	{
	credit -= credit_point;
    batsman++;
	count_batsman(pid,pname,pteamname,prole,matchid,teamno);
	}
	else if((type=="bowler"))
	{
	credit -= credit_point;
    bowler++;
	count_bowler(pid,pname,pteamname,prole,matchid,teamno);
	}
	else if((type=="allrounder"))
	{
	credit -= credit_point;
	allrounder++;
	count_allrounder(pid,pname,pteamname,prole,matchid,teamno);
	}
	else if((type=="wicketkeeper"))
	{
	credit -= credit_point;
	wicketkeeper++;
	count_wicketkeeper(pid,pname,pteamname,prole,matchid,teamno);
	}
	else 
	{
	credit -= credit_point;
    batsman++;
	count_batsman(pid,pname,pteamname,prole,matchid,teamno);
	}
		
	}
	$('#left_credit_point').text(credit); 
	credit_new=credit
	});
	
	
	$(".select_tick").click(function(){	
	var pid=$(this).closest('tr').find('#pid').val();
 var pname=$(this).closest('tr').find('#pname').val();
 var pteamname=$(this).closest('tr').find('#pteamname').val();
 var prole=$(this).closest('tr').find('#prole').val();  
 var matchid=$(this).closest('tr').find('#match_id').val();
 var teamno=$(this).closest('tr').find('#team_no').val();
 var type=$(this).closest('tr').find('#player_type').val();
 
 var credit_point=$(this).closest('tr').find('#credit_point').val();

 //console.log(credit_point); 
//console.log(credit); 


 if((type=="batsman") && ($(this).hasClass("inactive")) && credit_new > 0 )
 {
	 //credit -= credit_point;
//	console.log(credit);
	
		
		
		if(allrounder<=3 && batsman<=2 && bowler<=4 && credit_new > 0)
		{
			
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			//batsman.blade.php
		
		 $('#batide'+pid).show();
		 $('#batid_bate'+pid).show();
		$('#batsmanide'+pid).removeClass("inactive").addClass("active");
		$('#batsman_ide'+pid).removeClass("inactive").addClass("active");
			credit_new -= credit_point;
			//credit1 = credit-credit_point;
			//console.log(credit1);
			batsman++;
			count_batsman(pid,pname,pteamname,prole,matchid,teamno);
		}
		 else if(allrounder<=3 && batsman<=3 && bowler<=3 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			//batsman.blade.php
		
		 $('#batide'+pid).show();
		 $('#batid_bate'+pid).show();
		$('#batsmanide'+pid).removeClass("inactive").addClass("active");
		$('#batsman_ide'+pid).removeClass("inactive").addClass("active");
			credit_new -= credit_point;
			batsman++;
			count_batsman(pid,pname,pteamname,prole,matchid,teamno);
		} 
		else if(allrounder<=2 && batsman<=3 && bowler<=4 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			//batsman.blade.php
		
		 $('#batide'+pid).show();
		 $('#batid_bate'+pid).show();
		$('#batsmanide'+pid).removeClass("inactive").addClass("active");
		$('#batsman_ide'+pid).removeClass("inactive").addClass("active");
			credit_new -= credit_point;
			batsman++;
			count_batsman(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(allrounder<=1 && batsman<=4 && bowler<=4 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			//batsman.blade.php
		
		 $('#batide'+pid).show();
		 $('#batid_bate'+pid).show();
		$('#batsmanide'+pid).removeClass("inactive").addClass("active");
		$('#batsman_ide'+pid).removeClass("inactive").addClass("active");
			credit_new -= credit_point;
			batsman++;
			count_batsman(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(allrounder<=2 && batsman<=4 && bowler<=3 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			//batsman.blade.php
		
		 $('#batide'+pid).show();
		 $('#batid_bate'+pid).show();
		$('#batsmanide'+pid).removeClass("inactive").addClass("active");
		$('#batsman_ide'+pid).removeClass("inactive").addClass("active");
			credit_new -= credit_point;
			batsman++;
			count_batsman(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(allrounder<=2 && batsman<=2 && bowler<=5 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			//batsman.blade.php
		
		 $('#batide'+pid).show();
		 $('#batid_bate'+pid).show();
		$('#batsmanide'+pid).removeClass("inactive").addClass("active");
		$('#batsman_ide'+pid).removeClass("inactive").addClass("active");
			credit_new -= credit_point;
			batsman++;
			count_batsman(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(allrounder<=1 && batsman<=3 && bowler<=5 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			//batsman.blade.php
		
		 $('#batide'+pid).show();
		 $('#batid_bate'+pid).show();
		$('#batsmanide'+pid).removeClass("inactive").addClass("active");
		$('#batsman_ide'+pid).removeClass("inactive").addClass("active");
			credit_new -= credit_point;
			batsman++;
			count_batsman(pid,pname,pteamname,prole,matchid,teamno);
		}
		else
		{
			console.log('max 5 batsman');
			//batsman--;
			//credit =parseInt(credit) +parseInt(credit_point);
		}
 }
 
 
else if((type=="bowler") && ($(this).hasClass("inactive")) && credit_new > 0 )
 {
		console.log(bowler);
		console.log(batsman);
		if(allrounder<=3 && batsman<=3 && bowler<=3 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			bowler++;
			count_bowler(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(allrounder<=3 && batsman<=4 && bowler<=2 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			bowler++;
			count_bowler(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(allrounder<=2 && batsman<=4 && bowler<=3 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			bowler++;
			count_bowler(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(allrounder<=1 && batsman<=5 && bowler<=3 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			bowler++;
			count_bowler(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(allrounder<=1 && batsman<=4 && bowler<=4 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			bowler++;
			count_bowler(pid,pname,pteamname,prole,matchid,teamno);
		} 
		else if(allrounder<=2 && batsman<=3 && bowler<=4 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			console.log('sdfsdf');
			bowler++;
			count_bowler(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(allrounder<=2 && batsman<=5 && bowler<=2 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			bowler++;
			count_bowler(pid,pname,pteamname,prole,matchid,teamno);
		}
		else
		{
			console.log('select atleast one all rounder');
			//bowler--;
		//	credit =parseInt(credit) +parseInt(credit_point);
		}
 }
 
else if((type=="allrounder") && ($(this).hasClass("inactive")) && credit_new > 0 )
 {
		
	if(batsman<=5 && bowler<=3 && allrounder<=1 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			allrounder++;
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(batsman<=3 && bowler<=5 && allrounder<=1 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			allrounder++;
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno);
		}
		 else if(batsman<=4 && bowler<=3 && allrounder<=2 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			allrounder++;
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(batsman<=3 && bowler<=4 && allrounder<=2 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			allrounder++;
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno);
		} 
		else if(batsman<=5 && bowler<=4 && allrounder<=0 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			allrounder++;
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno);
		}
		else if(batsman<=4 && bowler<=5 && allrounder<=0 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			allrounder++;
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno);
		}
		else
		{
			console.log('maximum 3 all rounder');
			//allrounder--;
		//	credit =parseInt(credit) +parseInt(credit_point);
		}
 }

 else if((type=="wicketkeeper") && ($(this).hasClass("inactive")) && credit > 0 )
 {
		
		if(wicketkeeper==0 && credit_new > 0)
		{
			$(this).removeClass("inactive").addClass("active");
			$(this).find('.tick').show();
			credit_new -= credit_point;
			wicketkeeper++;
			count_wicketkeeper(pid,pname,pteamname,prole,matchid,teamno);
		}
		else
		{
		//	credit =parseInt(credit) +parseInt(credit_point);
			console.log('max 1 wk ');
		//	wicketkeeper--;
			
			
		}
 } 
 else
 {
	 if((type=="batsman") && ($(this).hasClass("active")))
	 {
		$(this).removeClass("active").addClass("inactive");
		$(this).find('.tick').hide();	
credit_new =parseFloat(credit_new) +parseFloat(credit_point);
//batsman.blade.php
		
		 $('#batide'+pid).hide();
		 $('#batid_bate'+pid).hide();
		$('#batsmanide'+pid).removeClass("active").addClass("inactive");		
		$('#batsman_ide'+pid).removeClass("active").addClass("inactive");

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
		
$("#plid"+pid).remove();
$("#batapp").append("<div class='palyer_icon' id='rembat"+batsman+"'><div class='palyer_img' id='batsman"+batsman+"'><img  src='{{url('public/site/image/batsman.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='batsmanp"+batsman+"' value=''><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='batsmanpname"+batsman+"' value=''>	</div>		</div>");
		
		count_batsman_hide(pid,matchid,teamno);
	 }
	 else if((type=="bowler") && ($(this).hasClass("active")))
	 {
		 $(this).removeClass("active").addClass("inactive");
		 credit_new =parseFloat(credit_new) +parseFloat(credit_point);
		$(this).find('.tick').hide();
		count_bowler_hide(pid,matchid,teamno);
	 }
	else if((type=="allrounder") && ($(this).hasClass("active")))
	 {
		  $(this).removeClass("active").addClass("inactive");
		  credit_new =parseFloat(credit_new) +parseFloat(credit_point);
		$(this).find('.tick').hide();
		count_allrounder_hide(pid,matchid,teamno);
	 }
	else if((type=="wicketkeeper") && ($(this).hasClass("active")))
	 {
		 $(this).removeClass("active").addClass("inactive");
		 credit_new =parseFloat(credit_new) +parseFloat(credit_point);
		$(this).find('.tick').hide();
		count_wicketkeeper_hide(pid,matchid,teamno);
	 }
	
		 
		 
	  
	 
 }
/* 	 
 if(type=="batsman")
 {
 count_batsman();
 }
 else if(type=="bowler")
 {
 count_blower();
 }
 else if(type=="allrounder")
 {
 count_allrounder();
 }
else if(type=="wicketkeeper")
 {
 count_wicketkeeper();
 }
  */
  $('#left_credit_point').text(credit_new); 
});
	
	
 
	
//console.log(credit);
function count_batsman_hide(matchid,teamno,pid)
{
	
	/* var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		}); */

/* $("#batsman"+batsman).empty();
$("#batsman"+batsman).append("<img  src='{{url('public/site/image/batsman.png')}}'>");
$("#batsmanp"+batsman).val('');
$("#batsmanpname"+batsman).val('');
$("#batsman"+batsman).removeClass("pactive"); */
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);

//captain select

$("#player_batting_c"+batsman).css('display','none');
$("#captain_id_batting_c"+batsman).val('');
$("#captain_name_batting_c"+batsman).val('');
$("#view_player_name_batting_c"+batsman).text('');
$("#view_player_team_name_batting_c"+batsman).text('');

// end

// vice captain  select

$("#player_batting_vc"+batsman).css('display','none');
$("#captain_id_batting_vc"+batsman).val('');
$("#captain_name_batting_vc"+batsman).val('');
$("#view_player_name_batting_vc"+batsman).text('');
$("#view_player_team_name_batting_vc"+batsman).text('');

// end

if(pcount!=11)
{
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
}
//credit =parseInt(credit) + parseInt(credit_point);
 batsman--;
 
 //console.log(credit);
}
function count_batsman(pid,pname,pteamname,prole,matchid,teamno)
{

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});

/* $("#batsman"+batsman).empty();
$("#batsman"+batsman).append("<img  src='{{url('public/site/image/in_bat.png')}}'>");
$("#batsmanp"+batsman).val(pid);
$("#batsmanpname"+batsman).val(pname);
$("#batsman"+batsman).addClass("pactive"); */

$("#rembat"+batsman).remove();
$("#batapp").append("<div class='palyer_icon' id='plid"+pid+"'><div class='palyer_img pactive'><img  src='{{url('public/site/image/in_bat.png')}}'></div><div><input type='hidden' name='playersid[]' id='batsmanp' value='"+pid+"'><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='batsmanpname' value='"+pname+"'></div></div>");

var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
 
//captain select
// console.log(credit);
$("#player_batting_c"+batsman).css('display','block');
$("#captain_id_batting_c"+batsman).val(pid);
$("#captain_name_batting_c"+batsman).val(pname);
$("#view_player_name_batting_c"+batsman).text(pname);
$("#view_player_team_name_batting_c"+batsman).text(pteamname);

//end
 //vice captain select
 
$("#player_batting_vc"+batsman).css('display','block');
$("#captain_id_batting_vc"+batsman).val(pid);
$("#captain_name_batting_vc"+batsman).val(pname);
$("#view_player_name_batting_vc"+batsman).text(pname);
$("#view_player_team_name_batting_vc"+batsman).text(pteamname);

//end
 
if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
}

//credit -= credit_point;
}
function count_bowler_hide(matchid,teamno,pid)
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});

$("#bowler"+bowler).empty();
$("#bowler"+bowler).append("<img  src='{{url('public/site/image/bowler.png')}}'>");
$("#bowlerp"+bowler).val('');
$("#bowlerpname"+bowler).val('');
$("#bowler"+bowler).removeClass("pactive");
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);


if(pcount!=11)
{
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
}


//captain select
 
$("#player_bowler_c"+bowler).css('display','none');
$("#captain_id_bowler_c"+bowler).val('');
$("#captain_name_bowler_c"+bowler).val('');
$("#view_player_name_bowler_c"+bowler).text('');
$("#view_player_team_name_bowler_c"+bowler).text('');

//end
//vice captain select
 
$("#player_bowler_vc"+bowler).css('display','none');
$("#captain_id_bowler_vc"+bowler).val('');
$("#captain_name_bowler_vc"+bowler).val('');
$("#view_player_name_bowler_vc"+bowler).text('');
$("#view_player_team_name_bowler_vc"+bowler).text('');

//end
//credit =parseInt(credit) + parseInt(credit_point);
 bowler--;
 
}
function count_bowler(pid,pname,pteamname,prole,matchid,teamno)
{
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
$("#bowler"+bowler).empty();
$("#bowler"+bowler).append("<img  src='{{url('public/site/image/in_bow.png')}}'>");
$("#bowlerp"+bowler).val(pid);
$("#bowlerpname"+bowler).val(pname);
$("#bowler"+bowler).addClass("pactive");
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);

//captain select
 
$("#player_bowler_c"+bowler).css('display','block');
$("#captain_id_bowler_c"+bowler).val(pid);
$("#captain_name_bowler_c"+bowler).val(pname);
$("#view_player_name_bowler_c"+bowler).text(pname);
$("#view_player_team_name_bowler_c"+bowler).text(pteamname);

//end

//vice captain select
 
$("#player_bowler_vc"+bowler).css('display','block');
$("#captain_id_bowler_vc"+bowler).val(pid);
$("#captain_name_bowler_vc"+bowler).val(pname);
$("#view_player_name_bowler_vc"+bowler).text(pname);
$("#view_player_team_name_bowler_vc"+bowler).text(pteamname);

//end


if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
}
//credit -= credit_point;
}
function count_allrounder_hide(matchid,teamno,pid)
{
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});

$("#allrounder"+allrounder).empty();
$("#allrounder"+allrounder).append("<img  src='{{url('public/site/image/all_rounder.png')}}'>");
$("#allrounderp"+allrounder).val('');
$("#allrounderpname"+allrounder).val('');
$("#allrounder"+allrounder).removeClass("pactive");
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);

//captain select
 
$("#player_allrounder_c"+allrounder).css('display','none');
$("#captain_id_allrounder_c"+allrounder).val('');
$("#captain_name_allrounder_c"+allrounder).val('');
$("#view_player_name_allrounder_c"+allrounder).text('');
$("#view_player_team_name_allrounder_c"+allrounder).text('');

//end
//vice captain select
 
$("#player_allrounder_vc"+allrounder).css('display','none');
$("#captain_id_allrounder_vc"+allrounder).val('');
$("#captain_name_allrounder_vc"+allrounder).val('');
$("#view_player_name_allrounder_vc"+allrounder).text('');
$("#view_player_team_name_allrounder_vc"+allrounder).text('');

//end


if(pcount!=11)
{
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
}
//credit =parseInt(credit) + parseInt(credit_point);
 allrounder--;
 
}
function count_allrounder(pid,pname,pteamname,prole,matchid,teamno)
{
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
$("#allrounder"+allrounder).empty();
$("#allrounder"+allrounder).append("<img  src='{{url('public/site/image/in_all.png')}}'>");
$("#allrounderp"+allrounder).val(pid);
$("#allrounderpname"+allrounder).val(pname);
$("#allrounder"+allrounder).addClass("pactive");
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);

//captain select
 
$("#player_allrounder_c"+allrounder).css('display','block');
$("#captain_id_allrounder_c"+allrounder).val(pid);
$("#captain_name_allrounder_c"+allrounder).val(pname);
$("#view_player_name_allrounder_c"+allrounder).text(pname);
$("#view_player_team_name_allrounder_c"+allrounder).text(pteamname);

//end
//vice captain select
 
$("#player_allrounder_vc"+allrounder).css('display','block');
$("#captain_id_allrounder_vc"+allrounder).val(pid);
$("#captain_name_allrounder_vc"+allrounder).val(pname);
$("#view_player_name_allrounder_vc"+allrounder).text(pname);
$("#view_player_team_name_allrounder_vc"+allrounder).text(pteamname);

//end

if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
}
//credit -= credit_point;
}
function count_wicketkeeper_hide(matchid,teamno,pid)
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});

$("#wicketkeeper"+wicketkeeper).empty();
$("#wicketkeeper"+wicketkeeper).append("<img  src='{{url('public/site/image/wk.png')}}'>");
$("#wicketkeeperp"+wicketkeeper).val('');
$("#wicketkeeperpname"+wicketkeeper).val('');
$("#wicketkeeper"+wicketkeeper).removeClass("pactive");
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);

//captain select
 
$("#player_wicketkeeper_c"+wicketkeeper).css('display','none');
$("#captain_id_wicketkeeper_c"+wicketkeeper).val('');
$("#captain_name_wicketkeeper_c"+wicketkeeper).val('');
$("#view_player_name_wicketkeeper_c"+wicketkeeper).text('');
$("#view_player_team_name_wicketkeeper_c"+wicketkeeper).text('');

//end
//vice captain select
 
$("#player_wicketkeeper_vc"+wicketkeeper).css('display','none');
$("#captain_id_wicketkeeper_vc"+wicketkeeper).val('');
$("#captain_name_wicketkeeper_vc"+wicketkeeper).val('');
$("#view_player_name_wicketkeeper_vc"+wicketkeeper).text('');
$("#view_player_team_name_wicketkeeper_vc"+wicketkeeper).text('');

//end


if(pcount!=11)
{
	
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
}
//credit =parseInt(credit) + parseInt(credit_point);
 wicketkeeper--;

}
function count_wicketkeeper(pid,pname,pteamname,prole,matchid,teamno)
{
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
$("#wicketkeeper"+wicketkeeper).empty();
$("#wicketkeeper"+wicketkeeper).append("<img  src='{{url('public/site/image/in_wk.png')}}'>");
$("#wicketkeeperp"+wicketkeeper).val(pid);
$("#wicketkeeperpname"+wicketkeeper).val(pname);
$("#wicketkeeper"+wicketkeeper).addClass("pactive");
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);

//captain select
 
$("#player_wicketkeeper_c"+wicketkeeper).css('display','block');
$("#captain_id_wicketkeeper_c"+wicketkeeper).val(pid);
$("#captain_name_wicketkeeper_c"+wicketkeeper).val(pname);
$("#view_player_name_wicketkeeper_c"+wicketkeeper).text(pname);
$("#view_player_team_name_wicketkeeper_c"+wicketkeeper).text(pteamname);

//end
//vice captain select
 
$("#player_wicketkeeper_vc"+wicketkeeper).css('display','block');
$("#captain_id_wicketkeeper_vc"+wicketkeeper).val(pid);
$("#captain_name_wicketkeeper_vc"+wicketkeeper).val(pname);
$("#view_player_name_wicketkeeper_vc"+wicketkeeper).text(pname);
$("#view_player_team_name_wicketkeeper_vc"+wicketkeeper).text(pteamname);

//end

if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
}
//credit -= credit_point;

}

	
	
	</script>
	
	
	
	
	
	
	
	
	
	{{-- @include('website.user.footer') --}}
	
	
	 <!--footer-->
    <div id="footer">
    	<div class="wrap">
    		<div class="container">
            	<div class="row">
                	<div class="col-md-3">
                    	<h4 class="title">Latest tweets</h4>
						
						 <ul>
                        	<li>
                            	<a href="#">home</a>
								
                            </li>
                            <li>
                            <a href="#">about</a>
                            </li>
							 <li>
                          <a href="#">faculties</a>
                            </li>
							 <li>
                            <a href="#">gallery</a>
                            </li>
							 <li>
								<a href="#">contact</a>
                            </li>
                        </ul>     
                        <div class="tweet_block"></div>                       
                    </div>
                    
                    <div class="col-md-3">
                    	<h4 class="title">Testimonials</h4>
                        <ul>
                        	<li>
                            	<a href="#">home</a>
								
                            </li>
                            <li>
                            <a href="#">about</a>
                            </li>
							 <li>
                          <a href="#">faculties</a>
                            </li>
							 <li>
                            <a href="#">gallery</a>
                            </li>
							 <li>
								<a href="#">contact</a>
                            </li>
                        </ul>                  
                    </div>
                    <div class="col-md-3">
                    	  	<h4 class="title">Testimonials</h4>
                        <ul>
                        	<li>
                            	<a href="#">home</a>
								
                            </li>
                            <li>
                            <a href="#">about</a>
                            </li>
							 <li>
                          <a href="#">faculties</a>
                            </li>
							 <li>
                            <a href="#">gallery</a>
                            </li>
							 <li>
								<a href="#">contact</a>
                            </li>
                        </ul>     
                    </div>  

					<div class="col-md-3">
                    	<h4 class="title">Get in touch!</h4>
                        <ul>
                        	<li>
                            	<a href="#">home</a>
								
                            </li>
                            <li>
                            <a href="#">about</a>
                            </li>
							 <li>
                          <a href="#">faculties</a>
                            </li>
							 <li>
                            <a href="#">gallery</a>
                            </li>
							 <li>
								<a href="#">contact</a>
                            </li>
                        </ul>     
                    </div> 
					
            	</div>
        	</div>            
        </div>

    </div>
    <!--//footer-->    

	
	
 <script src="{{ url('public/site/js/jquery.min.js') }}"></script> 
 
 
 
 
<script src="{{ url('public/site/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/site/js/bootstrapvalidator.min.js') }}"></script>

<!--<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		  
 <script type="text/javascript">
$(document).ready(function(){
    
	$(function() {	
        $( ".win_list" ).click(function() {
            $( ".win_tab" ).toggle();
			
			
            
        });
		
    });
	
	$(function() {	
	 $( "#select_team" ).click(function() {
            $( "#team_drapdown" ).show();
            $( "#select_team" ).hide();	
            
        });
	  });
	
});
</script>-->

<!-- BridgeSlide Start -->

	<!--<script src="{{ url('public/site/js/jquery.bridgeSlide.js') }}"></script>
	
	
		<script type="text/javascript">
		
		jQuery(document).ready(function() {
			$('#bridgeSlide').bridgeSlide({
				width: 700,
				visibleItems: 4,
				itemMargin: 6
			});
		});
		
		</script>-->
		
		<script src="{{ url('public/site/js/slide/slidejquery.min.js') }}"></script>

		 <script type="text/javascript" src="{{ url('public/site/js/slide/camera.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/site/s/slide/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/site/js/slide/jquery.jcarousel.js') }}"></script>
    <script type="text/javascript">
		$(document).ready(function(){	
			//Slider
			$('#camera_wrap_1').camera();
			
			//Featured works & latest posts
			$('#mycarousel, #mycarousel2, #newscarousel').jcarousel();													
		});		
	</script>
		
		
		
		

    <script src="{{ url('public/site/js/index.js') }}"></script>
    
	