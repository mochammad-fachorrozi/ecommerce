<?php

namespace App\Http\Controllers;
use Browser;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        // Determine the user's device type is simple as this:
        Browser::isMobile();
        Browser::isTablet();
        Browser::isDesktop();

        // Every wondered if it is a bot who loading Your page?
        if (Browser::isBot()) {
            echo 'No need to wonder anymore!';
        }

        // Check for common vendors.
        if (Browser::isFirefox() || Browser::isOpera() || Browser::isChrome()) {
            $response .= '<script src="firefox-fix.js"></script>';
            // console.log('a');
        }

        // Sometime You may want to serve different content based on the OS.
        if (Browser::isAndroid()) {
            $response .= '<a>Install our Android App!</a>';
        } elseif (Browser::isMac() && Browser::isMobile()) {
            $response .= '<a>Install our iOS App!</a>';
        }

        return view('browser');
    }

    // public function category()
    // {
    //     return view('admin.category.index');
         
    // }
}
