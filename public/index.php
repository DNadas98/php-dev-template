<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PhpStarter\Model\ExampleRepository;

$repository = new ExampleRepository();

echo "Testing create...\n";
$repository->create('Test1');

echo "Testing readAll...\n";
$allExamples = $repository->readAll();
foreach ($allExamples as $example) {
    echo "ID: " . $example->getId() . " Name: " . $example->getName() . "\n";
}

echo "Testing readById...\n";
$example = $repository->readById(1);
if ($example) {
    echo "ID: " . $example->getId() . " Name: " . $example->getName() . "\n";
} else {
    echo "No example found.\n";
}

echo "Testing update...\n";
$repository->update(1, 'Test1-updated');
$updated = $repository->readById(1);
if ($updated) {
    echo "ID: " . $updated->getId() . " Name: " . $updated->getName() . "\n";
} else {
    echo "No example found.\n";
}

echo "Testing delete...\n";
$repository->delete(1);
$deleted = $repository->readById(1);
if ($deleted) {
    echo "ID: " . $deleted->getId() . " Name: " . $deleted->getName() . "\n";
} else {
    echo "No example found.\n";
}