<?php

namespace App\Traits;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\ResourceResponse;
use Illuminate\Support\MessageBag;

trait ResponseTrait
{
    public function response(string $type, array|ResourceCollection|JsonResource $data = [], int $code = 200, string $message, array|MessageBag $errors) {
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
