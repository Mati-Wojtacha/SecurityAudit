var html = '<div id="sidebar" class="sidebar">\
      <ul>\
	    <li style="line-height: normal;"><a style="padding:10px;" href="index.html">Strona Początkowa</a></li>\
        <li ><a href="brute.php">Brute</a></li>\
        <li ><a href="sqlinjection.php">Sql Injection</a></li>\
		<li style="line-height: normal;"><a style="padding:10px;" href="sqlinlogin.php">Sql Injection Logowanie</a></li>\
        <li ><a href="XSSDOM.php">XSSDOM</a></li>\
        <li ><a href="XSSRef.php">XSSRef</a></li>\
        <li ><a href="XSSStored.php">XSSStored</a></li>\
      </ul>\
		 </div>';

document.getElementById('nav').innerHTML = html;
