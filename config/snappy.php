<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => env('WKHTMLTOPDF_BIN_DIR') . '/wkhtmltopdf',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => env('WKHTMLTOPDF_BIN_DIR') . '/wkhtmltoimage',
        'timeout' => false,
        'options' => array(
            'dpi' => 144,
            'print-media-type' => true,
        ),
        'env'     => array(),
    ),


);
