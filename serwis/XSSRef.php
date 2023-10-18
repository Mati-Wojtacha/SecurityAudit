<!DOCTYPE html>
<html lang="en">
<title>Serwis do testowania audytu bezpieczeństwa</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css.css">
<script src="../script/jquery-3.6.0.js"></script>


<body>
  <header>
  <div class="nav">
       <ul>
        <li><a href="..">Strona Główna</a></li>
        <li><a href="../zadania">Zadania</a></li>
	  </ul>
</div>
  </header>
<nav id="nav"></nav> 
<div class="rightbar"></div>
<div class="leftbar" style="display:none;"></div>	
<script src="menu.js"></script>
<div class="hidenav" onclick="actionNav()">&#9776;</div>
		<script src="../script/nav.js"></script>
        
        <div id="content">
		<div class="content-mid">

		<form name="XSS" action="#" method="POST">
			<p>
				Podaj swoje imię
				<input type="text" name="name" maxlength="15">
				<input type="submit" value="Prześlij" name="submit">
			</p>
		</form>
		
	</div>
<?php		
include ("../db_action/db_connect.php");
   $polaczenie = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Is there any input?
if( array_key_exists( "name", $_POST ) && $_POST[ 'name' ] != NULL ) {
    // Feedback for end user
    echo '<pre>Witaj ' . $_POST[ 'name' ] . '</pre>';
	$default=$_POST[ 'name' ];
	if(strstr($default, "<script>")!==False &&strstr($default, "</script>")!==False){
		
		$query = "select ans FROM que where id=5";
		$result = $polaczenie -> query($query);
		$row = mysqli_fetch_assoc($result);
		// echo ($row);
	echo ("<h4>{$row['ans']}</h4>");
	}
}
mysqli_close ($polaczenie);
?>