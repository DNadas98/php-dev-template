<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PhpStarter\Model\ExampleRepository;

$repository = new ExampleRepository();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? '';

    switch ($_POST['action']) {
        case 'create':
            $repository->create($name);
            break;
        case 'update':
            $repository->update($id, $name);
            break;
        case 'delete':
            $repository->delete($id);
            break;
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$allExamples = $repository->readAll();
?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>Example List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            font-family: monospace;
            font-size: 1rem;
        }
        li {
            width: 100%;
            display: flex;
            flex-direction: row;
            gap: 0.3rem;
            padding-bottom: 0.3rem;
        }
    </style>
</head>
<body>
<h1>Example List</h1>
<ul>
    <li>
        <form action="index.php" method="post">
            <input type="text" name="name" minlength="1" required placeholder="Name"/>
            <input type="hidden" name="action" value="create"/>
            <button type="submit">+</button>
        </form>
    </li>
    <?php foreach ($allExamples as $example): ?>
        <li>
            <form action="index.php" method="post">
                <input type="text" name="name" value="<?= htmlspecialchars($example->getName()) ?>"/>
                <input type="hidden" name="id" value="<?= $example->getId() ?>"/>
                <input type="hidden" name="action" value="update"/>
                <button type="submit">Save</button>
            </form>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="<?= $example->getId() ?>"/>
                <input type="hidden" name="action" value="delete"/>
                <button type="submit">X</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
