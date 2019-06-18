<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

//Only super admin is allowed to access this page
if ($_SESSION['admin_type'] !== 'super') {
    // show permission denied message
    echo 'Permission Denied';
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
        $data_to_store = filter_input_array(INPUT_POST);
    $db = getDbInstance();
    //Check whether the rule name already exists ;
    $db->where('rule_name',$data_to_store['rule_name']);
    $db->get('mod_rewrite_rules');

    if($db->count >=1){
        $_SESSION['failure'] = "Such rule name already exists";
        header('location: add_rule.php');
        exit();
    }

    //add rule
     $last_id = $db->insert ('mod_rewrite_rules', $data_to_store);
    if($last_id)
    {

        $_SESSION['success'] = "Rule successfully added!";
        header('location: add_rule.php');
        exit();
    }

}

$edit = false;


require_once 'includes/header.php';
?>
<div id="page-wrapper">
        <div class="row">
                <div class="col-lg-12">
                        <h2 class="page-header">Add Rule</h2>
                </div>
        </div>
         <?php
    include_once('includes/flash_messages.php');
    ?>
        <form class="well form-horizontal" action=" " method="post"  id="contact_form" enctype="multipart/form-data">
                <?php include_once './forms/add_rules_form.php'; ?>
        </form>
</div>




<?php include_once 'includes/footer.php'; ?>
