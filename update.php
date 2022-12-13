<?php
include 'partials/header.php';
require 'users/users.php';


if (!isset($_GET['id'])) {
    include 'partials/not_found.php';
    exit;
}

$userId = $_GET['id'];

$user = getUserById($userId);

if (!$user) {
    include 'partials/not_found.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = updateUser($_POST, $userId);

    if (isset($_FILES['picture'])) {
        uploadImage($_FILES['picture'], $user);
    }

    header("Location: index.php");
}

?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <?php if ($user['id']): ?>
                    Update user <b><?php echo $user['name'] ?></b>
                <?php else: ?>
                    Create new User
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">
            <?php include '_form.php'?>

        </div>
    </div>
</div>