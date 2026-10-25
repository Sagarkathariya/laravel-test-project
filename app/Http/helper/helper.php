<?php

if (!function_exists('p')) {
    function p(mixed $data): void
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
