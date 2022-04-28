<!DOCTYPE html>
<html>

<head>
  <title>SIGNUP | FILES</title>
  <link rel="stylesheet" type="text/css" href="assets/styles/sign12.css">
</head>

<body>
  <div id="container-sign">
    <div class="bg">
      <img />
      <div class="bg-overlay">
      </div>
    </div>

    <fieldset class="sign-in-form">
      <h3>Sign in to explore more features.</h3>

      <form action="includes/signup.inc.php" method="POST" onsubmit="return validation()">

        <input type="text" placeholder="First Name" name="firstname" id="firstname" autocomplete="off">
        <span id="message"></span>

        <input type="text" placeholder="Last Name" name="lastname" id="lastname" autocomplete="off">
        <span id="message0"> </span>

        <input type="text" placeholder="Username" name="username" id="user" autocomplete="off">
        <span id="message1"></span>

        <input type="password" placeholder="Password" name="password" id="pass">
        <input type="password" placeholder="Retype Password" name="password2" id="pass2">
        <span id="message2"> </span>

        <span class="name13" style="color:white"><input type="radio" name="privilage" value="Super User">Super User</span><br>
        <span class="name13" style="color:white"><input type="radio" name="privilage" value="Non Super User">Non Super User</span>

        <button type="submit" name="submit" value="submit">Sign In</button>

      </form>

    </fieldset>
  </div>
  <script type="text/javascript">
    function validation() {

      var f = document.getElementById('firstname').value;
      var l = document.getElementById('lastname').value;
      var u = document.getElementById('user').value;
      var p = document.getElementById('pass').value;





      if (f == "") {
        document.getElementById('message').innerHTML = "** Please fill the Firstname.";
        return false;
      }
      if (f.length < 3) {
        document.getElementById('message').innerHTML = "** firstname range is 3 to 20.";
        return false;
      }
      if (f.length > 20) {
        document.getElementById('message').innerHTML = "** Firstname range is 3 to 20.";
        return false;
      }
      if (!isNaN(f)) {
        document.getElementById('message').innerHTML = "** Firstname contains only alphabets";
        return false;
      }


      if (l == "") {
        document.getElementById('message0').innerHTML = "** Please fill the Lastname.";
        return false;
      }
      if (l.length < 3) {
        document.getElementById('message0').innerHTML = "** Lastname range is 3 to 20.";
        return false;
      }
      if (l.length > 20) {
        document.getElementById('message0').innerHTML = "** Lastname range is 3 to 20.";
        return false;
      }
      if (!isNaN(l)) {
        document.getElementById('message0').innerHTML = "** Lastname contains only alphabets";
        return false;
      }

      if (u == "") {
        document.getElementById('message1').innerHTML = "** Please fill the username.";
        return false;
      }
      if (u.length < 3) {
        document.getElementById('message1').innerHTML = "** username range is 3 to 20.";
        return false;
      }
      if (u.length > 20) {
        document.getElementById('message1').innerHTML = "** username range is 3 to 20.";
        return false;
      }
      if (!isNaN(u)) {
        document.getElementById('message1').innerHTML = "** username contains only alphabets";
        return false;
      }


      if (p == "") {
        document.getElementById('message2').innerHTML = "** Please fill the password.";
        return false;
      }
      // if (p.length < 9) {
      //document.getElementById('message2').innerHTML = "** Password range is  minimum 8 characters";
      //return false;
      //}
      //if (p.length > 20) {
      //document.getElementById('message2').innerHTML = "** password range is 3 to 20.";
      //return false;
      //}    

    }
  </script>
  <?php
  include_once 'footer.php';
  ?>