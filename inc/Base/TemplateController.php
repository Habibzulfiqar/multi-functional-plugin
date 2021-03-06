<?php
/**
* @package IqraFchaudhry
*
*/
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class TemplateController extends BaseController
{
	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'templates_manager' ) ) return;
		$this->settings = new SettingsApi();

       $this->callbacks = new AdminCallbacks();

       $this->setSubpages();

       $this->settings->addSubpages( $this->subpages )->register();


 	}
	 
	public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'habib_plugin',
                'page_title' => 'template Controller',
                'menu_title' => 'template Controller', 
                'capability' => 'manage_options', 
                'menu_slug' => 'habib_template', 
                'callback' => array( $this->callbacks, 'adminTemplates' )
            )
           );
    }
}