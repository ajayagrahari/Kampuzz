<?php

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
class LoginController extends BaseController {

	public function __construct() {
		
		session_start();
		parent::__construct();
	}

	public function index()
	{
		return View::make('login.index');
	}

	public function signin()
	{
		$data=Input::only('email');
		return $data;
	}

	public function signup()
	{	
		$data=Input::only('name');
		return $data;
	}

// 	public function fbLogin()
// 	{	
// 		session_start();
// 		 FacebookSession::setDefaultApplication('1771027263122867', 'fb3507d4b58120b13fba1dc43fa5a204');
// 		  $helper = new FacebookRedirectLoginHelper('http://localhost/Kampuzz');
// 		// init app with app id (APPID) and secret (SECRET)

 
// // login helper with redirect_uri
	
		 
// 		try {
// 		  $session = $helper->getSessionFromRedirect();
// 		} catch( FacebookRequestException $ex ) {
// 		  // When Facebook returns an error
// 		} catch( Exception $ex ) {
// 		  // When validation fails or other local issues
// 		}
		 
// 		// see if we have a session
// 		if (isset($session)){
// 		  // graph api request for user data
// 		  $request = new FacebookRequest( $session, 'GET', '/me' );
// 		  $response = $request->execute();
// 		  // get response
// 		  $graphObject = $response->getGraphObject();
		   
// 		  // print data
// 		  echo  print_r( $graphObject, 1 );
// 		} else {
// 		  // show login url
// 		  header('location:$helper->getLoginUrl()');
// 		}
		
// 	}

	public function googleLogin($action=NULL)
	{	
		if($action=='auth'){
			try
			{
				Hybrid_Endpoint::process();
			}
			catch (Exception $e){
				return Redirect::route('login');
			}
			return;

		}
		try {
		// create a HybridAuth object
		$socialAuth = new Hybrid_Auth(app_path() . '/config/google_auth.php');
		// authenticate with Google
		$provider = Hybrid_Auth::authenticate("Google");
		// fetch user profile
		$userProfile = $provider->getUserProfile();
	}
	catch(Exception $e) {
		// exception codes can be found on HybBridAuth's web site
		return $e->getMessage();
	}
	// access user profile data
	// echo "Connected with: <b>{$provider->id}</b><br />";
	// echo "As: <b>{$userProfile->displayName}</b><br />";
	// echo "<pre>" . print_r( $userProfile, true ) . "</pre><br />";
	$credentials = array(
                		'email' => $userProfile->email ,
                		'social_id' => $userProfile->identifier,
                	//	'social_access_token' => (string) $session->getAccessToken()
            	);
	    		$user = User::where($credentials)->first() ;
	    		if(!$user) {
            	$is_verified=isset($userProfile->emailVerified)?'YES':'NO';
	    			$data = [
	    					'name' => $userProfile->displayName,
	    					'email'=> $userProfile->email,
	    					'social_id' => $userProfile->identifier ,
	    					'social_entity_type' => $provider->id,
	    					'gender' => $userProfile->gender,
	    					'is_verified' => $is_verified,
	    					//'social_access_token' => (string) $session->getAccessToken()
	    			] ;
	    			$s = User::insert($data);
	    			$user = User::where($credentials)->first() ;
	    		}
	    		Session::put('provider', 'Google');
	    		$provider->logout();
	    		Auth::login($user);
	    		if($user) {		
               		return Redirect::to(route('home'));
            	}

	
		
	}
	public function facebookLogin($action=NULL)
	{	
		if($action=='auth'){
			try
			{
				Hybrid_Endpoint::process();
			}
			catch (Exception $e){
				return Redirect::route('login');
			}
			return;

		}
		try {
		// create a HybridAuth object
		$socialAuth = new Hybrid_Auth(app_path() . '/config/fb_auth.php');
		// authenticate with Google
		$provider = $socialAuth->authenticate("Facebook");
		// fetch user profile
		$userProfile = $provider->getUserProfile();
	}
	catch(Exception $e) {
		// exception codes can be found on HybBridAuth's web site
		return $e->getMessage();
	}
	// access user profile data
	$credentials = array(
                		'email' => $userProfile->email ,
                		'social_id' => $userProfile->identifier,
                	//	'social_access_token' => (string) $session->getAccessToken()
            	);
	    		$user = User::where($credentials)->first() ;
	    		if(!$user) {
            	$is_verified=isset($userProfile->emailVerified)?'YES':'NO';
	    			$data = [
	    					'name' => $userProfile->displayName,
	    					'email'=> $userProfile->email,
	    					'social_id' => $userProfile->identifier ,
	    					'social_entity_type' => $provider->id,
	    					'gender' => $userProfile->gender,
	    					'is_verified' => $is_verified,
	    					//'social_access_token' => (string) $session->getAccessToken()
	    			] ;
	    			$s = User::insert($data);
	    			$user = User::where($credentials)->first() ;
	    		}
	    			
	    		Session::put('provider', 'Facebook');
	    		Auth::login($user);
	    		if($user) {		
               		return Redirect::to(route('home'));
            	}

	
	}

	public function logout(){
		
		if(Session::get('provider')=="Facebook"){
		//unset the entire session.
		$socialAuth = new Hybrid_Auth(app_path() . '/config/fb_auth.php');
		$provider = $socialAuth->authenticate("Facebook");
		$adapter = $socialAuth->getAdapter( 'Facebook' );

		$params = array( 
		    // 'next' => 'https://www.myapp.com/after_logout' // optional
		);

		$fb_logout_url = $adapter->api()->getLogoutUrl(); 
		$provider->logout();
		Auth::logout(); // log the user out of our application
		Session::flush();
		return Redirect::to($fb_logout_url) ;

		return Redirect::to('login') ;
		}

		if(Session::get('provider')=="Google"){

		$socialAuth = new Hybrid_Auth(app_path() . '/config/google_auth.php');
				// authenticate with Google
				$provider = Hybrid_Auth::authenticate("Google");
				$provider->logout();
		Auth::logout(); // log the user out of our application
		Session::flush();
		return Redirect::to('login') ;
		}	
		// echo $fb_logout_url;
		// exit();



		// if(Session::get('provider')=="Facebook"){
		// 	$socialAuth = new Hybrid_Auth(app_path() . '/config/fb_auth.php');
		// // authenticate with Google
		// $provider = $socialAuth->authenticate("Facebook");
		// $provider->logout();
		// }
		
		// Auth::logout(); // log the user out of our application
		// Session::flush();
		// //unset the entire session.
		// return Redirect::to('login') ; //->with('message','Logout Successfully , Bye ! Hope to see you soon') ;

	}
	public function forgetpassword(){

			$email = Input::get('email');
			$user = User::where('email','=',$email)->first() ;
			
			$forgetpassword_key = md5($email . rand());
			$affectedRows = User::where('email','=',$email)->update(array('forget_password_key' => $forgetpassword_key));
			
			$url="localhost/Kampuzz/public/passwordrecovery/".$forgetpassword_key;


			Mail::send('emails.welcome',array('user'=>$user['name'],'url'=>$url), function($message) use ($email)
			{    
			    $message->to($email)->subject('Kampuzz Password Recovery Details');    
			});
			// var_dump( Mail:: failures());
			// exit;
			if(!$user){
				return "E-mail does not exist in our database, kindly create new account with this email-id";
			}
			return "An e-mail has been sent to the mentioned e-mail address

					The e-mail contains the instructions for resetting your password. If you don't receive this e-mail,
					please check your junk mail folder";
		}

	public function passwordrecovery($token){
			$user = User::where('forget_password_key','=',$token)->first() ;
			
			$email=$user['email'];
			return View::make('login.resetpassword', compact('token','email')); 
		}
	public function resetpassword(){
			$email = Input::get('email');
			$password=md5(Input::get('password'));
			$token=Input::get('token');
			$affectedRows = User::where('forget_password_key','=',$token)->update(array('password' => $password));
			if($affectedRows>0){
				return Redirect::to(route('home'))->with('message','Password reset successfully');
			}
			return "Failed";
		}

}
