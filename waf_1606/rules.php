<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

$numrules = 0;

include_once('includes/header.php');


$output = shell_exec('sudo /srv/script/view_rules.sh 2>&1');
shell_exec('sudo /srv/script/get_dir.sh 2>&1');

#$dir = "Directory /public";
$dir =  file_get_contents("dir.txt");

$lec = "\n";
$delimiter = "$lec$lec";

$contentArray = explode($delimiter,str_replace("\r", "", $output));

$numElements = count($contentArray);

$numElelemtsPerRec = 2;
    if($numElements % $numElelemtsPerRec > 0) 
      exit("Parse problem");


$table = '<table class="table table-striped table-bordered table-condensed" border="1"><tr><th class="header">Rule ID</th><th>content</th></tr>';


 for ($i = 0; $i <= $numElements - 1; $i = $i + $numElelemtsPerRec) {
        $rule = $contentArray[$i];
        $content = $contentArray[$i+1];
        $table .= "<tr><td>$rule</td><td>$content</td></tr>";
    }

$table .= '</table>';

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
           <h1 "class="page-header">List of enabled rules</h1>
           <h1 "class="page-header"><?php echo "<pre>$dir</pre>";?></h1>
        </div>
    </div>
    <div class="table">
    <div id="display-table">
        <?php echo "<pre>$table</pre>";?></div>
     </div
</div>
<!-- /#page-wrapper -->

<?php include_once('includes/footer.php'); ?>
