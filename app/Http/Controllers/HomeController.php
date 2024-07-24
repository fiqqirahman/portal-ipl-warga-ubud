<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    private static string $title = 'Dashboard';

    static function breadcrumb()
    {
        return [
            self::$title, route('index')
        ];
    }

    public function index()
    {
        return view('dashboard', [
			'title' => self::$title,
	        'breadcrumbs' => [
		        self::breadcrumb()
	        ],
        ]);
    }
}
