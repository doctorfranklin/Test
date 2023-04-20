<?php
$userId = '1029289402'; // Id телеграм аккаунта, куда отправлять сообщения
$token = '1068736344:AAHvZxlSZcjero0pN74n6nOyHFedLlfrzqI'; // Token бота, если что - он ненастоящий :)

$user_name = ' ('.$_POST["call_user"].')'; // Скобки для красоты, мне так удобнее
$user_contact = $_POST["us_contact"]; // Данные с поля "контакт пользователя"
$user_text = $_POST["mymes"]; // Текст сообщения

if (!empty($user_contact) and !empty($user_text)) { // Если поля "контакт" и "текст" не пусты. Дополнительная проверка при обработке формы (если будут боты слать запросы)
    $msg = '*Больше скриптов на @IDEEPWEB*

'; // Делаем первую строку "жирной". Переводы строки для удобства в телеграме.
    $msg .= $user_contact.$user_name; // Добавляем в текст поле "контакт" и имя
    $msg .= ' пишет:

'.$user_text; // Добавляем текст сообщения. Перевод строки опять же для удобства

file_get_contents('https://api.telegram.org/bot'. $token .'/sendMessage?chat_id='. $userId .'&text=' . urlencode($msg) . '&parse_mode=markdown'); // Отправляем запрос. Разметка - markdown

    echo "<strong>Спасибо, с вами свяжутся.</strong><hr>"; // Выводим сообщение что заявка ушла
}
?>