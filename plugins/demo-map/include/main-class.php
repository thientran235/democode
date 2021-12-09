<?php

// Block direct access to file
defined( 'ABSPATH' ) or die( 'Not Authorized!' );

class Demo_Map_Class {
    private $settings;

    public function __construct() {

        // Plugin uninstall hook
        register_uninstall_hook( WPS_FILE, array('Demo_Map_Class', 'plugin_uninstall') );

        // Plugin activation/deactivation hooks
        register_activation_hook( WPS_FILE, array($this, 'plugin_activate') );
        register_deactivation_hook( WPS_FILE, array($this, 'plugin_deactivate') );

        // Plugin Actions
        add_action( 'plugins_loaded', array($this, 'plugin_init') );
        add_action( 'wp_enqueue_scripts', array($this, 'plugin_enqueue_scripts') );
        add_action( 'admin_enqueue_scripts', array($this, 'plugin_enqueue_admin_scripts') );
        add_shortcode( "demo-map", array($this, 'map_shortcode') );

        require_once WPS_DIRECTORY_PATH . 'include/setting-api-class.php';

        $settings = new WV_Settings_API( "Demo Map", "demo-map", WPS_FILE );

    }

    public static function plugin_uninstall() { }

    /**
     * Plugin activation function
     * called when the plugin is activated
     * @method plugin_activate
     */
    public function plugin_activate() { }

    /**
     * Plugin deactivate function
     * is called during plugin deactivation
     * @method plugin_deactivate
     */
    public function plugin_deactivate() { }

    /**
     * Plugin init function
     * init the polugin textDomain
     * @method plugin_init
     */
    public function plugin_init() {
        // before all load plugin text domain
        load_plugin_textDomain( WPS_TEXT_DOMAIN, false, dirname(WPS_DIRECTORY_BASENAME) . '/languages' );
    }

    /**
     * Enqueue the main Plugin admin scripts and styles
     * @method plugin_enqueue_scripts
     */
    function plugin_enqueue_admin_scripts() {
        wp_register_style( 'wps-admin-style', WPS_DIRECTORY_URL . '/assets/dist/css/admin-style.css', array(), null );
        wp_register_script( 'wps-admin-script', WPS_DIRECTORY_URL . '/assets/dist/js/admin-script.min.js', array(), null, true );
        wp_enqueue_script('jquery');
        wp_enqueue_style('wps-admin-style');
        wp_enqueue_script('wps-admin-script');
    }

    /**
     * Enqueue the main Plugin user scripts and styles
     * @method plugin_enqueue_scripts
     */
    function plugin_enqueue_scripts() {
        wp_register_style( 'wps-user-style', WPS_DIRECTORY_URL . '/assets/dist/css/user-style.css', array(), null );
        wp_register_script( 'wps-user-script', WPS_DIRECTORY_URL . '/assets/dist/js/user-script.min.js', array(), null, true );
        wp_enqueue_script('jquery');
        wp_enqueue_style('wps-user-style');
        wp_enqueue_script('wps-user-script');
    }

    function map_shortcode($atts, $content = null, $tag) {
        extract(shortcode_atts(array(
            'class' => '',
        ), $atts));

        $option = get_option( 'demo-map' );
        ob_start();
        if (empty($option) || empty($option['map_url']))
            return;
        ?>
        <iframe src="<?php echo $option['map_url'];?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <?php
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

}

new Demo_Map_Class;
