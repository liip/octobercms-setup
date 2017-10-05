<?php namespace Liip\Jazz;

use Backend;
use Liip\Jazz\Console\InitCommand;
use Liip\Jazz\Console\ThemeCommand;
use System\Classes\PluginBase;

/**
 * jazz Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'jazz',
            'description' => 'basic octobercms extension from team jazz with ♥',
            'author'      => 'liip',
            'icon'        => 'icon-heart'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        $this->registerConsoleCommand('theme', ThemeCommand::class);
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
    }
}
