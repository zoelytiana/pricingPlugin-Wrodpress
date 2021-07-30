<?php
/**
 * Plugin Name: My Awesome Plugin
 */

define('MY_AWESOME_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ));

class MyAwesomeClass
{
    public $pluginTitle = 'My Awesome Plugin';
    public $pluginSlug = 'my-awesome-plugin-settings';
    public $pluginIdentifier = 'my-awesome-plugin';


    public function __construct()
    {
        add_action( 'admin_menu', [ $this, 'admin_awesome_plugin_menu'] );
        add_action( 'plugins_loaded', [$this, 'load_plugin_text_domain'] );
    }

    /**
     * Add Plugin Menu page
     */
    public function admin_awesome_plugin_menu()
    {
        add_menu_page(
            __($this->pluginTitle, 'my-awesome-plugin'), // Page title
            __($this->pluginTitle, 'my-awesome-plugin'), // Menu title
            'manage_options',  // Capability
            $this->pluginSlug, // Slug
            [&$this, 'load_awesome_plugin_page'] // Callback page function
        );
    }

    /**
     * Include admin page file
     */
    public function load_awesome_plugin_page()
    {
        require_once MY_AWESOME_PLUGIN_DIR_PATH . 'views/page.php';
    }

    /**
     * Load text domain
     */
    public function load_plugin_text_domain()
    {
        load_plugin_textdomain( $this->pluginIdentifier, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }
}

new MyAwesomeClass();