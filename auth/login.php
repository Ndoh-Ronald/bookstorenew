<?php require "../includes/header.php" ?>
<?php require "../config/config.php" ?>

<?php
session_start(); // Add this line to start the session
if(isset($_SESSION['username'])) {
    header("location: ".APPURL."");
}
if(isset($_POST['submit'])){
    
    if(empty($_POST['email']) || empty($_POST['password'])){
        echo "<script>alert('one or more inputs are empty');</script>";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];  
        
        $login = $conn->prepare("SELECT * FROM user WHERE email=:email"); // Use prepared statements to prevent SQL injection
        $login->bindParam(':email', $email);
        $login->execute();

        $fetch = $login->fetch(PDO::FETCH_ASSOC);

        if($login->rowCount() > 0){
              
            if(password_verify($password, $fetch['mypassword'])) {
                
                $_SESSION['username'] = $fetch['username'];  
                $_SESSION['user_id'] = $fetch['id'];
                header("Location: " . APPURL . ""); // Fix the redirect URL
                exit(); // Add this line to stop executing the script after redirect
            } else {
                echo "<script>alert('Password or email are wrong');</script>";
            } 
        } else {
            echo "<script>alert('Password or email are wrong');</script>";
        }
    }
}
?>
   
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-control mt-5" method="POST" action="login.php">
                    <h4 class="text-center mt-3"> Login </h4>
                   
                    <div class="">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="">
                            <input type="email" name="email" class="form-control" id="" value="">
                        </div>
                    </div>
                    <div class="">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="">
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4" name="submit" type="submit">login</button>

                </form>
            </div>
        </div>
 
   

        <?php require "../includes/footer.php"; ?>
