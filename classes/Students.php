<?php
  /**
   *
   */
  class Students{
    private $db_connect;
    function __construct($db){
      $this->db_connect=$db;
    }

    public function fetch_data($paging){
      $get_page=$paging;
      $start=$get_page['start'];
      $limit=$get_page['limit'];

      $stmt_num_rows= $this->db_connect->query("SELECT COUNT(*) FROM student");
      $total_students=$stmt_num_rows->fetchColumn();

      $stmt = $this->db_connect->prepare("SELECT * FROM student LIMIT $start,$limit");
      $stmt->execute();

      if ($total_students%$limit==0) {
        $total_pages=floor($total_students/$limit);
      }
      else {
        $total_pages=floor($total_students/$limit)+1;
      }
      $students=array();
      $data=array();
      $i=0;
      while ($row=$stmt->fetch()) {
        $students+=array($i=>array('name'=>$row['name'],'index'=>$row['id']));
        $i++;
      }
      $data+=array('total_pages'=>$total_pages,'count'=>$i,'student'=>$students);
      return $data;
    }

  }






?>
