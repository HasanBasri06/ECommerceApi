<?php

namespace App\Traits;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\MessageBag;

trait ResponseTrait
{
    public function response(string $type, array|ResourceCollection $data = [], int $code = 200, string $message, array|MessageBag $errors) {
        return response()
            ->json([
                'type' => $type,
                'data' => $data,
                'message' => $message,
                'errors' => $errors,
                'code' => $code
            ], $code);
    }
}
