@include('website.user.header')


@include('website.user.menu1')

<div class="page_container">

	<div class="container" style="padding-top:10px">
	
			@include('website.user.edit_criteria')
 
	
		<div class="dd3">
		<div class="alert alert-danger  alert-block error_test" hidden>
 <button type="button" class="close"  data-dismiss="alert">×</button>
        <strong></strong>
		</div>
		@if($user_team->replace_player)
			
@php($repl_player=DB::table('fantasy_team_players')->whereplayer_id($user_team->replace_player)->wherematch_id($user_team->match_id)->first())
		<script>
				
					$( document ).ready(function() {
    $("#replace_player li").parents('.drpselected').find('.dropdown-toggle').html('<input type="hidden" name="selected_replace_player_id" id="selected_replace_player_id" value="<?php echo $user_team->replace_player; ?>"><input type="hidden" name="selected_credit_point" id="selected_credit_point" value="<?php echo $repl_player->credit_point; ?>"><?php echo $repl_player->player_name; ?> <span class="caret"></span>');
});

</script>
@endif




			@include('website.user.edit_player_select')

			 
			
			 

			@include('website.user.edit_active_player')

			 	
				
		</div>	
		
	</div>
     
</div>
  
  
  
  
<!-- edit team -->
<script>
var batsman=0;
var bowler=0;
var allrounder=0;
var wicketkeeper=0;

<?php 
$ref=Session::get('unique_id');
$query=DB::table('matches')->whereunique_id($ref)->first(); ?>
  var team_name1="<?php echo $query->team_1 ?>";
  var team_name2="<?php echo $query->team_2 ?>";
  var c_team_name1=0;
  var c_team_name2=0;
  
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
	var epid=$(this).closest('tr').find('#epid').val();
	//var id='edit'+pid;
	console.log(epid);
if( (type=="batsman") && (epid=='editbatsman'+pid))
	{
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
	credit -= credit_point;
    batsman++;
	 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
	
	$("#batsman_count_total").text('('+batsman+')');
	count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
	}
	if( (type=="batsman"))
	{
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
	//credit -= credit_point;
   // batsman++;
	//count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
	}
	else if((type=="bowler") && (epid=='editbowler'+pid))
	{
		//alert('dd');
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
	credit -= credit_point;
    bowler++;
	 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
	$("#bowler_count").text('('+bowler+')');
	count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
	}
	else if((type=="bowler"))
	{
		//alert('dd');
		
		
		
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
	//credit -= credit_point;
    //bowler++;
	//count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
	}
	else if((type=="allrounder") && (epid=='editallarounder'+pid))
	{
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#allrounder_id'+pid).removeClass("inactive").addClass("active");
	credit -= credit_point;
	allrounder++;
	 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
	$("#allrounder_total").text('('+allrounder+')');
	count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
	}
	else if((type=="allrounder"))
	{
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#allrounder_id'+pid).removeClass("inactive").addClass("active");
	//credit -= credit_point;
	//allrounder++;
	//count_allrounder(pid,pname,pteamname,prole,matchid,teamno);
	}
	else if((type=="wicketkeeper") && (epid=='editwk'+pid))
	{
		 $('#wkid'+pid).show();
		 $('#wkid_wk'+pid).show();
		$('#wktickid'+pid).removeClass("inactive").addClass("active");
		$('#wktick_ide'+pid).removeClass("inactive").addClass("active");
	credit -= credit_point;
	wicketkeeper++;
	 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
	$("#wicketkeeper_total").text('('+wicketkeeper+')');
	count_wicketkeeper(pid,pname,pteamname,prole,matchid,teamno,credit_point);
	}
	else if((type=="wicketkeeper") )
	{
		 $('#wkid'+pid).show();
		 $('#wkid_wk'+pid).show();
		$('#wktickid'+pid).removeClass("inactive").addClass("active");
		$('#wktick_ide'+pid).removeClass("inactive").addClass("active");
	//credit -= credit_point;
	//wicketkeeper++;
	//count_wicketkeeper(pid,pname,pteamname,prole,matchid,teamno);
	}
	else 
	{
	credit -= credit_point;
    batsman++;
	 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
	$("#batsman_count_total").text('('+batsman+')');
	count_batsman(pid,pname,pteamname,prole,matchid,teamno);
	}
		
	}
	$('#left_credit_point').text(credit); 
	credit_new=credit
	});



function select_tick(e,type)
{
	//alert(c_team_name1);
 var pid=$(e).find('#pid').val();
 //console.log(pid);
 var pname=$(e).find('#pname').val();
 var pteamname=$(e).find('#pteamname').val();
 var prole=$(e).find('#prole').val();  
 var matchid=$(e).find('#match_id').val();
 var teamno=$(e).find('#team_no').val();
 
 var credit_point=$(e).find('#credit_point').val();
var pcount_error_msg=$('.palyer_icon .pactive').length;
$(e).find('.plus').show();
$(e).find('.tick').hide();
 //console.log(credit_point);  
//console.log(credit); 
var yes=0;
 if(c_team_name1<=7 && c_team_name2 <=6 && team_name2==pteamname)
 { 
 yes=1;
 }
else if(c_team_name2 <=7 && c_team_name1 <=6 && team_name1==pteamname)
{ 
yes=1;
}
if(c_team_name1==7 && c_team_name2 <=6 && team_name1==pteamname && $(e).hasClass("inactive"))
 { 
 $('.error_test').show();
			$('.error_test').text('Maximum 7 player in Same team');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
 }
else if(c_team_name2 ==7 && c_team_name1 <=6 && team_name2==pteamname && $(e).hasClass("inactive"))
{ 
$('.error_test').show();
			$('.error_test').text('Maximum 7 player in Same team');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
}

 if((type=="batsman") && ($(e).hasClass("inactive")) && credit > 0 && yes==1)
 {
	 //credit -= credit_point;
//	console.log(credit);
	
		
		
		if(allrounder<=3 && batsman<=2 && bowler<=4 && credit > 0)
		{
			
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
		
			credit -= credit_point;
			//credit1 = credit-credit_point;
			//console.log(credit1);
			batsman++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=3 && batsman<=3 && bowler<=3 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=3 && bowler<=4 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=1 && batsman<=4 && bowler<=4 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=4 && bowler<=3 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=2 && bowler<=5 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
			else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=1 && batsman<=3 && bowler<=5 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		
		else if(allrounder==2 && batsman==3 && bowler==5 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
			setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		
		else if(allrounder==3 && batsman==4 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		
		else if(allrounder==0 && batsman==4 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 Allrounder required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==2 && batsman==5 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==2 && batsman==5 && bowler==0 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==4 && bowler==0 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==4 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		
		else if(allrounder==3 && batsman==4 && bowler==1 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		
		else if(allrounder==3 && batsman==4 && bowler==1 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==1 && batsman==5 && bowler==4 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==1 && batsman==4 && bowler==5 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		
		
		else if(pcount_error_msg==11)
		{
		$('.error_test').show();
			$('.error_test').text('Maximum 11 players');
			setTimeout(function(){ $('.error_test').hide(); }, 3000);
			
		}
		else
		{
			console.log('max 5 batsman');
			$('.error_test').text('Maximum 5 Batsman');
			//batsman--;
			//credit =parseInt(credit) +parseInt(credit_point);
		}
 }
 
 
else if((type=="bowler") && ($(e).hasClass("inactive")) && credit > 0 && yes==1)
 {
		
		if(allrounder<=3 && batsman<=3 && bowler<=3 && credit > 0)
		{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else if(allrounder<=3 && batsman<=4 && bowler<=2 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=4 && bowler<=3 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=1 && batsman<=5 && bowler<=3 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
				$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=1 && batsman<=4 && bowler<=4 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=3 && bowler<=4 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=5 && bowler<=2 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		
		else if(allrounder==3 && batsman==2 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		
		else if(allrounder==2 && batsman==5 && bowler==3 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		
		else if(allrounder==0 && batsman==5 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 Allrounder required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		
		else if(allrounder==2 && batsman==2 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==2 && batsman==0 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==0 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==2 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==1 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==1 && batsman==4 && bowler==5 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==1 && batsman==5 && bowler==4 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(pcount_error_msg==11)
		{
		$('.error_test').show();
			$('.error_test').text('Maximum 11 players');
		setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else
		{
			console.log('select atleast one all rounder');
			$('.error_test').text('Select atleast one all rounder');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);


			//bowler--;
		//	credit =parseInt(credit) +parseInt(credit_point);
		}
 }
 
else if((type=="allrounder") && ($(e).hasClass("inactive")) && credit > 0 && yes==1)
 {
		
		if(batsman<=5 && bowler<=3 && allrounder<=1 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(batsman<=3 && bowler<=5 && allrounder<=1 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(batsman<=4 && bowler<=3 && allrounder<=2 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(batsman<=3 && bowler<=4 && allrounder<=2 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(batsman<=5 && bowler<=4 && allrounder<=0 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(batsman<=4 && bowler<=5 && allrounder<=0 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		
		else if(allrounder==2 && batsman==0 && bowler==5 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper and Minimum 3 batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==1 && batsman==2 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==1 && batsman==5 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowler required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==1 && batsman==5 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowler required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==2 && batsman==5 && bowler==0 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowler required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==2 && batsman==0 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowler required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==1 && batsman==4 && bowler==5 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==1 && batsman==5 && bowler==4 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==4 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==2 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==2 && batsman==2 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==2 && batsman==5 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==3 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==2 && bowler==3 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==4 && bowler==0 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowlers required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else if(allrounder==3 && batsman==0 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Batsman required');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		
		else if(pcount_error_msg==11)
		{
		$('.error_test').show();
			$('.error_test').text('Maximum 11 players');
		setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else
		{
			console.log('maximum 3 all rounder');
			$('.error_test').text('Maximum 3 all rounder');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);


			//allrounder--;
		//	credit =parseInt(credit) +parseInt(credit_point);
		}
 }

 else if((type=="wicketkeeper") && ($(e).hasClass("inactive")) && credit > 0  && yes==1)
 {
   
	 
		
		if(wicketkeeper==0 && credit > 0)
		{
			 credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			
			
			$(e).find('.tick').show();
			$(e).find('.plus').hide();
			
			//wk.blade.php
			
			$('#wkid'+pid).show();
			$('#wkid_wk'+pid).show();
			$('#wktickid'+pid).removeClass("inactive").addClass("active"); 
			$('#wktick_id'+pid).removeClass("inactive").addClass("active"); 
			
			credit -= credit_point;
			wicketkeeper++;
			 if(pteamname==team_name1)
 {
	c_team_name1++; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2++; 
 }
			$("#wicketkeeper_total").text('('+wicketkeeper+')');
			count_wicketkeeper(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		
		
		
		else if(pcount_error_msg==11)
		{
		$('.error_test').show();
		$('.error_test').text('Maximum 11 players');
		setTimeout(function(){ $('.error_test').hide(); }, 3000);

		}
		else
		{
		//	credit =parseInt(credit) +parseInt(credit_point);
			console.log('max 1 wk ');
			$('.error_test').text('Maximum 1 wicket');
						setTimeout(function(){ $('.error_test').hide(); }, 3000);


		//	wicketkeeper--;
			
			
		}
 
 }
 
 
 else
 {
	 if((type=="batsman") && ($(e).hasClass("active")))
	 {
		$(e).removeClass("active").addClass("inactive");
		
		$(e).find('.tick').hide();	
		$(e).find('.plus').show();
        credit =parseFloat(credit) +parseFloat(credit_point);	
//batsman.blade.php
		
		 $('#batid'+pid).hide();
		 $('#batid_bat'+pid).hide();
		$('#batsmanid'+pid).removeClass("active").addClass("inactive");		
		$('#batsman_id'+pid).removeClass("active").addClass("inactive");

		
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
$("#plid_new"+pid).remove();
$("#batapp").append("<div class='palyer_icon' id='rembat"+batsman+"'><div class='palyer_img' id='batsman"+batsman+"'><img  src='{{url('public/site/image/batsman.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='batsmanp"+batsman+"' value=''><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='batsmanpname"+batsman+"' value=''>	</div>		</div>");
$("#batapp_new").append("<div class='cs-pitch-col' id='rembat_new"+batsman+"'><div class='cs-pitch-payer'><img src='{{url('public/site/image/default-player.png')}}' width='40'><div class='cs-pitch-payer-name'><input type='hidden' name='playersid[]' id='batsmanp_new"+batsman+"' value=''><input type='hidden' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='batsmanpname_new"+batsman+"' value=''></div><div class='cs-pitch-payer-points'></div></div></div>");

		console.log(pid);
		count_batsman_hide(pid,matchid,teamno,pteamname);
	 }
	 else if((type=="bowler") && ($(e).hasClass("active")))
	 {
		 $(e).removeClass("active").addClass("inactive");
		 credit =parseFloat(credit) +parseFloat(credit_point);
		$(e).find('.tick').hide();
		$(e).find('.plus').show();
		//bowler.blade.php
		
		 $('#bowid'+pid).hide();
		 $('#bowid_bow'+pid).hide();
		$('#bowlerid'+pid).removeClass("active").addClass("inactive");
		$('#bowler_id'+pid).removeClass("active").addClass("inactive");
	


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
$("#plid_new"+pid).remove();
$("#bowapp").append("<div class='palyer_icon' id='rembow"+bowler+"'><div class='palyer_img' id='bowler"+bowler+"'><img  src='{{url('public/site/image/bowler.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='bowlerp"+bowler+"' value=''><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='bowlerpname"+bowler+"' value=''></div></div>");
$("#bowapp_new").append("<div class='cs-pitch-col' id='rembow_new"+bowler+"'><div class='cs-pitch-payer'><img src='{{url('public/site/image/default-player.png')}}' width='40'><div class='cs-pitch-payer-name'><input type='hidden' name='playersid[]' id='bowlerp_new"+bowler+"' value=''><input type='hidden' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='bowlerpname_new"+bowler+"' value=''></div><div class='cs-pitch-payer-points'></div></div></div>");

		count_bowler_hide(pid,matchid,teamno,pteamname);
	 }
	else if((type=="allrounder") && ($(e).hasClass("active")))
	 {
		  $(e).removeClass("active").addClass("inactive");
		  credit =parseFloat(credit) +parseFloat(credit_point);
		$(e).find('.tick').hide();
		$(e).find('.plus').show();
		 //allrounder.blade.php
		
		 $('#allid'+pid).hide();
		 $('#allid_all'+pid).hide();
		$('#allrounderid'+pid).removeClass("active").addClass("inactive");
		$('#all_rounderid'+pid).removeClass("active").addClass("inactive");
		
		
		
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
$("#plid_new"+pid).remove();
$("#allapp").append("<div class='palyer_icon' id='remall"+allrounder+"' style='width:30%;'><div class='palyer_img' id='allrounder"+allrounder+"'><img  src='{{url('public/site/image/allrounder.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='allrounderp"+allrounder+"' value=''><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='allrounderpname"+allrounder+"' value=''></div></div>");
$("#allapp_new").append("<div class='cs-pitch-col' id='remall_new"+allrounder+"'><div class='cs-pitch-payer'><img src='{{url('public/site/image/default-player.png')}}' width='40'><div class='cs-pitch-payer-name'><input type='hidden' name='playersid[]' id='allrounderp_new"+allrounder+"' value=''><input type='hidden' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='allrounderpname_new"+allrounder+"' value=''></div><div class='cs-pitch-payer-points'></div></div></div>");
		
		count_allrounder_hide(pid,matchid,teamno,pteamname);
	 }
	else if((type=="wicketkeeper") && ($(e).hasClass("active")))
	 {
		
		 $(e).removeClass("active").addClass("inactive");
		 
		 credit =parseFloat(credit) +parseFloat(credit_point);
		
		$(e).find('.tick').hide();
		$(e).find('.plus').show();
		
		//wk.blade.php
		
		 $('#wkid'+pid).hide();
		 $('#wkid_wk'+pid).hide();
		$('#wktickid'+pid).removeClass("active").addClass("inactive"); 
			$('#wktick_id'+pid).removeClass("active").addClass("inactive");
			
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
			$("#plid_new"+pid).remove();
$("#wkapp").append("<div class='palyer_icon' id='remwk"+wicketkeeper+"' style='width:54%;margin-left:20%;'><div class='palyer_img' id='wicketkeeper"+wicketkeeper+"'><img  src='{{url('public/site/image/wicketkeeper.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='wicketkeeperp"+wicketkeeper+"' value=''><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='wicketkeeperpname"+wicketkeeper+"' value=''></div></div>");
		$("#wkapp_new").append("<div class='cs-pitch-col' id='remwk_new"+wicketkeeper+"'><div class='cs-pitch-payer '><img src='{{url('public/site/image/default-player.png')}}' width='40'><div class='cs-pitch-payer-name'><input type='hidden' name='playersid[]' id='wicketkeeperp_new"+wicketkeeper+"' value=''><input type='hidden' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='wicketkeeperpname_new"+wicketkeeper+"' value=''></div><div class='cs-pitch-payer-points'></div></div></div>");	
		count_wicketkeeper_hide(pid,matchid,teamno,pteamname);
	 
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
  $('#left_credit_point').text(credit); 
}
//console.log(credit);
function count_batsman_hide(pid,matchid,teamno,pteamname)
{
	$('#click_captain    #player_batting_c'+pid).remove();	$('#click_vicecaptain    #player_batting_vc'+pid).remove();	
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
$("#batsman"+batsman).append("<img  src='{{url('public/site/image/in_bat.png')}}'>");
$("#batsmanp"+batsman).val('');
$("#batsmanpname"+batsman).val('');

$("#batsman"+batsman).addClass("pactive"); */
 

//$("#plid"+pid).remove();
//$("#batapp").append("<div class='palyer_icon' id='rembat"+batsman+"'><div class='palyer_img' id='batsman"+batsman+"'><img  src='{{url('public/site/image/batsman.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='batsmanp"+batsman+"' value=''>			<input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='batsmanpname"+batsman+"' value=''>	</div>		</div>");

if(pid==$('#captain_id').val())
		{
		$('#captain_id').removeAttr('value');
		
		$('.removing_cap').text('');
		
		}
		
		if(pid==$('#vicecaptain_id').val())
		{
		$('#vicecaptain_id').removeAttr('value');
		$('.removing_vice').text('');
		}
		if(pid==$('#selected_replace_player_id,#selected_substitute_player_id').val())
		{
		$('#selected_replace_player_id').removeAttr('value');
		//$('#selected_replace_player_id').removeAttr('value');
		$('#replace_player').text('Select Replace');
		$('#substitute_player').text('Select Substitute');
		}

var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);

//captain select

/* $("#player_batting_c"+batsman).css('display','none');
$("#captain_id_batting_c"+batsman).val('');
$("#captain_name_batting_c"+batsman).val('');
$("#captain_name_batting_credit_c"+batsman).val('');
$("#view_player_name_batting_c"+batsman).text('');
$("#view_player_name_batting_credit_c"+batsman).text('');
$("#view_player_team_name_batting_c"+batsman).text('');

// end

// vice captain  select

$("#player_batting_vc"+batsman).css('display','none');
$("#captain_id_batting_vc"+batsman).val('');
$("#captain_name_batting_vc"+batsman).val('');
$("#captain_name_batting_credit_vc"+batsman).val('');
$("#view_player_name_batting_vc"+batsman).text('');
$("#view_player_name_batting_credit_vc"+batsman).text('');
$("#view_player_team_name_batting_vc"+batsman).text(''); */

// end

//Replace Player
 
$("#player_batting_selected"+batsman).css('display','none');
$("#selected_id_batting"+batsman).val('');
$("#selected_name_batting"+batsman).val('');
$("#selected_name_batting_credit"+batsman).val('');
$("#view_player_name_batting_selected"+batsman).text('');
$("#view_player_name_batting_selected_credit"+batsman).text('');
$("#view_player_team_name_batting_selected"+batsman).text('');

//end

if(pcount!=11)
{
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
	$('#change_buttton').prop('disabled', true);

}
//credit =parseInt(credit) + parseInt(credit_point);
 batsman--;
 if(pteamname==team_name1)
 {
	c_team_name1--; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2--; 
 }
 $("#batsman_count_total").text('('+batsman+')');
 
 //console.log(credit);
}
function count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point)
{
$(".captain #click_captain").prepend('<li class="test" style="line-height: 41px;font-size: 10px;" id="player_batting_c'+pid+'">&nbsp;&nbsp;<img src="{{ url("public/site/image/batsman_icon.png") }}" style="width:26px;"><input type="hidden" class="captainid" id="captain_id_batting_c'+pid+'" value="'+pid+'"> <input type="hidden" class="captainname" id="captain_name_batting_c'+pid+'" value="'+pname+'"><input type="hidden" class="captaincredit" id="captain_name_batting_credit_c'+pid+'" value="'+credit_point+'"><input type="hidden" class="match_id" value="'+matchid+'"><span id="view_player_name_batting_c'+pid+'">'+pname+'</span>/<span id="view_player_name_batting_credit_c'+pid+'">'+credit_point+'</span> </li>');
$(".vc_captain #click_vicecaptain").prepend('<li class="test" style="line-height: 41px;font-size: 10px;" id="player_batting_vc'+pid+'">&nbsp;&nbsp;<img src="{{ url("public/site/image/batsman_icon.png") }}" style="width:26px;"><input type="hidden" class="captainid" id="captain_id_batting_vc'+pid+'" value="'+pid+'"> <input type="hidden" class="captainname" id="captain_name_batting_vc'+pid+'" value="'+pname+'"><input type="hidden" class="captaincredit" id="captain_name_batting_credit_vc'+pid+'" value="'+credit_point+'"><input type="hidden" class="match_id" value="'+matchid+'"><span id="view_player_name_batting_vc'+pid+'">'+pname+'</span>/<span id="view_player_name_batting_credit_vc'+pid+'">'+credit_point+'</span> </li>');
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});

		if(pid==$('#selected_substitute_player_id').val())
		{
		$('#selected_substitute_player_id').removeAttr('value');
		$('#selected_replace_player_id').removeAttr('value');
		$('#replace_player').text('Select Replace');
		$('#substitute_player').text('Select Substitute');
		}
		
/* $("#batsman"+batsman).empty();
$("#batsman"+batsman).append("<img  src='{{url('public/site/image/in_bat.png')}}'>");
$("#batsmanp"+batsman).val(pid);
$("#batsmanpname"+batsman).val(pname);
//$("#batsman"+batsman).addClass("pactive");
$("#batsman"+batsman).addClass("pactive"); */

//$("#rembat"+batsman).remove();
$("#rembat_new"+batsman).remove();
//$("#batapp").prepend("<div class='palyer_icon' id='plid"+pid+"'><div class='palyer_img pactive'><img  src='{{url('public/site/image/in_bat.png')}}'></div><div><input type='hidden' name='playersid[]' id='batsmanp' value='"+pid+"'><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='batsmanpname' value='"+pname+"'></div></div>");
$("#batapp_new").prepend("<div class='cs-pitch-col palyer_icon' id='plid"+pid+"'><div class='cs-pitch-payer pactive'><img src='{{url('public/site/image/default-player.png')}}' width='40'><div class='cs-pitch-payer-name'>"+pname+"<input type='hidden' name='playersid[]' id='batsmanp_new' value='"+pid+"'><input type='hidden' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='batsmanpname_new' value='"+pname+"'></div><div class='cs-pitch-payer-points'></div></div></div>");

var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);
 
//captain select
// console.log(credit);
/* $("#player_batting_c"+batsman).css('display','block');
$("#captain_id_batting_c"+batsman).val(pid);
$("#captain_name_batting_c"+batsman).val(pname);
$("#captain_name_batting_credit_c"+batsman).val(credit_point);
$("#view_player_name_batting_c"+batsman).text(pname);
$("#view_player_name_batting_credit_c"+batsman).text(credit_point);
$("#view_player_team_name_batting_c"+batsman).text(pteamname);

//end
 //vice captain select
 
$("#player_batting_vc"+batsman).css('display','block');
$("#captain_id_batting_vc"+batsman).val(pid);
$("#captain_name_batting_vc"+batsman).val(pname);
$("#captain_name_batting_credit_vc"+batsman).val(credit_point);
$("#view_player_name_batting_vc"+batsman).text(pname);
$("#view_player_name_batting_credit_vc"+batsman).text(credit_point);
$("#view_player_team_name_batting_vc"+batsman).text(pteamname); */

//end
 
 //Replace Player
 
$("#player_batting_selected"+batsman).css('display','block');
$("#selected_id_batting"+batsman).val(pid);
$("#selected_name_batting"+batsman).val(pname);
$("#selected_name_batting_credit"+batsman).val(credit_point);
$("#view_player_name_batting_selected"+batsman).text(pname);
$("#view_player_name_batting_selected_credit"+batsman).text(credit_point);
$("#view_player_team_name_batting_selected"+batsman).text(pteamname);

//end
if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
		if($('#captain_id').val()=='' || $('#vicecaptain_id').val()=='')
	{
		$('#change_buttton').prop('disabled', true);
		console.log($('#captain_id').val());
	}
	else
	{
		console.log($('#captain_id').val());
		$('#change_buttton').prop('disabled', false);
	}

}

//credit -= credit_point;
}
function count_bowler_hide(pid,matchid,teamno,pteamname)
{$('#click_captain #player_bowler_c'+pid).remove();	
$('#click_vicecaptain #player_bowler_vc'+pid).remove();	
	/* var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		}); */

/* $("#bowler"+bowler).empty();
$("#bowler"+bowler).append("<img  src='{{url('public/site/image/bowler.png')}}'>");
$("#bowlerp"+bowler).val('');
$("#bowlerpname"+bowler).val('');
$("#bowler"+bowler).removeClass("pactive"); */


if(pid==$('#captain_id').val())
		{
		$('#captain_id').removeAttr('value');
		$('.removing_cap').text('');
		}
		
		if(pid==$('#vicecaptain_id').val())
		{
		$('#vicecaptain_id').removeAttr('value');
		$('.removing_vice').text('');
		}

if(pid==$('#selected_replace_player_id,#selected_substitute_player_id').val())
		{
		$('#selected_replace_player_id').removeAttr('value');
	//	$('#selected_replace_player_id').removeAttr('value');
		$('#replace_player').text('Select Replace');
		$('#substitute_player').text('Select Substitute');
		}

var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);

if(pcount!=11)
{
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
	$('#change_buttton').prop('disabled', true);
}


//captain select
 
/* $("#player_bowler_c"+bowler).css('display','none');
$("#captain_id_bowler_c"+bowler).val('');
$("#captain_name_bowler_c"+bowler).val('');
$("#captain_name_bowler_credit_c"+bowler).val('');
$("#view_player_name_bowler_c"+bowler).text('');
$("#view_player_name_bowler_credit_c"+bowler).text('');
$("#view_player_team_name_bowler_c"+bowler).text(''); */

//end
//vice captain select
 
/* $("#player_bowler_vc"+bowler).css('display','none');
$("#captain_id_bowler_vc"+bowler).val('');
$("#captain_name_bowler_vc"+bowler).val('');
$("#captain_name_bowler_credit_vc"+bowler).val('');
$("#view_player_name_bowler_vc"+bowler).text('');
$("#view_player_name_bowler_credit_vc"+bowler).text('');
$("#view_player_team_name_bowler_vc"+bowler).text(''); */

//end

//Replace Player
 
$("#player_bowler_selected"+bowler).css('display','none');
$("#selected_id_bowler"+bowler).val('');
$("#selected_name_bowler_credit"+bowler).val('');
$("#selected_name_bowler"+bowler).val('');
$("#view_player_name_bowler_selected_credit"+bowler).text('');
$("#view_player_name_bowler_selected"+bowler).text('');
$("#view_player_team_name_bowler_selected"+bowler).text('');

//end



//credit =parseInt(credit) + parseInt(credit_point);
 bowler--;
 if(pteamname==team_name1)
 {
	c_team_name1--; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2--; 
 }
 $("#bowler_count").text('('+bowler+')');
 
}
function count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point)
{
	$(".captain #click_captain").prepend('<li class="test" style="line-height: 41px;font-size: 10px;" id="player_bowler_c'+pid+'">&nbsp;&nbsp;<img src="{{ url("public/site/image/bowler_icon.png") }}" style="width:26px;"><input type="hidden" class="captainid" id="captain_id_bowler_c'+pid+'" value="'+pid+'"> <input type="hidden" class="captainname" id="captain_name_bowler_c'+pid+'" value="'+pname+'"><input type="hidden" class="captaincredit" id="captain_name_bowler_credit_c'+pid+'" value="'+credit_point+'"><input type="hidden" class="match_id" value="'+matchid+'"><span id="view_player_name_bowler_c'+pid+'">'+pname+'</span>/<span id="view_player_name_bowler_credit_c'+pid+'">'+credit_point+'</span> </li>');	
	$(".vc_captain #click_vicecaptain").prepend('<li class="test" style="line-height: 41px;font-size: 10px;" id="player_bowler_vc'+pid+'">&nbsp;&nbsp;<img src="{{ url("public/site/image/bowler_icon.png") }}" style="width:26px;"><input type="hidden" class="captainid" id="captain_id_bowler_vc'+pid+'" value="'+pid+'"> <input type="hidden" class="captainname" id="captain_name_bowler_vc'+pid+'" value="'+pname+'"><input type="hidden" class="captaincredit" id="captain_name_bowler_credit_vc'+pid+'" value="'+credit_point+'"><input type="hidden" class="match_id" value="'+matchid+'"><span id="view_player_name_bowler_vc'+pid+'">'+pname+'</span>/<span id="view_player_name_bowler_credit_vc'+pid+'">'+credit_point+'</span> </li>');
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
		
		if(pid==$('#selected_substitute_player_id').val())
		{
		$('#selected_substitute_player_id').removeAttr('value');
		$('#selected_replace_player_id').removeAttr('value');
		$('#replace_player').text('Select Replace');
		$('#substitute_player').text('Select Substitute');
		}
		
/* $("#bowler"+bowler).empty();
$("#bowler"+bowler).append("<img  src='{{url('public/site/image/in_bow.png')}}'>");
$("#bowlerp"+bowler).val(pid);
$("#bowlerpname"+bowler).val(pname);
$("#bowler"+bowler).addClass("pactive"); */

$("#rembow"+bowler).remove();
$("#rembow_new"+bowler).remove();
$("#bowapp").prepend("<div class='palyer_icon' id='plid"+pid+"'><div class='palyer_img pactive'><img  src='{{url('public/site/image/in_bow.png')}}'></div><div><input type='hidden' name='playersid[]' id='bowlerp' value='"+pid+"'><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='bowlerpname' value='"+pname+"'></div></div>");
$("#bowapp_new").prepend("<div class='cs-pitch-col palyer_icon' id='plid"+pid+"'><div class='cs-pitch-payer pactive'><img src='{{url('public/site/image/default-player.png')}}' width='40'><div class='cs-pitch-payer-name'>"+pname+"<input type='hidden' name='playersid[]' id='bowlerp_new' value='"+pid+"'><input type='hidden' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='bowlerpname_new' value='"+pname+"'></div><div class='cs-pitch-payer-points'></div></div></div>");

var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);

//captain select
 
/* $("#player_bowler_c"+bowler).css('display','block');
$("#captain_id_bowler_c"+bowler).val(pid);
$("#captain_name_bowler_c"+bowler).val(pname);
$("#captain_name_bowler_credit_c"+bowler).val(credit_point);
$("#view_player_name_bowler_credit_c"+bowler).text(credit_point);
$("#view_player_name_bowler_c"+bowler).text(pname);
$("#view_player_team_name_bowler_c"+bowler).text(pteamname); */

//end

//vice captain select
 
/* $("#player_bowler_vc"+bowler).css('display','block');
$("#captain_id_bowler_vc"+bowler).val(pid);
$("#captain_name_bowler_credit_vc"+bowler).val(credit_point);
$("#captain_name_bowler_vc"+bowler).val(pname);
$("#view_player_name_bowler_credit_vc"+bowler).text(credit_point);
$("#view_player_name_bowler_vc"+bowler).text(pname);
$("#view_player_team_name_bowler_vc"+bowler).text(pteamname);
 */
//end
//Replace Player
 
$("#player_bowler_selected"+bowler).css('display','block');
$("#selected_id_bowler"+bowler).val(pid);
$("#selected_name_bowler"+bowler).val(pname);
$("#selected_name_bowler_credit"+bowler).val(credit_point);
$("#view_player_name_bowler_selected"+bowler).text(pname);
$("#view_player_name_bowler_selected_credit"+bowler).text(credit_point);
$("#view_player_team_name_bowler_selected"+bowler).text(pteamname);

//end

if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
		if($('#captain_id').val()=='' || $('#vicecaptain_id').val()=='')
	{
		$('#change_buttton').prop('disabled', true);
	}
	else
	{
		$('#change_buttton').prop('disabled', false);
	}

}
//credit -= credit_point;
}
function count_allrounder_hide(pid,matchid,teamno,pteamname)
{
	$('#click_captain #player_allrounder_c'+pid).remove();	
	$('#click_vicecaptain #player_allrounder_vc'+pid).remove();
/* var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		}); */

/* $("#allrounder"+allrounder).empty();
$("#allrounder"+allrounder).append("<img  src='{{url('public/site/image/all_rounder.png')}}'>");
$("#allrounderp"+allrounder).val('');
$("#allrounderpname"+allrounder).val('');
$("#allrounder"+allrounder).removeClass("pactive"); */


if(pid==$('#captain_id').val())
		{
		$('#captain_id').removeAttr('value');
		$('.removing_cap').text('');
		}
		
		if(pid==$('#vicecaptain_id').val())
		{
		$('#vicecaptain_id').removeAttr('value');
		$('.removing_vice').text('');
		}
if(pid==$('#selected_replace_player_id,#selected_substitute_player_id').val())
		{
		$('#selected_replace_player_id').removeAttr('value');
	//	$('#selected_replace_player_id').removeAttr('value');
		$('#replace_player').text('Select Replace');
		$('#substitute_player').text('Select Substitute');
		}
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);

//captain select
 
/* $("#player_allrounder_c"+allrounder).css('display','none');
$("#captain_id_allrounder_c"+allrounder).val('');
$("#captain_name_allrounder_c"+allrounder).val('');
$("#captain_name_allrounder_credit_c"+allrounder).val('');
$("#view_player_name_allrounder_c"+allrounder).text('');
$("#view_player_name_allrounder_credit_c"+allrounder).text('');
$("#view_player_team_name_allrounder_c"+allrounder).text(''); */

//end
//vice captain select
 
/* $("#player_allrounder_vc"+allrounder).css('display','none');
$("#captain_id_allrounder_vc"+allrounder).val('');
$("#captain_name_allrounder_vc"+allrounder).val('');
$("#captain_name_allrounder_credit_vc"+allrounder).val('');
$("#view_player_name_allrounder_vc"+allrounder).text('');
$("#view_player_name_allrounder_credit_vc"+allrounder).text('');
$("#view_player_team_name_allrounder_vc"+allrounder).text(''); */

//end
//Replace Player
 
$("#player_allrounder_selected"+allrounder).css('display','none');
$("#selected_id_allrounder"+allrounder).val('');
$("#selected_name_allrounder"+allrounder).val('');
$("#selected_name_allrounder_credit"+allrounder).val('');
$("#view_player_name_allrounder_selected"+allrounder).text('');
$("#view_player_name_allrounder_selected_credit"+allrounder).text('');
$("#view_player_team_name_allrounder_selected"+allrounder).text('');

//end

if(pcount!=11)
{
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
		$('#change_buttton').prop('disabled', true);

}
//credit =parseInt(credit) + parseInt(credit_point);
 allrounder--;
 if(pteamname==team_name1)
 {
	c_team_name1--; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2--; 
 }
 $("#allrounder_total").text('('+allrounder+')');
 
}
function count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point)
{
	//alert(credit_point)
$(".captain #click_captain").prepend('<li class="test" style="line-height: 41px;font-size: 10px;" id="player_allrounder_c'+pid+'">&nbsp;&nbsp;<img src="{{ url("public/site/image/all_icon.png") }}" style="width:26px;"><input type="hidden" class="captainid" id="captain_id_allrounder_c'+pid+'" value="'+pid+'"> <input type="hidden" class="captainname" id="captain_name_allrounder_c'+pid+'" value="'+pname+'"><input type="hidden" class="captaincredit" id="captain_name_allrounder_credit_c'+pid+'" value="'+credit_point+'"><input type="hidden" class="match_id" value="'+matchid+'"><span id="view_player_name_allrounder_c'+pid+'">'+pname+'</span>/<span id="view_player_name_allrounder_credit_c'+pid+'">'+credit_point+'</span> </li>');	
$(".vc_captain #click_vicecaptain").prepend('<li class="test" style="line-height: 41px;font-size: 10px;" id="player_allrounder_vc'+pid+'">&nbsp;&nbsp;<img src="{{ url("public/site/image/all_icon.png") }}" style="width:26px;"><input type="hidden" class="captainid" id="captain_id_allrounder_vc'+pid+'" value="'+pid+'"> <input type="hidden" class="captainname" id="captain_name_allrounder_vc'+pid+'" value="'+pname+'"><input type="hidden" class="captaincredit" id="captain_name_allrounder_credit_vc'+pid+'" value="'+credit_point+'"><input type="hidden" class="match_id" value="'+matchid+'"><span id="view_player_name_allrounder_vc'+pid+'">'+pname+'</span>/<span id="view_player_name_allrounder_credit_vc'+pid+'">'+credit_point+'</span> </li>');	
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
		if(pid==$('#selected_substitute_player_id').val())
		{
		$('#selected_substitute_player_id').removeAttr('value');
		$('#selected_replace_player_id').removeAttr('value');
		$('#replace_player').text('Select Replace');
		$('#substitute_player').text('Select Substitute');
		}
/* $("#allrounder"+allrounder).empty();
$("#allrounder"+allrounder).append("<img  src='{{url('public/site/image/in_all.png')}}'>");
$("#allrounderp"+allrounder).val(pid);
$("#allrounderpname"+allrounder).val(pname);
$("#allrounder"+allrounder).addClass("pactive"); */

$("#remall"+allrounder).remove();
$("#remall_new"+allrounder).remove();
$("#allapp").prepend("<div class='palyer_icon' id='plid"+pid+"'style='width:30%;'><div class='palyer_img pactive'><img  src='{{url('public/site/image/in_all.png')}}'></div><div><input type='hidden' name='playersid[]' id='allrounderp' value='"+pid+"'><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='allrounderpname' value='"+pname+"'></div></div>");
$("#allapp_new").prepend("<div class='cs-pitch-col palyer_icon' id='plid"+pid+"'><div class='cs-pitch-payer pactive'><img src='{{url('public/site/image/default-player.png')}}' width='40'><div class='cs-pitch-payer-name'>"+pname+"<input type='hidden' name='playersid[]' id='allrounderp_new' value='"+pid+"'><input type='hidden' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='allrounderpname_new' value='"+pname+"'></div><div class='cs-pitch-payer-points'></div></div></div>");
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);

//captain select
 
/* $("#player_allrounder_c"+allrounder).css('display','block');
$("#captain_id_allrounder_c"+allrounder).val(pid);
$("#captain_name_allrounder_c"+allrounder).val(pname);
$("#captain_name_allrounder_credit_c"+allrounder).val(credit_point);
$("#view_player_name_allrounder_c"+allrounder).text(pname);
$("#view_player_name_allrounder_credit_c"+allrounder).text(credit_point);
$("#view_player_team_name_allrounder_c"+allrounder).text(pteamname); */

//end
//vice captain select
 
/* $("#player_allrounder_vc"+allrounder).css('display','block');
$("#captain_id_allrounder_vc"+allrounder).val(pid);
$("#captain_name_allrounder_vc"+allrounder).val(pname);
$("#captain_name_allrounder_credit_vc"+allrounder).val(credit_point);
$("#view_player_name_allrounder_vc"+allrounder).text(pname);
$("#view_player_name_allrounder_credit_vc"+allrounder).text(credit_point);
$("#view_player_team_name_allrounder_vc"+allrounder).text(pteamname);
 */
//end
//Replace Player
 
$("#player_allrounder_selected"+allrounder).css('display','block');
$("#selected_id_allrounder"+allrounder).val(pid);
$("#selected_name_allrounder"+allrounder).val(pname);
$("#selected_name_allrounder_credit"+allrounder).val(credit_point);
$("#view_player_name_allrounder_selected"+allrounder).text(pname);
$("#view_player_name_allrounder_selected_credit"+allrounder).text(credit_point);
$("#view_player_team_name_allrounder_selected"+allrounder).text(pteamname);

//end
if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
		if($('#captain_id').val()=='' || $('#vicecaptain_id').val()=='')
	{
		$('#change_buttton').prop('disabled', true);
	}
	else
	{
		$('#change_buttton').prop('disabled', false);
	}
}
//credit -= credit_point;
}
function count_wicketkeeper_hide(pid,matchid,teamno,pteamname)
{
	$('#click_captain #player_wicketkeeper_c'+pid).remove();	
	$('#click_vicecaptain #player_wicketkeeper_vc'+pid).remove();	
	/* var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		}); */

/* $("#wicketkeeper"+wicketkeeper).empty();
$("#wicketkeeper"+wicketkeeper).append("<img  src='{{url('public/site/image/wk.png')}}'>");
$("#wicketkeeperp"+wicketkeeper).val('');
$("#wicketkeeperpname"+wicketkeeper).val('');
$("#wicketkeeper"+wicketkeeper).removeClass("pactive"); */

if(pid==$('#captain_id').val())
		{
		$('#captain_id').removeAttr('value');
		$('.removing_cap').text('');
		}
		
		if(pid==$('#vicecaptain_id').val())
		{
		$('#vicecaptain_id').removeAttr('value');
		$('.removing_vice').text('');
		}

if(pid==$('#selected_replace_player_id,#selected_substitute_player_id').val())
		{
		$('#selected_replace_player_id').removeAttr('value');
	//	$('#selected_replace_player_id').removeAttr('value');
		$('#replace_player').text('Select Replace');
		$('#substitute_player').text('Select Substitute');
		}

var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);

//captain select
 
/* $("#player_wicketkeeper_c"+wicketkeeper).css('display','none');
$("#captain_id_wicketkeeper_c"+wicketkeeper).val('');
$("#captain_name_wicketkeeper_c"+wicketkeeper).val('');
$("#captain_name_wicketkeeper_credit_c"+wicketkeeper).val('');
$("#view_player_name_wicketkeeper_c"+wicketkeeper).text('');
$("#view_player_name_wicketkeeper_credit_c"+wicketkeeper).text('');
$("#view_player_team_name_wicketkeeper_c"+wicketkeeper).text(''); */

//end
//vice captain select
 
/* $("#player_wicketkeeper_vc"+wicketkeeper).css('display','none');
$("#captain_id_wicketkeeper_vc"+wicketkeeper).val('');
$("#captain_name_wicketkeeper_vc"+wicketkeeper).val('');
$("#captain_name_wicketkeeper_credit_vc"+wicketkeeper).val('');
$("#view_player_name_wicketkeeper_vc"+wicketkeeper).text('');
$("#view_player_name_wicketkeeper_credit_vc"+wicketkeeper).text('');
$("#view_player_team_name_wicketkeeper_vc"+wicketkeeper).text(''); */

//end
//Replace Player
$("#player_wicketkeeper_selected"+wicketkeeper).css('display','none');
$("#selected_id_wicketkeeper"+wicketkeeper).val('');
$("#selected_name_wicketkeeper"+wicketkeeper).val('');
$("#selected_name_wicketkeeper_credit"+wicketkeeper).val('');
$("#view_player_name_wicketkeeper_selected"+wicketkeeper).text('');
$("#view_player_name_wicketkeeper_selected_credit"+wicketkeeper).text('');
$("#view_player_team_name_wicketkeeper_selected"+wicketkeeper).text('');

//end

if(pcount!=11)
{
	
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
		$('#change_buttton').prop('disabled', true);

}
//credit =parseInt(credit) + parseInt(credit_point);
 wicketkeeper--;
 if(pteamname==team_name1)
 {
	c_team_name1--; 
 }
 else if(pteamname==team_name2)
 {
	c_team_name2--; 
 }
$("#wicketkeeper_total").text('('+wicketkeeper+')');
}
function count_wicketkeeper(pid,pname,pteamname,prole,matchid,teamno,credit_point)
{	
$(".captain #click_captain").prepend('<li class="test" style="line-height: 41px;font-size: 10px;" id="player_wicketkeeper_c'+pid+'">&nbsp;&nbsp;<img src="{{ url("public/site/image/wk_icon.png") }}" style="width:26px;"><input type="hidden" class="captainid" id="captain_id_wicketkeeper_c'+pid+'" value="'+pid+'"> <input type="hidden" class="captainname" id="captain_name_wicketkeeper_c'+pid+'" value="'+pname+'"><input type="hidden" class="captaincredit" id="captain_name_wicketkeeper_credit_c'+pid+'" value="'+credit_point+'"><input type="hidden" class="match_id" value="'+matchid+'"><span id="view_player_name_wicketkeeper_c'+pid+'">'+pname+'</span>/<span id="view_player_name_wicketkeeper_credit_c'+pid+'">'+credit_point+'</span> </li>');	
$(".vc_captain #click_vicecaptain").prepend('<li class="test" style="line-height: 41px;font-size: 10px;" id="player_wicketkeeper_vc'+pid+'">&nbsp;&nbsp;<img src="{{ url("public/site/image/wk_icon.png") }}" style="width:26px;"><input type="hidden" class="captainid" id="captain_id_wicketkeeper_vc'+pid+'" value="'+pid+'"> <input type="hidden" class="captainname" id="captain_name_wicketkeeper_vc'+pid+'" value="'+pname+'"><input type="hidden" class="captaincredit" id="captain_name_wicketkeeper_credit_vc'+pid+'" value="'+credit_point+'"><input type="hidden" class="match_id" value="'+matchid+'"><span id="view_player_name_wicketkeeper_vc'+pid+'">'+pname+'</span>/<span id="view_player_name_wicketkeeper_credit_vc'+pid+'">'+credit_point+'</span> </li>');
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
		if(pid==$('#selected_substitute_player_id').val())
		{
		$('#selected_substitute_player_id').removeAttr('value');
		$('#selected_replace_player_id').removeAttr('value');
		$('#replace_player').text('Select Replace');
		$('#substitute_player').text('Select Substitute');
		}
/* $("#wicketkeeper"+wicketkeeper).empty();
$("#wicketkeeper"+wicketkeeper).append("<img  src='{{url('public/site/image/in_wk.png')}}'>");
$("#wicketkeeperp"+wicketkeeper).val(pid);
$("#wicketkeeperpname"+wicketkeeper).val(pname);
$("#wicketkeeper"+wicketkeeper).addClass("pactive"); */

$("#remwk"+wicketkeeper).remove();
$("#remwk_new"+wicketkeeper).remove();
$("#wkapp").prepend("<div class='palyer_icon' id='plid"+pid+"' style='width:54%;margin-left:20%;'><div class='palyer_img pactive'><img  src='{{url('public/site/image/in_wk.png')}}'></div><div><input type='hidden' name='playersid[]' id='wicketkeeperp' value='"+pid+"'><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='wicketkeeperpname' value='"+pname+"'></div></div>");
$("#wkapp_new").prepend("<div class='cs-pitch-col palyer_icon' id='plid_new"+pid+"'><div class='cs-pitch-payer pactive'><img src='{{url('public/site/image/default-player.png')}}' width='40'><div class='cs-pitch-payer-name'>"+pname+"<input type='hidden' name='playersid[]' id='wicketkeeperp_new' value='"+pid+"'><input type='hidden' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='wicketkeeperpname_new' value='"+pname+"'></div><div class='cs-pitch-payer-points'></div></div></div>");
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);

//captain select
 
/* $("#player_wicketkeeper_c"+wicketkeeper).css('display','block');
$("#captain_id_wicketkeeper_c"+wicketkeeper).val(pid);
$("#captain_name_wicketkeeper_c"+wicketkeeper).val(pname);
$("#captain_name_wicketkeeper_credit_c"+wicketkeeper).val(credit_point);
$("#view_player_name_wicketkeeper_c"+wicketkeeper).text(pname);
$("#view_player_name_wicketkeeper_credit_c"+wicketkeeper).text(credit_point);
$("#view_player_team_name_wicketkeeper_c"+wicketkeeper).text(pteamname); */

//end
//vice captain select
 
/* $("#player_wicketkeeper_vc"+wicketkeeper).css('display','block');
$("#captain_id_wicketkeeper_vc"+wicketkeeper).val(pid);
$("#captain_name_wicketkeeper_vc"+wicketkeeper).val(pname);
$("#captain_name_wicketkeeper_credit_vc"+wicketkeeper).val(credit_point);
$("#view_player_name_wicketkeeper_vc"+wicketkeeper).text(pname);
$("#view_player_name_wicketkeeper_credit_vc"+wicketkeeper).text(credit_point);
$("#view_player_team_name_wicketkeeper_vc"+wicketkeeper).text(pteamname);
 */
//end
//Replace Player
 
$("#player_wicketkeeper_selected"+wicketkeeper).css('display','block');
$("#selected_id_wicketkeeper"+wicketkeeper).val(pid);
$("#selected_name_wicketkeeper"+wicketkeeper).val(pname);
$("#selected_name_wicketkeeper_credit"+wicketkeeper).val(credit_point);
$("#view_player_name_wicketkeeper_selected"+wicketkeeper).text(pname);
$("#view_player_name_wicketkeeper_selected_credit"+wicketkeeper).text(credit_point);
$("#view_player_team_name_wicketkeeper_selected"+wicketkeeper).text(pteamname);

//end
if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
	if($('#captain_id').val()=='' || $('#vicecaptain_id').val()=='')
	{
		$('#change_buttton').prop('disabled', true);
	}
	else
	{
		$('#change_buttton').prop('disabled', false);
	}

}
//credit -= credit_point;

}

 
</script>


	<!--footer-->
   <?php $site=App\SiteSetting::findorfail(1) ?>

	<footer class="cs-footer" style="background-image: url(images/footer-bg.png)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="cs-footer-logo"><img src="{{ url('public/adminlte/site_image',$site->site_logo) }}" height="20"></div>
                        <ul class="cs-footer-links">
                            <li><a href="{{URL::to('about')}}">About Us</a></li>
                            <li><a href="{{URL::to('contact')}}">Contact Us</a></li>
                            <li><a href="{{URL::to('how-to-play')}}">How to Play {{$site->site_name}}</a>	</li>
                        </ul>

                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <h4 class="footer-head text-white font-bold">Resources</h4>
                        <ul class="cs-footer-links">
                            <li><a href="{{URL::to('u-point')}}">Point System</a></li>
                            <li><a href="{{url::to('uscore')}}">Live Scores</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <h4 class="footer-head text-white font-bold">Our Services</h4>
                        <ul class="cs-footer-links">
                            <li><a href="{{url('u_testimonial')}}">Testimonial</a> </li>
                            <li><a href="{{url::to('u_news')}}">News</a>  </li>
                            <li><a href="{{URL::to('faq')}}">FAQs</a></li>
                        </ul>
                    </div>
					
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <h4 class="footer-head text-white font-bold">Contact Us</h4>
                        <ul class="footer-share-it mt-3">
                               <li class="shate-it-item"><a target="_blank" href=@if($site->social_links['fb']) "{{$site->social_links['fb']}}" @endif class="btn btn-share-sm bg-facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="shate-it-item"><a target="_blank" href=  @if($site->social_links['twi'])"{{$site->social_links['twi']}}" @endif class="btn btn-share-sm bg-twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="shate-it-item"><a target="_blank" href= @if($site->social_links['you'])"{{$site->social_links['you']}}" @endif class="btn btn-share-sm bg-google"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                    </div>
                </div>
              
                <div class="copyright-bar clearfix">
                	  <div class="row">
                		<div class="col-sm-12">
                				
								
								<p>{!! $site->footer_text !!} </p>
                		</div>
                	</div>

                  
                </div>
                  <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="copy-text">Copyright 	&#169; {{$site->site_name}} . All Rights Reserved. </div>
                        </div>
                        <div class="col-lg-6">
                         <ul class="text-right-md ">  <a target="_blank"  class="text-white mr-2" href="{{URL::to('privacypolicy')}}"> Privacy Policy </a> | 
						<a target="_blank" class="text-white ml-2"  href="{{URL::to('terms-and-conditions')}}">Terms & Conditions </a> 
					</ul>
                        </div>
                    </div>
            </div>
        </footer>
	
	
    <!--//footer--> 
	 
	
	<script src="{{ url('public/site/js/jquery.min.js') }}"></script> 
 
 
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--<script src="{{ url('public/site/js/bootstrap.min.js') }}"></script>-->
<!--<script src="{{ url('public/site/js/bootstrapvalidator.min.js') }}"></script>-->

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
		
		</script>
-->
		
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js'></script>

 <script src="{{ url('public/site/js/item_slide.js') }}"></script>

	<!--	<script src="{{ url('public/site/js/slide/slidejquery.min.js') }}"></script>

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
		-->
		
		<!-- <script type="text/javascript" src="{{ url('public/site/js/thumbnail-slider.js') }}"></script> -->
		

   <!-- <script src="{{ url('public/site/js/index.js') }}"></script>-->
    
	
	<script>
/* var $theElements = $('#tableContainer tbody tr');
$.each($theElements,function (){
 // $('#tableContainer tbody tr ').trigger('click');
  //console.log( $( this ).text() );
    //do some stuff 
 select_tick(e,type)

 }); */
/*  
 $('#tableContainer table tbody tr').each(function(e){
//   $(this).trigger('click');
//var type="batsman";
	//select_tick(e,type);
	 $(this).data("type", 'wicketkeeper');
	 $("#tableContainer table tbody tr").trigger("click").data("type") //2
    // Will check all the checkbox and trigger the event
}); */






</script>
	

	
	
 <!--<script src="{{ url('public/site/js/jquery.min.js') }}"></script> 
 
 
 
 
<script src="{{ url('public/site/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/site/js/bootstrapvalidator.min.js') }}"></script>-->

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
		
	<!--	<script src="{{ url('public/site/js/slide/slidejquery.min.js') }}"></script>

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
	</script>-->
		
		
		
		

   <!-- <script src="{{ url('public/site/js/index.js') }}"></script>  -->
    
	