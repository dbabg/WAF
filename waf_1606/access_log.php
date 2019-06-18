<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

$numrules = 0;

include_once('includes/header.php');


$output = shell_exec('sudo /srv/script/view_log.sh 2>&1');
shell_exec('sudo /srv/script/view_rules.sh 2>&1');

$logFile = 'log4.txt';
$lines   = file($logFile); // create array
$table   =
'<table class="table table-striped table-bordered table-condensed" border="1">
<tr><th class="header";>ID</th>
<th>Count</th><th>IP Address</th>
<th>Request</th><th>HTTP Code</th>
<th>User Agent</th>
<th>Has Rule?</th>
<th>Actions</th></tr>';

foreach ($lines as $line) {
    list($id, $count, $ip, $request, $http_code, $referer, $user_agent, $request_uri, $query_string, $cookie, $accept) = explode('" "', $line);
    $action =
        '<form name="editid" action="prepare_rules.php" method="POST">
        <input type="hidden" name="id" value="' . $id . '">
        <input type="hidden" name="ip" value="' . $ip . '">
        <input type="hidden" name="request" value="' . $request . '">
        <input type="hidden" name="user_agent" value="' . $user_agent . '">
        <input type="hidden" name="referer" value="' . $referer . '">
        <input type="hidden" name="request_uri" value="' . $request_uri . '">
        <input type="hidden" name="query_string" value="' . $query_string . '">
        <input type="hidden" name="cookie" value="' . $cookie . '">
        <input type="hidden" name="accept" value="' . $accept . '">
        <input type="submit" name="editid" value="Edit"></form>';
		
    $wc     = shell_exec('grep "' . $request . '" rules.txt | wc -l');
	
    if ($wc > 0) {
        $has_rule = 'YES';
    } else {
        $has_rule = 'NO';
    }
    if ($http_code == "200") {
        $backgroundColor = "#cdf3cd";
    } elseif ($http_code == "403") {
        $backgroundColor = "#f9deae";
    } else {
        $backgroundColor = "";
    }

$table .=
"<tr style='background-color:" . $backgroundColor . ";'>
<td>$id</td>
<td>$count</td>
<td>$ip</td>
<td>$request</td>
<td>$http_code</td>
<td>$user_agent</td>
<td>$has_rule</td>
<td>$action</td></tr>";
}

$table .= '</table>';

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 "class="page-header">Access Log grouped by unique requests</h1>
        </div>
    </div>
    <div class="table">
    <div id="display-table">
                <?php
echo $table;
?></div>
     </div
</div>
<!-- /#page-wrapper -->

<?php
include_once('includes/footer.php');
?>

