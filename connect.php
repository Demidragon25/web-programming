<?php 
    $firstname = $_POST['fname'];
    $middlename = $_POST['mname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['uname'];
    $password = $_POST['pwd'];
    $birthdate = $_POST['bdate'];

    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'university');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }
    else{
        $sql = "INSERT INTO users(fname, mname, lname, uname, email, bdate, pWord, uState) 
        VALUES('$firstname','$middlename','$lastname','$username','$email','$birthdate','$password','student')";
        if($conn->query($sql)){
            echo 'New record is inserted';
        }else{
            echo 'Error: '.$sql.'<br>'.$conn->error;
        }
    }
    $conn->close();
?>
<html>
<body>
    <script>
        document.body.onload = ()=>{
            window.location.href = "register.html?user=<?php echo $firstname ?>";
        }
    </script>
</body>
</html>