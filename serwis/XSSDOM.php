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

 		<p>Wybierz język:</p>

		<form name="XSS" method="GET">
			<select name="default">
				<script>
					if (document.location.href.indexOf("default=") >= 0) {
						var lang = document.location.href.substring(document.location.href.indexOf("default=")+8);
						document.write("<option value='" + lang + "'>" + decodeURI(lang) + "</option>");
						document.write("<option value='' disabled='disabled'>----</option>");
					}
					    
					document.write("<option value='English'>English</option>");
					document.write("<option value='French'>French</option>");
					document.write("<option value='Spanish'>Spanish</option>");
					document.write("<option value='German'>German</option>");
				</script>
			</select>
			<input type="submit" value="Wybierz">
		</form>
	</div>
	<?php		
	include ("../db_action/db_connect.php");
    $polaczenie = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Is there any input?
if( isset( $_GET[ 'default' ] ) ) {
    // Get input
    // Feedback for end user
	$default=($_GET[ 'default' ]);
	// echo($default);
	if(strstr($default, "<script>")!==False &&strstr($default, "</script>")!==False){
		
		$query = "select ans FROM que where id=4";
		$result = $polaczenie -> query($query);
		$row = mysqli_fetch_assoc($result);
		// echo ($row);
		echo ("<h4>{$row['ans']}</h4>");	}
}
mysqli_close ($polaczenie);
?>