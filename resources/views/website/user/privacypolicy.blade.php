@include('website.user.header')
@include('website.user.menu1')
<meta name="csrf-token" content="{{ csrf_token() }}" />
	
<div class="page_container">

	<div class="container" style="padding-top:10px">
		<div class="row wall_dd1">
		
			<div class="show_contest">
				<a href="{{URL::to('main')}}"><img src="{{url('public/site/image/show_contest.png')}}">&nbsp;Show me contest</a>
			</div>
		
		</div>				
		<div class="row">
			
			<div class="support_head">
			
				<div class="about_page">
					Privacy Policy
				</div>
				
				
			</div>
		
		
		</div>
		
		<div class="row" style="margin-top: 20px;">
		
			<div class="about_con">
			
			@php($site=App\SiteSetting::findorfail(1))
			{!! $site->privacy_policy !!}			
			{{--	<p class="p_head">
					What personal information do we collect from the people that visit our blog, website or app?
				</p>
				<p class="p_body">
					When ordering or registering on our site, as appropriate, you may be asked to enter your name, 
					email address, mailing address, phone number, Bank details or other details to help you with your experience.
				</p>
				
				<p class="p_head">
					When do we collect information?				
				</p>
				<p class="p_body">
					We collect information from you when you register on our site or enter information on our site.
				</p>
				
				<p class="p_head">
					How do we use your information?				
				</p>
				<p class="p_body">
					We may use the information we collect from you when you register, make a purchase, sign up for our newsletter, respond to a survey or marketing communication, 
					surf the website, or use certain other site features in the following ways:
					<br><br>
					• To personalize your experience and to allow us to deliver the type of content and product offerings in which you are most interested.<br>
					• To allow us to better service you in responding to your customer service requests.<br>
					• To administer a contest, promotion, survey or other site feature.
				</p>
				
				<p class="p_head">
					How do we protect your information?			
				</p>
				<p class="p_body">
					Our website is scanned on a regular basis for security holes and known vulnerabilities in order to make your visit to our site as safe as possible.
						We use Malware Scanning.<br><br>
						Your personal information is contained behind secured networks and is only accessible by a limited number of persons 
						who have special access rights to such systems, and are required to keep the information confidential. In addition, all sensitive/credit 
						information you supply is encrypted via Secure Socket Layer (SSL) technology.<br><br>
						We implement a variety of security measures when a user enters, submits, or accesses their information to maintain the safety of your personal information.<br>
						All transactions are processed through a gateway provider and are not stored or processed on our servers.

				</p>
				
				<p class="p_head">
					Do we use 'cookies'?		
				</p>
				<p class="p_body">
					Yes. Cookies are small files that a site or its service provider transfers to your computer's hard drive through your Web browser (if you allow) that enables the 
					site's or service provider's systems to recognize your browser and capture and remember certain information. For instance, we use cookies to help us remember 
					and process the items in your shopping cart. They are also used to help us understand your preferences based on previous or current site activity, 
					which enables us to provide you with improved services. We also use cookies to help us compile aggregate data about site traffic and site interaction so 
					that we can offer better site experiences and tools in the future.
				</p>
				
				
				<p class="p_head">
					We use cookies to:		
				</p>
				<p class="p_body">
					• Help remember and process the items in the shopping cart.<br>
					• Understand and save user's preferences for future visits.<br>
					• Keep track of advertisements.<br>
					• Compile aggregate data about site traffic and site interactions in order to offer better site experiences and tools in the future. 
					We may also use trusted third-party services that track this information on our behalf.<br><br>
					You can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies. You do this through your browser settings. 
					Since browser is a little different, look at your browser's Help Menu to learn the correct way to modify your cookies.<br><br>
					If you turn cookies off, Some of the features that make your site experience more efficient may not function properly.
					It won't affect the user's experience that make your site experience more efficient and may not function properly.

				</p>
				
				<p class="p_head">
					Third-party disclosure		
				</p>
				<p class="p_body">
					We do not sell, trade, or otherwise transfer to outside parties your Personally Identifiable Information unless we provide users with advance notice. 
					This does not include website hosting partners and other parties who assist us in operating our website, conducting our business, or serving our users, 
					so long as those parties agree to keep this information confidential. We may also release information when it's release is appropriate to comply with the law, 
					enforce our site policies, or protect ours or others' rights, property or safety. <br><br>
					However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.
				</p>
				
				<p class="p_head">
					Third-party links	
				</p>
				<p class="p_body">
					Occasionally, at our discretion, we may include or offer third-party products or services on our website. These third-party sites have separate and independent 
					privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the 
					integrity of our site and welcome any feedback about these sites.
				</p>
				
				<p class="p_head">
					Google	
				</p>
				<p class="p_body">
					Google's advertising requirements can be summed up by Google's Advertising Principles. They are put in place to provide a positive experience for users. <br><br>
					https://support.google.com/adwordspolicy/answer/1316548?hl=en <br><br>
					We have not enabled Google AdSense on our site but we may do so in the future.
				</p>
				
				<p class="p_head">
					How does our site handle Do Not Track signals?
				</p>
				<p class="p_body">
					We honor Do Not Track signals and Do Not Track, plant cookies, or use advertising when a Do Not Track (DNT) browser mechanism is in place.
				</p>
				
				<p class="p_head">
					Does our site allow third-party behavioral tracking?
				</p>
				<p class="p_body">
					It's also important to note that we allow third-party behavioral tracking
				</p>
				
				<p class="p_head">
					Fair Information Practices
				</p>
				<p class="p_body">
					The Fair Information Practices Principles form the backbone of privacy law in the United States and the concepts they include have played a significant role in 
					the development of data protection laws around the globe. Understanding the Fair Information Practice Principles and how they should be implemented is critical 
					to comply with the various privacy laws that protect personal information.
				</p>
				
				<p class="p_head">
					In order to be in line with Fair Information Practices we will take the following responsive action, should a data breach occur:
				</p>
				<p class="p_body">
					We will notify you via email<br>
					• Within 7 business days<br><br>
					We also agree to the Individual Redress Principle which requires that individuals have the right to legally pursue enforceable rights against data collectors 
					and processors who fail to adhere to the law. This principle requires not only that individuals have enforceable rights against data users, but also that 
					individuals have recourse to courts or government agencies to investigate and/or prosecute non-compliance by data processors.

				</p> --}}
			
			</div>
		
		</div>		
		
		
	</div>
     
</div>
    <!--//page_container-->
	
		@include('website.user.footer');

