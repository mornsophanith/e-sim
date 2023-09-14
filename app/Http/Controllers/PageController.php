<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;

class PageController extends Controller
{
    public function contact() {
        return view('pages.contact');
    }

    public function about() {
        return view('pages.about');
    }

    public function supportList() {
        $page = Page::where('slug', 'esim-support-list')->first();
        if ($page == null) {
            $page = new Page();
        }

        return view('pages.eSim-support-list', ['page' => $page]);
    }
    public function setupEsim() {
        return view('pages.setup-esim');
    }
}
