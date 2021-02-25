<?php ob_start(); ?>
<?php include_once "header.php" ?>


<?php

// Function Calls
if (@$_POST["signin"] && (@$_POST['checkbox'] == true)) {

    @$name = htmlspecialchars(@$_POST["name"]);
    @$firstname = htmlspecialchars(@$_POST["firstname"]);
    @$password = htmlspecialchars(@$_POST["password"]);
    @$address = htmlspecialchars(@$_POST["address"]);
    @$mail = htmlspecialchars(@$_POST["mail"]);

    addlogin($name, $firstname, $password, $address, $mail);
    echo "<script>divConfirm('ok');</script>";
} else {
    echo "<script>divConfirm('noncgu');</script>";
}

if (@$_POST["login"]) {
    @$logmail = htmlspecialchars(@$_POST["log_mail"]);
    @$logpass = htmlspecialchars(@$_POST["log_password"]);
    loginVis($logmail, $logpass);
}
ob_end_flush();
?>



<div class="container container_logsign">
    <div class="row">

        <!-- Sign In Form -->
        <div class="col-6 signin_col">
            <form action="" id="signin_form" method="POST">
                <h1>Sign In</h1>
                <fieldset id="inputs">
                    <input id="name" type="text" name="name" autocomplete="name" placeholder="Your Name" autofocus="" required>
                    <br>
                    <input id="firstname" type="text" name="firstname" autocomplete="firstname" placeholder="Your Firstname" autofocus="" required>
                    <br>
                    <input id="password" type="password" name="password" autocomplete="password" placeholder="Password" required>
                    <br>
                    <input id="address" type="text" name="address" autocomplete="address" placeholder="Your Address" required>
                    <br>
                    <input id="email" type="email" name="mail" autocomplete="email" placeholder="Your Email" required>
                </fieldset>
                <fieldset id="actions">
                    <div>
                        <input type="checkbox" value="false" id="check" name="checkbox" aria-checked="false">
                        <label for="checkbox">
                            <p>Vous affirmez avoir pris connaissance <br>de notre
                                <a href="admin/cgu.php">Politique de confidentialité</a>
                            </p>
                        </label>
                    </div>
                    <div id="ok" style="display:none;">
                        Vous êtes bien inscrit sur notre site.
                    </div>
                    <div id="noncgu" style="display:none;">
                        Vous n'avez pas validé les CGUs.
                    </div>
                    <div>
                        <input type="submit" id="signin" name="signin" value="Sign In">
                        </span>
                </fieldset>
            </form>
        </div>


        <!-- Log In Form -->
        <div class="col-6 login_col">
            <form action="" id="login" method="POST">
                <h1>Log In</h1>
                <fieldset id="inputs_log">
                    <input id="username" type="email" name="log_mail" autocomplete="email" placeholder="Email" autofocus="">
                    <br>
                    <input type="password" name="log_password" placeholder="Password" autocomplete="current-password" required>
                </fieldset>
                <fieldset id="actions_log">
                    <input type="submit" id="submit" name="login" value="Log in">
                </fieldset>
            </form>
        </div>
    </div>
</div>



<?php include_once "footer.php" ?>