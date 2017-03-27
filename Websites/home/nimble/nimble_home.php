<?php
  //$conn = new mysqli($servername, $username, $password, $dbname);
  $conn=mysqli_connect("172.16.100.161","ignus","r00t@ignus17","ignus") or die("not connect");
  //$conn=mysqli_connect("mysql.hostinger.in","u177974137_mark4","mark42","u177974137_mark4") or die("not connect");
  
  if(!$conn){
    echo "<script>alert('Sorry ! currently database is not working.')</script>";
  }
  else{
    if(isset($_POST['xsubmit'])){

      // if($_POST[xterms]!=true){
      //   echo "<script>alert('Kindly accept terms and conditions.')</script>";
      //   return;
      // }
      $name=$_POST['xname'];
      $phone=$_POST['xmobile'];
      $mail=$_POST['xemail'];
      $eventname="";
      echo $_POST['xevent'];
      foreach ($_POST['xevent'] as $names){

           $eventname=$eventname.$names." + ";
      }
     // echo $eventname;
      $count=intval($_POST['xcount']);
      
      $othermember="";
      for($i=1;$i<=$count-1;$i++){
        
          $var="member".$i;
          $othermember=$othermember.$_POST[$var]." + ";
        
      }
      $var="member".$i;
      $othermember=$othermember.$_POST[$var];
    
      //$qry="insert into 'nimble17' ('name','mobile','email','events','count','othermember') values ('".$name."','".$phone."','".$mail."','".$eventname."',".$count.",'".$othermember."');";
      //$qry="insert into 'nimble17' values( '".$name."' , '".$phone."', '".$mail."' , '".$eventname."' , ".$count." , ' ".$othermember." ' )";
    $qry= "INSERT INTO nimble17 ".
       "(name,mobile,email,events,count,othermembers) ".
       "VALUES ".
       "('$name','$phone','$mail','$eventname',$count,'$othermember')";
    //echo $qry;
       $qry2= "INSERT INTO nimble17events ".
       "(phone,events) ".
       "VALUES ".
       "('$phone','$eventname')";
    //echo $qry;
      $r=mysqli_query($conn,$qry) or die("<script>alert('Sorry ! Registration Failure.')</script>");
      $r2=mysqli_query($conn,$qry2) or die("<script>alert('Sorry ! Registration Failure.')</script>");
      if($r and $r2){
        echo "<script>alert('Successfully Registered.')</script>";
      }
      else{
        echo "<script>alert('Registration Failure.')</script>";
      }
    }
  }
?>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Nimble-IIT Jodhpur</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

 <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <style>
    /* initial state */
  #outerspace {
    position: relative;
    height: 400px;
    background: #0c0440 url('http://www.the-art-of-web.com/images/outerspace.jpg');
    color: #fff;
  }
  div.rocket {
    position: absolute;
    bottom: 10px;
    left: 20px;
    -webkit-transition: 3s ease-in;
    -moz-transition: 3s ease-in;
    -o-transition: 3s ease-in;
    transition: 3s ease-in;
  }
  div.rocket div {
    width: 50px;
    height: 100px;
    background: url(http://www.the-art-of-web.com/images/rocket.gif) no-repeat;
    -webkit-transition: 2s ease-in-out;
    -moz-transition: 2s ease-in-out;
    -o-transition: 2s ease-in-out;
    transition: 2s ease-in-out;
  }

  /* hover final state */
  #outerspace:hover div.rocket {
    -webkit-transform: translate(1500px,-200px);
    -moz-transform: translate(1500px,-200px);
    -o-transform: translate(1500px,-200px);
    -ms-transform: translate(1500px,-200px);
    transform: translate(1500px,-200px);
  }
  #outerspace:hover div.rocket div {
    -webkit-transform: rotate(70deg);
    -moz-transform: rotate(70deg);
    -o-transform: rotate(70deg);
    -ms-transform: rotate(70deg);
    transform: rotate(70deg);
  }
  #loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 2s;
  animation-name: animatebottom;
  animation-duration: 2s
}

@-webkit-keyframes animatebottom {
  from { bottom:-300px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-300px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}


  /*.modal{
    height:150%;width:70%
  }*/
  </style>
  <script>

if ($(window).width() < 514) {
 // alert($(window).width());
    $('#Events').addClass("browser-default");
}
      $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    });
  $(document).ready(function() {
    $('select').material_select();
  });
   function add_input(){
     
      var ele=document.getElementById("result");
      var count=document.getElementById("teamcount").value;
      while (ele.hasChildNodes()) {
                ele.removeChild(ele.lastChild);
            }
            for (i=1;i<=count;i++){
                // Append a node with a random text
                ele.appendChild(document.createTextNode("member" + (i+1)));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");

                input.type = "text";
                input.placeholder="Member "+(i)+" Name/Email id/Mobile";
                input.name = "Member" + i;
                input.required="required";
                input.style.color="#000000"; 
                ele.appendChild(input);

                // Append a line break 
                ele.appendChild(document.createElement("br"));
            }


  } 
  
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("body").style.display = "block";
  document.getElementById("mesg").style.display = "none";
}
  </script>
  
</head>
<body onload="myFunction()">
  <div id="loader">
   
  </div>
  <div id="mesg" style="position:fixed;top:60%;left:50%;">
    <p class="center" style="color:black;font-weight:bold;font-size:20px;padding:5%;">Loading</p> 
  </div>
  <!-- <nav class="white" role="navigation">
    <div class="nav-wrapper container"style="height:150px;">
      <a id="logo-container" href="#" class="brand-logo">IIT JODHPUR</a>
      <a href="#" class="brand-logo">IIT JODHPUR</a>
      <a href="#!"><img style="float:right;" src="logo.png" height="100px" width="50px"></img></a>
      <ul id="" class="right hide-on-med-and-down">
        <li><a href="sass.html"><img src="nimble_logo.jpg" height="100px" width="100px"></img></a></li>
        
      </ul>
      
    </div>
  </nav> -->
  <div id="body" class="animate-bottom" style="display:none;">
  <div class="row teal lighten-2" >
    <div class="col s12 m12 l2 center"style="padding-top:2%;">

      <a href="#"><img class="circle responsive-img" src="nimble_logo.jpg" height="100px" width="100px"></img></a>

    </div>
    
    <div class="col s12 m12 l6 center">
      <p style="text-align-center;font-size:250%;color:#1a237e; teal lighten-1; text-shadow: 2px 2px #b2dfdb;">NIMBLE,&nbsp IIT JODHPUR

      <p style="text-align-center;font-size:100%;color:#1a237e; teal lighten-1;margin-top:-3%;">(10 FEB-12 FEB,2017) </p>

      </p>


    </div>
    <div class="col s12 m12 l4 center">

      <a href="#"><img class="" src="tech.png" height="150px" width="300px"></img></a>

    </div>




  </div>


  

  <div id="index-banner" class="parallax-container" style="margin-top:-20px;">
    <!-- <div id="outerspace"> -->

    <div class="section no-pad-bot" id="outerspace" style="background-image:url('101669520.jpg');background-repeat: no-repeat;background-size: cover;">
      <div class="rocket">
        <!--   -->
       <!--  <img src="food.jpg"></img> -->
    </div>  



      <div class="container" >



        <br><br>
        <h4 style="margin-top:5%;"class="header center teal-text text-lighten-2">NIMBLE 2K17</h4>
        <div class="row center">
          <h5 class="header col s12 light">A fest based on the intellectual scientific knowledge of students.</h5>
        </div>
        <div class="row center">
          <a href="#events" class="btn-large waves-effect waves-light teal lighten-1" style="margin:10px;">Events</a>
          <a href="#register" class="btn-large waves-effect waves-light teal lighten-1" style="margin:20px;">Register</a>
          <a href="#rulebook" class="btn-large waves-effect waves-light teal lighten-1" style="margin:10px;">RuleBook</a>
      
      <!--- register ---->
      
      <div id="register" class="modal">
      <div class="modal-content">
        
        <form action="" method="post">
        
          
        <div class="row">
        <div class="input-field col s12 l12 m12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" required="required" name="xname" style="color:black;">
          <label for="icon_prefix">Team Head Name</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col sl12 m12 s12">
          <i class="material-icons prefix">phone</i>
          <input id="icon_telephone" type="tel" class="validate" required="required" name="xmobile" style="color:black;">
          <label for="icon_telephone">Mobile</label>
        </div>
        </div>
        
        <div class="row">
        <div class="input-field col sl12 m12 s12">
          <i class="material-icons prefix">textsms</i>
          <input id="icon_telephone" type="text" class="validate" required="required" name="xemail" style="color:black;">
          <label for="icon_telephone">Email ID</label>
        </div>
        </div>
        
        
        
        <div class="row">
        <div class="col s12 m12 l12">
        <label>Events your team want to participate</label>
      </div>
    </div>
    <div class="row">
        <div class="input-field col l12 m12 s12"style="color:black;">
        <select class="selectpicker" required="required" name="xevent[ ]" style="color:black;" id="Events" multiple>
          <option value="" disabled selected>Choose your option</option>
          <option value="Balsa Craft">Balsa Craft</option>
          <option value="Aqau Missile" >Aqau Missile</option>
          <option value="MessierHunt">MessierHunt</option>
          <option value="Cadknight">Cadknight</option>
          <option value="AutoQuiz">AutoQuiz</option>
          <option value="Clash of Klann">Clash Of Klann</option>
          <option value="Technovation">Technovation</option>
          <option value="Password Based Circuit Breaker">Password Based Circuit Breaker</option>
          <option value="Radio Frequency Controlled Bot">Radio Frequency Controlled Bot</option>
          <option value="Line Seguidor ">Line Seguidor </option>
          <option value="Tug Of Wars">Tug Of Wars</option>
          <option value="AI_Camelot">AI Camelot</option>
          <option value="Webbed">WebCraft</option>
          <!-- <option value="CodeAlpha">CodeAlpha</option> -->
          <option value="Obfuscator">Obfuscator</option>
          <option value="patch it up">Patch It Up</option>
          <option value="Rubik's cube">Rubik's cube</option>
          <option value="Underwater RoboSoccer">Underwater RoboSoccer</option>
          <option value="Abstract Writing(IEEE Women Cell IIT Jodhpur)">Abstract Writing</option>
          <option value="Project Idea Presentation">Project Idea Presentation</option>
        </select>
        
        </div>
    
      </div>
        
        <div class="row">
        <div class="col s12 m12 l12">
        <label>Choose number of other members</label>
      </div>
        <div class="input-field col l12 m12 s12" style="color:black;">
        <select class="browser-default"required="required" name="xcount" style="color:black;" id="teamcount" onchange="add_input()">
          <option value="" disabled selected>Choose your option</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          
        </select>
        
        </div>

        
        
        </div>
        <div class="row" id="result">

        </div>
        <div class="row">
        <p class="center hoverable" style="padding:2%;color:black;">
          I will return whatever items i will take and issue for the fest and it is my humble duty to maintain the dignity of each and every item that belongs to the college.
        </p>
        <p class="center row">
          <input name="group1" type="checkbox" id="test1" required="required" name="xtemrs" style="color:black;" />
          <label for="test1">Terms & Conditions</label>
        </p>
        
        
        </div>
        <div class="row center" style="margin-top:5%">
          <button type="submit" class="btn waves-effect waves-green" name="xsubmit" >REGISTER</button>
        </div> 
        </form>
    
        
    
      </div>
      
      </div>
      
      
        </div>
        <br><br>

      </div>


    </div>
    <!-- <div class="parallax"><img src="background1.jpg" alt="Unsplashed background img 1"></div> -->
  </div>


  <div class="container" id="events">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4 l4 hoverable">
           <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
          <h5 class="center">Project idea Presentation</h5>
          <p class="center"><img src="project.jpg"class="center" style="padding:5%;"></img></p>
          <div class="icon-block">
           
            

            <p class="light">This year nimble come up with great opportunities and fun. Technical Society will fund the project ideas of students. Students can present ideas and related research papers this year in nimble.The idea selection procedure will be ensured by Faculty. Selected team/student will be appointed one mentor and will be provided with all the facility for the same. </p>
            <p style="font-weight:bold;"class="">Funding worth :- 40,000/-</p>
            <p style=""class="center"><a href="#register" class="btn-large waves-effect waves-light teal lighten-1 center">Register Your Team</a></p>
          </div>
        </div>

        <div class="col s12 m4 l4 hoverable">
          <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Special Dinner<br>(for all students)</h5>
          <p class="center"><img src="food.jpg"class="center" style="padding:5%;"></img></p>
          <div class="icon-block">

            <p class="light">Along with the fun and opportunities,we going to have the arrangement of special dinner on 11 February with in our campus.</p>
            <p style="font-weight:bold;"class="">Date :- 11 February,2017</p>
            <p style="font-weight:bold;"class="">Venue :- GPRA Colony,IIT Jodhpur hostels</p>
          </div>
        </div>

        <div class="col s12 m4 l4 hoverable">
          <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">SASHAKT:Women in Science &<br>Engineering<br>(IEEE IIT Jodhpur)</h5>
            <p class="center"><img src="girls.jpg"class="center" style="padding:5%;"></img></p>
          <div class="icon-block">
            

            <p class="light">IEEE Women cell IIT Jodhpur presents a special event this year for the girls encouraging the girls in the field of <font style="font-weight:bold">Science and Technology.</font>Support the cause by video/poster/an essay/a poem/Rangoli or any other way of art,craft or literature you can possibly think on the topic <font style="font-weight:bold">"Women in Science and Engineering-present and future."</font>  </p>
           <p class="center" style="font-weight:bold;font-size:25px;"class="">Abstract Writing Event</p>
           <p style=""class="center"><a href="abstractwriting.docx" target="blank"class="btn-large waves-effect waves-light teal lighten-1 center">Get Rulebook</a></p>
           <p style=""class="center"><a href="#register" class="btn-large waves-effect waves-light teal lighten-1 center">Register Yourself..</a></p>
            
          </div>
        </div>
      </div>

      
    </div>
  </div>
  <div class="container">
    <!-- <span style="position:absolute;float:left;height:4%;width:7%;color:#1a237e ;background:#81d4fa;"class=" badge teal lighten-2">NEW</span> -->
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m6 l6 hoverable" >
           <h2 class="center brown-text"><i class="material-icons">dashboard </i></h2>
          <h5 class="center">TECHNICAL EXHIBITION</h5>
          <div class="row">
          <div class="col s12 m12 l12">
            <p class="center"><img src="exhibition.jpg"class="center" style=""></img></p>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m12 l12">
          <div class="icon-block">
           
           <p class="light">We invite you all at the Technical Exhibition to witness the technology and also provides you the platform to showcase your projects and research paper.</p>
          <p class="center"><a href="#!" class="btn-large waves-effect waves-light teal lighten-1 ">12 Feb, Sunday</a></p>
            
            </div>
          </div>
        </div>
        </div>
      
      <div class="col s12 m6 l6 hoverable" >
           <h2 class="center brown-text"><i class="material-icons">library_books</i></h2>
          <h5 class="center">WORKSHOPS & LECTURES</h5>
          <div class="row">
          <div class="col s12 m12 l12">
          <p class="center"><img src="quadcopter.png"class="center" height="200px" width="200px"style="padding:5%;"></img></p>
        </div>
      </div>
      <div class="row">
          <div class="col s12 m12 l12">
          <div class="icon-block">
           
          
            <p class="light">Nimble'17 brings you workshops on Quad-copter, IC engine. Lectures on Image Processing and Microwave and several other topics.  </p>
            
            </div>
          </div>
        </div>
      </div>
      </div>

      

        
      </div>

      
    </div>
  

  <div class="parallax-container valign-wrapper" >
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Explore | Experience | Embrance </h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background2.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container" id="rulebook">
    <div class="section">
    
    <div class="row center">
    <h5>CLUB EVENTS</h5>
    </div>  
      <div class="row">
      
    <a class="col s12 m12 l2 center" href="#modal_aero"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Aeromodeling
        </a>
    <!-- Modal Structure -->
      <div id="modal_aero" class="modal">
      <div class="modal-content">
        <h4  class="row center">Aeromodelling Club Events</h4>
        <!--p>A bunch of text</p-->
        <div class="row center">
        <a class="col s12 m12 l4 center">
          
        </a>
          <a class="col s12 m12 l2 center" target="blank" href="balsacraft.pdf"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Balsa Craft
        </a>
        <a class="col s12 m12 l2 center" target="blank" href="AquaMissile.pdf"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Aqua Missile
        </a>
        <!-- <a class="col s12 m12 l2 center" target="blank" href=""style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Event 3
        </a> -->
        
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
      </div>
      </div>
        <a class="col s12 m12 l2 center" href="#modal_astro"style="margin:1%;padding:3%;border:1px solid red;color:red;">
          Astronomy
        </a>
    <!-- Modal Structure -->
      <div id="modal_astro" class="modal">
      <div class="modal-content">
        <h4  class="row center">Astronomy Club Events</h4>
        <div class="row center">
        <a class="col s12 m12 l3 center">
          
        </a>
          <a class="col s12 m12 l2 center" target="blank" href="MessierHunt.docx"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          MessierHunt
        </a>
        <a class="col s12 m12 l2 center" target="blank" href="StarWars.docx"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          StarWars
        </a>
        
        
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
      </div>
      </div>
    <a class="col s12 m12 l2 center" href="#modal_auto"style="margin:1%;padding:3%;border:1px solid #F05C11;color:#F05C11;">
          Automobile
        </a>
    <!-- Modal Structure -->
      <div id="modal_auto" class="modal">
      <div class="modal-content">
        <h4 class="row center">Automobile Club Events</h4>
        <div class="row center">
        <a class="col s12 m12 l3 center">
          
        </a>
          <a class="col s12 m12 l2 center" target="blank" href="Cadknight.docx"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Cad <br>Knight
        </a>
        <a class="col s12 m12 l2 center" target="blank" href="AutoQuiz.docx"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Auto <br>Quiz
        </a>
        <a class="col s12 m12 l2 center" target="blank" href="clashofklann.docx"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Clash Of <br>Klann
        </a>
        
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
      </div>
      </div>
    <a class="col s12 m12 l2 center" href="#modal_elec"style="margin:1%;padding:3%;border:1px solid #3D6FCB;color:#3D6FCB;">
          Electronics
        </a>
    <!-- Modal Structure -->
      <div id="modal_elec" class="modal">
      <div class="modal-content">
        <h4  class="row center">Electronics Club Events</h4>
        <div class="row center">
        <a class="col s12 m12 l3 center">
          
        </a>
          <a class="col s12 m12 l2 center" target="blank" href="Technovation.docx"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          <br>Technovation<br><br><br>
        </a>
        <a class="col s12 m12 l2 center" target="blank" href="Password Based Circuit Breaker.docx"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Password Based <br>Circuit Breaker
        </a>
        <a class="col s12 m12 l2 center" target="blank" href="Radio Frequency Controlled Bot.docx"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Radio Frequency <br>Controlled Bot
        </a>
        
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
      </div>
      </div>
    <a class="col s12 m12 l2 center" href="#modal_robo" style="padding:3%;margin:1%;border:1px solid #D94BE0;color:#D94BE0;">
          Robotics
        </a>
    <!-- Modal Structure -->
      <div id="modal_robo" class="modal">
      <div class="modal-content">
        <h4 class="row center">Robotics Club Events</h4>
        <div class="row center">
        <a class="col s12 m12 l3 center">
          
        </a>
          <a class="col s12 m12 l2 center" target="blank" href="Line Seguidor final.docx"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Line Seguidor 
        </a>
        <a class="col s12 m12 l2 center" target="blank" href="Tug Of war final.docx"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Tug Of<br> Wars
        </a>
        
        
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
      </div>
      </div>
    <!--div class="col s12 m12 l1 center">
        </div-->
    
      </div>
    <div class="row center">
    <div class="col s12 m12 l3"></div>
    <a class="col s12 m12 l2 center" href="#modal_prog"style="margin:1%;padding:3%;border:1px solid #1B9B72;color:#1B9B72;">
          Programming
        </a>
    <div id="modal_prog" class="modal">
      <div class="modal-content">
        <h4>Programming Club Events</h4>
        <div class="row center">
        <a class="col s12 m12 l2 center">
          
        </a>
          <a class="col s12 m12 l2 center" target="blank" href="AI_Camelot.pdf"style="margin:1%;padding:3%;border:1px solid #1B9B72;color:#1B9B72;">
          AI_Camelot
        </a>
        <a class="col s12 m12 l2 center" target="blank" href="webbed.pdf"style="margin:1%;padding:3%;border:1px solid #1B9B72;color:#1B9B72;">
          Webbed
        </a>
        
        <a class="col s12 m12 l2 center" target="blank" href="Obfuscator.pdf"style="margin:1%;padding:3%;border:1px solid #1B9B72;color:#1B9B72;">
          Obfuscator
        </a>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
      </div>
      </div>
    <a class="col s12 m12 l2 center" href="#modal_science"style="margin:1%;padding:3%;border:1px solid #626262;color:#626262;">
          Science Club
        </a>
    <div id="modal_science" class="modal">
      <div class="modal-content">
        <h4>Science Club Events</h4>
        <div class="row center">
        <a class="col s12 m12 l2 center">
          
        </a>
          <a class="col s12 m12 l2 center" target="blank" href="Patch It Up.pdf"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Patch It <br> Up
        </a>
        <a class="col s12 m12 l2 center" target="blank" href="Underwater RoboSoccer.pdf"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Underwater RoboSoccer
        </a>
        <a class="col s12 m12 l2 center" target="blank" href="Rubik's cube.pdf"style="margin:1%;padding:3%;border:1px solid green;color:green;">
          Rubik's cube
        </a>
        
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
      </div>
      </div>
    <div class="col s12 m12 l2"></div>
    
    </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Creating | Designing | Developing</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background3.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer teal">
    <!-- <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div> -->
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="#webdteam">WEB DESIGNNING TEAM</a>
      </div>
      <!----modal---->
      <div id="webdteam" class="modal">
        <div class="modal-content">
          <h4 class="center" style="color:#000000;">Web Designning Team </h4>
          <div class="row">
            <div class="col s12 m12 l6">
              <div class="card-panel grey lighten-5 z-depth-1">
              <div class="row valign-wrapper">
                <div class="col s7">
                  <img src="abhisheksah.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="col s5">
                  <span class="black-text">
                    <p style="color:#000000;font-size:20px;">Abhishek Sah</p>

                    </span>
                  </div>
                </div>
              </div>
            </div>
            
      
       
            <div class="col s12 m12 l6">
              <div class="card-panel grey lighten-5 z-depth-1">
              <div class="row valign-wrapper">
                <div class="col s7">
                  <img src="akashimage.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="col s5">
                  <span class="black-text">
                    <p style="color:#000000;font-size:20px;">Akash Gupta</p>

                    </span>
                  </div>
                </div>
              </div>

            </div>  

          </div>
          <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
      </div>
        </div>
        
      </div>
      
    </div>
          
  </footer>


 
</div>
  </body>
</html>
