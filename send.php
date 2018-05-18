<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['phone'])){
      if (isset($_POST['name'])) {
        if (!empty($_POST['name'])){
          $name = strip_tags($_POST['name']);
          $nameFieldset = "Имя: ";
        }
      }

      if (isset($_POST['phone'])) {
          if (!empty($_POST['phone'])){
              $phone = strip_tags($_POST['phone']);
              $phoneFieldset = "Номер телефона: ";
          }
      }
      if (isset($_POST['message'])) {
          if (!empty($_POST['message'])){
              $theme = strip_tags($_POST['message']);
              $themeFieldset = "Сообщение: ";
          }
      }

      $token = <Укажите токен бота>//"347515248:AAFJiLj2d5SN9Pnf_KB_EIPgxBbSWHcpmpY";
      $chat_id = <Укажите идентификатор чата>//"535771052";
      $arr = array(
          $nameFieldset => $name,
          $phoneFieldset => $phone,
          $themeFieldset => $theme
       );
      foreach($arr as $key => $value) {
         $txt .= "<b>".$key."</b> ".$value."%0A";
      };
      $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
      if ($sendToTelegram) {
        echo 'Спасибо';
        return true;
      } else {
            echo 'Ошибка. Сообщение не отправлено!';
      }
    } else {
            echo 'Ошибка. Вы заполнили не все поля!';
    }
} else {
    header ("Location: /");
}

?>