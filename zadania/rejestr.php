
<!DOCTYPE html>
<html lang="en">
<title>Serwis do testowania audytu bezpieczeństwa</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0">
<link rel="stylesheet" href="../css.css">
<script src="../script/jquery-3.6.0.js"></script>

<body style="height:100vh">
<header>
<div class="rightbar"></div>
<div class="leftbar"></div>	
    <div class="nav">
      	<ul>
       		<li class="instrukcja"><a href="..">Strona Główna</a></li>
        	<li class="serwis"><a href="../serwis">Serwis</a></li>
	</ul>
</div>
  </header>	
		<div class ="about">
		<div class="content-mid" style="text-align:justify;">
		<H1>Panel Rejestracji</H1>
		<table style="margin-top:-20px ">
    <td	style=" width: 70%;	 "><p style="text-indent: 5%; ">
	Do serwisu zostały opracowane różne zadania, aby móc je zobaczyć zarejestruj się i korzystaj!
	<p style="text-align: right; ">Zarejestruj się i rozwiązuj zadania! 👉
	<p>Rejestracja jest bardzo prosta, nie musisz nic potwierdzać ani akceptować. </br>
	Stwórz konto z prostym hasłem, najlepiej nigdzie nieużywanym, gdyż łatwo tu o wyciek danych!</p>
		</td>
    <td align="center">
         <div style = "width:300px; border: solid 1px #333333; text-align: center; ">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style = "margin:35px">
                             <form method="post">
  <label>Nazwa Użytkownika :</label></br><input type="text" minlength="3" name="nick"><br /><br />
  <label>Hasło  :</label></br><input minlength="3" type="password" name="password" ><br /><br />
  <button type="submit" name="register">Zarejestruj</button>&nbsp;&nbsp;
  <input type="button" value="Powrót" onClick="location.href='login.php'" />		<br />			
      </div>
		
</td>
  </table>
		 

     
 </div>
   </body>
</html>
<?php		
	include ("../db_action/db_connect.php");
   $polaczenie = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$nick = $polaczenie->real_escape_string($_POST['nick']);
	$password = $polaczenie->real_escape_string($_POST['password']);
	$password = md5($password);
	$sql = "SELECT id FROM usr WHERE name = '$nick'";	      
    $result = mysqli_query($polaczenie,$sql);
      $count = mysqli_num_rows($result);
      // echo($count);
     
	if (strlen($nick) < 3 || strlen($password)<3 || $count>0 || preg_match('/^[a-zA-Z0-9]+$/', $nick) == 0) {
  echo "<script>alert('Blad danych');</script>";
}
else{
   $sql = "INSERT INTO `usr` (`id`, `name`, `pass`) VALUES (
   '', '$nick', '$password'); ";
   $result = mysqli_query($polaczenie,$sql);
	echo "<script>alert('Pomyślnie utworzono konto');</script>";
	header("refresh:1; url=login.php");
	}
}
mysqli_close ($polaczenie);
?>