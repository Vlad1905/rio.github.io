<?php
echo '<meta http-equiv="refresh" content="5; url=http://dizeltoplivo5.ru/">';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$site = $_POST['site'];

$REMOTE_ADDR = $_POST['REMOTE_ADDR'];

$to = "kviki-1@yandex.ru";
$subject = "Заказ";
$message = "Имя пославшего письмо: $name\nEmail: $email\nТелефон: $phone\nСайт: $site\nIP-адрес: $_SERVER[REMOTE_ADDR]";
mail ($to,$subject,$message,"Content-Type: text/plain; charset=windows-1251 Content-Transfer-Encoding: 8bit") or print "Не могу отправить письмо !!!";
echo "<div style='width:960px;margin: 0 auto;'>
    <div style='width: 618px; height: 240px; color: #111111; font-family: 'PFAgoraSlabPro';font-size: 18px; line-height: 18px;'>
        <div style='margin: 20;border:1px dashed #282828;border-radius:8px;padding:10px;margin-left:370px;'>
            <p>Спасибо за запрос, наш оператор свяжется с вами в ближайшее время!</p>
            <p>Через 5 сек. вы будете перенаправлены на главную страницу.</p>
        </div>
    </div>
</div>
";
exit;
?>