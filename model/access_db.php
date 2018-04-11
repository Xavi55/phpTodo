<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE categoryID = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['categoryName'];
    return $category_name;
}

function login($email,$pass)
{
	global $db;
    $query = 'SELECT * FROM accounts WHERE password = :name AND email=:email';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $email);
    $statement->bindValue(':email', $pass);
    $statement->execute();
    $statement->closeCursor();
}

function signup($fname,$lname,$phone,$bday,$gender,$email,$pass)
{
	global $db;
    $query = 'INSERT into accounts (email,fname,lname,phone,birthday,gender,password) 
VALUES (:email,:fname,:lname,:phone,:bday,:gender,:pass)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue('fname', $fname);
    $statement->bindValue('lname', $lname);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':bday', $bday);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':pass', $pass);
    $statement->execute();
    $statement->closeCursor();
}



function delCat($name) {
    global $db;
    $query = 'DELETE FROM categories WHERE categoryName = :name';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function addCat($name) 
{
    global $db;
    $query = "INSERT INTO categories (categoryName) VALUES (:name)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}
?>
