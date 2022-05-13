<?php
require(__DIR__ . "/../../partials/nav.php");



$result = [];
$results=[];
$columns = get_columns("RM_Items");
$ignore = ["id", "modified", "created","visibility","image"];
$db = getDB();
//get the item
$id = se($_GET, "id", -1, false);


$db = getDB();
$rate=6;
if(isset($_POST["rate"]) )
{
$rate= se($_POST,"rate","",false);
}
if(isset($_POST["review"]) )
{
$comment= se($_POST,"review"," ",false);
}
else
$comment=" ";


if($rate!=6){
$stmt = $db->prepare("INSERT into Ratings (item_id, user_id, rating, comment )VALUES (:item_id,:user_id,:rating,:comment)");

try {
    $stmt->execute([":item_id" => $id, ":user_id"=> get_user_id(),":rating"=>$rate,"comment"=>$comment]);
    flash("Add the review!", "success");
    //die(header("Location: login.php"));
    
} catch (PDOException $e) {
    flash("<pre>" . var_export($e, true) . "</pre>");
}
}

$params=[];
$base_query="SELECT id,user_id,rating,comment from Ratings where item_id=$id";
$total_query="SELECT COUNT(1) as total FROM Ratings where item_id=$id ";

$per_page=10;
paginate($total_query,$params,$per_page);
$average=0;
if (isset($_POST["submit"])) {
    $stmt = $db->prepare("SELECT Average_rating  from RM_Items where id =$id " );
    $stmt -> execute();
    $g= $stmt->fetch(PDO::FETCH_ASSOC);
    $average=$g["Average_rating"];

        if($average==0.0)
        {
            $average += $rate;
        }
        else
        {
            $average = ($average*($total-1) +$rate)/$total; 
        }
    
        $stmt = $db->prepare("UPDATE RM_Items set Average_rating = :average where id = :id ");
        $f = $stmt->execute([":id"=>$id, ":average"=>$average]);
        if($f){
            flash("Updated average", "success");

        }
        
}
$query = " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;
$stmt = $db->prepare($base_query . $query );
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null;

try {
    $stmt->execute($params); //dynamically populated params to bind
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
       
    //echo $offset . $page;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}
//flash($total);

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
        <?php if (!in_array($column, $ignore)) : ?>
            <div class="mb-4">
                <label><?php se($column); ?>:  </label>   
                <?php if($column=="Average_rating"){
                    if ($value==0.0)
                        $value="Not Yet Rated";
                }
                ?>
                 <label class="form-control" style="background-color:rgb(40, 79, 207); font-weight: bold;" id="<?php se($column); ?>"  value="<?php se($value); ?>" name="<?php se($column); ?>"><?php se($value); ?></label>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </form>
</div>
<h3><b>Rating & Reviews</b></h3>

<div class="container-fluid">
    <h3>Rate this Product: </h3>
    <form method="POST">
    <div class="mb-3">

    <?php for( $i =0;$i<5;$i++):?>

    <input class="form-check-input" required id="rate<?php echo $i+1 ?>" type="radio" value=<?php echo $i+1 ?> name="rate" />
    <label class="form-check-label" for="rate<?php echo $i+1 ?>">
    <?php echo $i+1 ?>
    </label>
    <?php endfor ;?>

    </div>
    <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Review: </label>
  <textarea class="form-control" id="review" name="review" rows="3"></textarea>
</div>
           
        <input class="btn btn-primary" type="submit" value="submit" name="submit" />
    </form>
    
</div>
<?php if($results && count($results) > 0):?>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">

<?php foreach ($results as $rating) : ?>
<div class="card bg-light" style="height:15em;color:black;">
<div class="card-header">
<?php
 $stmt = $db->prepare("SELECT  username FROM Users  WHERE id = :id");
 $stmt->execute([":id"=>$rating["user_id"]]);
 $user = $stmt->fetch(PDO::FETCH_ASSOC); 
 if($user){
    $username=$user["username"];
    }

?>
User: <?php se($username) ?>
</div>
<div class="card-body">
<h5> <?php se($rating,"comment")?> </h5>
</div>
<div class="card-footer">
<h5>RATE: <?php se($rating,"rating")?> </h5> 
</div>
</div>
<?php endforeach;?>
</div>
<?php endif; ?>

<div class="mt-3">
                <?php /* added pagination */ ?>
                <?php require(__DIR__ . "/../../partials/pagination.php"); ?>
            </div>
        
        <div class="col-4" style="min-width:30em">
          
         </div>



<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/footer.php");
?>