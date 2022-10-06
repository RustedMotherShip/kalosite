<?php

require_once __DIR__.'/boot.php';

// Проверим, не занято ли имя пользователя
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `nickname` = :nickname");
$stmt->execute(['nickname' => $_POST['RegNickName']]);
if ($stmt->rowCount() > 0) {
    flash('Это имя пользователя уже занято.');
    header('Location: /ggalins'); // Возврат на форму регистрации
    die; // Остановка выполнения скрипта
}
if ($_POST['RegPassword'] !== $_POST['RegPassRepeat']) {
  flash('Пароли не совпадают');
  header('Location: /ggalins'); 
  die;
}

// Добавим пользователя в базу

$stmt = pdo()->prepare("INSERT INTO `users` (`nickname`, `email`, `password`) VALUES (:nickname, :email , :pass)");
$stmt->execute([

  'nickname' => $_POST['RegNickName'],
  'email' => $_POST['RegEmail'],
  'pass' => password_hash($_POST['RegPassword'], PASSWORD_DEFAULT)
]);
header('Location: show_user.php');
