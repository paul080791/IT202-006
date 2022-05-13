<?php

/**
 * @param $query must have a column called "total"
 * @param array $params
 * @param int $per_page
 */
function paginate($query, $params = [], $per_page = 10)
{
    //echo $query;
    if (!isset($query) || empty($query)) {
        flash("Dev note: Query is empty/null", "danger");
        return;
    }
    //echo 11111 . $query . 11111;
    global $page; //will be available after function is called
    try {
        $page = (int)se($_GET, "page", 1, false);
        //flash($page);
       } catch (Exception $e) {
        //safety for if page is received as not a number
        $page = 1;
    }
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        //flash(count)
    } catch (PDOException $e) {
        error_log("paginate error: " . var_export($e, true));
    }
    global $total;
    $total = 0;
    if (isset($result)) {
        $total = (int)se($result, "total", 0, false);
    }
    //flash($total);
    global $total_pages; //will be available after function is called
    $total_pages = ceil($total / $per_page);
   // flash($total);
    global $offset; //will be available after function is called
    $offset = ($page - 1) * $per_page;
}