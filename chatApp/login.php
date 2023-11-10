<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
           <header>Realtime Chat App </header>
           <form action="#">
               <div class="error-txt"></div>
               <div class="field input">
                    <label>Email Adress</label>
                    <input type="text" name ="email"  placeholder="Enter Your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password"  placeholder="Enter Your Password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
           </form>
           <div class="link">Not Yet Signed Up? <a href = "index.php">signup now</a></div>
        </section>
    </div>
    <script src="Javascript/pass-show-hide.js"></script>
    <script src="Javascript/login.js"></script>
    
</body>
</html>