<?php
require_once __DIR__.'/boot.php';
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `nickname` = :nickname");
$stmt->execute(['nickname' => $_POST['RegNickName']]);
if ($stmt->rowCount() > 0) {
    flash('Это имя пользователя уже занято.');
    header('Location: /ggalins'); 
}
else {
  if ($_POST['RegPassword'] !== $_POST['RegPassRepeat']) {
    flash('Пароли не совпадают');
    header('Location: /ggalins'); 
  }
  elseif(!preg_match('/^[a-zA-Z0-9-_]+$/', $_POST['RegNickName'])) {
    flash('Только английский и цифры');
    header('Location: /ggalins');
  }
  else {
    $stmt = pdo()->prepare("INSERT INTO `users` (`nickname`, `email`, `password`) VALUES (:nickname, :email , :pass)");
    $stmt->execute([
    'nickname' => $_POST['RegNickName'],
    'email' => $_POST['RegEmail'],
    'pass' => password_hash($_POST['RegPassword'], PASSWORD_DEFAULT)
    ]);
    header('Location: /ggalins');
  }
}
?>
