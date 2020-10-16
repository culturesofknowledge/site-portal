<?php
/**
 * ProjectGuide
 * 
 * @copyright Copyright 2019 Eric C. Weig 
 * @license http://opensource.org/licenses/MIT MIT
 */

/**
 * The ProjectGuide plugin.
 * 
 * @package Omeka\Plugins\ProjectGuide
 */
 
     // Define Constants

     define('DEFAULT_PROJECT_LINK', 'https://someurl.net/doc.pdf');
     define('DEFAULT_PROJECT_LINK_LABEL', 'Project Guide');

    class ProjectGuidePlugin extends Omeka_Plugin_AbstractPlugin
    {
    
    // Define Hooks

    protected $_hooks = array(
        'install',
        'uninstall',
        'admin_items_show_sidebar',
        'admin_dashboard',
	'define_routes',
	'config',
        'config_form'
	);

    public function hookInstall()
    {
        set_option('default_project_link', DEFAULT_PROJECT_LINK); 
        set_option('default_project_link_label', DEFAULT_PROJECT_LINK_LABEL);       
    }
    
    public function hookUninstall()
    {
        delete_option('default_project_link');   
        delete_option('default_project_link_label');   
    }
	
    function hookDefineRoutes($args)
    {
        $router = $args['router'];
    }
    
    public function hookConfigForm() 
    {
        include 'config_form.php';
    }
    
    public function hookConfig($args)
    {
        $post = $args['post'];
        set_option('default_project_link',$post['project_link']);
        set_option('default_project_link_label',$post['project_link_label']);
    }

    public function hookAdminItemsShowSidebar($args)
    {
        $glink = get_option('default_project_link');
        $glink_label = get_option('default_project_link_label');
        echo "<div class=\"info panel\"><h4>Project Guide<h4><div><p><a href=\"$glink\" target=\"_blank\">$glink_label</a></p></div></div>";
    }

    public function hookAdminDashboard($args)
    {
        $glink = get_option('default_project_link');
        $glink_label = get_option('default_project_link_label');
        echo "<div class=\"info panel\"><div><h2>Project Guide</h2><p><h4><a href=\"$glink\" target=\"_blank\">$glink_label</a></h4></p></div></div>";
    }

}
