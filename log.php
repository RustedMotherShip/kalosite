<?php

require_once __DIR__.'/boot.php';


$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `nickname` = :nickname");
$stmt->execute(['nickname' => $_POST['LogNickName']]);
if ($stmt->rowCount()) {
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
if (password_verify($_POST['LogPassword'],$user['password'])) {
  $_SESSION['user_id'] = $user['id'];
  header('Location: /ggalins');
  //die;
}
else {
  flash('Пароль неверен');
  header('Location: /ggalins');
}
}
else {
    flash('Пользователь не найден');
    header('Location: /ggalins'); // Возврат на форму регистрации
    //die; // Остановка выполнения скрипта
}







