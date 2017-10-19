<?php
// required headers
//header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once 'class/db_connection.php';
include_once 'class/class_lugares.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$lugar = new Lugares($db);
 
// query products
$stmt = $lugar->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $lugares_arr=array();
   // $lugares_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $lugar_item=array(
            "lugarid" => $lugarid,
            "lugartipoid" => $lugartipoid,
            "name" => $name,
            "address" => $address,
            "phone" => $phone,														
            "category" =>$category,											
            "price" => $price,
            "image" => $image,											
            "reservation" => $reservation,
            "delivery" => $delivery,
            "creditcards" => $creditcards,
            "goodfor" => $goodfor,
            "goodkids" => $goodkids,
            "goodgroups" => $goodgroups,
            "alcohol" => $alcohol,
            "wifi" => $wifi,
            "tv" => $tv																								
        );
 
        //array_push($lugares_arr["records"], $lugar_item);
		array_push($lugares_arr, $lugar_item);		
    }
 
    echo json_encode($lugares_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}

//echo "entro";
?>