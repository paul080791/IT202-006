<?php
require(__DIR__ . "/../../../partials/nav.php");


if (!is_logged_in()) {
    //echo 3333333;
    flash("You must be logged in to access this page");
    die(header("Location: login.php"));
}
$db=getDB();
    $order_id= se($_GET, "order_id", -1, false);
    $stmt = $db->prepare("SELECT oi.item_id,oi.order_id, p.name, oi.unit_cost, oi.quantity, (oi.unit_cost * oi.quantity) AS sub FROM OrderItems oi JOIN RM_Items p ON oi.item_id = p.id WHERE oi.order_id = :id");
    try{
    $stmt->execute([":id"=>$order_id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total=0;
    
    }
    catch(Exception $e){
        echo $e->errorInfo;
    }
    
    $stmt = $db->prepare("SELECT id, address, payment_method from Orders where id= :id");
    try{
    $stmt->execute([":id"=>$order_id]);
    $info = $stmt->fetch(PDO::FETCH_ASSOC);
    if($info){
        $address= $info["address"];
        $payM=  $info["payment_method"];

    }
}    catch(Exception $e){
        echo $e->errorInfo;
    }
?>

<div class="container-fluid">
    <h3>Order Number : <?php se($order_id) ?> </h3>
    <div class="list-group">
        <?php if($results && count($results) > 0):?>
            <?php foreach($results as $r):?>
            <div class="list-group-item" style="height:3.9cm;background-color:lavender">
            <div class="row">
                    <div class="col"></div>
                   <div class="col">Cost</div>
                    <div class="col">Quantity</div>
                    <div class="col">Subtotal</div>
                    </div>
                <div class="row">
                    <div class="col">
                    <?php se($r,"name");?>
                    </div>
                   
                    
                    <div class="col">
                        $ <?php se($r,"unit_cost");?>
                    </div>
                    <div class="col">
                        <?php se($r,"quantity");?>
                    </div>
                    <div class="col">
                       $ <?php se($r,"sub");?>
                    </div>
                    </div>
                    
			<?php 
            
            $total += (float)$r["sub"];
            ?>
            </div>
            

            <?php endforeach;?>
            </div>
        
        <div class="col">
               <h4>Total</h4> 
            </div>
          <h4>  <div class="col">
                <?php echo '$'.$total;?>
        </div></h4>

        <div class="col">
                <h4>Address: <?php se($address);?></h4>
               <br/>
               <h4>Payment Method: <?php se($payM);?></h4>
                
            </div>



        <?php endif;?>    
			<br/>
               

</div>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>
