<?php
  include "init.php";

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
  $limit=4;
  $start=($page-1)*$limit;
  if($start<0) $start=0;
  $paging = array('start' => $start, 'limit' => $limit);
  echo json_encode($students->fetch_data($paging));






?>
