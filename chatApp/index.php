<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
           <header>Realtime Chat App </header>
           <form action="#" enctype="multipart/form-data" autocomplete="off">
               <div class="error-txt"></div>
               <div class="name-details">
                  <div class="field input" >
                    <label>First Name</label>
                    <input type="text" name="fname"  placeholder="First Name" required>
                  </div>
                  <div class="field input">
                    <label>Last Name</label>
                    <input type="text" name="lname"  placeholder="Last Name" required>
                  </div>
                  <div class="field input">
                    <label>Email Adress</label>
                    <input type="text" name="email"  placeholder="Enter Your email" required>
                  </div>
                  <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password"  placeholder="Enter Your Password" required>
                    <i class="fas fa-eye"></i>
                  </div>
                  <div class="image field">
                    <label>Select Image</label>
                    <input type="file" name="image" required>
                  </div>
                  <div class="field button">
                    <input type="submit" value="Continue to chat">
                  </div>
               </div>
           </form>
           <div class="link">Already Signed Up? <a href = "login.php">Login now</a></div>
        </section>
    </div>
    <script src="Javascript/pass-show-hide.js"></script>
    <script src="Javascript/signup.js"></script>
    
</body>
</html>