<?php
  if (isset($_GET['page'])) {
    # code...
    if (is_numeric($_GET['page'])) {
      $page = htmlspecialchars($_GET['page']);
    } else {
        $page = 1 ;
    }
  }else{
    $page = 1;
  }

  $data="http://localhost/api_test/api.php/?page=$page";
  $response=file_get_contents($data);
  $json_response=json_decode($response,true);
  $count=$json_response['count'];
  $total_pages=$json_response['total_pages'];

  for($i=0;$i<$count;$i++){
    echo $json_response['student'][$i]['name']."<br/>";
  }
  if($total_pages!=0){
    for ($i=1; $i <=$total_pages ; $i++) {
      echo "<a href='index.php?page=$i'> Page$i </a> &nbsp;";
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
