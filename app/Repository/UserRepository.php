<?php 

namespace App\Repository;

use App\Enums\StatusEnum;
use App\Models\User;

class UserRepository implements IUserRepository {
    public function __construct(
        private User $user
    ) {
        $this->user = $user;
    }
    public function getAuthUser() {

    }

    public function getActiveUserByEmail(string $email) {
        return $this->user
            ->where('email', $email)
            ->where('status', StatusEnum::ACTIVE->value)
            ->first();
    }
}