<?php

require("Student.php");
require("Teacher.php");

$teacher = new Teacher();
$teacher2 = new Teacher();

$student1 = new Student();
$student2 = new Student();

$student1->setName("Andrew");

echo "The students name is " . $student1;


$teacher->addStudent($student1);
$teacher->addStudent($student2);

$teacher->addStudent($teacher2);
