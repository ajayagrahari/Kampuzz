@extends('layouts.main')
<?php 

    $breadcrumb_t = 'Login';

    

   
?>

@section('content')


<div class="row">
	  	<div class="col-md-5">
	  		<div id="signupTemplate" class="signin-container">

				<h3>Create a Kampuzz Account</h3>
				{{ Form::open(array('url' => 'signup', 'method' => 'post')) }}

				<input name="email" type="email" class="form-control" id="email" value="" data-bv-field="email" placeholder="Enter your email" />
				
				<input name="name" type="text" class="form-control" id="name" value="" data-bv-field="name" placeholder="Name" />

				<input name="mobile" type="text" class="form-control" id="mobile" value="" data-bv-field="mobile" placeholder="Mobile Number" />

				<input name="password" type="password" class="form-control" id="password" value="" data-bv-field="password" placeholder="Password" />


				<input type="submit" class="btn-social btn-info btn btn-lg" value="Create An Account" />

				{{ Form::close() }}
				<hr/>
				<p>Already a Kampuzz account? Click here to <a href="javascript:void(0);" id="loadSignin"><font color="blue">login</font></a></p>
				
			</div>
			<div id="signinTemplate" class="signin-container" style="display:none;">

				<h3>Signin with your Kampuzz Account</h3>
				{{ Form::open(array('url' => 'signin', 'method' => 'post')) }}

				<input name="email" type="email" class="form-control" id="email" value="" data-bv-field="email" placeholder="Enter your email" />
				
				
				<input name="password" type="password" class="form-control" id="password" value="" data-bv-field="password" placeholder="Password" />


				<input type="submit" class="btn-social btn-info btn btn-lg" value="Sign IN" />

				{{ Form::close() }}
				<hr/>
				<p>Dont have a Freecharge account? Click here to <a href="javascript:void(0);" id="loadSignup"><font color="blue">create one</font></a></p>
				<div class="col-md-12">
					
					<a href="#" data-toggle="modal" data-target="#forgetpassword">Forgot your password?</a>
				</div>
			</div>
	  	</div>

	  	<div class="col-md-1">

	  		<img src="{{ URL::asset('images/or-seperator-vertical.png') }}" />
	  	</div>

	  	<div class="col-md-5">

	  		<div class="socialLoginLinks clearfix"> 
	  		 <button class="btn-social btn-fb" onclick="login('{{ route('fblogin') }}')">Sign in with Facebook</button>   
	  		 <button class="btn-social btn-google" onclick="login('{{ route('glogin') }}')" id="google-login-button">Sign in with Google</button> </div>
	  	</div>
	  	<script type="text/javascript">
	  	$("#loadSignin").click(function(){

	  		$("#signinTemplate").show();
	  		$("#signupTemplate").hide();

	  	});
	  	$("#loadSignup").click(function(){

	  		$("#signinTemplate").hide();
	  		$("#signupTemplate").show();

	  	});
	  	function login(url){
	  	//alert(url);
	  		window.location.href=url;
	  	}
	  	</script>

	  	@stop