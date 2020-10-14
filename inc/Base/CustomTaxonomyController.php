<?php
/**
* @package IqraFchaudhry
*
*/
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class CustomTaxonomyController extends BaseController
{
	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'taxonomy_manager' ) ) return;
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
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies', 
                'capability' => 'manage_options', 
                'menu_slug' => 'habib_taxonomies', 
                'callback' => array( $this->callbacks, 'adminTaxonomy' )
            )
           );
    }
}