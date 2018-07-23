<?php
$current_day = date('l');
$day         = date('m/d/Y');
if (($current_day == "Saturday") || ($current_day == "Sunday")){   
  $x= "It's the Weekend!";
}
else {
$file = file_get_contents("https://www.wxyz.com/weather/school-closings-delays");
if (strpos($file, '<h1 class="text--primary js-sort-value">Al-Ikhlas Training Acdmy - WAYNE</h1>') !== false) {
$x = "NO SCHOOL!!!";
    }
else
    {
$x =  "It's the summer...";
    }
}
?>
<?php 

$html_string = file_get_contents('http://detroit.cbslocal.com/first-school-closings/'); 
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($html_string);
libxml_clear_errors();
$xpath = new DOMXpath($dom);
$class = 'name';
$elements = $xpath->query("//*[contains(@class, '{$class}')]");


?>
<!DOCTYPE html>
<html>
<title>Do We Have School?</title>
<link rel="icon" type="image/x-icon" href="https://cdn.iconscout.com/public/images/icon/free/png-256/snow-cold-flake-snowfall-snowflake-weather-388d22cfbc51ea26-256x256.png">
<style>
body, html {
    height: 100%;
    margin: 0;
}
.bgimg {
    /* Background image */
    background-image: url('https://i.pinimg.com/originals/6a/6b/6d/6a6b6d51d8180de596aa70a268d6c1bc.jpg');
    /* Full-screen */
    height: 100%;
    /* Center the background image */
    background-position: center;
    /* Scale and zoom in the image */
    background-size: cover;
    /* Add position: relative to enable absolutely positioned elements inside the image (place text) */
    position: relative;
    /* Add a white text color to all elements inside the .bgimg container */
    color: #F5F5F5 ;
    /* Add a font */
font-family: 'Contrail One', cursive;
    /* Set the font-size to 25 pixels */
    font-size: 25px;
}
.topleft {
    position: absolute;
    top: 0;
    left: 16px;
}

.bottomleft {
    position: absolute;
    bottom: 0;
    right: 13px;
    color: black;
}
.bottomright {
    position: absolute;
    bottom: 0;
    left: 16px;
    color: black;
}

.middle {
    position: absolute;
    top: 38%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
.gth {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

hr {
    margin: 5px;
    width: 100%;
}
a, a:visited, a:hover, a:active {
  color: inherit;
  color:#8eb7f9;
}
h1{
    font-size: 40px;
    color: #1589FF  ;
}
h2{
    font-size: 90px;
    z-index: 1;
}
h3{
    font-size: 20px;
    z-index: 1;
}
h4{
    font-size: 20px;
    color: #e5e5e5  ;
}
.number{
    font-size: 20px;
    color: black  ;
}

.loading {
  font-size: 40px;
}
.loading2 {
      color: #CC3333;

}

.loading:after {
  overflow: hidden;
  display: inline-block;
  vertical-align: bottom;
  animation: ellipsis steps(4,end) 900ms infinite;
  content: "\2026"; /* ascii code for the ellipsis character */
  width: 0px;
}



@keyframes ellipsis {
  to {
    width: 1.25em;    
  }
}

@-webkit-keyframes ellipsis {
  to {
    width: 1.25em;    
  }
}
#hideMe {
    -moz-animation: cssAnimation 0s ease-in 5s forwards;
    /* Firefox */
    -webkit-animation: cssAnimation 0s ease-in 5s forwards;
    /* Safari and Chrome */
    -o-animation: cssAnimation 0s ease-in 5s forwards;
    /* Opera */
    animation: cssAnimation 0s ease-in 5s forwards;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}
@keyframes cssAnimation {
    to {
        width:0;
        height:0;
        overflow:hidden;
    }
}
@-webkit-keyframes cssAnimation {
    to {
        width:0;
        height:0;
        visibility:hidden;
    }
}
</style>
<link href="https://fonts.googleapis.com/css?family=Contrail+One" rel="stylesheet">

<base target="_blank">

<body>

</div>
<div class="bgimg">
  
<div class="gth">
  <h2>DO WE HAVE SCHOOL?</h2></div>
  <div class="middle">
    <div id="div1"  style="visibility: hidden;"><h1><?php echo $x?></h1></div>

    <div class="loading" id='hideMe'>Let me work my powers</div>
    <hr>
    <h3>DISCLAIMER: This is fully automated based on data received from sites below. (101% Accurate)</h3>
     <a href="https://www.wxyz.com/weather/school-closings-delays">WXYZ</a>
     <a href="https://www.clickondetroit.com/school-closings">WDIV</a>
     <a href="http://www.fox2detroit.com/closings">WJBK</a>

  </div>
  <div class="bottomleft">
    <p style="color:#ACACAC;">made by mm</p>
  </div>  
  <div class="bottomright">
    <p class="number" style="color:#ACACAC;">Currently Closed: <?php echo $elements->length?> Schools</p>
  </div>

</div>
</body>

<script type="text/javascript">
function showIt() {
  document.getElementById("div1").style.visibility = "visible";
}
setTimeout("showIt()", 5000); // after 1 sec
</script>
<script></script>
</html>


