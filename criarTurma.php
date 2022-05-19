<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor\/autoload.php';

try {

    $connection = ConnectionCreator::createConnection();
    $studentRepository = new PdoStudentRepository($connection);
    
    $connection->beginTransaction();
    
    $aStudent = new Student(null, 'Gustavo', new DateTimeImmutable('1994-03-01'));
    $studentRepository->save($aStudent);
    
    $anotherStudent = new Student(null, 'Paulo Sergio Silva Junior', new DateTimeImmutable('1999-03-09'));
    $studentRepository->save($anotherStudent);

    $connection->commit();
    
} catch (\PDOException $e) {
    echo $e->getMessage();
    $connection->rollBack();
}



