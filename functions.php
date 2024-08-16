<?php
require_once 'conn.php';
session_start();
function registerpage(){
    global $conn;
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if(empty($username) or empty($password) or empty($cpassword)){
            echo "<div class=' fs-5 offset-3 text-danger'>*All Fields Required*</div>";
        }
        elseif($password != $cpassword){
            echo "<div class=' fs-5 offset-3 text-danger'>*password mismatch*</div>";

        }else{
            $harsh_pass = password_hash($password, PASSWORD_BCRYPT);

            $sql = $conn->query("INSERT INTO todolist.users(username, password) value ('$username', '$harsh_pass')");
            if ($sql== true){
                $_SESSION['username'] = $username;
                header('Location: login.php ');
            }else{
                echo "<div class=' fs-5 offset-3 text-danger'>*failed to register*</div>";
            }
        }


    }

    
}

function loginpage(){
    global $conn;
    
    if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];


// Sanitize input (crucial, but still not as secure as prepared statements)
$username = mysqli_real_escape_string($conn, $username);

// Build and execute query
$sql = "SELECT id, password FROM users WHERE username = '$username'";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    // Verify password using password_verify()
    if (password_verify($password, $row['password'])){
        $_SESSION['username'] = $username;
        $_SESSION['id'] =  $user_id;
        header("Location: todo.php");
        exit;
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}

$conn->close();



    }
}

function taskform(){
    global $conn;

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $status = $_POST['status'];
        $userid =$_POST['userid'];

        if(empty($title)|| empty($content)|| empty($date)){
            echo "<div class=' fs-6 offset-3 text-danger'>*all field required*</div>";
            
        }elseif(strlen($content)>150){
            echo "<div class=' fs-6 offset-3 text-danger'>*text above limit(150letters)*</div>";
            

        }elseif(strlen($title)>50){
            echo "<div class=' fs-6 offset-3 text-danger'>*text above limit(50letters)*</div>";

        }else{
            $sql = $conn->query("INSERT INTO task(title,content, deadline,status,unique_id)VALUE('$title','$content','$date','$status','$userid')");

            if($sql == true){
                header("Location: todo.php");
                // echo "<div class=' fs-6 offset-3 text-sucess'>task created sucessfully</div>";

            }else{
            echo "<div class=' fs-6 offset-3 text-danger'>*field to create task*</div>";

            }

        }
    }

 }

 function retrivedata(){
    global $conn;
    




 }

?>