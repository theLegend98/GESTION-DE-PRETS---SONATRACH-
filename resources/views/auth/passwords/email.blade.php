<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('plugins/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/vendor/daterangepicker/daterangepicker.css') }}') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/css/main.css') }}">
    <style>
    #leftHalf
     {
        background: url({{ asset('dist/img/right-1-2.jpg') }});
        filter: blur(0px);
        -webkit-filter: blur(8px);
        width: 50%;
        position: absolute;
        left: 0px;
        height: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        z-index: -1;
     }
     #rightHalf {
        background: url({{ asset('dist/img/left-2.jpg') }});
        filter: blur(8px);
        -webkit-filter: blur(8px);
        width: 50%;
        position: absolute;
        right: 0px;
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
        z-index: -1;
     }
     </style>

</head>
<body>
    <div id="leftHalf"></div>
    <div id ="rightHalf"></div>
	<div class="limiter" >
		<div class="container-login100" style=" z-index: 1;">
			<div class="wrap-login100">

				<form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
                    @csrf

					<span class="login100-form-title p-b-26">
						Bienvenue
					</span>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            @if(session('status')=="passwords.sent")
                             Lien envoyé
                            @endif
                        </div>
                    @endif
					<span class="login100-form-title p-b-48">
                        <a href="https://sonatrach.com/" target="_blank"><img src="{{ asset('dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image" style="width:65px;max-height:120%;height:72px;"></a>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "L'adresse e-mail valide est: a@b.c">
						<input class="input100 " type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
                    @error('email')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        @if($message=="passwords.user")
                                        <strong>email inéxistant</strong>
                                        @endif
                                    </span>
                                @enderror



					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Envoyer le lien de réinitialisation
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">

						</span>


						<a class="txt2" href="#">

						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
    <footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="">ESI-SBA</a>, </strong><strong><a  href="">SONATRACH</a></strong>.
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

<!--===============================================================================================-->
	<script src="{{ asset('plugins/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('plugins/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('plugins/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('plugins/js/main.js') }}"></script>

</body>
</html>
