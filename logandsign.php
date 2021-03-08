<?php ob_start(); ?>
<?php include_once "header.php" ?>


<?php
$login = true;
$addlogin = "";

// Function Calls
if (@$_POST["signin"]) {

    @$name = ucfirst(htmlspecialchars(@$_POST["name"]));
    @$firstname = strtoupper(htmlspecialchars(@$_POST["firstname"]));
    @$password = password_hash(htmlspecialchars(@$_POST["password"]), PASSWORD_DEFAULT);
    @$address = htmlspecialchars(@$_POST["address"]);
    @$mail = htmlspecialchars(@$_POST["mail"]);

    $addlogin = addlogin($name, $firstname, $password, $address, $mail);
}

if (@$_POST["login"]) {
    @$logmail = htmlspecialchars(@$_POST["log_mail"]);
    @$logpass = htmlspecialchars(@$_POST["log_password"]);
    $login = loginVis($logmail, $logpass);
}
ob_end_flush();
?>



<div class="container container_logsign">
    <div class="row">

        <!-- Sign In Form -->
        <div class="col-12 col-md-6 signin_col">
            <form action="" id="signin_form" method="POST">
                <legend>
                    <h1>Sign In</h1>
                </legend>
                <fieldset id="inputs">
                    <label for="name" style="display:none;"> Your name :</label>
                    <input id="name" type="text" name="name" autocomplete="name" placeholder="Your Name" autofocus="" required>
                    <br>
                    <label for="firstname" style="display:none;"> Your firstname :</label>
                    <input id="firstname" type="text" name="firstname" autocomplete="firstname" placeholder="Your Firstname" autofocus="" required>
                    <br>
                    <label for="password" style="display:none;"> Your password :</label>
                    <input id="password" type="password" name="password" autocomplete="password" placeholder="Password" required>
                    <br>
                    <label for="address" style="display:none;"> Your address :</label>
                    <input id="address" type="text" name="address" autocomplete="address" placeholder="Your Address" required>
                    <br>
                    <label for="email" style="display:none;"> Your email :</label>
                    <input id="email" type="email" name="mail" autocomplete="email" placeholder="Your Email" required>
                </fieldset>
                <fieldset id="actions">
                    <div>
                        <label for="checkbox">
                            <input type="checkbox" value="false" id="checkbox" name="checkbox" aria-checked="false" required>
                            <p>Vous affirmez avoir pris connaissance <br>de notre
                                <a href="admin/cgu.php">Politique de confidentialité</a>
                            </p>
                        </label>
                    </div>
                    <div id="ok" style="color:gold;display:<?php if(@$addlogin === true){
                        echo "block";
                    } else {
                        echo "none";
                    } ?>" ">
                        Vous êtes bien inscrit sur notre site.
                    </div>
                    <div>
                        <input type="submit" id="signin" name="signin" value="Sign In">
                    </div>
                </fieldset>
            </form>
        </div>


        <!-- Log In Form -->
        <div class="col-12 col-md-6 login_col">
            <form action="" id="login" method="POST">
                <h1>Log In</h1>
                <fieldset id="inputs_log">
                    <label for="username" style="display:none"> Your email :</label>
                    <input id="username" type="email" name="log_mail" autocomplete="email" placeholder="Email" autofocus="" required>
                    <div id="mail_false" style="color:crimson;display:<?php if(@$login == false){
                        echo "block";
                    } else {
                        echo "none";
                    } ?>" ">
                        Ce mail est inconnu à la base de données.
                    </div>
                    <br>
                    <label for="user_password" style="display:none;"> Your password :</label>
                    <input type="password" name="log_password" id="user_password" placeholder="Password" autocomplete="current-password" required>
                    <div id="pwd_incorrect" style="color:crimson;display:<?php if(@$login === "incorrect"){
                        echo "block";
                    } else {
                        echo "none";
                    } ?>" ">
                        Votre mot de passe est incorrect !!!
                    </div>
                </fieldset>
                <fieldset id="actions_log">
                    <label for="user_password" style="display:none;">Button for logging</label>
                    <input type="submit" id="submit" name="login" value="Log in">
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script>
   
</script>


<?php include_once "footer.php" ?>