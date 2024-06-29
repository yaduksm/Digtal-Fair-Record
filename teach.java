<html>
<head>
<title>Teacher Registration Form</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">
</head>
 
<body>
<script>
function check() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
<h3>TEACHER REGISTRATION FORM</h3>

 <form action="treg.php" method='post'>
<table align="left" cellpadding = "10">
 
<!----- First Name ---------------------------------------------------------->
<tr>
<td><input type="text" placeholder ="First_Name" name="fname"required/>
</td>
</tr>

<!----- Last Name ---------------------------------------------------------->
<tr>
    <td><input type="text" placeholder ="Last_Name" name="lname"/>
    </td>
</tr>
<!----- Email Id ---------------------------------------------------------->
<tr>
    <td><input type="email" placeholder="Email_Id" name="email" required/>
    </tr>
     
    <!----- Mobile Number ---------------------------------------------------------->
    <tr>
    <td>
    <input type="number" placeholder="Mobile_Number" pattern="[0-9]{10}" name="phoneno" required/>
    (10 digit number)
    </td>
    </tr>
    <!----- SUBJECT ---------------------------------------------------------->
<tr>
    <td>
    <input type="text" placeholder="SUBJECT" name="subject" required/>
    </tr>
     
    <!----- User Name---------------------------------------------------------->
    <tr>
    <td><input type="text" placeholder="user name" name="username" required/>
    </td>
    </tr>
     
    <!----- password ---------------------------------------------------------->
    <tr>
    <td><input type="password" id='password' onkeyup="check()" placeholder="Password" must be 8 character" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
name="password" required/>
    </tr>
     
    <!----- re-type password---------------------------------------------------------->
    <tr>
    <td><input type="password" id='confirm_password'onkeyup="check()" placeholder="confirm password" required/>
    </td>
    </tr>
    <!----- Submit and Edit ------------------------------------------------->
    <tr>
    <td colspan="2" align="left">
    <input type="submit" value="Submit">
    <input type="button" value="Back" onclick="window.location.href = 'm.html';" >
    </td>
    </tr>
</form>
</body>
</html>