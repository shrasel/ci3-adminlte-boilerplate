<section class="content-header">
  <h1>
    Site Settings
    <small>( Manage your setting for the website )</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=site_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?=site_url('admin/settings')?>">Settings</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-8">
      <div class="box box-info">
        
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo validation_errors(); ?>
        <form class="form-horizontal" data-validate method="POST" name="add_employee" action="<?=site_url('settings/save')?>" validate >
          <div class="box-body">
            
            <div class="form-group">
              <label for="site_title" class="col-sm-4 control-label">Website Title</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['site_title']?>" name="site_title" id="site_title" placeholder="Website Title">
              </div>
            </div>
            <div class="form-group">
              <label for="short_description" class="col-sm-4 control-label">Short Desctiption</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['site_description']?>" name="site_description" id="short_description" placeholder="Website Short Description">
              </div>
            </div>

            <div class="form-group">
              <label for="slogan" class="col-sm-4 control-label">Tagline</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['site_slogan']?>" name="site_slogan" id="slogan" placeholder="Website Tagline">
              </div>
            </div>
            <div class="form-group">
              <label for="meta_keyward" class="col-sm-4 control-label">Meta Keyword</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['site_metakeyward']?>" name="site_metakeyward" id="meta_keyward" placeholder="Meta Keyword">
              </div>
            </div>
            <div class="form-group">
              <label for="meta_description" class="col-sm-4 control-label">Meta Description</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['site_metadescription']?>" name="site_metadescription" id="meta_description" placeholder="Meta Description">
              </div>
            </div>
            <hr>
            <h4 class="text-center">Office Info</h4>
            <div class="form-group">
              <label for="office_address" class="col-sm-4 control-label">Office Address</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['contact_office_address']?>" name="contact_office_address" id="office_address" placeholder="Office Address">
              </div>
            </div>
            <div class="form-group">
              <label for="mobile" class="col-sm-4 control-label">Mobile</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['contact_mobile']?>" name="contact_mobile" id="mobile" placeholder="Mobile">
              </div>
            </div>
            <div class="form-group">
              <label for="phone" class="col-sm-4 control-label">Phone</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['contact_phone']?>" name="contact_phone" id="phone" placeholder="Phone">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Email</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['contact_email']?>" name="contact_email" id="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="lat" class="col-sm-4 control-label">Latitide</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['contact_latitude']?>" name="contact_latitude" id="lat" placeholder="Latitide">
              </div>
            </div>
            <div class="form-group">
              <label for="long" class="col-sm-4 control-label">Longitude</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['contact_longitude']?>" name="contact_longitude" id="long" placeholder="Longitude">
              </div>
            </div>
            <hr>
            <h4 class="text-center">SOCIAL LINKS</h4>
            <div class="form-group">
              <label for="facebook_url" class="col-sm-4 control-label">Facebook URL</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['social_facebook_url']?>" name="social_facebook_url" id="facebook_url" placeholder="Facebook URL">
              </div>
            </div>
            <div class="form-group">
              <label for="twitter_url" class="col-sm-4 control-label">Twitter URL</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['social_twitter_url']?>" name="social_twitter_url" id="twitter_url" placeholder="Twitter URL">
              </div>
            </div>

            <div class="form-group">
              <label for="youtube_url" class="col-sm-4 control-label">Youtube URL</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['social_youtube_url']?>" name="social_youtube_url" id="youtube_url" placeholder="Youtube URL">
              </div>
            </div>

            <div class="form-group">
              <label for="linkedin_url" class="col-sm-4 control-label">Linkedin URL</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['social_linkedin_url']?>" name="social_linkedin_url" id="linkedin_url" placeholder="Linkedin URL">
              </div>
            </div>

            <div class="form-group">
              <label for="google_url" class="col-sm-4 control-label">Google+ URL</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['social_google_url']?>" name="social_google_url" id="google_url" placeholder="Google+ URL">
              </div>
            </div>

            <div class="form-group">
              <label for="vimeo_url" class="col-sm-4 control-label">Vimeo URL</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?=@$settings['social_vimeo_url']?>" name="social_vimeo_url" id="vimeo_url" placeholder="Vimeo URL">
              </div>
            </div>

          </div>
          <div class="box-footer">
            <a href="<?=site_url('admin')?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-success pull-right">SAVE</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
    <div class="col-xs-4">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Help?</h3>
        </div>
        <div class="box-body">
        </div>
      </div>
    </div>
  </div>
</section>