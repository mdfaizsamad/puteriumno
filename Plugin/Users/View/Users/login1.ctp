<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php echo $this->Form->create(); ?>
    <div class="form-group has-feedback">
        <select name='data[Role][id]' class="form-control">
            <option value='<?= Role::Staff ?>'>Staff</option>
            <option value='<?= Role::Student ?>' selected>Student</option>
        </select>
        <span class="glyphicon glyphicon-education form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input name='data[User][username]' class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input name='data[User][password]' type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox"> Remember Me
                </label>
            </div>
        </div><!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div><!-- /.col -->
    </div>
    <?php echo $this->Form->end(); ?>
</div><!-- /.login-box-body -->
<?php $this->Js->buffer('$(".box button[data-widget=\"remove\"]").each(function(k,v){var self = this;setTimeout(function(){self.click();},5000);});'); ?>
