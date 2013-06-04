<?php

/**
 *  Switch plugin
 *
 *  @package Monstra
 *  @subpackage Plugins
 *  @author Moncho Varela / Nakome
 *  @copyright 2013-2014 Moncho Varela / Nakome
 *  @version 1.0.0
 *
 */

// Register plugin
Plugin::register( __FILE__,
                __('Switch', 'switch'),
                __('Switch themes on frontend', 'switch'),
                '1.0.0',
                'Nakome',
                'http://nakome.com/',
                'switch');

// Load switch Admin for Editor and Admin
if (Session::exists('user_role') && in_array(Session::get('user_role'), array('admin', 'editor'))) {
    Plugin::admin('switch');
}

//switch class
class SwitchTheme extends Frontend {

    // Get all themes
    public static function getSiteThemes(){
        $themes_folders = array();
        $_themes_folders = Dir::scan(THEMES_SITE);
        foreach($_themes_folders as $folder) if (File::exists(THEMES_SITE . DS . $folder . DS . 'index.template.php')) $__themes_folders[] = $folder;
        foreach($__themes_folders as $theme) $themes[$theme] = $theme;
        return $themes;
    }

    // Add selector
    public static function selThemes(){

        $themes_site    = SwitchTheme::getSiteThemes();
        $thistheme      = Option::get('theme_site_name');
        $getThemes      = Request::get('th');

        // Save site theme
        if (isset($getThemes)){
            if($getThemes == Request::get('th')){
                Option::update('theme_site_name',$getThemes);
                // Cleanup minify
                if (count($files = File::scan(MINIFY, array('css', 'js', 'php'))) > 0)
                    foreach ($files as $file)File::delete(MINIFY . DS . $file);
                Request::redirect(Page::url());
            }
        }

        return View::factory('switch/selector')
        ->assign('themes_site',$themes_site)
        ->assign('thistheme',$thistheme)
        ->assign('getThemes',$getThemes)
        ->display();
    }
}
