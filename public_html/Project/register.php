<?php
require(__DIR__ . "/../../partials/nav.php");
reset_session();
?>
<form  onsubmit="return validate(this)" method="POST">
    <div class="input-group mb-3">
        <label class="input-group-text"  for="email" style="margin: 10px 0px 20px 50px;">Email</label>
        <input class="form-control"  placeholder="Email" style="margin-top: 0.2cm; margin: 10px 780px 20px 0px;" aria-label="Email" type="text" name="email" required />
    </div>
    <div style="margin-top: 0.2cm;" class="input-group mb-3">
        <label class="input-group-text" for="username" style="margin: 10px 0px 20px 50px;">Username</label>
        <input style="margin-top: 0.2cm; margin: 10px 780px 20px 0px;"  class="form-control" type="text" name="username" require d maxlength="30" />
    </div>
    <div  class="input-group mb-3" style="margin-top: 0.2cm;">
        <label class="input-group-text" for="pw" style="margin: 10px 0px 20px 50px;">Password</label>
        <input  class="form-control" style="margin-top: 0.2cm; margin: 10px 780px 20px 0px;" type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div class="input-group mb-3" style="margin-top: 0.2cm;">
        <label class="input-group-text" for="confirm" style="margin: 10px 0px 20px 50px;">Confirm</label>
        <input class="form-control" type="password" style="margin-top: 0.2cm; margin: 10px 780px 20px 0px;" name="confirm" required minlength="8" />
    </div>
    <input class="btn btn-outline-primary" type="submit" value="Register" style="margin-left: 50px;background:lightgreen; color:black;" />
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        isValid=true;
        const email= form.email.value;
        const usern= form.username.value;
        const pw = form.password.value;
        const con = form.confirm.value;
        if(email.indexOf("@")>-1){
            if(!isValidEmail(email)){
                flash("Invalid email","danger");
                isValid=false;
            }// if(!isValidEmail(email))
        }//if(email.indexOf("@")>-1)
        else{
            if(!isValidUsername(usern)){
                flash("Username must be lowercase, 3-16 characters, and contain only a-z,0-9, _or -","danger");
                isValid=false;    
            }//if(!isValidUsername(email)){
            else    if(!isValidPassword(password)){
            flash("Password too short","danger");
            isValid=false;
        }
        else if(!isValidPassword(con)){
            flash("confirm Password too short","danger");
            isValid=false;
        }
        }
        
        //ensure it returns false for an error and true for success
        
        return isValid;


    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["username"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se($_POST, "confirm", "", false);
    $username = se($_POST, "username", "", false);
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!is_valid_username($username)) {
        flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty", "danger");
        $hasError = true;
    }
    if (!is_valid_password($password)) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (
        strlen($password) > 0 && $password !== $confirm
    ) {
        flash("Passwords must match", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
            flash("Successfully registered!, Login please ", "success");
            die(header("Location: login.php"));
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
