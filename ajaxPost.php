<?php
ob_start();
ini_set('memory_limit', '2048M'); // or you could use 1G
include 'Pager.php';
include 'PagerCSV.php';

$pageNum = (isset($_GET['p']) && $_GET['p'] != '') ? (int)$_GET['p'] : 1;
$handle = fopen('addcsv.csv', "r");
$pager = new PagerCSV($pageNum,15);
$data = $pager->getData($handle);
 $output = '';
 if (!empty($data)) {
        $status = "success"; ?>
            	<?php foreach ($data as $row) {  
          $output .=  '<div class="col-md-4" >
                <div class="panel panel-default" style="height: 100px;border:none;">
                    <div class="panel-body">
                        <h4>'. $row[1].','.$row[4].'</h4>
                        <p>'. $row[2].'</p>
                    </div>
                </div>
            </div>'; 
 } ?>
            <?php } else {
            	$status = ">No records found";
             ?>
			<?php }      
$pagerNav = $pager->render();
$sequential = array("status"=>$status,"content"=>$output,"pagination"=>$pagerNav);
echo json_encode($sequential);
header('Content-type: application/json');
exit;
?>