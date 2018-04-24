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
		$_SESSION['user'] = $info['fname'].' '.$info['lname'];
		$_SESSION['email'] = $info['email'];
//		var_dump($info);

		include('view/home.php');
	}
	else
	{
		//header('Location:view/login.html');
		header('Refresh:0');
		echo '<script>alert("Wrong Email / Password \nPlease Try Again");//window.location.href="https://web.njit.edu/~kxg2/todo";</script>';

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

	header('Location : ../');
	echo "<br><br><h1 style='text-align:center;color:black;'>Successful sign 
in!</h1>";
	header('Refresh:2');	
	break;

	case 'add':
		break;

	case 'delete':
		break;
	
	case 'edit':
		break;

	case 'check':
		check( filter_input(INPUT_POST,'id') );
		//header('Refresh:2');
		echo 
'<script>window.location.href="https://web.njit.edu/~kxg2/todo/";</script>';
		break;

        case 'revert':
                check( filter_input(INPUT_POST,'id') );
                header('Refresh:2');
                break;

	case 'logout':
		session_unset();
		session_destroy();
		header('Location:view/login.html');
		echo '<script>alert("Logout Successful");</script>';
		break;

	default:
		if( isset($_SESSION['user']) )
		{
			include('home.php');
			//header('location:home.php');
		}
		else
		{	
			header('Location:view/login.html');	
		}
}
?>
