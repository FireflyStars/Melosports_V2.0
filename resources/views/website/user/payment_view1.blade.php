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
			            
			<form  class="form-image-upload" name="my_form" method="POST" enctype="multipart/form-data">                {!! csrf_field() !!}                @if (count($errors) > 0)                    <div class="alert alert-danger">                        <strong>Whoops!</strong> There were some problems with your input.<br><br>                        <ul>                            @foreach ($errors->all() as $error)
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
                <a class="btn btn-info-outline">Amount : {{$payment_amount}} Rs/-</a> <br>
				
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
        </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
@include('website.user.footer');
