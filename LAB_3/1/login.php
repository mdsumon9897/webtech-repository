<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
    <?php
    $userNameErr = $passwordErr ="";
    $userName = $password ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST" ){

        if(empty($_POST['userName'])){
            $userNameErr =" Pleasse Enter Your Name";

        }
        else{
            $userName =$_POST['userName'];
            if(!preg_match("/^[a-zA-Z- ]*$/", $userName)){
                $userNameErr = " Can contain a-z, A-Z, period, dash only. Please Re-enter Your Name";

            }
            else{
                if(str_word_count($userName)<2){
                    $userNameErr ="Name should contains at least two words";

                }
                else{
                    $userName =$_POST['userName'];
                }
            }
        }

        if (empty($_POST['password'])) {
            $passwordErr ="Please Enter Passeord ";

        }

        else{
            $password = $_POST['password'];
            if(!preg_match( "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#$%])[A-Za-z\d@@#$%]{8,}$/", $password))
            {
                $passwordErr =" Minimum eight characters, at least one letter, one number and one special character";
            }
            else{
                $password = $_POST['password'];
            }
        }
    }


    ?>

    <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <fieldset>
            <legend><label><b><i>Login</i></b></label></legend>
            <label for="userName"> <b>User Name :</b></label>
            <input type="text" name="userName"><span style="color: red;">*<?php echo $userNameErr?> <br> </span> <br>
            <label for="password"><b>Password :</b></label>
            <input type="password" name="password"><span style="color: red;">* <?php echo $passwordErr?> <br></span><br>

            <span class="underline">__________________________</span><br><br>
            <input type="checkbox" name="rememberme">
            <label for="rememberme"> Remember me </label><br>
            <input type="submit" name="Submit" value="Submit">
            <a href="https://www.google.com">Forgot Password?</a>

    </fieldset>
    </form> 

    <?php
    echo $userName;
    echo "<br>";
    echo $password;
    echo "<br>"
    ?>

</body>
</html>