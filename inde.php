<?php
require('model/access_db.php');


$action = filter_input(INPUT_POST, 'action');
switch($action)
{
	case '':
		include('view/login.html');
		break;

	case 'login':
		$email = filter_input(INPUT_POST, 'email');
		$pass = filter_input(INPUT_POST, 'pass');
		
		echo $email;
		echo $pass;
		
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

		break;

	case 'o':
		break;

	case 'o':
		break;

	case 'o':
		break;

	case 'o':
		break;
}

/*
if ($action == NULL) 
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) 
    {
        $action = 'list_products';
    }
}
*/



if ($action == 'list_products') 
{
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) 
    {
        $category_id = 1;
    }
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $products = get_products_by_category($category_id);
    include('product_list.php');
} 



else if ($action == 'delete_product') 
{
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } 
    else 
    { 
        delete_product($product_id);
        header("Location: .?category_id=$category_id");
    }
} 
else if ($action == 'show_add_form') 
{
    $categories = get_categories();
    include('product_add.php');    
}
 

else if($action=='list_categories')
	{
		$categories = get_categories();
		include('category_list.php');    		
	}

else if($action=='category_add')
	{
		$categories = get_categories();
		include('category_add.php');	
	}



	else if($action=='addCategory')
	{
		$cName = filter_input(INPUT_POST,'cName');
		if ($cName == NULL || $cName=="") 
		{
        		$error = "Invalid Category data. Check all fields and try again.";
        		include('../errors/error.php');
		}

		else
		{
			addCat($cName);
		        header("Location: .?action=list_categories");

		}
}

else if($action=='delete_category')
	{
		$cName = filter_input(INPUT_POST,'cName');
		delCat($cName);
	        header("Location: .?action=list_categories");
	}






else if ($action == 'add_product') 
{
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price');
    if ($category_id == NULL || $category_id == FALSE || $code == NULL || $name == NULL || $price == NULL || $price == FALSE) 
	{
        	$error = "Invalid product data. Check all fields and try again.";
        	include('../errors/error.php');
	} 
else { 
        add_product($category_id, $code, $name, $price);
        header("Location: .?category_id=$category_id");
    }
}
?>
