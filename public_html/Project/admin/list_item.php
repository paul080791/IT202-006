<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");
$TABLE_NAME = "RM_Items";
if (!has_role("Admin") && !has_role("Shop Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH/home.php"));
}

$results = [];
if (isset($_POST["itemName"])) {
    $db = getDB();
    $stmt = $db->prepare("SELECT id, name, description, stock, cost, image from $TABLE_NAME WHERE name like :name LIMIT 50");
    try {
        $stmt->execute([":name" => "%" . $_POST["itemName"] . "%"]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }
}
?>
<!--<div class="container-fluid">  -->
    <h1>List Items</h1>
    <form method="POST" class="navbar navbar-expand-lg navbar-light bg-light">
     
            <input class="form-control me-2" type="search" name="itemName" placeholder="Item Filter" style="margin: 10px 0px 20px 50px; width:300px;" />
            <input class="btn btn-outline-success" type="submit" value="Search" style="margin-left: 50px;background:lightgreen; color:black;" />
      
    </form>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <table class="table" style="color:black; background:lightskyblue;">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th scope="col"><?php se($column); ?></th>
                        <?php endforeach; ?>
                        <th scope="col">Actions</th>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <td ><?php se($value, null, "N/A"); ?></td>
                    <?php endforeach; ?>


                    <td >
                        <a style="color:green;" href="edit_item.php?id=<?php se($record, "id"); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
<!--</div> -->
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/footer.php");