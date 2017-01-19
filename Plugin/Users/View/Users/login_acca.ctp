<?php /*
echo $this->Form->create();
$options = array('Staff', 'Student', 'Registered Applicant');
echo $this->Form->input('type', array(
    'label' => '<span style="white-space: nowrap;position:relative;top:26px;">Sign In As:</span>',
    'options' => $options,
    'between' => '<div class="col-md-12">',
));
echo $this->Form->input('username', array(
    'label' => '',
    'placeholder' => 'Username',
    'between' => '<div class="col-md-12">',
    'tooltip' => 'Type your username here',
));
?>
<?php
echo $this->Form->input('password', array(
    'label' => '',
    'placeholder' => 'Password',
    'tooltip' => 'Type your password here',
    'between' => '<div class="col-md-12">',
));
?>
<a href="#" class="btn btn-info" data-toggle="tooltip" data-placement="auto" title="Sign up to become new applicants">Signup  <i class="fa fa-fw fa-pencil"></i></a>
&nbsp;
<?php echo $this->Form->button('Login <i class="fa fa-fw fa-unlock-alt"></i>', array('type' => 'submit', "class" => "btn btn-primary")); ?>


<a href="#" class="forgot-password">Forgot password?</a>
<?php echo $this->Form->end(); ?>
*/?>
<?php

  $url = $this->here;

  $selectedApplicant = $selectedUser = $selectedStudent = '';
  
 if (strpos($url,'acca/login') !== false)
    $selectedApplicant =  'selected';


 
?>
<div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php echo $this->Form->create();?>
        <div class="form-group has-feedback">
          <select name='data[Role][id]' class="form-control">
            <option value='<?= Role::Staff?>' <?= $selectedUser ?> >Staff</option>
            <option value='<?= Role::AccaApplicant?>' <?= $selectedApplicant ?> >Applicant</option>
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
        <?php echo $this->Form->end();?>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="<?php echo Router::url('/pro/sign_up');?>" class="btn btn-block btn-social btn-facebook btn-flat" style='text-align:center;padding-left:0px;'>
            <!-- <i class="fa fa-facebook"></i> -->
             Register as new applicant
           </a>
<!--           <a href="<?php echo Router::url('/applicants/welcome');?>" class="btn btn-block btn-social btn-success btn-flat" style='text-align:center;padding-left:0px;'>
            <!-- <i class="fa fa-facebook"></i> -->
             <!-- Register as returning student -->
           <!-- </a> --> 
          <a href="<?php echo Router::url('/applicants/forgot_password');?>" class="btn btn-block btn-social btn-google btn-flat colorBoxIframe"  style='text-align:center;padding-left:0px;'>
            <!-- <i class="fa fa-google-plus"></i> -->
           Forgot my password
          </a><br>
          <p><a href="http://unieccampusv2.unitar.my/uploads/documents/online_app_manual.pdf" target="_blank">How to apply ? </a></p>
        </div><!-- /.social-auth-links -->
      </div><!-- /.login-box-body -->

<?php $this->Js->buffer('$(".box button[data-widget=\"remove\"]").each(function(k,v){var self = this;setTimeout(function(){self.click();},5000);});');?>
