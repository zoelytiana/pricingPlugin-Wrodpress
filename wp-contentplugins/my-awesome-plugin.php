<?php
/**
 * Plugin Name: Linky 
 * Plugin URI: https://www.undefined.fr  
 * Description: Create & manage link’s hub for your  social profile directly in your websites  
 * Version: 1.0.7  
 * Author Name: Nicolas RIVIERE (hello@undefined.fr)  
 * Author: Nicolas RIVIERE (Undefined)  
 * Domain Path: /languages  
 * Text Domain: linky 
 * Author URI: https://www.undefined.fr/#about
 */

class MyAwesomeClass 
{
    public function __construct()
    {
        // Your code here
        add_action( 'admin_menu', [ $this, 'admin_awesome_plugin_menu'] );
    }

    public function admin_awesome_plugin_menu()
{
        add_menu_page(
	    __('My Awesome Plugin', 'my-awesome-plugin'), // Page title
	    __('My Awesome Plugin', 'my-awesome-plugin'), // Menu title
	    'manage_options',  // Capability
	    'my-awesome-plugin', // Slug
	    [ &$this, 'load_awesome_plugin_page'], // Callback page function
	);
}

public function load_awesome_plugin_page() 
{ 
        echo '<h1>' . __( 'My Awesome Plugin', 'my-awesome-plugin' ) . '</h1>'; 
        echo '<p>' . __( 'Welcome to My Awesome Plugin', 'my-awesome-plugin' ) . '</p>'; 
}

}

new MyAwesomeClass();
