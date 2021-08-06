Hello {{$email_data['name']}},
<br><br>
Greetings!<br>
Welcome to <a href="{{env('APP_URL')}}">ready3dmodels.com</a>!
<br>
Please click the link below to verify your email address and activate your account.<br><br>
<a href="{{env('APP_URL')}}/verify?code={{$email_data['verification_code']}}">Click here</a>
<br><br>
<i>If it was not you then just ignore.</i>

Thank you!
<br>
Ready 3D Models Team.
