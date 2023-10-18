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

		<form action="#" method="POST">
			Nazwa użytkownika:<br />
			<input type="text\" name="username"><br />
			Hasło:<br />
			<input type="password" AUTOCOMPLETE="off" name="password"><br />
			<br />
			<input type="submit" value="Zaloguj" name="login">
		</form>
</div>
<?php		
include ("../db_action/db_connect.php");
   $polaczenie = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if( isset( $_POST[ 'login' ] ) ) {
    $user = $_POST[ 'username' ];
    $pass = $_POST[ 'password' ];
	
    // $pass = md5( $pass );
    $query  = "SELECT * FROM `usrs` WHERE first_name = '$user' AND password = '$pass';";
    $result = mysqli_query($polaczenie,  $query );
	// echo($query);
    if( $result && mysqli_num_rows( $result ) == 1 ) {
		$row    = mysqli_fetch_assoc( $result );
		// echo($row["user_id"]);
        if($row["user_id"]==3){
			$query = "select ans FROM que where id=3";
			$result = $polaczenie -> query($query);
			$row = mysqli_fetch_assoc($result);
			// echo ($row);
			echo ("<h4>{$row['ans']}</h4>");
		}
		else{
			echo("<b>Nie ten użytkownik</b>");
		}
    }
    else {
        // Login failed
        echo "<b><br />Bład logowania</b>";
    }
}
mysqli_close ($polaczenie);
?>