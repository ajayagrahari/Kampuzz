<?php
	$breadcrumb_t = 'Reset Password' ;
?>

@extends('layouts.main')


@section('content')


	<div class="row">
	  	<div class="col-md-12">

				<h3>Create a Kampuzz Account</h3>

				{{ Form::open(array('route' => array('resetPassword'), 'method' => 'post','id'=>'resetform')) }}

		        <div class="col-md-8">
		        	<div class="col-md-3" >
		            {{Form::label('email','Email')}}
		        	</div>
		            <div class="col-md-9" >
		            {{Form::label('email',$email)}}
		        	</div>
		        </div>

		       
		            {{Form::hidden('token',$token)}}
		       
		       		 {{Form::hidden('email',$email)}}
		       
		        
		        <div class="col-md-8">
		        	<div class="col-md-3" >
		            {{Form::label('password','Reset Password')}}
		            </div>
		            <div class="col-md-9" >
		            {{Form::password('password',array('id'=>'password','class' => 'form-control'))}}
		        	</div>
		        </div>
		         <div class="col-md-8">
		        	<div class="col-md-3" >
		            {{Form::label('cpassword','Confirm Password')}}
		            </div>
		            <div class="col-md-9" >
		            {{Form::password('cpassword',array('id'=>'cpassword','class' => 'form-control'))}}
		        	</div>
		        </div>
		         <div class="form-group">
		         	<div class="col-md-12">
		        	{{Form::submit('Update', array('id'=>'updatepassword','class' => 'btn-sm btn btn-primary'))}}
		       		</div>
		       	</div>

				

				{{ Form::close() }}
				
	  	</div>

	 

	  
  </div>
<script>
$( "#updatepassword" ).click(function(event) {
    event.preventDefault();
    pass1=$("#password").val();
    pass2=$("#cpassword").val();
 if(pass1){
if(pass1==pass2){
	$("#resetform").submit();
}
else{
	alert("password field does not match");
}
}
else
	alert('please fill password to update');
 
  
});
</script>
@stop