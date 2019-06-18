<?php
session_start();

require_once './config/config.php';
require_once 'includes/auth_validate.php';

$db = getDbInstance();

include_once('includes/header.php');

$select = trim($_POST["match"]);
$select2 = trim($_POST["operator"]);
$select3 = 'RewriteCond ' . $select;
$select3 = $select3 . " ";
$select3 .= $select2;

$lines = array();
if ($select =='expr "%{THE_REQUEST}') {$word ='#rule 2';} elseif ($select == '%{THE_REQUEST}') {$word ='#rule 2';}
elseif ($select =='expr "%{REQUEST_URI}') {$word ='#rule 1';} elseif ($select == '%{REQUEST_URI}') {$word ='#rule 1';} 
else {$word ='#rule 3';}
foreach(file("rules1.txt") as $line) {

    if(isset($_POST["match"]) || isset($_POST["match"])) {$a = PHP_EOL . $select3;} else {$a='';}
    $lines[] = $line;

    if ($word === trim($line)) {
        $lines[] = $a;
    }
$content = join("", $lines);
file_put_contents("rules1.txt", ($content));
}

shell_exec('sudo /usr/bin/dos2unix "rules.txt"  2>&1');
shell_exec('sudo /srv/script/sync.sh  2>&1');

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Details</h1>
        </div>
    </div>
    <div class="row">
       <div class="col-xs-9 text-left">
       <div class="huge"  size="150" ><?php echo "<pre>$select</pre>"; ?></div>
       <div class="huge"  size="150" ><?php echo "<pre>$select2</pre>"; ?></div>
       <div class="huge"  size="150" ><?php echo "<pre>$select3</pre>"; ?></div>
       <div class="huge"  size="150" ><?php echo "<pre>Successfully added to $word</pre>"; ?></div>
     </div
    <div class="row">
</div

<?php include_once('includes/footer.php'); ?>
