<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_site_settings_table extends CI_Migration {

	public function up()
	{
		
		$this->dbforge->drop_table('site_settings', TRUE);

		
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'int',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'key' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'value' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('site_settings');
		$this->insert_settings_default_data();

	}

	public function down()
	{
		$this->dbforge->drop_table('site_settings', TRUE);
	}

	public function insert_settings_default_data()
	{
		// Dumping data for table 'users'
		$data = array(
			array(
				'key' => 'site_title',
				'value'=>'Website Title'
			),
			array(
				'key' => 'site_description',
				'value'=>'Write Website Description here'
			),
			array(
				'key' => 'site_metakeyward',
				'value'=>'meta, keyword, for, the, website'
			),
			array(
				'key' => 'site_metadescription',
				'value'=>'Meta description for the description'
			),
			array(
				'key' => 'site_logo',
				'value'=>'mywebsite-logo.png'
			),
			array(
				'key' => 'contact_office_address',
				'value'=>'Office Address'
			),
			array(
				'key' => 'contact_phone',
				'value'=>'+88017'
			),
			array(
				'key' => 'contact_mobile',
				'value'=>'+880892'
			),
			array(
				'key' => 'contact_email',
				'value'=>'info@yourwebsite.com'
			),
			array(
				'key' => 'contact_longitude',
				'value'=>'90.1111'
			),
			array(
				'key' => 'contact_latitude',
				'value'=>'27.1222'
			),
			array(
				'key' => 'social_facebook_url',
				'value'=>'http://facebook.com/yourpage'
			),
			array(
				'key' => 'social_twitter_url',
				'value'=>'http://twitter.com'
			),
			array(
				'key' => 'social_youtube_url',
				'value'=>'http://youtube.com'
			),
			array(
				'key' => 'social_linkedin_url',
				'value'=>'http://linkedin.com'
			),
			array(
				'key' => 'social_google_url',
				'value'=>'http://google.com'
			)
		);

		$this->db->insert_batch('site_settings', $data);
		
	}
}
