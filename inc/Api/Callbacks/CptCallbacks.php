<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Api\Callbacks;

class CptCallbacks
{

	public function cptSectionManager()
	{
		echo 'Create as many Custom Post Types as you want.';
	}

	public function cptSanitize( $input )
	{
		
		$output= get_option( 'habib_plugin_cpt' );

		if ( isset($_POST["remove"]) ) {

			// echo '<pre>';
			// var_dump($_POST);
			// echo '</pre>';
			// die(); 

			unset($output[$_POST["remove"]]);

			return $output;
		}

		 if(empty($output)){

		 $output = array( $input['post_type'] => $input );
		 
 		 } else
		  {	
		 

    	foreach ($output as $key => $value) {

			if ($input['post_type'] === $key) {

				// echo $input['post_type'] . $key;
				// die();
				
				$output[$key] = $input;
			}else{
				$output[$input['post_type']]= $input;
			}    
    }
}
 		// var_dump($output);
		 //  die(); 

		return $output;
	}

	public function textField( $args )
	{
		$name = $args['label_for'];
		$option_name = $args['option_name'];
		$input = '';
		$disabled= '';
		if (isset($_POST["edit_post"])) {

			$input = get_option( $option_name );
			$value = $input[$_POST["edit_post"]][$name]; 
		}
 
		echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="'.$value.'" placeholder="' . $args['placeholder'] . '">';
	}

	public function checkboxField( $args )
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$checked = false;
 		if (isset($_POST["edit_post"])) {

			$checkbox = get_option( $option_name );
			$checked = isset($checkbox[$_POST["edit_post"]][$name]) ?: false;
		}
 
		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ( $checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
	}
}