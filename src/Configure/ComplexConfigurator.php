<?php

namespace App\Configure;

use App\Service\Complex;

class ComplexConfigurator
{
    public function configure(Complex $complex): void
    {
        $complex->setA('fdfsd');
        $complex->setB(123);
        $complex->setC(['f'=>'g', 'h' => 'j']);
    }

}