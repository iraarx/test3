<? 
// ----------------------------конфигурация-------------------------- // 
 
 $adminemail="ira@ira.atwebpages";  // e-mail админа 
 $date=date("d.m.y"); // число.месяц.год 
 $time=date("H:i"); // часы:минуты:секунды 
 $backurl="http://iryna.dx.am/";  // На какую страничку переходит после отправки письма 
 
//---------------------------------------------------------------------- // 
  
 
// Принимаем данные с формы
 
 $name=$_POST['orabotatj'];
 $name=$_POST['more-info'];
 $name=$_POST['design'];
 $name=$_POST['gumor'];
 $name=$_POST['razdel'];
 $name=$_POST['change the palette'];
 $name=$_POST['select the palette'];
 $name=$_POST['name']; 
 $email=$_POST['email']; 
 $msg=$_POST['message']; 
 
   
// Проверяем валидность e-mail 
 if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", 
strtolower($email))) 
  { 
   echo 
"<center>Вернитесь <a 
href='javascript:history.back(1)'><B>назад</B></a>. Вы 
указали неверные данные!"; 
   } 
  else 
  { 
 $msg="
 <p>Да: $change the palette</p>
 <p>Нет: $change the palette</p>
 <p>3: $select the palette</p>
 <p>2: $select the palette</p>
 <p>1: $select the palette</p>
 <p>Имя: $name</p> 
 <p>E-mail: $email</p> 
 <p>Сообщение: $msg</p> 
 "; 
  // Отправляем письмо админу  
 mail("$adminemail", "$date $time Сообщение 
от $name", "$msg"); 
 // Сохраняем в базу данных 
 $f = fopen("message.txt", "a+"); 
 fwrite($f," \n $date $time Сообщение от $name"); 
 fwrite($f,"\n $msg "); 
 fwrite($f,"\n ---------------"); 
 fclose($f); 
 
// Выводим сообщение пользователю 
 print "<script language='Javascript'><!-- 
function reload() {location = \"$backurl\"}; setTimeout('reload()', 6000); 
//--></script> 
 $msg 
 <p>Сообщение отправлено! Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";  
exit; 
  } 
 ?>