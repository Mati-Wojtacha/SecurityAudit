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
			<input type="submit" value="Zaloguj się" name="login">
		</form>
</div>
<?php
		include ("../db_action/db_connect.php");
   $polaczenie = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if( isset( $_POST[ 'login' ] ) ) {
    // Get username
    $user = $polaczenie->real_escape_string($_POST[ 'username' ]);
    // print("$user");
    $pass = $polaczenie->real_escape_string($_POST[ 'password' ]);
	
	// print("$pass");

    $pass = md5( $pass );
	// print("$pass");

    // Check the database
    $query  = "SELECT * FROM `usrs` WHERE first_name = '$user' AND password = '$pass';";
    $result = mysqli_query($polaczenie,  $query );

    if( $result && mysqli_num_rows( $result ) == 1 ) {
        // Get users details
        $row    = mysqli_fetch_assoc( $result );
        $idans = $row['que'];
        echo "<div>Brawo zalogowałeś się jako: <b>{$user}</b></div>";
		$query = "select ans FROM que where id='$idans'";
		$result = $polaczenie -> query($query);
		$row = mysqli_fetch_assoc($result);
		// echo ($row);
	echo ("<h4>{$row['ans']}</h4></br> spróbuj też zalogować się na inne konta");
    }
    else {
        // Login failed
        echo "<b>Błąd logowania</b>";
    }
}
mysqli_close ($polaczenie);
?>