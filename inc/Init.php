<?php
/**
* @package IqraFchaudhry
*
*/
namespace Inc;

final class Init
{

/**
* store all the classes inside an array
*@return array Full lists of classes
*/

    public static function get_services()
    {
      
        return [ 
            Pages\AdminDashboard::class,
            Base\Enqueue::class,
            Base\settinglinks::class,
            Base\CustomPostTypeController::class,
            Base\CustomTaxonomyController::class,
            Base\WidgetController::class,
            Base\GalleryController::class,
            Base\TestimonialController::class,
            Base\TemplateController::class,
            Base\AuthController::class,
            Base\MembershipController::class,
            Base\ChatController::class,

        ];
    }

/**
* loop through the classes,instentiate them
* and call the register methd if exists
*@return 
*/
    public static function  register_services(){

        foreach (self::get_services() as $class) {
            
            $service = self::instantiate( $class );
            if (method_exists($service, 'register')) {

                $service->register();
            }

        }
    }
/**
* initilize the class
*@param class $class class form the service array
*@return class instance new instance of the class
*/
    private static function instantiate( $class )
    {

        $service = new $class();

        return $service;
    }
}

 