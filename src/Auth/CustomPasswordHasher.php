<?php
namespace App\Auth;

use Cake\Core\Configure;
use Cake\Auth\AbstractPasswordHasher;
use Cake\Utility\Security;

class CustomPasswordHasher extends AbstractPasswordHasher
{
    public function hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function check($password, $hashedPassword)
    {
        return password_verify($password,$hashedPassword);
    }
}
