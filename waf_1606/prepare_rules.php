<?php
session_start();

require_once './config/config.php';
require_once 'includes/auth_validate.php';

$db = getDbInstance();

include_once('includes/header.php');


$id = trim($_POST["id"]);
$ip = trim($_POST["ip"]);
$request = trim($_POST["request"]);
$user_agent = trim($_POST["user_agent"]);
$referer = trim($_POST["referer"]);
$request_uri = trim($_POST["request_uri"]);
$query_string = trim($_POST["query_string"]);
$cookie = trim($_POST["cookie"]);
$accept = trim($_POST["accept"]);
$request_pcre = preg_quote($request, '|');

$legend = array('Selected Row','HTTP_HOST','THE_REQUEST','THE_REQUEST','USER_AGENT','HTTP_REFERER','REQUEST_URI','QUERY_STRING','HTTP_COOKIE','HTTP_ACCEPT');
$result = array($id, $ip, $request, $request_pcre, $user_agent, $referer, $request_uri, $query_string, $cookie, $accept);
$nr = count($legend);

  $re1='((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))(?![\\d])';	

  $v=preg_grep("/".$re1."/is", $result);
?>



<div id="page-wrapper">
<div class="row">
     <div class="col-lg-6">
            <h1 class="page-header">Rule details for white/blacklist (HTTP headers)</h1>
            <h1 class="page-header"><?php echo print_r($v) . "<br>"; ?></h1>
        </div>


    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>Variable</th>			
                <th>Value</th>
                <th>Match Method</th>
                <th>Operation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
            for($i=0; $i<$nr; $i++) { ?>
            <tr>
            <td><?php echo $legend[$i]; ?></td>
            <td><?php echo $result[$i]; ?></td>
            <?php
            $reg = "{" . $legend[$i] . "}";
            $reg = "%" . $reg;
            $str0 = '&quot' . $reg;
            $str = " " . rtrim($str0);
            $str = "expr" . $str;
            $x='<select name="match"><option value="">Select...</option><option value="' . $str . '">String</option><option value="' . $reg . '">Regex</option></select>';
            ?>
            <td><form name="action2" action="ready_rule.php" method="POST"><?php echo $x ?></td> 
            <?php
            $reg1 = "'(" . $result[$i] . ")'";
            $reg2 = "!(" . $result[$i] . ")";
            $reg2 = "'" . $reg2 . "'";
            $str2 = "'" . $result[$i] . "'" . '&quot';
            $str4 = " " . rtrim($str2);
            $str4 = "==" . $str4;
            $str3 = " " . rtrim($str2);
            $str3 = "!=" . $str3;
            $y='<select name="operator"><option value="">Select...</option><option value="' . $str3 . '">Whitelist String</option><option value="' . $reg2 . '">Whitelist Regex</option><option value="' . $str4 . '">Blacklist String</option><option value="' . $reg1 . '">Blacklist Regex</option></select>'; 
            ?>
            <td><?php echo $y ?></td>
            <td><input type="submit" name="action2" value="Submit"></form>
            </td>
            </tr>
            <?php } ?> 

        </tbody>
    </table>


<?php include_once('includes/footer.php'); ?>
