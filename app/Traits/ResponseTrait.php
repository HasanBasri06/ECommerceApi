<?php

namespace App\Traits;

use Illuminate\Support\MessageBag;

trait ResponseTrait
{
    public function response(string $type, array $data = [], int $code = 200, array|MessageBag $messages) {
        return response()
            ->json([
                'type' => $type,
                'data' => $data,
                'messages' => $messages
            ], $code);
    }
}
