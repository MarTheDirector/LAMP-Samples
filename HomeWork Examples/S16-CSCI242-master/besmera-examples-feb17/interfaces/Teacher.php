<?php

class Teacher {
    protected $students = array();
    
    public function addStudent(iNameable $student)
    {
        
        $this->students[] = $student->getName();
    }
    
}