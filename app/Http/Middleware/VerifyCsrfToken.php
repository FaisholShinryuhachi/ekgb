<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://localhost:8000/ekgb/post',
        'http://localhost:8000/api/user/post',
        'http://localhost:8000/api/user/edit',
        'http://localhost:8000/api/ekgb/post',
        'http://localhost:8000/api/ekgb/edit',
        'http://localhost:8000/api/pegawai/file',
    ];
}
