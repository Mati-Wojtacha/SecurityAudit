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
		<form method="post" name="guestform">
			<table width="550" cellspacing="1" cellpadding="2" border="0">
				<tbody><tr>
					<td width="120">Imię</td>
					<td><input name="txtName" type="text" size="30" maxlength="10"></td>
				</tr>
				<tr>
					<td width="120">Wiadomość</td>
					<td><textarea name="mtxMessage" cols="50" rows="3" maxlength="50"></textarea></td>
				</tr>
				<tr>
					<td width="120">&nbsp;</td>
					<td>
						<input name="btnSign" type="submit" value="Dodaj wpis" >
						<input name="btnClear" type="submit" value="Czyść wpisy" >
					</td>
				</tr>
			</tbody></table>

		</form>
		
	</div>
<?php		
   include ("../db_action/db_connect.php");
  
   $polaczenie = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      if(!isset($_COOKIE["username"])){ 
		$user= uniqid("user");
		setcookie("username", $user, time()+216000);
   }
    $indCookie = $_COOKIE["username"];
if (array_key_exists ("btnClear", $_POST)) {
	// echo ($indCookie);
	$itstrue=strpos($indCookie, "user");
	if($itstrue!==false){ 
	$query  = "DELETE FROM `guestbook` WHERE `guestbook`.`cookies` = '$indCookie';";
	// echo($query);
	mysqli_query($polaczenie,  $query );
	}
}
if( isset( $_POST[ 'btnSign' ] ) ) {
	
	$itstrue=strpos($indCookie, "user");
	if($itstrue!==false){ 
    $message = ( $_POST[ 'mtxMessage' ] );
    $name    = ( $_POST[ 'txtName' ] );
	$time=date("Y-m-d H:i:s");
    $query  = "INSERT INTO guestbook ( comment, name, cookies, time ) VALUES ( '$message', '$name', '$indCookie', '$time' );";
	// echo($query);
    mysqli_query($polaczenie,  $query ) ;
	}
}
if(strstr($message, "<script>")!==False &&strstr($message, "</script>")!==False){
		
	$query = "select ans FROM que where id=6";
	$result = $polaczenie -> query($query);
	$row = mysqli_fetch_assoc($result);
	// echo ($row);
	echo ("<h4>{$row['ans']}</h4>");
}

$querySelect  = "SELECT name, comment, time FROM guestbook where cookies = '$indCookie'";
$resultSelect = mysqli_query($polaczenie,  $querySelect );

while( $row = mysqli_fetch_row( $resultSelect ) ) {
	$name    = $row[0];
	$comment = $row[1];
	//$time = $row[2];
	echo "<div>Imię: {$name}<br />" . "Wiadomość: {$comment}<br /></div></br>\n";
	}
	
$query  = "SELECT id,time FROM guestbook WHERE time IS NOT NULL;";
$result = mysqli_query($polaczenie,  $query );
while( $row = mysqli_fetch_row( $result ) ) {	
	$id    = $row[0];
	$time = $row[1];
	$timeDifference = time()-strtotime($time);
	// echo($timeDifference);
	if($timeDifference>2678400){ //31 days
		mysqli_query($polaczenie,  "DELETE FROM `guestbook` WHERE `id`='$id'" );
	}
}
mysqli_close ($polaczenie);
?> 