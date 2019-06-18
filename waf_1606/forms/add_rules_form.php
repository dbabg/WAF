<fieldset>
    <!-- Form Name -->
    <legend>Add new rule</legend>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">Rule name</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-settings"></i></span>
                <input  type="text" name="rule_name" autocomplete="off" placeholder="rule name" class="form-control" value="<?php echo ($edit) ? $add_rule['rule_name'] : ''; ?>" autocomplete="off">
            </div>
        </div>
    </div>
	<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">Type</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-settings"></i></span>
                <input  type="text" name="type" autocomplete="off" placeholder="type" class="form-control" value="<?php echo ($edit) ? $add_rule['type'] : ''; ?>" autocomplete="off">
            </div>
        </div>
    </div>
	    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">RewriteCond</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-settings"></i></span>
                <input  type="text" size="150" name="RewriteCond" autocomplete="off" placeholder="RewriteCond" class="form-control" value="<?php echo ($edit) ? $add_rule['RewriteCond'] : ''; ?>" autocomplete="off">
            </div>
        </div>
    </div>
	    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">RewriteRule</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-settings"></i></span>
                <input  type="text" size="150" name="RewriteRule" autocomplete="off" placeholder="RewriteRule" class="form-control" value="<?php echo ($edit) ? $add_rule['RewriteRule'] : ''; ?>" autocomplete="off">
            </div>
        </div>
    </div>
    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
            <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
        </div>
    </div>
