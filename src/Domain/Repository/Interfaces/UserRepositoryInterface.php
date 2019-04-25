<?php


namespace App\Domain\Repository\Interfaces;


use App\Domain\Models\User;

interface UserRepositoryInterface
{
    public function save(User $user): void;
}