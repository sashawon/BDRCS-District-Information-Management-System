<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Notice Info</title>
  <link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
  <link rel="stylesheet" href="">

  <style>
    body{
      margin: 0;
    }
    .print-area{
      width: 874px;
      height: 1240px;
      margin: auto;
      box-sizing: border-box;
    }
    .header, .page-info{
      text-align: center;
    }
    .data-info{ }
    .data-info table{
      width: 100%;
      border-collapse: collapse;
    }
    .data-info table thead th, .data-info table tbody td{
      border: 1px solid #000;
      padding: 4px;
      line-height: 1em;
    }
  </style>
</head>
<body onload="window.print();">
  
                <?php
                  if(isset($_GET['query'])){
                  $query = $_GET['query']; 

                  $stmt=$con->prepare($query);
                  $stmt->execute();
                  $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                  $total=$stmt->rowCount();
                  
                  if($total>0){
                  $i = 1;
                  $page = 1;
                  $per_page = 20;

                  foreach ($result as $row) { 
                    if ($i % $per_page == 1) {
                      echo page_header();
                    } 
                ?>
                  <tr>
                    <td> <?php echo $i; ?> </td>
                    <td><?=$row["title"]?></td>
                    <td><?=$row["date"]?></td>
                  </tr>
                <?php
                    if ($i % $per_page == 0 || $total == $i) {
                      echo page_footer($page++);
                    }
                    $i++;
                  }
                    } else {
                      echo "No Records Found";
                    }
                  }
                ?>
           
</body>
</html>

<?php 
function page_header(){
  $data='
  <div class="print-area">
    <div class="header">
          <span>
          <img src="images/logo.png" alt="" width="40" height="40">
          <br>
          <b style="font-size: 20px;">Bangladesh Red Crescent Society</b>
          </span>
          <br>
          <b style="font-size: 18px;"><span>Chuadanda Unit</span></b>
          <br>
          <span>Notice List</span>
          <br><br>
    </div>
    <div class="data-info">
      <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
  ';
  return $data;
}

function page_footer($page){
  $data='
  </tbody>
            </table>
    </div>
    <div class="page-info">
      <span>Page - '.$page.'</span>
    </div>
  </div>
  ';
  return $data;
}
?>