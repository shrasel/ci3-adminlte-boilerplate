<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
<?php if($message):?>
<div id="infoMessage" class="alert alert-error"><?php echo $message;?></div>
<?php endif;?>
<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity,false,array('class'=>'form-control'));?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'), array('class'=>"btn btn-primary btn-block btn-flat"));?></p>

<?php echo form_close();?>
<p> <a href="<?=site_url('login')?>"> << Back to Login</a> </p>
