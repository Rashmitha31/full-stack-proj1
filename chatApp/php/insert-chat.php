
<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    //include_once "config.php";
    $conn = mysqli_connect("localhost:3008", "root", "chat", "chat"); // Select the "chat" database during the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    if (!empty($message)) {
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                    VALUES ('$incoming_id', '$outgoing_id', '$message')") or die(mysqli_error($conn));
        
    } 
} else {
    header("Location: ../login.php");
    
}
?>

 