<?php
require(__DIR__ . "/../../partials/nav.php");



if (!is_logged_in()) {
    flash("You must be logged in to access this page");
    die(header("Location: login.php"));
}
$results=[];
$db = getDB();
//sort and filtes
$col=se($_GET,"col","id",false);
//allow list
if (!in_array($col, ["money_received", "created", "id", ])) {
    $col = "id"; //default value, prevent sql injection
}
$order = se($_GET, "order", "asc", false);
//allowed list
if (!in_array($order, ["asc", "desc"])) {
    $order = "asc"; //default value, prevent sql injection
}
$stmt = $db->prepare("SELECT DISTINCT category from RM_Items ");
$stmt->execute();
$cat = $stmt->fetch(PDO::FETCH_ASSOC);

$category = se($_GET, "category","All", false);
if(!in_array($category,$cat))
    $category="All";//prevent sql injection

$ordernum = se($_GET, "ordernum", "", false);// changed name to ordernum

$startRange =se($_GET, "range-start", "", false);


$endRange =se($_GET, "range-end", "", false);
 

$base_query="SELECT DISTINCT o.id, o.user_id, o.money_received, o.address, o.payment_method,o.created FROM Orders o JOIN OrderItems oi ON oi.order_id = o.id JOIN RM_Items item on oi.item_id=item.id  " ;

//SELECT DISTINCT   o.id, count(1) as total,o.user_id, o.money_received, o.address, o.payment_method,item.category FROM Orders o  JOIN OrderItems oi ON oi.order_id = o.id JOIN RM_Items item on oi.item_id=item.id WHERE item.category="Health" GROUP BY o.id, o.user_id, o.money_received, o.address, o.payment_method
$total_query="SELECT count(DISTINCT o.id) as total  FROM Orders o  JOIN OrderItems oi ON oi.order_id = o.id JOIN RM_Items item on oi.item_id=item.id ";
$id=get_user_id();
$query="WHERE o.user_id = '$id' ";

if($category!="All")
$query .=" and item.category='$category' ";
$params = []; 
//$query="SELECT  o.id, o.user_id, o.money_receive, o.address, o.payment_method, oi.order_id, oi.quantity FROM Orders o  JOIN OrderItems oi ON oi.order_id = o.id WHERE o.user_id = :id LIMIT 10";
if (!empty($ordernum)) {
    $query .= " AND o.id like :order ";
    $params[":order"] = "$ordernum%";
}
if(!empty($startRange))
{
 $query .= " AND  o.created >= '$startRange 00:00:00' ";
}
if(!empty($endRange))
{
 $query .= " AND  o.created <= '$endRange 23:59:59' ";
}
if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY o.$col $order "; //be sure you trust these values, I validate via the in_array checks above
}


$per_page=10;
paginate($total_query . $query, $params,$per_page);
$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;
//flash($per_page);
$stmt = $db->prepare($base_query . $query);
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null;


try {
    $stmt->execute($params); //dynamically populated params to bind
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //echo $base_query . $query;

    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    //echo $base_query . $query;
    //echo $total;

    error_log(var_export($e, true));
    flash("Error fetching items ", "danger");
}


?>
<form >
        <div>
            <div class="form-floating" data="i">
                <input id="ordernum" type="number" style="width:500px; margin-left: 10px;margin-top:0.3cm;" name="ordernum" class="form-control"  placeholder=" " name="ordernum" value="<?php se($ordernum); ?>" />
                <label for="name" style="color:black;">Order Number</label>
                
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
                    <option value="id">Order Number</option>
                    <option value="money_received">Total Price</option>
                    <option value="created">Date</option>
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
            <div>
                <label for="start">Start date:</label>
                <input type="date" id="start" name="range-start"
                     min="2018-01-01" >
                     <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].start.value = "<?php se($startRange); ?>";
                </script>
                </div>
                <label for="End">End date:</label>
                <input type="date" id="End" name="range-end"
                     min="2018-01-01" >
                     <script>
                    //quick fix to ensure proper value is selected since
                    //value setting only works after the options are defined and php has the value set prior
                    document.forms[0].End.value = "<?php se($startRange); ?>";
                </script>
                </div>
        </div>
        <div class="col">
            <div class="input-group">
                <input type="submit" class="btn btn-primary" value="Apply" />
            </div>
        </div>
    </form>
<div class="container-fluid">
    <h3>Order History</h3>
		</div>
        <div class="list-group">
        <?php if($results && count($results) > 0):?>
            <?php $oid=0;?>                    
            <?php foreach($results as $r):?>
               
            <div class="list-group-item">
                <form method="POST">
                <div class="row">
                    <form method="post">
                        <div class="col">
                    Order Number: <a href="order_Information.php?order_id=<?php se($r,"id"); ?>"><?php se($r,"id");?></a>
                    <?php $oid=$r["id"];?>
                    
                    </div>
                </form>
                    <div class="col">
                        <?php
                        $stmt = $db->prepare("SELECT  username FROM Users  WHERE id = :id");
                        $stmt->execute([":id"=>get_user_id()]);
                        $user = $stmt->fetch(PDO::FETCH_ASSOC); 
                        if($user)
                        {
                            $username=$user["username"];

                        }
                        ?>
                        <?php echo "USER ID: ". $username;?>
                    </div>
                    <div class="col">
                        <?php echo "TOTAL: $".$r["money_received"];?>
                    </div>

                    <div class="col">
                        <?php echo "SHIPPING ADDRESS: ".$r["address"];?>
                    </div>
                    <div class="col">
                    <?php
                        $stmt = $db->prepare("SELECT quantity FROM OrderItems  WHERE order_id = :id");
                        $stmt->execute([":id"=>$r["id"]]);
                        $sum_quantity = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                        if($sum_quantity)
                        {
                            $sum=0;
                            foreach($sum_quantity as $q)
                            {
                                $sum+=$q["quantity"];
                            }
                            
                        }
                        ?>
                        <?php echo "QUANTITY: ".$sum;?>
                    </div>
                    
                    <div class="col">
                        <?php echo "PAYMENT METHOD: ".$r["payment_method"];?>
                    </div>
                    </div>
                    
		
			<br/>
               

                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <?php else:?>
        <?php endif;?>
    </div>
  

<div class="mt-3">
                <?php /* added pagination */ ?>
                <?php require(__DIR__ . "/../../partials/pagination.php"); ?>
            </div>

 

<div class="col-4" style="min-width:30em">
          
         </div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>