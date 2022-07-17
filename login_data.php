<?php
$connection=mysqli_connect("127.0.0.1","root","","signup");
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $logpassword=$_POST['pass'];

    $validation = "select * from registration where email = '$email' and password='$logpassword'";
    $query = mysqli_query($connection,$validation);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        ?>
            <script type='text/javascript'>
                alert ('Successfull Login!');
                </script>
        <?php
        echo "<a href='http://localhost/bhola/quiztype.html' target='_blank'>Start creating quiz</a>";
    }
    else{
        ?>
            <script type='text/javascript'>
                alert ('Please register first!');
                </script>
        <?php
        echo "<a href='http://localhost/bhola/registration_page.html' target='_blank'>Go back to registration page</a>";
    }

}

?>