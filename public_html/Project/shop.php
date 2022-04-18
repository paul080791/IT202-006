<?php
require(__DIR__ . "/../../partials/nav.php");
if(isset($_POST["item_id"])){
    if(is_logged_in()){
        $id = (int)$_POST["item_id"];

        $db = getDB();
        $stmt = $db->prepare("SELECT name, cost, category from RM_Items where id = :id ");
        $stmt->execute([":id"=>$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result) {
            $name = $result["name"];
            $price = $result["cost"];
            $visibility=$result["visibility"];
            $stmt = $db->prepare("INSERT INTO RM_Cart (user_id, item_id, unit_cost, desired_quantity) VALUES(:user_id, :item_id, :unit_cost, 1) ON DUPLICATE KEY UPDATE desired_quantity = desired_quantity +1, unit_cost = :unit_cost"); 
            $r = $stmt->execute([":user_id"=>get_user_id(), ":item_id"=>$id, ":unit_cost"=>$price,]);
        }
        flash("Item Add to Cart!", "success");
}else{
    flash("You must log in to add to cart");

}
}
$results = [];
$db = getDB();
//process filters/sorting
//Sort and Filters
$col = se($_GET, "col", "cost", false);
//allowed list
if (!in_array($col, ["cost", "stock", "name", "created"])) {
    $col = "cost"; //default value, prevent sql injection
}
$order = se($_GET, "order", "asc", false);
//allowed list
if (!in_array($order, ["asc", "desc"])) {
    $order = "asc"; //default value, prevent sql injection
}

$category = se($_GET, "category","All", false);



//get name partial search
$name = se($_GET, "name", "", false);
//get category
//$category= se($_GET,"category","",false);
//split query into data and total
$base_query = "SELECT id, name,category,visibility, description, cost, stock, image FROM RM_Items items ";
$total_query = "SELECT count(1) as total FROM RM_Items items";
//flash("$total_query")
//dynamic query
$query = " WHERE 1=1 and stock > 0"; //1=1 shortcut to conditionally build AND clauses

if($category!="All")
$query = " WHERE category='$category' and stock > 0"; //1=1 shortcut to conditionally build AND clauses
else
$query = " WHERE 1=1 and stock > 0"; //1=1 shortcut to conditionally build AND clauses
$params = []; //define default params, add keys as needed and pass to execute
//apply name filter
if (!empty($name)) {
    $query .= " AND name like :name";
    $params[":name"] = "%$name%";
}
if(!empty($category))
{
//    $query .= "SELECT id, name, description, cost, stock, image FROM RM_Items items WHERE category='$category' ";
    
}

//apply column and order sort
if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY $col $order"; //be sure you trust these values, I validate via the in_array checks above
}
//paginate function
$per_page = 4;
//paginate($total_query . $query, $params, $per_page);
//get the total
///* this comment block has been replaced by paginate()
//get the total
$stmt = $db->prepare($total_query . $query);
$total = 0;
try {
    $stmt->execute($params);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r) {
        $total = (int)se($r, "total", 0, false);
    }
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}
//apply the pagination (the pagination stuff will be moved to reusable pieces later)
$page = se($_GET, "page", 1, false); //default to page 1 (human readable number)
$per_page = 5; //how many items to show per page (hint, this could also be something the user can change via a dropdown or similar)
$offset = ($page - 1) * $per_page;
//end commented out coded moved to paginate()*/
$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;

    
          
            
    

          
    
    
  
//get the records
$stmt = $db->prepare($base_query . $query); //dynamically generated query
//we'll want to convert this to use bindValue so ensure they're integers so lets map our array
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null; //set it to null to avoid issues
//$stmt = $db->prepare("SELECT id, name, description, cost, stock, image FROM RM_Items WHERE stock > 0 LIMIT 50");
try {
    $stmt->execute($params); //dynamically populated params to bind
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}
?>
<script>
    function purchase(item) {
        console.log("TODO purchase item", item);
        //alert("It's almost like you purchased an item, but not really");
        if (add_to_cart) {
            add_to_cart(item,1);
        }
    }
</script>
<!--<div class="container-fluid"> -->
    <h1>Shop</h1>
       <form >
        <div>
            <div class="form-floating" data="i">
                <input id="name" style="width:500px; margin-left: 10px;margin-top:0.3cm;" name="name" class="form-control"  placeholder=" " name="name" value="<?php se($name); ?>" />
                <label for="name" style="color:black;">Name</label>
                
            </div>
        </div>
        <div >
            <div class="input-group">
                <div class="input-group-text">Sort by: </div>
                <!-- make sure these match the in_array filter above-->
                <?php
                    $db = getDB();
                    $stmt = $db->prepare("SELECT DISTINCT category from RM_Items");
                    $stmt->execute();
                    $r = $stmt->fetchAll();
                ?>
                <select name="category" value="<?php se($category); ?>" >
                <option >All</option>   
                    <?php foreach($r as $thing):?>
                     
                    <option value="<?php se($thing, 'category');?>">
                        <?php se($thing, 'category');?>
                    </option>
                    <?php endforeach?>;
                </select>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].category.value = "<?php se($category); ?>";
                </script>
                <select  style="width:3cm" name="col" value="<?php se($col); ?>" data="took">
                    <option value="cost">Cost</option>
                    <option value="stock">Stock</option>
                    <option value="name">Name</option>
                    <option value="created">Created</option>
                </select>
                <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].col.value = "<?php se($col); ?>";
                </script>
                <select style="margin-right:1200px;" name="order" value="<?php se($order); ?>">
                    <option value="asc">Up</option>
                    <option value="desc">Down</option>
                </select>
                <script data="this">
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].order.value = "<?php se($order); ?>";
                    if (document.forms[0].order.value === "asc") {
                        document.forms[0].order.className = "form-control bg-success";
                    } else {
                        document.forms[0].order.className = "form-control bg-danger";
                    }
                </script>
            </div>
        </div>
        <div class="col">
            <div class="input-group">
                <input type="submit" class="btn btn-primary" value="Apply" />
            </div>
        </div>
    </form>
    <!-- end form -->
    
        <div >
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($results as $item) : ?>
                    <?php if(!has_role("Shop Owner") && !has_role("Admin")) : ?>
                        <?php if($item["visibility"]==0) : ?>
                            <?php continue; ?>
                        <?php endif;?>
                    <?php endif;?>

                    <form class="add-div" method="post">
                    <div >
                        <div class="card bg-light" style="height:17em;color:black;">
                            <div class="card-header">
                                <?php se($item, "category");?>
                                <?php if(has_role("Shop Owner") || has_role("Admin")) : ?>
                            <?php if($item["visibility"]==0) : ?>
                                Visibility=False
                            <?php endif;?>
                    <?php endif;?>
                                

                                <?php if(has_role("Shop Owner") || has_role("Admin")) : ?>
                               <a style="color:green;" href="admin/edit_item.php?id=<?php se($item, "id"); ?>">Edit</a>
                               <?php endif;?>
                                </div>
                            <?php if (se($item, "image", "", false)) : ?>
                                <img src="<?php se($item, "image"); ?>" class="card-img-top" alt="...">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title">Name: <a href="Item_detail.php?id=<?php se($item, "id");?>"><?php se($item, "name"); ?></a></h5>
                                <p class="card-text">Description: <?php se($item, "description"); ?></p>
                                </div>
                            <div class="card-footer">
                                Cost: <?php se($item, "cost"); ?>
                                <input type="hidden" name="item_id" value="<?php se($item, "id"); ;?>"/>
						        <input type="submit" value="Add to Cart"/>
                            </div>
                        </div>
                            </form>
                        
            </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-3">
                <?php /* added pagination */ ?>
                <?php require(__DIR__ . "/../../partials/pagination.php"); ?>
            </div>
        
        <div class="col-4" style="min-width:30em">
          
         </div>
    </div>
</div>
<?php
require(__DIR__ . "/../../partials/footer.php");
?>