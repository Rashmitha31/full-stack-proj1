<?php
    session_start();
    include_once "config.php";
    // Establish the database connection
    $conn = mysqli_connect("localhost:3008", "root", "chat");

    // Check if the connection was successful
    if ($conn) {
        // Select the database
        mysqli_select_db($conn, "chat");
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
       //lets check user email is valid or not
       if(filter_var($email, FILTER_VALIDATE_EMAIL)){
           //lets check emai already exists in the database or not 
           $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
           if(mysqli_num_rows($sql) > 0) {
            echo "$email - already exists in the database";
          }else{
            //lets check upload file or not
            if(isset($_FILES['image'])){//if file is uploaded
                $img_name = $_FILES['image']['name'];//getting user uploaded image name
                $tmp_name = $_FILES['image']['tmp_name'];//getting user temporary  name

                //lets explode the image and get the last extension like jpg png etc...
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);//here we get extension of user image

                $extensions = ['png', 'jpg', 'jpeg'];//these are some valid image extension
                if(in_array($img_ext, $extensions) == true){//if user uploaded image ext is matched with any array extension
                      $time = time();//this will return us current time
                      $new_img_name = $time.$img_name;
                      if(move_uploaded_file($tmp_name, "image/" .$new_img_name)){
                        $status = "Active now";
                        $random_id = rand(time(), 10000000);

                        // let's insert all user data in query
                        $sql2 = mysqli_query($conn, "INSERT INTO users(unique_id, fname, lname, email, password, img, status)
                                           VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                        if($sql2) {
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                            }
                        } else {
                            echo "Something went wrong";
                        }
                      }
                }else {
                    echo "please select an image file - jpeg, jpg, png";
                }
            }else{
                echo "Please select an imaage file";
            }
          } 
        }else{
          echo "$email - This is not valid email";
       }
    }else{
        echo "All inputs fields are required";
    }
} 
     
?>