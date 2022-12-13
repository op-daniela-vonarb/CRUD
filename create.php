<?php
include 'partials/header.php';
require 'users/users.php';

$user = createUser($_POST);

if (isset($_FILES['picture'])) {
    uploadImage($_FILES['picture'], $user);
}