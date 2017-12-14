<?php

namespace Besmer;

use Besmer\AbstractClasses\AbstractUser;

class User extends AbstractUser {
    
    public static function sayHello()
    {
        return "Hi there.";
    }
    
    
}