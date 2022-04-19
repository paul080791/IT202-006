<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}

if (isset($_POST["name"]) && isset($_POST["description"])) {
    $name = se($_POST, "name", "", false);
    $desc = se($_POST, "description", "", false);
    if (empty($name)) {
        flash("Name is required", "warning");
    } else {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Roles (name, description, is_active) VALUES(:name, :desc, 1)");
        try {
            $stmt->execute([":name" => $name, ":desc" => $desc]);
            flash("Successfully created role $name!", "success");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("A role with this name already exists, please try another", "warning");
            } else {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
    }
}
?>
<h1>Create Role</h1>
<form method="POST">
    <div class="form-floating">
        <input id="name" style="width:500px; margin-left: 10px;margin-top:0.3cm;" name="name" class="form-control"  placeholder="Leave a description here"  required />
        <label for="name" style="color:black;">Name</label>
    </div>
    <div class="form-floating">
        <textarea style="width:500px;height:80px;margin-left: 10px;margin-top:0.3cm;" class="form-control" placeholder="Leave a description here"  name="description" id="d"></textarea>    
        <label  for="d" style="color:black;">Description</label>
        
    </div>
    <input class="btn btn-outline-primary"  style="margin-left: 10px;margin-top:0.3cm;background:lightgreen; color:black;" type="submit" value="Create Role" />

</form>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/footer.php");
?>