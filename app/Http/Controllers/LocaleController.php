<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function langage(String $locale){
        
        $locale = in_array($locale, config('app.locales')) ? $locale : 'fr';
        session(['locales'=>$locale]);
        return back();
    }
}
