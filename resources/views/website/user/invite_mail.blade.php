<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>

    <!-- For development, pass document through inliner -->
    

    <style type="text/css">

   * {
  margin: 0;
  padding: 0;
  font-size: 100%;
  font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
  line-height: 1.65; }

img {
  max-width: 100%;
  margin: 0 auto;
  display: block; }

body,
.body-wrap {
  width: 100% !important;
  height: 100%;
  background: #efefef;
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: none; }

a {
  color: #71bc37;
  text-decoration: none; }

.text-center {
  text-align: center; }

.text-right {
  text-align: right; }

.text-left {
  text-align: left; }

.button {
  display: inline-block;
  color: white;
  background: #71bc37;
  border: solid #71bc37;
  border-width: 10px 20px 8px;
  font-weight: bold;
  border-radius: 4px; }

h1, h2, h3, h4, h5, h6 {
  margin-bottom: 20px;
  line-height: 1.25; }

h1 {
  font-size: 32px; }

h2 {
  font-size: 28px; }

h3 {
  font-size: 24px; }

h4 {
  font-size: 20px; }

h5 {
  font-size: 16px; }

p, ul, ol {
  font-size: 16px;
  font-weight: normal;
  margin-bottom: 20px; }

.container {
  display: block !important;
  clear: both !important;
  margin: 0 auto !important;
  max-width: 580px !important; }
  .container table {
    width: 100% !important;
    border-collapse: collapse; }
  .container .masthead {
    padding: 30px 0;
    background: #51b6fa;
    color: white; }
	.masthead img{
		width:70%;
	}
    .container .masthead h1 {
      margin: 0 auto !important;
      max-width: 90%;
      text-transform: uppercase; }
  .container .content {
    background: white;
    padding: 30px 35px; }
    .container .content.footer {
      background: none; }
      .container .content.footer p {
        margin-bottom: 0;
        color: #888;
        text-align: center;
        font-size: 14px; }
      .container .content.footer a {
        color: #888;
        text-decoration: none;
        font-weight: bold; }


    </style>
</head>
<body>
<table class="body-wrap">
    <tr>
        <td class="container">
@php($site=App\SiteSetting::findorfail(1))
            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead">

					<!-- <img src="http://<?php echo $_SERVER['SERVER_NAME']?>/public/site/image/<?php //echo $site->site_logo?>" >  --> <img src="{{ URL::asset('public/adminlte/site_image/logo.png') }}" >
                    </td>
                </tr>
                <tr> 
                    <td class="content">

                        <h3>Dear {{$admin['friend_email']}},</h3>

                        <p>
						@php($user_id=base64_encode(Auth::user()->id))
						You are getting this mail as your friend,{{Auth::user()->name}} invited you through the {{$site->site_name}} site</p>
						<p>{{$site->site_name}} - http://<?php echo $_SERVER['SERVER_NAME']?>/refer/{{$user_id}} 
						
						</p>
						<br><br>

						<p> Regards,<br> {{$site->site_name}} Team,<br><a> {{$site->email}}</a></p>
						
                       

                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td class="content footer" align="center">
                       <!--<p>No.36 . K.R.Ramasamy nagar,Velachery main road ( near Gurunanak College),Velachery, chennai 42,Phone No : +91 9840270475  .</p>-->
                        <p><a href="mailto:">{{$site->site_name}}</a></p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
</body>
</html>