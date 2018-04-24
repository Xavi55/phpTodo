<?php

//require('');

require('header.php');

//CSS
echo"<style>     
html   
{   
	
        background-image:url('https://media.giphy.com/media/lSzQjkthGS1gc/giphy.gif');
	height:100%;
        background-size:cover;
        background-repeat:no-repeat;
}
body
{
        font-family:Helvetica, sans;
        margin-left:10%;
        margin-right:10%;
}

.bar
{   
        background-color:grey;
        color:white;
	border-radius:5px;
}
.box
{
	color:white;
}
.col
{
	float:left;
	width:49%;
}
.center
{
	text-align:center;
}
.r
{
	text-align:right;
}
.divi
{
	border-right: white solid 5px;
}
form
{
	margin: 0;
	padding:0;
}
input
{
	display:inline;
}


</style>";

	echo "";

	echo '<h2 class="bar center">Welcome back, '.$_SESSION['user'].'<a href="index.php?action=logout"> LogOUt?</a></h2>';
	
	    $tasks = getTasks($_SESSION['email']);
	    $done = getDone($_SESSION['email']);

	echo '<div>';
	    echo '<div class="col box divi"><h2 class=center>Pending</h2><br><br><br><br>';
	    foreach($tasks as $task)
	    {
		echo '<form action="." method=post><h3><input type=hidden name=id value='.$task['id'].'><input type=hidden name=action value=check><input type=submit value=☑ > '.$task['message'] .'</h3></form><hr>';		
	    }

	    echo '</div>';

	    echo '<div class="col box"><h2 class=center>Completed</h2><br><br><br><br>';
	    foreach($done as $d)
	    {
		echo '<h3 class=r>'.$d['message'] .'</h3><hr>';
		
	    }
	    echo '</div>';

	echo '</div>';


require('footer.php');
?>
