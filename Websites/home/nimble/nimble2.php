<?php
  $conn=mysql_connect("172.16.100.161","ignus","r00t@ignus","nimble17") or die("not connect");
  
  if(conn==false){
    echo "<script>alert('Sorry ! currently database is not working.')</script>";
  }
  else{
    if(isset($_POST['xsubmit'])){

      $name=$_POST['xname'];
      $phone=$_POST['xmobile'];
      $mail=$_POST['xemail'];
      $eventname="";
      foreach ($_POST['xevent'] as $names){
           $eventname=$eventname.$names." / ";
      }
    $count=intval($_POST['xcount']);
      
      $othermember="";
      for($i=1;$i<=$count-1;$i++){
        
          $var="member".$i;
          $othermember=$othermember.$_POST[$var]." / ";
        
      }
      $var="member".$i;
      $othermember=$othermember.$_POST[$var];
    
      $qry="insert into nimble17 values(".'$name'.",".'$phone'.",".'$mail'.",".'$eventname'.",".'$count'.",".'$othermember'.")";
      echo $qry;
      $r=mysql_query($qry,$conn) or die("<script>alert('Sorry ! Registration Failure.')</script>");
      if($r){
        echo "<script>alert('Sussfully Registered.')</script>";
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
  <title>NIMBLE-IIT JODHPUR</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
 <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <style>
  .secondary-content : hover{
    background: none;
  }
  /*ul li a{
    margin-top:-1px;
    border-bottom: 1px solid black;
  }*/
  </style>
  <script>
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
                input.placeholder="Member "+(i)+" Email id";
                input.name = "member" + i;
                input.style.color="#000000"; 
                ele.appendChild(input);
                // Append a line break 
                ele.appendChild(document.createElement("br"));
            }


  } 
  
  </script>
  
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">IIT JODHPUR</a>
      <ul class="right hide-on-med-and-down">
        <li><a class="dropdown-button" href="#!" data-activates="dropdown_aero" data-beloworigin="true" href="#">Aeromodelling</a></li>

        <!-- Dropdown Structure -->
        <ul id="dropdown_aero" class="dropdown-content collection">
            <li class="collection-item avatar">
                <a href="#!" class="secondary-content">Event 1</a>
            </li>
            <li class="collection-item avatar">
                <a href="#!" class="secondary-content">Event 2</a>
            </li>
            <li class="collection-item avatar">
                <a href="#!" class="secondary-content">Event 3</a>
            </li>
        </ul>

        <li><a href="#">Astronomy</a></li>
        <li><a href="#">Automobile</a></li>
        <li><a href="#">Electronics</a></li>
        <li><a href="#">Programming</a></li>
        <li><a href="#">Robotics</a></li>
        <li><a href="#">Science</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Aeromodelling</a></li>
        <li><a href="#">Astronomy</a></li>
        <li><a href="#">Automobile</a></li>
        <li><a href="#">Electronics</a></li>
        <li><a href="#">Programming</a></li>
        <li><a href="#">Robotics</a></li>
        <li><a href="#">Science</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">NIMBLE</h1>
        <div class="row center">
          <h5 class="header col s12 light">A fest based on the intellectual scientific knowledge of students.</h5>
        </div>
        <div class="row center">
          <a href="#register" class="btn-large waves-effect waves-light teal lighten-1">Get Register</a>
      
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
          <input id="icon_telephone" type="tel" class="validate" required="required" name="xemail" style="color:black;">
          <label for="icon_telephone">Email ID</label>
        </div>
        </div>
        
        
        
        <div class="row">
        
        <div class="input-field col l12 m12 s12"style="color:black;">
        <select required="required" name="xevent[ ]" multiple style="color:black;">
          <option value="" disabled selected>Choose your option</option>
          <option value="option1" name="option1">Option 1</option>
          <option value="option2">Option 2</option>
          <option value="option3">Option 3</option>
        </select>
        <label>Events your team want to participate</label>
        </div>

        
        
        </div>
        
        <div class="row">
        
        <div class="input-field col l12 m12 s12" style="color:black;">
        <select required="required" name="xcount" style="color:black;" id="teamcount" class="teamcount" onchange="add_input()">
          <option value="" disabled selected>Choose your option</option>
          <option value="1">1</option>
          <option value="2">2</option>
          
        </select>
        <label>Choose numbre of ither members count</label>
        </div>

        
        
        </div>
        <div class="row" id="result">

        </div>
        <div class="row">
        <p class="center hoverable" style="padding:2%;color:black;">
          I will return whatever i will take for the fest.
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
    <div class="parallax"><img src="background1.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Speeds up development</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Explore | Experience | Embrance </h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background2.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Contact Us</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Design | Implement | Make Life Easier.</h5>
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
      Made by <a class="brown-text text-lighten-3" href="#">WEB DESIGNNING TEAM</a>
      </div>
    </div>
  </footer>


 

  </body>
</html>
