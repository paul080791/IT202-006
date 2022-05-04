<?php
require(__DIR__ . "/../../../partials/nav.php");



if (!is_logged_in()) {
    flash("You must be logged in to access this page");
    die(header("Location: login.php"));
}
$db = getDB();

$params = []; 
$query="SELECT  o.id, o.user_id, o.money_receive, o.address, o.payment_method, oi.order_id, oi.quantity FROM Orders o  JOIN OrderItems oi ON oi.order_id = o.id WHERE o.user_id = :id LIMIT 10";
$page = se($_GET, "page", 1, false); 
$per_page = 10; 
$offset = ($page - 1) * $per_page;
$params[":offset"] = $offset;
$params[":count"] = $per_page;
$stmt = $db->prepare($query ); 



$db = getDB();

$stmt = $db->prepare("SELECT  id, user_id, money_received, address, payment_method FROM Orders");
$stmt->execute([]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container-fluid">
    <h3>Order History</h3>
		</div>
        <div class="list-group">
        <?php if($results && count($results) > 0):?>
            <?php foreach($results as $r):?>
            <div class="list-group-item">
                <form method="POST">
                <div class="row">
                    <form method="post">
                    <div class="col">
                    Order Number: <a href="order_information.php?order_id=<?php se($r,"id"); ?>"><?php se($r,"id");?></a>
                    </div>
                </form>
                    <div class="col">
                        <?php
                        $stmt = $db->prepare("SELECT  username FROM Users  WHERE id = :id");
                        $stmt->execute([":id"=>$r["user_id"]]);
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
    <?php
   

   $total_pages = 4;
   $total=10;
   //updates or inserts page into query string while persisting anything already present
  

   ?>

<div class="mt-3">
                <?php /* added pagination */ ?>
                <?php require(__DIR__ . "/../../../partials/pagination.php"); ?>
            </div>

 

</div>


<?php
require(__DIR__ . "/../../../partials/flash.php");
?>