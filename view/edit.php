<!DOCTYPE html>
<head>
   <title>Add</title>
</head>
<style>
html   
{   

background-image:url('https://hdwallsource.com/img/2014/9/dark-background-18321-18785-hd-wallpapers.jpg');
   height:100%;
   background-size:cover;
   background-repeat:no-repeat;
}

body
{
   margin-top:10%;
   margin-left:10%;
   margin-right:10%;
   padding:5% 5%;
   border:solid black 3px;
   border-radius:5px;
   font-family:Helvetica,sans;
   color:white;
}
#banner
{
   background-color:black;
   color:white;
   border-radius:15%;
   padding:3%;
}

.center
{
   text-align:center;
}
form
{
   display:inline;
}
</style>

<body>
   <h3 id=banner class=center>Time to add a new task</h3>
   <br>
   <br>
   <form action="." method=post>
	<input type=hidden name=action value=add>

	<label>Due date:</label>
	<input type=date name=due>
	<br><br>
	<label>Task:</label>
	<input type=text name=mesg>
	<br><br><br>
	<input type=submit value="Add Task">
   </form>
</body>
</html>
