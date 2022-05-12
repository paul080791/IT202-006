
<?php
require(__DIR__ . "/../../partials/nav.php");

if (!is_logged_in()) {
    flash("You must be logged in to checkout");
    die(header("Location: login.php"));
}

$done=0;
$db = getDB();
if(isset($_POST["checkout"])){
    $stmt = $db->prepare("SELECT cart.id,cart.item_id, item.name, cart.unit_cost, cart.desired_quantity, (cart.unit_cost * cart.desired_quantity) as sub from RM_Cart cart JOIN RM_Items item on cart.item_id = item.id where cart.user_id = :id");
$stmt->execute([":id"=>get_user_id()]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//$BeforeDeletedCart=$results;
$total = 0;
//verify cost----------------------------
if(count($results)>0){
    foreach ($results as $checkcost){
        $stmt = $db->prepare("SELECT cost,stock,visibility from RM_Items WHERE  id= :id");    
        $stmt->execute([":id"=>$checkcost["item_id"]]);
        $h =$stmt->fetch(PDO::FETCH_ASSOC);
        if ($h["cost"]!=$checkcost["unit_cost"]){
            $stmt = $db->prepare("UPDATE RM_Cart set unit_cost = :cost where item_id = :id ");
             $f = $stmt->execute([":id"=>$checkcost["item_id"], ":cost"=>$h["cost"]]);
            if($f){
                    flash("Updated cost", "success");
                    redirect("cart.php");
                }
    }
    //compare desired quantity against stock, visibility and out of stock
    if($h["visibility"]==0)
        {
            $stmt = $db->prepare("DELETE FROM RM_Cart where id = :id");
            $r = $stmt->execute([":id"=>$checkcost["id"]]);
            if($r){
                $nam=$checkcost["name"];
                flash("Item $nam is unavailable right now! Deleted from cart", "danger");
                redirect("cart.php");
                }

        }else if($h["stock"]==0)
    {
        $stmt = $db->prepare("DELETE FROM RM_Cart where id = :id");
        $r = $stmt->execute([":id"=>$checkcost["id"]]);
        if($r){
            $nam=$checkcost["name"];
            flash("Item $nam is out of stock! Deleted from cart", "danger");
            redirect("cart.php");
            }
          
    }
    else if ($h["stock"]<$checkcost["desired_quantity"]){
        $stmt = $db->prepare("UPDATE RM_Cart set desired_quantity = :q where item_id = :id ");
         $g = $stmt->execute([":id"=>$checkcost["item_id"], ":q"=>$h["stock"]]);
        if($g){
            $nam=$checkcost["name"];
            $qua=$h["stock"];
             flash("Updated quantity of $nam: only $qua in stock", "success");
             redirect("cart.php");
             
             }
    }
    


    }
    
}
    $done=1;
	$stmt = $db->prepare("SELECT IFNULL(MAX(order_id),0) as orderidmax FROM OrderItems");
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$max = (int)$result["orderidmax"];
  	$max++;
      echo $max;
	
	$address = '';
	if(isset($_POST['street'])){
		$address .= $_POST['street'];
	}
    if(isset($_POST['apt'])){
		$address .= $_POST['apt'];
	}
	if(isset($_POST['city'])){
		$address .= ' ' .$_POST['city'];
	}
	if(isset($_POST['state'])){
		$address .= ' ' . $_POST['state'];
	}
	if(isset($_POST['zip'])){
		$address .= ' ' . $_POST['zip'];
	}

	$stmt = $db->prepare("SELECT item.id, item.cost, cart.desired_quantity, item.cost*cart.desired_quantity as total_price From RM_Cart cart JOIN RM_Items item on cart.item_id = item.id where cart.user_id = :uid");
	$stmt->execute([":uid"=>get_user_id()]);
	$purchases = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //insert line item to order
    $db=getDB();
    $stmt = $db->prepare("INSERT INTO Orders(user_id, money_received, address, payment_method) VALUES(:u_id, :m_r,  :address, :p_m)");
    $stmt->execute([
    ":u_id"=>get_user_id(),
    ":m_r"=>$_POST["money_received"],
    ":address"=>$address,
    ":p_m"=>$_POST["payment_method"]]);
	
	foreach($purchases as $p){

        $stmt = $db->prepare("INSERT INTO OrderItems(order_id, item_id, quantity, unit_cost) VALUES(:order_id, :item_id, :q, :unit_cost)");
        $stmt->execute([
        ":order_id"=> $max,
        ":item_id"=>$p["id"],
        ":q"=>$p["desired_quantity"],
        ":unit_cost"=>$p["cost"]]);

        //update stock
        
		$stmt = $db->prepare("UPDATE RM_Items set stock = stock - :q WHERE id = :id");
		$stmt->execute([
		":q"=>$p["desired_quantity"],
		":id"=>$p["id"]]);
    }
    $stmt = $db->prepare("SELECT c.item_id,c.id, p.name, c.unit_cost, c.desired_quantity, (c.unit_cost * c.desired_quantity) AS sub FROM RM_Cart c JOIN RM_Items p ON c. item_id = p.id WHERE c.user_id = :id");
    $stmt->execute([":id"=>get_user_id()]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
	//clear cart
	$stmt = $db->prepare("DELETE FROM RM_Cart where user_id = :uid");
	$stmt->execute([":uid"=>get_user_id()]);
     redirect("orderConfirmation.php");
}

$stmt = $db->prepare("SELECT cart.id,cart.item_id, item.name, cart.unit_cost, cart.desired_quantity, (cart.unit_cost * cart.desired_quantity) as sub from RM_Cart cart JOIN RM_Items item on cart.item_id = item.id where cart.user_id = :id");
$stmt->execute([":id"=>get_user_id()]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//$BeforeDeletedCart=$results;
$total = 0;
//verify cost----------------------------
if(count($results)>0){
    foreach ($results as $checkcost){
        $stmt = $db->prepare("SELECT cost,stock,visibility from RM_Items WHERE  id= :id");    
        $stmt->execute([":id"=>$checkcost["item_id"]]);
        $h =$stmt->fetch(PDO::FETCH_ASSOC);
        if ($h["cost"]!=$checkcost["unit_cost"]){
            $stmt = $db->prepare("UPDATE RM_Cart set unit_cost = :cost where item_id = :id ");
             $f = $stmt->execute([":id"=>$checkcost["item_id"], ":cost"=>$h["cost"]]);
            if($f){
                    flash("Updated cost", "success");
                }
    }
    //compare desired quantity against stock, visibility and out of stock
    if($h["visibility"]==0)
        {
            $stmt = $db->prepare("DELETE FROM RM_Cart where id = :id");
            $r = $stmt->execute([":id"=>$checkcost["id"]]);
            if($r){
                $nam=$checkcost["name"];
                flash("Item $nam is unavailable right now! Deleted from cart", "danger");
                
                }

        }else if($h["stock"]==0)
    {
        $stmt = $db->prepare("DELETE FROM RM_Cart where id = :id");
        $r = $stmt->execute([":id"=>$checkcost["id"]]);
        if($r){
            $nam=$checkcost["name"];
            flash("Item $nam is out of stock! Deleted from cart", "danger");
            }
          
    }
    else if ($h["stock"]<$checkcost["desired_quantity"]){
        $stmt = $db->prepare("UPDATE RM_Cart set desired_quantity = :q where item_id = :id ");
         $g = $stmt->execute([":id"=>$checkcost["item_id"], ":q"=>$h["stock"]]);
        if($g){
            $nam=$checkcost["name"];
            $qua=$h["stock"];
             flash("Updated quantity of $nam: only $qua in stock", "success");
             }
    }
    


    }
    
}
$stmt = $db->prepare("SELECT c.item_id,c.id, p.name, c.unit_cost, c.desired_quantity, (c.unit_cost * c.desired_quantity) AS sub FROM RM_Cart c JOIN RM_Items p ON c. item_id = p.id WHERE c.user_id = :id");
            $stmt->execute([":id"=>get_user_id()]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $total=0;
?>

<?php if($done!=1):?>
<div class="container-fluid">
    <h3>Checkout</h3>
    <div class="mb-4">
        <?php if($results && count($results) > 0):?>
            <?php foreach($results as $r):?>
            <div class="mb-4">
                <form method="POST">
                <div class="col">
					<div class="col">
                       Product: <?php se($r,"name");?>
                    </div>
					<div class="col">
                       Price: <?php se($r,"unit_cost");?>
                    </div>
					<div class="col">
                       Quantity: <?php se($r,"desired_quantity");?>
                    </div>
					<div class="col">
                       Subtotal for Product: <?php se($r,"sub");?>
                    </div>
					<?php $total += (float)$r["sub"];?>
					<br/>
                </div>
            </div>
            <?php endforeach;?>
			<div class="col">
               Total of products:  <?php se(count($results));?><br>
               Total: <?php se($total);?>
            </div>
        <?php else:?>
        <div class="list-group-item">
            No items in cart
        </div>
        <?php endif;?>
    </div>
	<div >
		<form method="POST">
			<label for="payment_method">Payment Method:</label>
			<select id="payment_method" required name="payment_method">
				<option value="paypal">Paypal</option>
				<option value="visa">Visa</option>
				<option value="mastercard">Mastercard</option>
				<option value="amex">American Express</option>
			</select>
        </div>
            <div class ="container-fluid">
            <form method="POST">    
            <span class ="input-group-text" id= "basic-addon1"></span>
			<div class="mb-4">
            <input type="text" class= "col" name="street" required placeholder="Street Address" aria-label= "Street Address" aria-describedby="basic-addon1"/>
			</div>
            <div class="mb-4">
            <input type="text" class= "col" name="apt"  placeholder="Apt." aria-label= "Apartment " aria-describedby="basic-addon1"/>
			</div>
            <div class="mb-4">
            <input type="text" class= "col" name="city" required placeholder="City " aria-label= "City" aria-describedby="basic-addon1"/>
            </div>
            <input type="text" class= "col" name="state" required placeholder="State" aria-label= "State" aria-describedby="basic-addon1"/>
			<div class="mb-4">
            <input type="text" class= "col" name="zipcode" required placeholder="Zip/Postal Code" aria-label= "ZipCode" aria-describedby="basic-addon1" pattern="[0-9]*"/>
			</div>
            <div class="mb-4">
            <p >Enter the money:</p>
            <input disabled="disabled" type="number" class= "col" name="money_received" value="<?php se($total);?>"/>
			</div>

            <div class="mb-4">
            <input type="submit" class="btn btn-primary" name="checkout" value="Checkout"/>

</div>
<?php endif; ?>

<?php if($done==1):?>
    <?php
    $stmt = $db->prepare("SELECT MAX(id) as orderidmax FROM Orders where user_id=:id ");
	$stmt->execute([":id"=>get_user_id()]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$max = (int)$result["orderidmax"];
    echo $max;

    $stmt = $db->prepare("SELECT oi.item_id,oi.order_id, p.name, oi.unit_cost, oi.quantity, (oi.unit_cost * oi.quantity) AS sub FROM OrderItems oi JOIN RM_Items p ON oi.item_id = p.id WHERE oi.order_id = :id");
    try{
    $stmt->execute([":id"=>$max]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
        echo $e->errorInfo;
    }
    //echo "hola" . $max; 
    foreach($results as $p)
    {
        se($p,"name");
    }    
?>

    <div class="container-fluid">
    <h3>Thank you for shopping with us! <?php se($address)?></h3>
        <div class="list-group">
        <?php if($results && count($results) > 0):?>
            <?php foreach($results as $r):?>
            <div class="list-group-item">
                <form method="POST">
                    <h5>ORDER DETAILS</h5>
                <div class="row">
                    <div class="col">
                        Product : <?php se($r,"name");?>
                    </div>
                    
                    <div class="col">
                        Quantity: <?php se($r,"desired_quantity");?>
                    </div>
                    
                   <br/>
                   <?php endforeach;?>
                   <div class="col">
                        Address: </Address><?php se($address)?>
                    </div>
                    <div class="col">
                          PAYMENT METHOD: <?php se($r,"payment_method");?>
                    </div>
                    <div class="col">
                        TOTAL : <?php se($total);?>
                    </div>
            </div>
        
        <?php else:?>
        <?php endif;?>
    </div>
</div>
<?php endif;?>



<?php
require(__DIR__ . "/../../partials/flash.php");
?>