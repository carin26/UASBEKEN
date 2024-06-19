<?php

namespace App\Enums;

enum TableLocation: string
{
    case Makeup = 'front';
    case Haircut = 'inside';
    case Coloring = 'outside';
}