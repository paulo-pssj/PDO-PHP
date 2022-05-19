<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$student = new Student(null, 'Paulo Sergio Silva', new \DateTimeImmutable('1999-03-09'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));
$statement->execute();

if ($statement->execute()){
    echo "Aluno incluido";
}