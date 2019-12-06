<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestResponse;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';
        TestResponse::macro('assertResource', function ($resource) {
            $this->assertJson($resource->response()->getData(true));
            return $this;
        });
        TestResponse::macro('assertCollection', function ($collection) {
            $collection->map(function ($resource) {
                $this->assertJson($resource->response()->getData(true));
            });
            return $this;
        });

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
