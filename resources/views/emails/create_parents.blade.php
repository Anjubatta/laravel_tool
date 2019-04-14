<h1>Hi, {{ $user->fname }} {{ $user->lname }}</h1>
<p>Thanks for signing up for Child Care</p>
<p>We're happy you're here. Let's get your email address verified:</p>
<p></p>
<p><a href="{{ url('user/verify/'.$user->email.'/'.$user->verify) }}">Click to verify Email</a></p>
<p></p>
<p>you have register your parents profile <b>{{ $user->email }}</b> with us.</p>
<p></p>
<p>Kind Regards</p>
<p><b>Child Care</b></p>

