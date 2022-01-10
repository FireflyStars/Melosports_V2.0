<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Bootstrap 3 Registration Form with Validation</title>


  
  <link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/bootstrap.min.css') }}">
<link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/bootstrap-theme.min.css') }}">
<link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/bootstrapValidator.min.css') }}">

      <link rel="stylesheet" href="{{ URL::to('public/site/css/style.css') }}">

  
</head>

<body>

	  	<!--header-->
    <div class="header">
    	<div class="wrap">
        	<div class="navbar navbar_ clearfix">
					
					<div class="container">
					
							<div class="row">
							 <div class="col-md-6">
									<div class="logo"><a href="index.html"><img src="" alt="" /></a></div>                        
								</div>
							<div class="col-md-6">
								
							<form class="form-horizontal" action=" {{URL::to('userLogin')}}" method="post"  id="contact_form">
								  <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">
								<!-- Text input-->
								  <div class="col-md-4 inputGroupContainer">
								  <div class="input-group">
								  <input name="email" placeholder="E-Mail Address" class="form-control"  type="email">
									</div>
								  </div>
								<!-- Text input-->
									<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
								  <input name="password" placeholder="Password" class="form-control"  type="password">
									</div>
								  </div>
								<!-- Select Basic -->
								<!-- Success message -->
								<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

								<!-- Button -->


								  <div class="col-md-2">
									<button type="submit" class="btn btn-warning" >Log in</button>
								  </div>
								 <div class="col-md-2">
									<button type="submit" class="btn btn-warning" >Join Now</button>
								  </div>
								  
								  <div class="col-md-4">
										<input type="checkbox">&nbsp;&nbsp;Remember me</button>
									  </div>
									
									<div class="col-md-4">
										<a>Forget Password?</a>
									  </div>
							
								</form>
																
						
							</div>
							</div>
							
							
							
					</div>
                    
                       
                     
                    </div>                
              
             
        </div>    
    </div>
    <!--//header--> 


	