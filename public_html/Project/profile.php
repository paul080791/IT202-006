<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<?php
if (isset($_POST["save"])) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $hasError = false;
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
    if (!$hasError) {
        $params = [":email" => $email, ":username" => $username, ":id" => get_user_id()];
        $db = getDB();
        $stmt = $db->prepare("UPDATE Users set email = :email, username = :username where id = :id");
        try {
            $stmt->execute($params);
            flash("Profile saved", "success");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
        //select fresh data from table
        $stmt = $db->prepare("SELECT id, email, username from Users where id = :id LIMIT 1");
        try {
            $stmt->execute([":id" => get_user_id()]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                //$_SESSION["user"] = $user;
                $_SESSION["user"]["email"] = $user["email"];
                $_SESSION["user"]["username"] = $user["username"];
            } else {
                flash("User doesn't exist", "danger");
            }
        } catch (Exception $e) {
            flash("An unexpected error occurred, please try again", "danger");
            //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        }
    }


    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        $hasError = false;
        if (!is_valid_password($new_password)) {
            flash("Password too short", "danger");
            $hasError = true;
        }
        if (!$hasError) {
            if ($new_password === $confirm_password) {
                //TODO validate current
                $stmt = $db->prepare("SELECT password from Users where id = :id");
                try {
                    $stmt->execute([":id" => get_user_id()]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (isset($result["password"])) {
                        if (password_verify($current_password, $result["password"])) {
                            $query = "UPDATE Users set password = :password where id = :id";
                            $stmt = $db->prepare($query);
                            $stmt->execute([
                                ":id" => get_user_id(),
                                ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                            ]);

                            flash("Password reset", "success");
                        } else {
                            flash("Current password is invalid", "warning");
                        }
                    }
                } catch (Exception $e) {
                    echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                }
            } else {
                flash("New passwords don't match", "warning");
            }
        }
    }
}
?>

<?php
$email = get_user_email();
$username = get_username();
?>
<form method="POST" onsubmit="return validate(this);">
    <div class="input-group mb-3">
        <label class="input-group-text"  for="email" style="margin: 10px 0px 20px 50px;">Email</label>
        <input class="form-control"  placeholder="Email" style="margin-top: 0.2cm; margin: 10px 780px 20px 0px;" type="email" name="email" id="email" value="<?php se($email); ?>" />
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" for="username" style="margin: 10px 0px 20px 50px;">Username</label>
        <input class="form-control"  style="margin-top: 0.2cm; margin: 10px 780px 20px 0px;" type="text" name="username" id="username" value="<?php se($username); ?>" />
    </div>
    <!-- DO NOT PRELOAD PASSWORD -->
    <div class="dropdown-divider"></div>
    <label > Update Password</label>
    <div class="input-group mb-3">
        <label class="input-group-text" style="margin: 10px 0px 20px 50px;" for="cp">Current Password</label>
        <input type="password" class="form-control" name="currentPassword" id="cp" style="margin-top: 0.2cm; margin: 10px 780px 20px 0px;" />
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" style="margin: 10px 0px 20px 50px;" for="np" >New Password</label>
        <input type="password" class="form-control" name="newPassword" id="np" style="margin-top: 0.2cm; margin: 10px 780px 20px 0px;" />
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" style="margin: 10px 0px 20px 50px;" for="conp">Confirm Password</label>
        <input type="password" class="form-control" name="confirmPassword" id="conp" style="margin-top: 0.2cm; margin: 10px 780px 20px 0px;" />
    </div>
    <input  class="btn btn-outline-primary" type="submit" value="Update Profile" name="save" style="margin-left: 50px;background:lightgreen; color:black;" />
</form>

<script>
    function validate(form) {
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        
        let email=form.email.value;
        let un=form.username.value
        let currentpw= form.currentPassword.value;
        let isValid = true;
        //TODO add other client side validation....
        if(!isValidUsername(un)){
                flash("Username must be lowercase, 3-16 characters, and contain only a-z,0-9, _or -","danger");
                isValid=false;    
            }//if(!isValidUsername(email)){
        if(!isValidEmail(email)){
            flash("Wrong format email","danger");
                isValid=false; 
        }        
        
        

        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (!isEqual(pw,con)) {
            flash("Password and Confrim password must match", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>
<?php
require_once(__DIR__ . "/../../partials/footer.php");
?>