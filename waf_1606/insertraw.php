<?php
session_start();

require_once './config/config.php';
require_once 'includes/auth_validate.php';

$db = getDbInstance();

include_once('includes/header.php');

$output = shell_exec('sudo /srv/script/view_rules.sh 2>&1');

if(isset($_POST['text_box'])) { //if there is something entered
        $a = $_POST['text_box'];
        $file = "rules.txt";
        file_put_contents($file, (PHP_EOL . $a . PHP_EOL), FILE_APPEND);
        shell_exec('sudo /usr/bin/dos2unix "rules.txt"  2>&1');
    }

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List of mod rewrite rules</h1>
        </div>
    </div>
    <div class="row">
       <div class="col-xs-9 text-left">
       <div class="huge"  size="150" ><?php echo "<pre>$output</pre>"; ?></div>
     </div
    <div class="row">
       <div class="col-xs-9 text-left">
            <form name="insert" method="post">
            <textarea name="text_box" style="min-height: 200px;min-width: 700px;"></textarea>
            <input type="submit" id="search-submit" value="+ new rule" />
        </form>
    </body>
    </div
</div>
<!-- /#page-wrapper -->


<?php include_once('includes/footer.php'); ?>
