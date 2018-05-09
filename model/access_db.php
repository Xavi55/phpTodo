<?php
//include('database.php');

function test()
{
	echo "hello";
}

function login($email,$pass)
{
	//global $db;	
	$db=Database::getDB();
	
    $query = 'SELECT * FROM accounts WHERE email=:email AND password=:pass';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':pass', $pass);
    $statement->execute();
    $res=$statement->fetch();
    $ok = $statement->rowCount();
    $statement->closeCursor();
	if( $ok==1 )
	{
		return $res;
	} 
	else
	{
		return 0;
	}
}

function signup($fname, $lname, $email, $bday, $phone, $gender, $pass)
{
	//global $db;
	$db=Database::getDB();

    $query = "INSERT INTO accounts 
	(email, fname, lname, phone, birthday, gender, password) 
	VALUES
	(:email,:fname,:lname,:phone,:bday,:gender,:pass)";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':bday', $bday);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':pass', $pass);
    $statement->execute();
    $statement->closeCursor();
}

function getTasks($email)
{
    $db=Database::getDB();

    $query='Select * from todos WHERE owneremail=:email AND isdone=0';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();

    $tasks=[];
    while( $row=$statement->fetch() )
    {
       $tasks[]= $row;
    }
    $statement->closeCursor();

    return $tasks;
}

function getDone($email)
{
	$db=Database::getDB();

    $query='Select * from todos WHERE owneremail=:email AND isdone=1';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();

    $tasks=[];
    while( $row=$statement->fetch() )
    {
       $tasks[]= $row;
    }
    $statement->closeCursor();

    return $tasks;        
}

function check($id) 
{
	$db=Database::getDB();
	
    $query = 'UPDATE todos SET isdone=1 WHERE id=:id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function revert($id)
{
        $db=Database::getDB();
       
    $query = 'UPDATE todos SET isdone=0 WHERE id=:id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function add($email,$due,$mesg)
{
        $db=Database::getDB();
     
    $query = "INSERT into todos (owneremail, duedate,message,isdone)
		VALUES (:email,:due,:mesg,0)";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':due', $due);
    $statement->bindValue(':mesg', $mesg);
    $statement->execute();
    $statement->closeCursor();
}

function delete($id)
{
        $db=Database::getDB();
        
    $query = 'DELETE FROM todos WHERE id=:id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
 
function edit($task,$due,$mesg)
{
	$db=Database::getDB();

    $query = 'UPDATE todos SET duedate=:due, message=:mesg WHERE id=:id';
    $statement = $db->prepare($query);
    $statement->bindValue(':due', $due);
    $statement->bindValue(':mesg', $mesg);
    $statement->bindValue(':id', $task);
    $statement->execute();
    $statement->closeCursor();
}
?>
