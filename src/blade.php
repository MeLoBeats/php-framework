<?php

namespace Src;

use eftec\bladeone\BladeOne;

class Blade
{
    public static function render()
    {
        $views = __DIR__ . '/../views';
        $compiledFolder = __DIR__ . '/../cache';
        $blade = new BladeOne($views, $compiledFolder, BladeOne::MODE_DEBUG);
        return $blade;
    }
}
