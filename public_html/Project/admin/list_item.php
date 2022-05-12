<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");
$TABLE_NAME = "RM_Items";
if (!has_role("Admin") && !has_role("Shop Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH/home.php"));
}

$results = [];


$params = []; 
$query="where 1=1 ";
if (isset($_POST["itemName"])) {
    //flash($_POST["itemName"]);
$itemName=$_POST["itemName"];
}

if (!empty($itemName)){
    
$query .=" AND name like %'$itemName'%  ";
//$params[":itemName"]= "%$itemName%";

}
$db = getDB();

$base_query="SELECT id, name,category, description, stock, cost, image,visibility from $TABLE_NAME ";
$total_query="SELECT COUNT(1) as total FROM $TABLE_NAME ";
if (isset($_POST["OutOfStock"]))
{
   // flash($_POST["OutOfStock"]);
    $query .= " AND stock=0 ";
} 
else
{
    $query .= " AND stock>=0";
}    

$per_page=10;
paginate($total_query . $query,$params,$per_page);
$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;

$stmt = $db->prepare($base_query . $query);
//echo 111 . $base_query . $query;
foreach ($params as $key => $value) {
   // echo $key ." v->  " . $value . "\n";
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null;

    try {
        $stmt->execute($params);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }
    

?>
<!--<div class="container-fluid">  -->
    <h1>List Items</h1>
    <form method="POST" class="navbar navbar-expand-lg navbar-light bg-light">
     
            <input class="form-control me-2" type="search" name="itemName" placeholder="Item Filter" style="margin: 10px 0px 20px 50px; width:300px;" />

            <label class="form-label" for="OutOfStock" style="color:black"> Out of Stock</label>
                <input class="form-check-input" id="OutOfStock" name="OutOfStock" type="radio" value=1  />
                
                        <input class="btn btn-outline-success" type="submit" value="Search" style="margin-left: 150px;background:lightgreen; color:black;" />
        
      
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
                        <?php if($column=="visibility" )
                                if($value==1 )
                                    $value="True";
                                else $value="false";
                        ?>
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
<div class="mt-3">
                <?php /* added pagination */ ?>
                <?php require(__DIR__ . "/../../../partials/pagination.php"); ?>
            </div>

 

<div class="col-4" style="min-width:30em">
          
         </div>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>