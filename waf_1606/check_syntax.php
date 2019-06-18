<?php
session_start();

require_once './config/config.php';
require_once 'includes/auth_validate.php';

$db = getDbInstance();

include_once('includes/header.php');

$syntax = shell_exec('sudo /srv/script/check_syntax.sh 2>&1');

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Checking syntax of httpd.conf</h1>
        </div>
    </div>
    <div class="row">
       <div class="col-xs-9 text-left">
       <div class="huge"  size="150" ><?php echo "<pre>$syntax</pre>"; ?></div>
     </div
    <div class="row">
       <div class="col-xs-9 text-left">
    </body>
    </div
</div>
<!-- /#page-wrapper -->

<?php include_once('includes/footer.php'); ?>
