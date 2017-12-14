<?php

namespace Besmer\AbstractClasses;

abstract class AbstractUser {
    
    abstract public static function sayHello();
    
    public static function sayGoodbye() {
        return "Goodbye!";
    }
    
}