<?php
namespace App\Auth;

use Cake\Core\Configure;
use Cake\Auth\AbstractPasswordHasher;
use Cake\Utility\Security;
class CustomPasswordHasher extends AbstractPasswordHasher
{
    public function hash($password)
    {
        return hash($this->_config['hashType'], $password . Security::salt());
    }

    public function check($password, $hashedPassword)
    {
        return $hashedPassword === $this->hash($password);
    }
}
