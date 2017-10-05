<?php namespace Liip\Jazz\Console;

use Cms\Classes\Theme;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Twig;
use File;

class ThemeCommand extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'liip:theme';

    protected $signature = "liip:theme {name?}";

    /**
     * @var string The console command description.
     */
    protected $description = 'scaffold a new theme and activate it.';

    /**
     * Execute the console command.
     * @return void
     */
    public function fire()
    {
        $name = $this->argument('name');
        $name = $name ? $name : basename(base_path()) . '-theme';
        $path = themes_path($name);
        $themeFile = plugins_path('liip/jazz/template/theme.yaml');
        $composerJson = plugins_path('liip/jazz/template/composer.json');
        $readme = plugins_path('liip/jazz/template/README.md');

        File::makeDirectory($path);
        File::makeDirectory($path . '/assets');
        File::makeDirectory($path . '/content');
        File::makeDirectory($path . '/layouts');
        File::makeDirectory($path . '/pages');
        File::makeDirectory($path . '/partials');

        $data = ['name' => $name];
        File::put($path . '/theme.yaml', Twig::parse(File::get($themeFile), $data));
        File::put($path . '/composer.json', Twig::parse(File::get($composerJson), $data));
        File::put($path . '/README.md', Twig::parse(File::get($readme), $data));

        Theme::setActiveTheme($name);
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
