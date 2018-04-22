<?php
require('model/database.php');
require('model/access_db.php');

$action = filter_input(INPUT_POST, 'action');

switch($action)
{
case 'login':
	$email = filter_input(INPUT_POST, 'email');
	$pass = filter_input(INPUT_POST, 'pass');		
	$info=login($email,$pass);
	if( $info )
	{
		session_start();
		$_SESSION['user'] = $info[1];
		include('home.php');
	}
	else
	{
		echo '<script>alert("Wrong Email / Password");</script>';
		//header('Location:view/login.html');
	}
	break;

case 'signup':
	$fname = filter_input(INPUT_POST, 'fname');
	$lname = filter_input(INPUT_POST, 'lname');
	$email = filter_input(INPUT_POST, 'email');
	$bday = filter_input(INPUT_POST, 'bday');
	$phone = filter_input(INPUT_POST, 'phone');
	$gender = filter_input(INPUT_POST, 'gender');
	$pass = filter_input(INPUT_POST, 'pass');

		//echo "$fname $lname $email $bday $phone $gender $pass";

	signup($fname, $lname, $email, $bday, $phone, $gender, $pass);
	        //header("Refresh:5; url=index.php");
	echo "<br><br><h1 style='text-align:center;color:white;'>Successful sign in!</h1>";
	break;

	case 'o':
		break;

	case 'o':
		break;

	case 'o':
		break;

	default:
		if( isset($_SESSION['user']) )
		{
			//include('home.php');
			header('location:home.php');
		}
		else
		{	
			header('Location:view/login.html');	
		}
		break;
}
?>
