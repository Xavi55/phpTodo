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
	height:480px;/*403*/
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
	display:inline;
}</style>";

	echo "";

	echo '<h2 class="bar center">Welcome back, '.$_SESSION['user'].'<a href="index.php?action=logout"> LogOUt?</a></h2>';

/*
// no function calls b/c of MVC	
	    $tasks = getTasks($_SESSION['email']);
	    $done = getDone($_SESSION['email']);
*/

	echo '<div>';
	    echo '<div class="col box divi"><h2 class=center>Pending</h2><br><br><br><br>';

            foreach($tasks as $task)
            {
                echo '<form action="." method=post><h3><form 
action="." method=post><input type=hidden name=id
value='.$task['id'].'><input type=hidden name=action value=check><input type=submit
value=☑ > '.$task['message'] .'</form><form action="."method=post><input type=hidden name=action value=edit><input type=hidden
name=id value='.$task['id'].'>&nbsp<input type=submit value=Edit></form><form action="." method="post"><input type="hidden" name="action" 
value="delete"><input type="hidden" name="id" value='.$task['id'].'>&nbsp<input 
type="submit" value="Delete"></form></h3><hr>';
            }        
            echo '</div>';

            echo '<div class="col box"><h2 class=center>Completed</h2><br><br><br><br>';
            foreach($done as $d)
            {   
                echo '<form action="." method=post><h3 class=r><form 
action="." method="post"><input type="hidden" name="action" 
value="delete"><input type="hidden" name="id" value="10">&nbsp;<input 
type="submit" value="Delete"></form><form action="." 
method="post"><input type="hidden" name="action" value="edit"><input 
type="hidden" name="id" value="10">&nbsp;<input type="submit" 
value="Edit"></form> '.$d['message'].' <input 
type=hidden name=id value='.$d['id'].'><input type=hidden name=action value=revert><input type=submit value=XX> </h3></form><hr>';
            }
            echo '</div>';
            
        echo '</div>';
        echo '<div style=clear:both;></div>';
echo '<form action="." method=post><input type=hidden name=action value=add_page><input
type=submit value="Add New Task"></form>';
            


require('footer.php');
?>
