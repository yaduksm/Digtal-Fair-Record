<html>
<head>
<title>HOD registeration form</title>
<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN' crossorigin='anonymous'><link rel='stylesheet' href='./style.css'>
</head>

<body>
    <h3>HOD REGISTRATION FORM</h3>
    <?php
  
     echo "<form action='hreg.php' method='post'>
    <table align='left' cellpadding = '10'>";
   echo "  <!----- First Name ---------------------------------------------------------->
   <tr>
    <td><input type='text' placeholder =Name name='name' required/>
    </td>
    </tr>
 <tr>
    <td><input type='text' placeholder =Department name='department' required/>
    </td>
    </tr>
    
    <!----- Email Id ---------------------------------------------------------->
    <tr>
        <td><input type='email' placeholder=Email name='email' required/>
        </tr>
         
        <!----- Mobile Number ---------------------------------------------------------->
        <tr>
        <td>
       <input type='number' placeholder=Phoneno name='phoneno' pattern='[0-9]{10}/>
        (10 digit number)
        </td>
        </tr>
        <!----- department ---------------------------------------------------------->
    <tr>
        <td>
        <input type='text' placeholder='DEPARTMENT' required/>
</td>
        </tr>
         
        <!----- User Name---------------------------------------------------------->
        <tr>
        <td><input type='text' placeholder='User name' name='username' required/>
        </td>
        </tr>
         
        <!----- password ---------------------------------------------------------->
        <tr>
        <td><input type='password' placeholder='Password must be 8 character' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters' name='password' required/>
        </tr>
         
        <!----- re-type password---------------------------------------------------------->
        <tr>
        <td><input type='password' placeholder='confirm password' />
        </td>
        </tr>
        <!----- Submit and Edit ------------------------------------------------->
        
";
echo "
<tr>
        <td colspan='2' align='left'>
        <input type='submit' value='Update'>
        <input type='button' value='Back' onclick=window.location.href='pass.html';>
        </td>
        </tr>
";

 
?>
</form>
</body>
</html>