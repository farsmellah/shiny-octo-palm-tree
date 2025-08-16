<?php

declare(strict_types=1);

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum TaskStatusEnum: string
{
    use Values, InvokableCases;

    case Pending    = 'pending';
    case InProgress = 'in_progress';
    case Done       = 'done';
}
