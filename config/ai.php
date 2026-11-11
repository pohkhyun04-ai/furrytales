<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Python runtime for the pet image classifier
    |--------------------------------------------------------------------------
    |
    | On Windows, install the pinned requirements with Python 3.11 and keep
    | PYTHON_BINARY=py with PYTHON_ARGS="-3.11 -I". On other environments, point
    | PYTHON_BINARY at the virtual-environment interpreter and clear args.
    |
    */

    'python_binary' => env('PYTHON_BINARY', 'py'),
    'python_args' => env('PYTHON_ARGS', '-3.11 -I'),
];
