<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<form  class="d-flex" onsubmit="return validate(this)" method="POST">
    <div class="container-fluid">
        <label for="email">Email</label>
        <input class="form-control me-2"  placeholder="Email" aria-label="Email" type="text" name="email" required />
    </div>
    <div class="container-fluid">
        <label for="pw">Password</label>
        <input  class="form-control me-2" type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div class="container-fluid" >
    <input class="btn btn-outline-success" type="submit" value="Login" style="margin-top: 0.6cm;" />
    </div>
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        isValid=true;
        const email= form.email.value;
        const password= form.password.value;
        if(email.indexOf("@")>-1){
            if(!isValidEmail(email)){
                flash("Invalid email","danger");
                isValid=false;
            }// if(!isValidEmail(email))
        }//if(email.indexOf("@")>-1)
        else{
            if(!isValidUsername(email)){
                flash("Username must be lowercase, 3-16 characters, and contain only a-z,0-9, _or -","danger");
                isValid=false;    
            }//if(!isValidUsername(email)){
        }
        if(!isValidPassword(password)){
            flash("Password too short","danger");
            isValid=false;
        }
        //ensure it returns false for an error and true for success

        return isValid;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty");
        $hasError = true;
    }
    //sanitize
    //$email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = sanitize_email($email);
    //validate
    /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        flash("Invalid email address");
        $hasError = true;
    }*/
    if (!is_valid_email($email)) {
        flash("Invalid email address");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty");
        $hasError = true;
    }
    if (!is_valid_password($password)) {
        flash("Password too short");
        $hasError = true;
    }
    if (!$hasError) {
        //flash("Welcome, $email");
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password from Users 
        where email = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        //flash("Weclome $email");
                        $_SESSION["user"] = $user; //sets our session data from db
                        try {
                            //lookup potential roles
                            $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                        JOIN UserRoles on Roles.id = UserRoles.role_id 
                        where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                            $stmt->execute([":user_id" => $user["id"]]);
                            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                        } catch (Exception $e) {
                            error_log(var_export($e, true));
                        }
                        //save roles or empty array
                        if (isset($roles)) {
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }
                        flash("Welcome, " . get_username());
                        die(header("Location: home.php"));
                    } else {
                        flash("Invalid password");
                    }
                } else {
                    flash("Email not found");
                }
            }
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>
<?php 
require(__DIR__."/../../partials/footer.php");