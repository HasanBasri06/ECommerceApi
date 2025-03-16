<?php 

namespace App\Repository;

interface IUserRepository {
    public function getAuthUser();
    public function getActiveUserByEmail(string $email);
}