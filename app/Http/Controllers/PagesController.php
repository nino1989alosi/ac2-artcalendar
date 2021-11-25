<?php

namespace App\Http\Controllers;

use App\Core\Adapters\Theme;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Theme $theme)
    {
        // Get view file location from menu config
        $view = $theme->getOption('page', 'view');

        // Check if the page view file exist
        if (view()->exists('pages.'.$view)) {
            return view('pages.'.$view);
        }

        // Get the default inner page
        return view('inner');
    }
}
