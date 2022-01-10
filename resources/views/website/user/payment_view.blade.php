@include('website.user.header')
{{-- @include('website.user.menu1') --}}
<div class="cd-main-content sub-nav">
<div class="container">
    <div class="row mt-80 mb-80">  
    <div class="mobile-verify-inputy ">	
        
		<div class="col-md-6">
		<div class="white-box">
		<div class="control-label"><h1>Payment Details</h1></div>
        <hr>
			            
			<form  class="form-image-upload" name="my_form" method="POST" enctype="multipart/form-data">              
			{!! csrf_field() !!}              
			@if (count($errors) > 0)                
				<div class="alert alert-danger">      
			<strong>Whoops!</strong> There were some problems with your input.<br><br>    
			<ul>                            @foreach ($errors->all() as $error)
			
                                <li>{{ $error }}</li>
								
								
                            @endforeach
                        </ul>
                    </div>
                @endif
				{{-- {{Auth::user()->user_wallet_current_amount}} --}}

                
                <div class="form-group">                
                    <label class=" control-label">Name :</label>  
                    <input  name="name" class="form-control" type="text" required   placeholder="Name" value="{{Auth::user()->name}}"> 
                </div>

				<div class="form-group">
                       <label class="  control-label"> Mobile No:</label>  
                        <input  name="mobile_no" class="form-control" type="text" required  value="{{Auth::user()->mobile_number}}" placeholder="Mobile No.">
                </div>
				<div class="form-group">
                   <label class="control-label"> Email:</label>  
                    <input  name="email" class="form-control" type="text" required  value="{{Auth::user()->email}}" placeholder="Mobile No.">
                </div>
                <div class="form-group">
                  <label class="control-label"> Address:</label>  
                    <textarea class="form-control" placeholder="Address" required name="address">{{Auth::user()->address}}</textarea>
                </div>
              @php($currency_set=App\CurrencySetting::findorfail(1))
		@php($currency=App\Currency::whereid($currency_set->currency_id)->first())



		@if($currency->symbol_format==0)	   <a class="btn btn-info-outline">Amount : {{$currency->symbol}} {{$payment_amount}}  {{$currency->code}} </a> <br> @else
			 
			 <a class="btn btn-info-outline">Amount :   {{$currency->code}} {{$payment_amount}}  {{$currency->symbol}}  </a> <br>@endif
				
				 @php($pay_apikey=App\PaymentSetting::findorfail(1))
          @php($status=$pay_apikey->gateway_status)
  
          <?php if($status==0){ ?>
@if($pay_apikey->instamojo_status==0)
                <div class="form-group">
				<input type="submit" class="btn btn-primary" value="Pay with instamojo" OnClick="document.forms['my_form'].action = '{{url('insta-post')}}'">
    </div>
	@endif
	
	@if($pay_apikey->payu_status==0)
<div class="form-group">				
                <input type="submit" class="btn btn-primary" value="Pay with Payumoney"  OnClick="document.forms['my_form'].action = '{{url('payment-post')}}'">
				</div>
				
				@endif
		  <?php } else {?>
			
			
				<p style="color:red">please Contact Admin.</p>
		  <?php  }?>

					 <input name="payment_amount" class="form-control" type="hidden" required value="{{$payment_amount}}" placeholder="Mobile No.">
						 {{-- <div class="col-md-4">
                        <br/>
                        <div class="btn btn-info btn-block">
                            Amount : {{$payment_amount}} Rs/-
                        </div>
						 </div> --}}
			
            </form>
			
			
			@if($pay_apikey->pay_pal_status==0)
			<?php 
			
			$paypal_url='https://www.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
//$paypal_id='sriniv_1293527277_biz@inbox.com'; // Business email ID	

          $paypal_id=$pay_apikey->pay_pal_credential['key'];         ?>         

 <form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1'>
			
			
			
			 <input name="business" type="hidden" value="{{$paypal_id}}">
			
			
			<input name="cmd" type="hidden" value="_xclick">
			
			  <input  name="name" class="form-control" type="hidden" required   placeholder="Name" value="{{Auth::user()->name}}"> 
			
			
			<input  name="mobile_no" class="form-control" type="hidden" required  value="{{Auth::user()->mobile_number}}" placeholder="Mobile No.">
			
			
			
			 <input  name="email" class="form-control" type="hidden" required  value="{{Auth::user()->email}}" placeholder="Mobile No.">
			
			
			<input type='hidden' name='amount' id="paypalamount" value="{{$payment_amount}}">
			
			<input type='hidden' name='no_shipping' value='1'>
                    <input type='hidden' name='currency_code' value="{{$currency->code}}">
                    <input type='hidden' name='handling' value='0'>
                    <input type='hidden' name='cancel_return' value="{{url('paypal-cancel')}}">
                    <input type='hidden' name='return' value="{{url('paypal-success')}}">
			
			
			 <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			
		</form>
			@endif
			
			
			
        </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
@include('website.user.footer');
