<?php

namespace App\Faker;

use Faker\Provider\Base;

class CustomProvider extends Base
{
    public function customMethod()
    {
        return 'custom value';
    }
}
