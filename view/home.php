<?php

//require('');

require('header.php');

//CSS
echo"<style>
html   
{   
	
        background-image:url('https://media.giphy.com/media/lSzQjkthGS1gc/giphy.gif');
        background-size:cover;

        /*background-repeat:no-repeat;*/
}
body
{
        font-family:Helvetica;
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
	height:300px;
}
.center
{
	text-align:center;
}
.r
{
	text-align:right;
}

.barright
{
	border-right: white solid 5px;

}
.barleft
{
	border-left: white solid 5px;
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
.btn 
{
    position: auto;
    background-color: #f1f1f1;
    color: black;
    font-size: 16px;
    padding: 1% 3%;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
}

.btn:hover 
{
    background-color: black;
    color: white;
}
#logout
{
	margin-left:60%;
}

@media only screen and (max-width: 650px)
{
	.col
	{
	   width:48%;
	}

	#logout
	{
	   margin-left:40%;
	}
}
</style>";

	echo '<br><br><h2 class="bar center">Welcome back, 
'.$_SESSION['user'].'.<br>It\'s time to complete some tasks!</h2>';

/*
// no function calls here b/c of M.V.C conditions	
	    $tasks = getTasks($_SESSION['email']);
	    $done = getDone($_SESSION['email']);
*/

	echo '<div><h2 class="head center">Pending Tasks</h2><h2 class="head center">Completed Tasks</h2></div>';
	echo '<div class=clear></div>';

	echo '<div class=content>';

	//pending tasks
	    echo '<div class="col barright">';
	    if(count($tasks)==0)
            {
                echo '<h3 style=text-align:center;>...</h3>';
            }
            


            foreach($tasks as $task)
            {
                echo '<form action="." method=post><h3><form 
action="." method=post><input type=hidden name=id
value='.$task['id'].'><input type=hidden name=action value=check><input class=btn 
type=submit
value=✔️> '.$task['message'] .'</form><form action="."method=post><input type=hidden 
name=action value=edit_page><input type=hidden
name=id value='.$task['id'].'>&nbsp<input class=btn type=submit value=Edit></form><form action="." 
method="post"><input type="hidden" name="action" 
value="delete"><input type="hidden" name="id" value='.$task['id'].'>&nbsp<input class=btn 
type="submit" value="Delete"></h3></form><h5 class=center>Due Date: 
'.$task['duedate'].'</h5><hr>';
            }        
            echo '</div>';

//----------OTHER HALF OF PAGE
		//completed tasks
            echo '<div class="col barleft">';

	    if(count($done)==0)
	    {
		echo '<h3 style=text-align:center;>...</h3>';
	    }	

            foreach($done as $d)
            {
		echo'<h3 class=r><form action="." method=post>


<input class=btn type=submit value="Delete"><input class=btn type=hidden 
name=action value=delete><input 
type="hidden" name="id" value='.$d['id'].'></form>&nbsp<form action="." method=post><input type=hidden 
name=action value=edit_page><input type=hidden name=id value='.$d['id'].'><input 
class=btn type=submit 
value=Edit>&nbsp</form>'.$d['message'].'&nbsp<form action="." method=post><input 
type=hidden 
name=action value=revert ><input type=hidden name=id value='.$d['id'].'><input class=btn 
type=submit value=❌></form></h3><h5 class=center>Due Date: '.$d[duedate].'</h5><hr>';





/*
echo '<form action="." method=post><h3 class=r><form 
action="." method="post"><input type="hidden" name="action" 
value="delete"><input type="hidden" name="id" value="10">&nbsp;<input 
type="submit" value="Delete"></form><form action="." 
method="post"><input type="hidden" name="action" value="edit_page"><input 
type="hidden" name="id" value="10">&nbsp;<input type="submit" 
value="Edit"></form> '.$d['message'].' <input 
type=hidden name=id value='.$d['id'].'><input type=hidden name=action value=revert><input 
type=submit value=✘></h3></form><h3 class=center>Due Date: '.$d['duedate'].'</h3><hr>';
*/
            }
            echo '</div>';
            
        echo '</div>';
        echo '<div style=clear:both;></div>';//remove floats

echo '<form action="." method=post><input type=hidden name=action value=add_page><input 
class=btn type=submit value="Add New Task"></form>';
            

echo '<form action="." method=post><input type=hidden name=action value=logout><input
class=btn id=logout type=submit value=Logout></form>';
require('footer.php');
?>
