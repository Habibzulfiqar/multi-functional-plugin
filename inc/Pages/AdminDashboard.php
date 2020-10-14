<?php
/**
* @package IqraFchaudhry
*
*/
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;


class AdminDashboard extends BaseController
{
	public $settings;

    public $callbacks;
    public $callbacks_mngr;

    public $pages = array();

    // public $subpages = array();

	public function register(){

       $this->settings = new SettingsApi();
       $this->callbacks = new AdminCallbacks();
       $this->callbacks_mngr = new ManagerCallbacks();
       $this->setPages();
       // $this->setSubpages();
       $this->setSettings();
       $this->setSections();
       $this->setFields();
       // $this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages( $this->subpages )->register();
       $this->settings->addPages( $this->pages )->withSubPage('Dashboard')->register();

     }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Aoa', 
                'menu_title' => 'subhanallah', 
                'capability' => 'manage_options', 
                'menu_slug' => 'habib_plugin', 
                'callback' => array( $this->callbacks, 'adminDashboard' ), 
                'icon_url' => 'dashicons-store', 
                'position' => 110
            ));
    }

    // public function setSubpages()
    // {
    //     $this->subpages = array(
    //         array(
    //             'parent_slug' => 'habib_plugin',
    //             'page_title' => 'Custom Post Type',
    //             'menu_title' => 'CPT', 
    //             'capability' => 'manage_options', 
    //             'menu_slug' => 'habib_cpt', 
    //             'callback' => array( $this->callbacks, 'adminCpt' )
    //         ),
    //         array(
    //             'parent_slug' => 'habib_plugin',
    //             'page_title' => 'Custom Taxonomies',
    //             'menu_title' => 'Taxonomies', 
    //             'capability' => 'manage_options', 
    //             'menu_slug' => 'habib_taxonomies', 
    //             'callback' => array( $this->callbacks, 'adminTaxonomy' )
    //         ),
    //         array(
    //             'parent_slug' => 'habib_plugin',
    //             'page_title' => 'Custom Widgets',
    //             'menu_title' => 'Widgets', 
    //             'capability' => 'manage_options', 
    //             'menu_slug' => 'habib_widgets', 
    //             'callback' =>  array( $this->callbacks, 'adminWidget' )
    //         )
    //     );
    // }
     public function setSettings()
    {
        $args = array(
            array(
                    'option_group'=>'iqra_plugin_group',
                    'option_name'=>'habib_plugin',
                    'callback'=>array($this->callbacks_mngr,'checkboxSanitize')
                )
    );
        
         
        $this->settings->setSettings( $args );
    }
    public function setSections()

    {
        $args = array(
            array(
                'id'=>'iqra_admin_index',
                'title'=>'My Settings',
                'callback'=> array($this->callbacks_mngr,'adminSectionManager'),
                'page'=>'habib_plugin'
            )
        );
        $this->settings->setSections( $args );
    }
    public function setFields()
    {
        $args = array();
        foreach ($this->managers as $key => $value) {
            $args[] = array(
                 'id'=> $key,
                'title'=> $value,
                'callback'=>array($this->callbacks_mngr,'checkboxField'),
                'page'=>'habib_plugin',
                'section'=>'iqra_admin_index',
                'args'=>array(
                    'option_name'=>'habib_plugin',
                    'label_for'=> $key,
                    'class'=>'ui-toggle'
                )
            );
        }
         
        $this->settings->setFields( $args );
    }
    
}

