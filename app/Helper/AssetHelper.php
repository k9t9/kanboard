<?php

namespace Kanboard\Helper;

use Kanboard\Core\Base;

/**
 * Asset Helper
 *
 * @package helper
 * @author  Frederic Guillot
 */
class AssetHelper extends Base
{
    /**
     * Add a Javascript asset
     *
     * @param  string $filename Filename
     * @param  bool   $async
     * @return string
     */
    public function js($filename, $async = false)
    {
        return '<script '.($async ? 'async' : '').' type="text/javascript" src="'.$this->helper->url->dir().$filename.'?'.filemtime($filename).'"></script>';
    }

    /**
     * Add a stylesheet asset
     *
     * @param  string   $filename   Filename
     * @param  boolean  $is_file    Add file timestamp
     * @param  string   $media      Media
     * @return string
     */
    public function css($filename, $is_file = true, $media = 'screen')
    {
        return '<link rel="stylesheet" href="'.$this->helper->url->dir().$filename.($is_file ? '?'.filemtime($filename) : '').'" media="'.$media.'">';
    }

    /**
     * Get custom css
     *
     * @access public
     * @return string
     */
    public function customCss()
    {
        if ($this->configModel->get('application_stylesheet')) {
            return '<style>'.$this->configModel->get('application_stylesheet').'</style>';
        }

        return '';
    }

    /**
     * Get CSS for task colors
     *
     * @access public
     * @return string
     */
    public function colorCss()
    {
        return '<style>'.$this->colorModel->getCss().'</style>';
    }
}
