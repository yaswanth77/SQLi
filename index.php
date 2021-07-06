<html>
<head>
<title>User Login</title>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAMILY EXPENCES RECORD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
     body {
        background-color: #F3EBF6;
        font-family: 'Ubuntu', sans-serif;
    }
    
    .main {
        background-color: #FFFFFF;
        width: 500px;
        height: 500px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
   
    }
    
    .sign {
        padding-top: 40px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 {
        padding-top: 40px;
    }
    
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        padding-top: 15px;
        text-align: center;
    }
    .register {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;

        text-align: center;
    }
    
    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }
    
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }
    }
    pre{
      font-size: 23px;
    }
  </style>
</head>

<body>

 <nav class="navbar navbar-dark bg-dark text-center">
                <span class="navbar-brand mb-0 h1 text-center">EXPENCES RECORD</span> 
         </nav>
                <br><br>
  <div class="main">
    <p class="sign" align="center">LOGIN INTO YOUR EXPENSES RECORD</p>
    <form class="form1" action="index.php" method="POST">
      <input class="un " type="text" align="center" id="username" name="username" placeholder="Username">
      <input class="pass" type="password" align="center" id="password" name="password" placeholder="Password"><br><br>
      <input class="submit" type="submit" name="submit" align="center" value="LOGIN"><br><br>




<pre class="register" align="center"><a href="register.php">Register for new account </pre>
      
            
                
    </div>
     
</body>

</html>

<?php
session_start();

if(isset($_POST['submit'])){

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "daily_exp";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$username =$_POST['username'];
$password =$_POST['password'];

// to prevent sqli

// $username=stripcslashes($username);
// $password=stripcslashes($password);
// $username=mysqli_real_escape_string($conn, $username);
// $password=mysqli_real_escape_string($conn, $password);

$sql ="SELECT * FROM account WHERE username ='$username' and password ='$password'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count>0){
    $_SESSION["username"]=$username;
    echo "<h2 style=color:black;><center>Login successful</center><h1>";
    echo "<h2 style=color:black;><center>QUERY IS : $sql </center><h2><br><br>";
    //  header('Location: home.php');
     
}
else{
    echo "<h2 style=color:black;><center>Login failed. Invalid username or password</center><h1>";
    echo "<h2 style=color:black;><center>QUERY IS : $sql </center><h2><br><br>";
    
}
if($count>0){
    echo "<div id='GFG'>";
    
    while($row = mysqli_fetch_assoc($result))
    {

        echo "<tr align=left bgcolor='#ccc' style='font: size 18px;'>";
        echo "Username :","<tr align=center>" . $row['username'] ."</td><br>";
        echo "Password :", "<tr align=left>" . $row['password'] ."</td><br><br>";
        echo "</tr>";

}
}
}
?>
