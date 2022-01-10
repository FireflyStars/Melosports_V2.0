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
    padding: 50px 0;
    background: #71bc37;
    color: white; }
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

            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead">

                        <h2>Leaguerocks</h2>

                    </td>
                </tr>
                <tr>
                    <td class="content">

                        <h3>Dear {{$admin['name']}},</h3>

                        <p>
						You are recieving this email some the below customer purchased our Course.</p>
						
						<p>
					
						
						Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:{{$admin['email']}}<br>
						Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:{{$admin['mobile']}}<br>
					
					
						Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:{{$admin['amount']}} <br>
						TransactionId&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:{{$admin['TransactionId']}} <br>
						</p>

						<p> Thank You,<br> Rangvatacademy Team,<br><a>info@rangvatacademy.in</a></p>
						
                       

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
                        <p>No.36 . K.R.Ramasamy nagar,Velachery main road ( near Gurunanak College),Velachery, chennai 42,Phone No : +91 9840270475  .</p>
                        <p><a href="mailto:">RANGVAT ACADEMY</a></p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
</body>
</html>