<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

//Get DB instance. function is defined in config.php
$db = getDbInstance();
$numrules = 0;

include_once('includes/header.php');

$output = shell_exec('sudo /srv/script/restart_apache.sh 2>&1; ps -ef | grep httpd | grep -v grep');

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Error Log after reload</h1>
        </div>
    </div>
    <div class="row">
       <div class="col-xs-9 text-left">
       <div class="huge"  size="150" ><?php echo "<pre>$output</pre>"; ?></div>
     </div   
</div>
<!-- /#page-wrapper -->

<?php include_once('includes/footer.php'); ?>

