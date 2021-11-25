<?php

namespace App\Http\Controllers\Documentation;

use App\Core\Adapters\Theme;
use App\Http\Controllers\Controller;

class References extends Controller
{
    /**
     * Reference page for documentation
     *
     * @param  Theme  $theme
     *
     * @return \Illuminate\Contracts\View\View
     * @throws \JsonException
     */
    public function index(Theme $theme)
    {
        // Get list of Composer packages
        $composer = $theme->getComposerPackages();

        // Get list of NPM packages
        $npm = $theme->getNpmPackages();

        return view('pages.'.$theme->getOption('page', 'view'), compact('composer', 'npm'));
    }
}
