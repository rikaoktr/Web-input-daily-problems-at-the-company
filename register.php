<?php
$_SESSION['email'] = $_POST['email'];
$_SESSION['nama'] = $_POST['nama'];
$_SESSION['divisi'] = $_POST['divisi'];

$nama = $mysqli->escape_string($_POST['nama']);
$divisi = $mysqli->escape_string($_POST['divisi']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
$result = $mysqli->query("SELECT * FROM login WHERE email='$email'") or die($mysqli->error());

if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO login (nama, divisi, email, password, hash) " 
            . "VALUES ('$nama','$divisi','$email','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( PT.Telkom )';
        $message_body = '
        Hello '.$nama.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/telkomkp/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}