<?php
require(__DIR__ . "/../../partials/nav.php");
require(__DIR__ . "/../../partials/cart.php");
?>

<div class="container-fluid">
    <h3>My Cart</h3>
		
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
                <form method="POST">
                <div class="row">
                    <div class="col">
                    <input type="hidden" name=" item_id" value="<?php se($r,"item_id");?>"/>
                    <a href="Item_detail.php?id=<?php se($r, "item_id");?>"> <?php se($r,"name");?> </a>
                    </div>
                   
                    
                    <div class="col">
                        $ <?php se($r,"unit_cost");?>
                    </div>
                    <div class="col">

                            <input type="number" min="0" name="desired_quantity" value="<?php se($r,"desired_quantity");?>"/>
                            <input type="hidden" name="cart_id" value="<?php se($r,"id");?>"/>

                    </div>
                    <div class="col">
                       $ <?php se($r,"sub");?>
                    </div>
                    </div>
                    
			<?php 
            
            $total += (float)$r["sub"];
            ?>
			<br/>
               
                <div class="btn-group btn-group-sm">
                        <input type="submit" style="height:1cm;" class="btn btn-primary" name="update" value="Update"/>
                        </form>
                        <form method="POST">
                            <input type="hidden" name="cart_id" value="<?php se($r,"id");?>"/>
                            <input type="submit" class="btn btn-warning" name="delete" value="Delete Item"/>
                        </form>
                </div>
            </div>
        <?php endforeach;?>
        <div class="col">
               <h3>Total</h3> 
            </div>
          <h3>  <div class="col">
                <?php echo '$'.$total;?>
        </div></h3>
        <?php else:?>
    <div class="list-group-item">
        No items in cart
    </div>
        <?php endif;?>
    </div>
</div>
<form method="POST">
<div >

    <a class="btn btn-success" href="#" role="button">Checkout</a>
    <input type="hidden" name="cart_id" value="<?php se($r,"id");?>"/>
    <input style="margin-left:20px;margin-top:0.5cm;" type="submit" class="btn btn-danger" name="deleteAll" value="Clear Cart"/>
 
		
</div>
</form>


<?php
require(__DIR__ . "/../../partials/footer.php");
?>