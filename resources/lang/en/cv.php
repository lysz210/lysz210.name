<?php
use Illuminate\Support\Facades\Storage;

$lang = Storage::disk(basename(__DIR__));
$cv = collect($lang->files('cv'))
    ->mapWithKeys(function ($file) {
        return [
            basename($file, '.php') => require($file)
        ];
    });
return $cv;
