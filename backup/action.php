<?php
/* Осуществляем проверку вводимых данных и их защиту от враждебных 
скриптов */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$phone = htmlspecialchars($_POST["phone"]);
/* Устанавливаем e-mail адресата */
$myemail = "kviki-1@yandex.ru";
/* Проверяем заполнены ли обязательные поля ввода, используя check_input 
функцию */
$name = check_input($_POST["name"], "Введите ваше имя!");
$email = check_input($_POST["email"], "Введите ваш e-mail!");
$phone = check_input($_POST["phone"], "Вы забыли написать сообщение!");
/* Проверяем правильно ли записан e-mail */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Е-mail адрес не существует");
}
/* Создаем новую переменную, присвоив ей значение */
$phone_to_myemail = "Заказ с http://direct-adwords-begun.ru/";
/* Отправляем сообщение, используя mail() функцию */
$from  = "Имя: $name \r\n E-mail: $email \r\n Телефон: $phone"; 
mail($myemail, $phone_to_myemail, $from);

?>



<p>Ваше сообщение было успешно отправлено!</p>
<p>На <a href="index.html">Главную</a></p>

<?php
/* Если при заполнении формы были допущены ошибки сработает 
следующий код: */
function check_input($data, $problem = "")
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}
function show_error($myError)
{
?>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<p>Пожалуйста исправьте следующую ошибку:</p>
<?php echo $myError; ?>
</body>
</html>
<?php
exit();
}
?>