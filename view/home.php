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
	color:white;
}

.bar
{   
        background-color:grey;
        color:white;
	border-radius:5px;
}

.head
{
        float:left;
        width:49%;
}

.col
{
	float:left;
	width:49%;
}
.content
{
	height:500px;
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
.done
{
	opacity:.2;
}
form
{
	margin: 0;
	padding:0;
	display:inline;
}
.clear
{
	clear:both;
}
</style>";

	echo "";

	echo '<h2 class="bar center">Welcome back, '.$_SESSION['user'].'<a href="?action=logout"> LogOUt?</a></h2>';

/*
// no function calls b/c of MVC	
	    $tasks = getTasks($_SESSION['email']);
	    $done = getDone($_SESSION['email']);
*/

	echo '<div><h2 class="head center">Pending Tasks</h2><h2 class="head center">Completed Tasks</h2></div>';
	echo '<div class=clear></div>';


	echo '<div class=content>';
	    echo '<div class="col divi">';

            foreach($tasks as $task)
            {
                echo '<form action="." method=post><h3><form 
action="." method=post><input type=hidden name=id
value='.$task['id'].'><input type=hidden name=action value=check><input type=submit
value=☑ > '.$task['message'] .'</form><form action="."method=post><input type=hidden name=action value=edit><input type=hidden
name=id value='.$task['id'].'>&nbsp<input type=submit value=Edit></form><form action="." method="post"><input type="hidden" name="action" 
value="delete"><input type="hidden" name="id" value='.$task['id'].'>&nbsp<input 
type="submit" value="Delete"></h3></form><h3 class=center>Due Date: '.$task['duedate'].'</h3><hr>';
            }        
            echo '</div>';

            echo '<div class="col box">';
            foreach($done as $d)
            {   
                echo '<form action="." method=post><h3 class=r><form 
action="." method="post"><input type="hidden" name="action" 
value="delete"><input type="hidden" name="id" value="10">&nbsp;<input 
type="submit" value="Delete"></form><form action="." 
method="post"><input type="hidden" name="action" value="edit"><input 
type="hidden" name="id" value="10">&nbsp;<input type="submit" 
value="Edit"></form> '.$d['message'].' <input 
type=hidden name=id value='.$d['id'].'><input type=hidden name=action value=revert><input 
type=submit value=XX></h3></form><h3 class=center>Due Date: '.$d['duedate'].'</h3><hr>';
            }
            echo '</div>';
            
        echo '</div>';
        echo '<div style=clear:both;></div>';
echo '<form action="." method=post><input type=hidden name=action value=add_page><input
type=submit value="Add New Task"></form>';
            


require('footer.php');
?>
