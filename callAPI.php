<html>
<head>
   <link href="styles.css" rel="stylesheet" type="text/css" />
 <title>PHP Bing</title>
</head>
<body>

<form method="post" action="<?php echo $PHP_SELF;?>"> 
 Type in a search:<input type="text" id="searchText" name="searchText" value="<?php 
 if (isset($_POST['searchText'])){
  echo($_POST['searchText']); }
  else { echo('sushi');}
  ?>"/>
        <input type="submit" value="Search!" name="submit" id="searchButton" />
<?php


if (isset($_POST['submit'])) {
$request = 'http://localhost/api/getdata.php';
$response  = file_get_contents($request);
$jsonobj  = json_decode($response,true);



//echo('<ul ID="resultList">');                    
                
foreach($jsonobj as $value){
	
echo $value['name'];
//echo('<img src="' . $value->image. '"></li>');

}
 
} 

?>
</form>
</body>
</html>