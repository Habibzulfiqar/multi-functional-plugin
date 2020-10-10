<?php
/**
* @package IqraFchaudhry
*
*/
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class TestimonialController extends BaseController
{
	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'testimonial_manager' ) ) return;
		$this->settings = new SettingsApi();

       $this->callbacks = new AdminCallbacks();

       $this->setSubpages();

 	}
	 
	public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'habib_plugin',
                'page_title' => 'testimonial Controller',
                'menu_title' => 'testimonial Controller', 
                'capability' => 'manage_options', 
                'menu_slug' => 'habib_testimonial', 
                'callback' => array( $this->callbacks, 'adminTestimonial' )
            )
           );
    }
}