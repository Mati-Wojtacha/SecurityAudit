
	function actionNav() {
	if (document.getElementById("sidebar").style.display  === "none") {
    document.getElementById("sidebar").style.display  = "block";
  } else {
    document.getElementById("sidebar").style.display  = "none";

  }
 }
 function changeNav(x=0, y=0) {
  if (x.matches || y.matches) {
    document.getElementById("sidebar").style.display  = "block";
  } else{
    document.getElementById("sidebar").style.display  = "none";
  }
  
}
var x = window.matchMedia("(min-width: 600px)");
var y = window.matchMedia("(min-height: 400px)");
changeNav(x, y) // Call listener function at run time
x.addListener(changeNav) 
y.addListener(changeNav)

