<?php
$connection=mysqli_connect("127.0.0.1","root","","signup");
if(isset($_POST['submit'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $cpassword=$_POST['cpass'];

    $emailquery = "select * from registration where email = '$email'";
    $query=mysqli_query($connection,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        ?>
            <script type='text/javascript'>
                alert ('Email already exist!');
            </script>
        <?php
        echo "<a href='http://localhost/bhola/registration_page.html' target='_blank'>Register with new email</a>";
        echo "\t";
        echo "<a href='http://localhost/bhola/login_page.html' target='_blank'>Go to Log in page</a>";
    }
    else{
        if($password===$cpassword){
            $insert="INSERT INTO registration SET firstname='$firstname', lastname='$lastname',email='$email',cpassword='$cpassword',password='$password'";
            $connection->query($insert);

            if($connection){
                ?>
                <script type='text/javascript'>
                    alert ('Registration Successful!!');
                </script>
                <?php
                echo "<a href='http://localhost/bhola/login_page.html' target='_blank'>Go to Log in page</a>"; 
            }
            else{
                ?>
                <script type='text/javascript'>
                    alert ('Having issue in your Db Connection!');
                    </script>
                <?php
                echo "<a href='http://localhost/bhola/registration_page.html' target='_blank'>Go back to registration page</a>";
            }
        }
        else{
            ?>
                <script type='text/javascript'>
                    alert ('your password is not matching.');
                    </script>
            <?php
            echo "<a href='http://localhost/bhola/registration_page.html' target='_blank'>Go back to registration page</a>";
        }
    }

}

?>
    <script type='text/javascript'>
    alert ('your Registration is completed!');
    <a href="login.html">
    window.history.log(-1);
    </script>
<?php

?>