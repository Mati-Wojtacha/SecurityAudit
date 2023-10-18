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
		<form action="#" method="GET">
			<p>
				Podaj numer wiadomości:
				<input type="number" size="15" name="id">
				<input type="submit" name="submit" value="Prześlij">
			</p>
		</form>
	</div>
<?php		include ("../db_action/db_connect.php");
   $polaczenie = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  // $queryn  = "SELECT `keys`, `dd` FROM nowa WHERE id =1 Union SELECT * from secret";
	 // $result = $polaczenie -> query($queryn);
	// while( $row = mysqli_fetch_row( $result ) ) {
		 // echo ($row[0]);
		 // echo($row[1]);
	// }
if( isset( $_REQUEST[ 'submit' ] ) ) {
    // Get input
    $id = $_REQUEST[ 'id' ];

    // Check database
    $query  = "SELECT `keys`, `dd` FROM nowa WHERE id = '$id';";
	// echo($query);
    $result = mysqli_query($polaczenie,  $query );
    while( $row = mysqli_fetch_row( $result ) ) { 
        if (is_numeric($id)){
			$mess = $row[0];
			$from  = $row[1];
			echo "<div><b>Wiadomosc:</b> {$mess}<br /><b>Od:</b> {$from}</div>";
		}
		$id = strtoupper($id);
		if (strpos($id, 'UNION')!== false && strpos($id, 'SECRET')!== false){
			// $idans=$row[1];
			$query = "select ans FROM que where id=2";
			$result = $polaczenie -> query($query);
			$row = mysqli_fetch_assoc($result);
		// echo ($row);
			echo ("<h4>{$row['ans']}</h4>");
		}
	}
}
mysqli_close ($polaczenie);
?>
