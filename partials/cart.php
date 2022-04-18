<?php
if (!is_logged_in()) {
    flash("You must be logged in to access this page");
    die(header("Location: login.php"));
}

if(isset($_POST[" item_id"])){
    if(is_logged_in()){
       $id = (int)$_POST[" item_id"];
        $db = getDB();
        $stmt = $db->prepare("SELECT name, cost, category,stock from RM_Items where id = :id");
        $stmt->execute([":id"=>$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result) {
            $name = $result["name"];
            $price = $result["cost"];
            $stmt = $db->prepare("INSERT INTO RM_Cart (user_id, item_id, unit_cost, desired_quantity) VALUES(:user_id, : item_id, :unit_cost, 1) ON DUPLICATE KEY UPDATE desired_quantity = desired_quantity +1, unit_cost = :unit_cost"); 
            $r = $stmt->execute([":user_id"=>get_user_id(), ": item_id"=>$id, ":unit_cost"=>$price,]);
        }
      
}else{
    flash("You must log in to add to cart");

}
}

$db = getDB();
if(isset($_POST["view"])){
    $stmt = $db->prepare("SELECT  item_id From RM_Cart where  item_id= :id ");
    $r = $stmt->execute([":id"=>$_POST["item_id"]]);
    if($r){
        flash("item selected", "success");
    }
}
if(isset($_POST["update"])){
    $stmt= $db->prepare ("SELECT RM_Items.stock from RM_Items JOIN RM_Cart ON RM_Items.id= RM_Cart.item_id where RM_Cart.id= :cid");
    $stmt->execute([":cid"=>$_POST["cart_id"]]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($_POST["desired_quantity"] >$result["stock"] ) {
      flash("Out of stock" , "danger");
    } else {

        $stmt = $db->prepare("UPDATE RM_Cart set desired_quantity = :q where id = :id ");
        $r = $stmt->execute([":id"=>$_POST["cart_id"], ":q"=>$_POST["desired_quantity"]]);
        if($r){
            flash("Updated quantity", "success");
        }

    }
            
}
if(isset($_POST["delete"])){
    $stmt = $db->prepare("DELETE FROM RM_Cart where id = :id");
    $r = $stmt->execute([":id"=>$_POST["cart_id"]]);
    if($r){
        flash("Deleted item from cart", "success");
    }
}
if(isset($_POST["deleteAll"])){
    $stmt = $db->prepare("DELETE FROM RM_Cart where user_id = :id");
    $r = $stmt->execute([":id"=>get_user_id()]);
    if($r){
        flash("Cleared cart", "success");
    }
}
$stmt = $db->prepare("SELECT c.item_id,c.id, p.name, c.unit_cost, c.desired_quantity, (c.unit_cost * c.desired_quantity) AS sub FROM RM_Cart c JOIN RM_Items p ON c. item_id = p.id WHERE c.user_id = :id");
$stmt->execute([":id"=>get_user_id()]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total=0;