<!DOCTYPE html>

<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="form.css">
    
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <div style="text-align:center;"> <img src="logo.png" width="40%" alt="" srcset=""></div>


                <form action="form.php" method="POST">
    <?php
    include 'connection.php';
    if(isset($_POST['submit'])){
      $email = htmlspecialchars($_POST['email']);
      $pwd =  htmlspecialchars($_POST['pwd']);
      //validation
      $valid = 0;
          //email validation
          $checkEmail = mysqli_query($conn, "SELECT email from gestionnaire WHERE email = '$email'");
          if (mysqli_num_rows($checkEmail) == 0) {
            $valid++;
          }
          //password validation
          $checkPwd = mysqli_query($conn, "SELECT pwd from gestionnaire WHERE pwd = '$pwd'");
          if (mysqli_num_rows($checkPwd) == 0) {
            $valid++;
          }
          if($valid != 0){
            echo  "<p style=\"color: red;\">wrong email or password</p>";
          }else{
            header("Location: index.php"); 
            exit(); 
          }
        }
    ?>

                    <div class="input-field">
                        <input type="text" name="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="pwd" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="sub">
                       <button class="button" name="submit">Submit</button>
                    </div>                
                </form>

           
            </div>
            
            
           
        </div>
    </div>



<script>
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

 
</script>
</body>
</html>
