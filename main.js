var i = 0;
function change() {
  var doc = document.getElementById("mainheader");
  var color = ["black", "white"];
  doc.style.color = color[i];
  i = (i + 1) % color.length;
}
setInterval(change, 1000);

function accsubmit(){
  var subdet=document.getElementById("subdet");
  subdet.innerHTML="SuccessFully Created an Account"
}

  var user=document.getElementById("userlog").style.display="none";

