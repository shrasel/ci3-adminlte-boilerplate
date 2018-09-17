
<section class="content-header">
  <h1>
    My Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">My Profile</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
   
    <!-- /.col -->
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="settings">

            <form class="form-horizontal" action="<?=site_url('update-profile')?>" method="post">
              <div class="form-group">
                <label for="first_name" class="col-sm-4 control-label">First Name</label>

                <div class="col-sm-6">
                <?php echo form_input($first_name,'','class="form-control"');?>
                </div>
              </div>

              <div class="form-group">
                <label for="last_name" class="col-sm-4 control-label">Last Name</label>

                <div class="col-sm-6">
                  <?php echo form_input($last_name,'','class="form-control"');?>
                </div>
              </div>

              <div class="form-group">
                
                <label for="cpmpany" class="col-sm-4 control-label">Company</label>

                <div class="col-sm-6">
                <?php echo form_input($company,'','class="form-control"');?>
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-sm-4 control-label">Phone</label>

                <div class="col-sm-6">
                  <?php echo form_input($phone,'','class="form-control"');?>
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-4 control-label">Email</label>

                <div class="col-sm-6">
                  <?php echo form_input($email,'','class="form-control"');?>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-4 control-label">Password</label>

                <div class="col-sm-6">
                  <?php echo form_input($password,'','class="form-control"');?>
                </div>
              </div>

              <div class="form-group">
                <label for="password_confirm" class="col-sm-4 control-label">Confirm Password</label>

                <div class="col-sm-6">
                  <?php echo form_input($password_confirm,'','class="form-control"');?>
                </div>
              </div>

              <div class="form-group">
                <div for="password" class="col-sm-4 control-label"></div>
                <div class="col-sm-6">
              <?php if ($this->ion_auth->is_admin()): ?>

              <h3><?php echo lang('edit_user_groups_heading');?></h3>
              <?php foreach ($groups as $group):?>
                <label class="checkbox">
                  <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                    if ($gID == $grp->id) {
                      $checked= ' checked="checked"';
                      break;
                    }
                  }
                  ?>
                  <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                  <?php echo htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8');?>
                </label>
              <?php endforeach?>

            <?php endif ?>

            <?php echo form_hidden('id', $user->id);?>
            <?php echo form_hidden($csrf); ?>
            </div>
            </div>

              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-6">
                  
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-6">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>