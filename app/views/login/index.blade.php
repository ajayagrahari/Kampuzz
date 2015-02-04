@extends('layouts.main')
<?php 

    $breadcrumb_t = 'Login';

    

   
?>

@section('content')

<div class="row">
	  	<div class="col-md-5">
	  		
				<h3>Create a Kampuzz Account</h3>
				

				<input name="email" type="email" class="form-control" id="email" value="" data-bv-field="email" placeholder="Enter your email" />
				
				<input name="name" type="text" class="form-control" id="name" value="" data-bv-field="name" placeholder="Name" />

				<input name="mobile" type="text" class="form-control" id="mobile" value="" data-bv-field="mobile" placeholder="Mobile Number" />

				<input name="password" type="password" class="form-control" id="password" value="" data-bv-field="password" placeholder="Password" />


				<input type="submit" class="btn-social btn-info btn btn-lg" value="Create An Account" />

				
				<hr/>
				<p>Already a Kampuzz account? Click here to <a href="javascript:void(0);" id="loadSignin">login</a></p>
				

	  	</div>

	  	<div class="col-md-1">

	  		<img src="{{ URL::asset('images/or-seperator-vertical.png') }}" />
	  	</div>

	  	<div class="col-md-5">

	  		<div class="socialLoginLinks clearfix"> 
	  		 <button class="btn-social btn-fb" onClick="FBLogin();">Sign in with Facebook</button>   
	  		 <button class="btn-social btn-google" id="google-login-button">Sign in with Google</button> </div>
	  	</div>


	  	@stop