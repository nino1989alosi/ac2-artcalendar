<?php
return array(
    // Product
    'product' => array(
        'name'        => 'Metronic',
        'description' => 'Metronic - #1 Selling Bootstrap 5 HTML Multi-demo Admin Dashboard Theme',
        'version'     => '8.0.12',
        'preview'     => 'https://preview.keenthemes.com/metronic8',
        'purchase'    => 'https://1.envato.market/EA4JP',
        'demos'       => array(
            'demo1' => array(
                'published' => true,
                'thumbnail' => 'demos/demo1.png',
            ),

            'demo2' => array(
                'published' => false,
                'thumbnail' => 'demos/demo2.png',
            ),

            'demo3' => array(
                'published' => false,
                'thumbnail' => 'demos/demo3.png',
            ),

            'demo4' => array(
                'published' => false,
                'thumbnail' => 'demos/demo4.png',
            ),

            'demo5' => array(
                'published' => false,
                'thumbnail' => 'demos/demo5.png',
            ),

            'demo6' => array(
                'published' => false,
                'thumbnail' => 'demos/demo6.png',
            ),

            'demo7' => array(
                'published' => false,
                'thumbnail' => 'demos/demo7.png',
            ),

            'demo8' => array(
                'published' => false,
                'thumbnail' => 'demos/demo8.png',
            ),

            'demo9' => array(
                'published' => false,
                'thumbnail' => 'demos/demo9.png',
            ),

            'demo10' => array(
                'published' => false,
                'thumbnail' => 'demos/demo10.png',
            ),

            'demo11' => array(
                'published' => false,
                'thumbnail' => 'demos/demo11.png',
            ),

            'demo12' => array(
                'published' => false,
                'thumbnail' => 'demos/demo12.png',
            ),

            'demo13' => array(
                'published' => false,
                'thumbnail' => 'demos/demo13.png',
            ),

            'demo14' => array(
                'published' => false,
                'thumbnail' => 'demos/demo14.png',
            ),

            'demo15' => array(
                'published' => false,
                'thumbnail' => 'demos/demo15.png',
            ),
        ),
    ),

    // Meta
    'meta'    => array(
        'title'       => 'ArtCalendar',
        'description' => 'Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets.',
        'keywords'    => 'Metronic, bootstrap, bootstrap 5, Angular 11, VueJs, React, Laravel, admin themes, web design, figma, web development, ree admin themes, bootstrap admin, bootstrap dashboard',
        'canonical'   => 'https://preview.keenthemes.com/metronic-laravel',
        'site-key'    => '6Lf92jMUAAAAANk8wz68r73rA2uPGr4_e0gn96BL',
    ),

    // Assets
    'assets'  => array(
        'favicon' => 'media/logos/favicon.ico',
        'fonts'   => array(
            'google' => array(
                'Poppins:300,400,500,600,700',
            ),
        ),
        'css'     => array(
            'plugins/global/plugins.bundle.css',
            'css/style.bundle.css',
            'css/app.css',
        ),
        'js'      => array(
            'plugins/global/plugins.bundle.js',
            'js/scripts.bundle.js',
            'js/common.js'

        ),
    ),

    // Layout
    'layout'  => array(
        // Main
        'main'       => array(
            'type'          => 'default', // Set layout type: default|blank|none
            'primary-color' => '#009EF7',
        ),

        // Loader
        'loader'     => array(
            'display' => false,
            'type'    => 'default' // Set default|spinner-message|spinner-logo to hide or show page loader
        ),

        // Header
        'header'     => array(
            'display'   => true, // Display header
            'width'     => 'fluid', // Set header width(fixed|fluid)
            'left'      => 'menu', // Set left part content(menu|page-title)
            'fixed'     => array(
                'desktop'           => true,  // Set fixed header for desktop
                'tablet-and-mobile' => true // Set fixed header for talet & mobile
            ),
            'menu-icon' => 'svg' // Menu icon type(svg|font)
        ),

        // Toolbar
        'toolbar'    => array(
            'display' => true, // Display toolbar
            'width'   => 'fluid', // Set toolbar container width(fluid|fixed)
            'fixed'   => array(
                'desktop'           => true,  // Set fixed header for desktop
                'tablet-and-mobile' => true // Set fixed header for talet & mobile
            ),
            'layout'  => 'toolbar-1', // Set toolbar type
            'layouts' => array(
                'toolbar-1' => array(
                    'height'                   => '55px',
                    'height-tablet-and-mobile' => '55px',
                ),
                'toolbar-2' => array(
                    'height'                   => '75px',
                    'height-tablet-and-mobile' => '65px',
                ),
                'toolbar-3' => array(
                    'height'                   => '55px',
                    'height-tablet-and-mobile' => '55px',
                ),
                'toolbar-4' => array(
                    'height'                   => '65px',
                    'height-tablet-and-mobile' => '65px',
                ),
                'toolbar-5' => array(
                    'height'                   => '75px',
                    'height-tablet-and-mobile' => '65px',
                ),
            ),
        ),

        // Page title
        'page-title' => array(
            'display'               => true, // Display page title
            'breadcrumb'            => true, // Display breadcrumb
            'description'           => false, // Display description
            'layout'                => 'default', // Set layout(default|select)
            'direction'             => 'row', // Flex direction(column|row))
            'responsive'            => true, // Move page title to cotnent on mobile mode
            'responsive-breakpoint' => 'lg', // Responsive breakpoint value(e.g: md, lg, or 300px)
            'responsive-target'     => '#kt_toolbar_container' // Responsive target selector
        ),

        // Aside
        'aside'      => array(
            'display'   => true, // Display aside
            'theme'     => 'dark', // Set aside theme(dark|light)
            'menu'      => 'main', // Set aside menu(main|documentation)
            'fixed'     => true,  // Enable aside fixed mode
            'minimized' => false, // Set aside minimized by default
            'minimize'  => true, // Allow aside minimize toggle
            'hoverable' => true, // Allow aside hovering when minimized
            'menu-icon' => 'svg' // Menu icon type(svg|font)
        ),

        // Content
        'content'    => array(
            'width'  => 'fixed', // Set content width(fixed|fluid)
            'layout' => 'default'  // Set content layout(default|documentation)
        ),

        // Footer
        'footer'     => array(
            'width' => 'fluid' // Set fixed|fluid to change width type
        ),

        // Scrolltop
        'scrolltop'  => array(
            'display' => true // Display scrolltop
        ),
    ),
);
