	
	 <!--footer-->
    <div id="footer">
    	<div class="wrap">
    		<div class="container">
            	<div class="row">
                	<div class="col-md-3">
                    	<h2 class="title">Latest tweets</h2>
                        <div class="tweet_block"></div>                       
                    </div>
                    
                    <div class="col-md-3">
                    	<h2 class="title">Testimonials</h2>
                        <ul>
                        	<li>
                            	<span class="testimonials_arrow"></span>Orci nisi, luctus vitae imperdiet a, iquam vel urna. Pellentesque tincidunt laoreet est, in tristique sapien consequat a purus at ullamcorper pulvinar, massa libero magna.
                            	<div class="clear"></div>
                                <div class="author">Anna Smith, Company inc.</div>
                            </li>
                            <li>
                            	<span class="testimonials_arrow"></span>Luctus vitae imperdiet a, iquamorci nisi lorem. Pellentesque tincidunt laoreet est, in tristique sapien consequat a purus at ullam pulvinar, massa libero consequat egestas mas.
                            	<div class="clear"></div>
                                <div class="author">John Doe, Company inc.</div>
                            </li>
                        </ul>                     
                    </div>
                    <div class="col-md-3">
                    	  	<h2 class="title">Testimonials</h2>
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
                    	<h2 class="title">Get in touch!</h2>
                        <form action="#" method="post">
                        	<input class="span3" type="text" name="name" id="name" value="Name" onFocus="if (this.value == 'Name') this.value = '';" onBlur="if (this.value == '') this.value = 'Name';" />
                            <input class="span3" type="text" name="email" id="email" value="Email" onFocus="if (this.value == 'Email') this.value = '';" onBlur="if (this.value == '') this.value = 'Email';" />
                            <textarea name="message" id="message" class="span3" onFocus="if (this.value == 'Message') this.value = '';" onBlur="if (this.value == '') this.value = 'Message';" >Message</textarea>
                            <div class="clear"></div>
                            <input type="reset" class="btn dark_btn" value="Clear form" />
                            <input type="submit" class="btn send_btn" value="Send!" />
                            <div class="clear"></div>
                        </form>
                    </div> 
					
            	</div>
        	</div>            
        </div>

    </div>
    <!--//footer-->    

	
	
  <script src="{{ URL::to('public/site/js/jquery.min.js') }}"></script>
<script src="{{ URL::to('public/site/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('public/site/js/bootstrapvalidator.min.js') }}"></script>

    <script src="{{ URL::to('public/site/js/index.js') }}"></script>

</body>
</html>
