<!DOCTYPE html>
<html lang="en">
<title>Serwis do testowania audytu bezpieczeństwa</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0">
<link rel="stylesheet" href="../css.css">
<script src="../script/jquery-3.6.0.js"></script>

<body>
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
		<H1>Panel Logowania</H1>
		<table style="margin-top:-20px ">
    <td	style=" width: 65%;	 "><p style="text-indent: 5%;">
	Do serwisu zostały opracowane różne zadania, aby móc je zobaczyć musisz się być zalogowanym. </br>
	Logowanie jest wymagane, aby zobaczyć jakie zadania zostały przygotowane i móc przeglądać wyniki.
	</br >	Nie posiadasz konta?? <a href="rejestr.php">Zarejestruj się!</a>
	<p style="text-align: right; ">Zaloguj się i rozwiązuj zadania! 👉
	</p>
	<p>Z serwisu możesz korzystać, będąc niezalogowanym. Natomiast ta strona została opracowana, abyś mógł zobaczyć i rozwiązać przygotowane wcześniej zadania oraz zapisać swój wynik w historii.
	</p>
	<H4>
	Pamiętaj wszelkie próby wykorzystania w cyberprzestrzeni przedstawionych podatności, gdy nie masz uprawnień do takich działań uznawane za przestępstwo!!
	</H4>
		</td>
    <td align="center">
         <div style = "width:300px; border: solid 1px #333333; text-align: center; ">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style = "margin:35px">
               <form action = "" method = "post">
                  <label>Nazwa Użytkownika  :</label></br><input type = "text" minlength="3" name = "nick" /><br /><br />
                  <label>Hasło  :</label></br><input type = "password" minlength="3" name = "password"><br/><br />
                  <input type = "submit" value = " Logowanie "/>&nbsp;&nbsp;
				  <input type="button" value="Rejestracja" onClick="location.href='rejestr.php'" />
		        </form>			
      </div>
		
</td>
  </table>
		 

     
 </div>
   </body>
</html>
<?php
   	include ("../db_action/db_connect.php");
	$polaczenie = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if($_SERVER["REQUEST_METHOD"] == "POST") {   
      $nick = $_POST['nick'];
      $pass = $_POST['password']; 
	  $pass=md5($pass );
      $sql = "SELECT id FROM usr WHERE name = '$nick' and pass = '$pass'";
      $result = mysqli_query($polaczenie,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['id'];
      // echo($active);
      $count = mysqli_num_rows($result);
      // echo($count);
   		
      if($count == 1) {
		  session_start();
		  $_SESSION["idUser"] = $active;
		  header("location:index.php");
		  
      }else {
		 // header("location:.");
         echo "<script>alert('Blad logowania');</script>";
      }
   }
   mysqli_close ($polaczenie);
?>
