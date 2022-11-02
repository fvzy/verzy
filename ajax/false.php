<?php
$ipaddr = $_SERVER['SERVER_ADDR'];
$fetchkey = "https://sf.verzy.my.id/getkey.php?ip=".$ipaddr;
$json = file_get_contents($fetchkey);
$obj= json_decode($json);
if ($obj->user) {
header('location: /');
} else {

}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Hosting Not Registered</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Tomorrow&display=swap" rel="stylesheet">
   <style>
   	body{
  margin:0;
  padding:0;
  font-family: 'Tomorrow', sans-serif;
  height:100vh;
  background-image: linear-gradient(to top, #2e1753, #1f1746, #131537, #0d1028, #050819);
  display:flex;
  justify-content:center;
  align-items:center;
  overflow:hidden;
}
.text{
  position:absolute;
  top:10%;
  color:#fff;
  text-align:center;
}
h1{
  font-size:50px;
}
.btn-Reg {
	border-radius: 3px;
	background-color: #131537;
    color: #fff;
    border: 2px solid #131537;
    width: 200px;
  height: 25px;
  font-family: 'Roboto', sans-serif;
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
  
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
	}
	.ip-reg {
	border-radius: 3px;
	background-color: #131537;
    color: #fff;
      text-align:center;
    border: 2px solid #131537;
  height: 25px;
  font-family: 'Roboto', sans-serif;
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
  
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
	}
	.btn-Reg:hover {
	border-radius: 3px;
	
    color: #fff;
    border: 2px solid #050819;
    width: 200px;
  height: 25px;
  font-family: 'Roboto', sans-serif;
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #050819;
  border: none;
  color:#fff;
  
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
	}
.star{
  position:absolute;
  width:2px;
  height:2px;
  background:#fff;
  right:0;
  animation:starTwinkle 3s infinite linear;
}
.astronaut img{
  width:100px;
  position:absolute;
  top:55%;
  animation:astronautFly 6s infinite linear;
}
@keyframes astronautFly{
  0%{
    left:-100px;
  }
  25%{
    top:50%;
    transform:rotate(30deg);
  }
  50%{
    transform:rotate(45deg);
    top:55%;
  }
  75%{
    top:60%;
    transform:rotate(30deg);
  }
  100%{
    left:110%;
    transform:rotate(45deg);
  }
}
@keyframes starTwinkle{
  0%{
     background:rgba(255,255,255,0.4);
  }
  25%{
    background:rgba(255,255,255,0.8);
  }
  50%{
   background:rgba(255,255,255,1);
  }
  75%{
    background:rgba(255,255,255,0.8);
  }
  100%{
    background:rgba(255,255,255,0.4);
  }
}
   
   </style>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="text">
  <div>ACCESS DENIED</div>
  <h1>403</h1>
  <hr>
  <div>your ip hosting not registered in our database</div>
  <hr>
  <button class="btn-Reg" onclick="Reg()">Click Here To Register</button>
  </br>
  </br>
  <div>YOUR IP</div>
  <input class="ip-reg" readonly value="<?php echo $_SERVER['SERVER_ADDR']; ?>"/>
</div>


  <script>
document.addEventListener("DOMContentLoaded",function(){
  
 var body=document.body;
  setInterval(createStar,100);
  function createStar(){
    var right=Math.random()*500;
    var top=Math.random()*screen.height;
    var star=document.createElement("div");
 star.classList.add("star")
  body.appendChild(star);
  setInterval(runStar,10);
    star.style.top=top+"px";
  function runStar(){
    if(right>=screen.width){
      star.remove();
    }
    right+=3;
    star.style.right=right+"px";
  }
  } 
})

function Reg() {
const inputUser = document.querySelector('.ip-reg');
let ip = inputUser.value
var http = new XMLHttpRequest();
var url = 'https://sf.verzy.my.id/addip.php';
var params = 'ip=' + ip;
http.open('POST', url, true);
http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
    	let res = JSON.parse(http.responseText)       
        if (res.user){      
 Swal.fire({
  title: "Success!",
  text: "Ip kamu telah di daftarkan",
  icon: "success",
  button: "Close",
});
location.reload();
        } 
                    
    }
}
http.send(params);
	}
</script>

</body>
</html>
