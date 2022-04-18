<?php
require(__DIR__ . "/../../partials/nav.php");



$result = [];
$columns = get_columns("RM_Items");
$ignore = ["id", "modified", "created","visibility"];
$db = getDB();
//get the item
$id = se($_GET, "id", -1, false);
$stmt = $db->prepare("SELECT * FROM RM_Items where id =:id");
try {
    $stmt->execute([":id" => $id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r) {
        $result = $r;
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}


?>
<div class="container-fluid">
    <h1>Product Details</h1>
    <?php if(has_role("Shop Owner") || has_role("Admin")) : ?>
        <a style="color:lightgreen;" href="admin/edit_item.php?id=<?php se($result, "id"); ?>">Edit</a>
    <?php endif;?>
    <form method="POST">
        <?php foreach ($result as $column => $value) : ?>
            <?php if (!se($column,"id") || !se($column,"modified")|| !se($column,"created")|| !se($column,"visibility")) : ?>
                <div class="mb-4">
                <?php if ($column=="visibility" && $value==1) : ?> 
                    <label class="form-control" id="<?php se($column); ?>"  value="True" name="<?php se($column); ?>">True</label>
                <?php endif; ?>   
                <?php if ($column=="visibility" && $value==0) : ?> 
                    <label class="form-control" id="<?php se($column); ?>"  value="False" name="<?php se($column); ?>">False</label>
                <?php endif; ?> 
                <?php if ($column!="visibility") : ?> 
                 <label class="form-control" id="<?php se($column); ?>"  value="<?php se($value); ?>" name="<?php se($column); ?>"><?php se($value); ?></label>
                 <?php endif; ?> 
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </form>
</div>

<?php
require_once(__DIR__ . "/../../partials/footer.php");
?>