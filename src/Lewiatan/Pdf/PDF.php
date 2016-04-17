<?php namespace Lewiatan\Pdf;


use Illuminate\Support\Facades\Facade;

class PDF extends Facade {
    protected static function getFacadeAccessor() {
        return 'pdf';
    }
}