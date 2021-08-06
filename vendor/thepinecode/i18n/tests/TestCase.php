<?php

namespace Pine\I18n\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Pine\I18n\Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->app['translator']->addNamespace('i18n', __DIR__.'/lang');

        View::addNamespace('i18n', __DIR__.'/views');

        Route::get('/i18n/{view}', function ($view) {
            return view("i18n::{$view}");
        });
    }
}
