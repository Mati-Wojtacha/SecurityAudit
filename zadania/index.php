<!DOCTYPE html>
<html lang="en">
<title>Serwis do testowania audytu bezpieczeństwa</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<li class="logout"><a href="logout.php" >Wyloguj</a></li>
      </ul>
</div>
  </header>
  
  <div id="sidebar" class="sidebar">
		
      <ul>
        <li ><a href="#Zad 1">Zadanie 1</a></li>
        <li ><a href="#Zad 2">Zadanie 2</a></li>
        <li ><a href="#Zad 3">Zadanie 3</a></li>
        <li ><a href="#Zad 4">Zadanie 4</a></li>
        <li ><a href="#Zad 5">Zadanie 5</a></li>
        <li ><a href="#Zad 6">Zadanie 6</a></li>
		<li ><a href="#Zad 7">Zadanie 7</a></li>
        <li ><a href="#Zad 8">Zadanie 8</a></li>
      </ul>
		 </div>
		 	<div class="hidenav" style"top:10;" onclick="actionNav()">&#9776;</div>
<script src="../script/nav.js"></script>
        <div id="content">
		<div class="content-mid">
		<H1>Zadania</H1>
		<p style="text-indent: 5%; ">Do serwisu, który można zobaczyć klikając w odnośnik znajdujący się na górze strony. Zostały opracowane różne zadania z tematyki zabezpieczeń.
		</br>Sprawdź swoje umiejętności i znajdź wszystkie ukryte informacje, rozwiązując przy tym wszystkie zadania.</p>
		<H4>
		Pamiętaj wszelkie próby wykorzystania w cyberprzestrzeni przedstawionych podatności, gdy nie masz uprawnień do takich działań uznawane są za przestępstwo!!
		</H4>
		
 </div>
<script>

$(document).ready(function() {
	// console.log($("#table_btn"));
    $("#table_btn, #close").click(function() {
        $("#table_history").slideToggle(1000)
        });
    });
</script>

</body>

</html>

<?php
		header("refresh:1800; url=logout.php");
		include ("session.php");
		include ("../db_action/db_connect.php");
		$id=$_SESSION['idUser'];
		$polaczenie = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		mysqli_query($polaczenie,"SET CHARSET utf8");
  		mysqli_query($polaczenie,"SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
		$zapytanie = "select * FROM que";
		$rezultat = $polaczenie -> query($zapytanie);
		$i=0;
		$answer;
		$percent=0;
	 // $querynew  = "UPDATE `que` SET `que` = '' WHERE `que`.`Id` = 6 ;";
     // mysqli_query($polaczenie,  $querynew ) ;
		if($rezultat ->num_rows > 0)
		{
			while ($wynik = $rezultat->fetch_assoc()) 
			{ 
				$i++;
				$answer[$i]=$wynik['ans'];
				// echo($wynik['ans']);
				echo 
				"<div id='Zad ".$i."' class='content-mid'>
 		<table style='margin-top:-20px min-height:100vh'>
    <td	style='width: 60%;	 '>
	<H1>Zadanie ".$i."</H1>
		[".$wynik['Id']."] ".$wynik['que']." 	
		</td>
    <td align='right'>
         <div style = 'width:300px; border: solid 1px #444; text-align: center; '>
            <div style = 'background-color:#444; color:white; padding:3px;'><b>Odpowiedz Numer ".$i."</b></div>
            <div style = 'margin:35px'>
               <form method = 'post'>
                  <label>Odpowiedz  :</label>
				  <textarea rows='2' cols='20' name ='odp'></textarea>
				  <input type = 'hidden' name='id'value='".base64_encode($i)."'/><br /><br />
                  <input type = 'submit'  value = 'Odpowiedz'/>
				  </form>			
      </div>
		
</td>
  </table>
   </div>
 ";
			
			}
		}
		else
			{
				echo "<h1>Brak danych</h1>";
		}
	 if($_SERVER["REQUEST_METHOD"] == "POST") {
		$ansPOST = $_POST['odp'];
		$idans = $_POST['id'];
		$idans = base64_decode($idans);
		// echo($idans);
		if(strcmp($answer[$idans], $ansPOST)){ 
			echo "<script>alert('Blad danych');</script>";
		}
		else{
			echo "<script>alert('dobrze');</script>";
			$sql = "SELECT idque FROM answer WHERE idque = '$idans' and idusr='$id'";
			// echo($sql);
		    $result = mysqli_query($polaczenie,$sql);
			$value = mysqli_num_rows($result);
			// echo($value);
			if($value==0){
				$sql = "INSERT INTO `answer` (`id`, `idusr`, `idque`) VALUES ('',	'$id', '$idans'); ";
				// echo($sql);
				$result = mysqli_query($polaczenie,$sql);
			}
		}

	 }
	 $sql = "SELECT idque FROM answer WHERE idusr='$id'";	   
			// echo($sql);
		    $result = mysqli_query($polaczenie,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$value = mysqli_num_rows($result);
			$percent = $value/$i*100;
			$sql ="UPDATE `usr` SET `result` = '$percent' WHERE `usr`.`id` ='$id' ";
			// echo($sql);
			$result = mysqli_query($polaczenie,$sql);
	 echo("
<div id='table_history' style=' background-color:white;
    width:550px;
    height:300px;
    display:none;
    position:fixed;
    top:40%;
    left:30%;
    margin:-120px 0 0 -200px;
	text-align: center;	'>
		 <a style='float: right;  cursor: pointer; color:black; ' id='close'>&#10006;</a>
	Wyniki i historia odpowiedzi</br>
	Twój wynik to: ".$percent."%</br></br>
    <table style='margin-left: auto;  margin-right: auto;'
  cellspacing='0' cellpadding='1' border='0' width='550' >
		<tr>
		<tr style='background-color:#444; color:white;'>
			<th colspan='2'>Historia wyników</th>
		</tr>
	 </table>  
      <div style='width:534px; font-size:medium; height:170px; margin-left:14px; overflow-y: scroll; '>
         <table style='margin-left: auto;  margin-right: auto;'
		 cellspacing='0' cellpadding='1' border='1' width='500' >
	 ");
	 
	 
	 $sql = "SELECT name,result FROM usr where result IS NOT NULL";	 
	 $rezultat = $polaczenie -> query($sql);
		
		if($rezultat ->num_rows > 0)
		{
			while ($wynik = $rezultat->fetch_assoc()){
				echo (
				"<tr>
				<td style=style='width:305px;'>".$wynik['name']."</td>
				<td style='width:195px;'>".$wynik['result']."%</td>
				</tr>");
			}
		}
   echo" </table></div></div>";
   
   if($percent==100){
	   echo"
	   <div style='z-index: 999; position: fixed;  top: 0;  right: 0;'>
		 <input type='image' id='table_btn' value='Otwórz' src='Z5.png' alt='100 percent' width='60' height='50'/>
	  </div>
	   ";
   }
   else if($percent<=90 && $percent>70){
	   echo"
	   <div style='z-index: 999; position: fixed;  top: 0;  right:0;'>
		 <input type='image' id='table_btn' value='Otwórz' src='Z4.png' alt='100 percent' width='60' height='50'/>
	  </div>
	   ";
   }else if($percent<=70 && $percent>50){
	   echo"
	   <div style='z-index: 999; position: fixed;  top: 0;  right:0;'>
		 <input type='image' id='table_btn' value='Otwórz' src='Z3.png' alt='100 percent' width='60' height='50'/>
	  </div>
	   ";
   }else if($percent<=50 && $percent>30){
	   echo"
	   <div style='z-index: 999; position: fixed;  top: 0;  right:0;'>
		 <input type='image' id='table_btn' value='Otwórz' src='Z2.png' alt='100 percent' width='60' height='50'/>
	  </div>
	   ";
   }else if($percent<=30 && $percent>10){
	   echo"
	   <div style='z-index: 999; position: fixed;  top: 0;  right:0;'>
		 <input type='image' id='table_btn' value='Otwórz' src='Z1.png' alt='100 percent' width='60' height='50'/>
	  </div>
	   ";
   }else{
	   echo"
	   <div style='z-index: 999; position: fixed;  top: 0;  right:0;'>
		 <input type='image' id='table_btn' value='Otwórz' src='Z0.png' alt='100 percent' width='60' height='50'/>
	  </div>";
   }
   mysqli_close ($polaczenie);	   
?>