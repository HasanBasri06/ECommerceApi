<?php

namespace App\Enums;

enum ResponseEnum: string
{
    case INFO="info";
    case SUCCESS="success";
    case ERROR="error";
    case WARNING="warning";
}
