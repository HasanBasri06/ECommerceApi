<?php 

namespace App\Services;

use App\Repository\IUserRepository;

class LoginService {
    public function __construct(
        private IUserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }
    
    public function existUser(string $email) {
        $user = $this->userRepository->getActiveUserByEmail($email);

        if (!$user) {
            return false;
        }

        return true;
    }


    public function getUserDetailByEmail(string $email) {
        return $this->userRepository->getActiveUserByEmail($email);
    }
}