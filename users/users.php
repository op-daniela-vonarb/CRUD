<?php

function getUsers() {

    return json_decode(file_get_contents(__DIR__.'/users.json'), associative: true);

}

function getUserById($id) {
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;

}

function createUser($data) {

}

function updateUser($data, $id) {

    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }
    file_put_contents(__DIR__.'/users.json', json_encode($users));

    return $updateUser;
}

function deleteUser($id) {

}