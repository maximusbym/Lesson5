# Lesson5
Functions: file handling, strings, arrays, datetime, images, etc

##Homework:

Написать скрипт, который:

1. Создает переменную - многомерный массив с элементами - сообщения. Пример:
```php
$messages = array(
  0 => array(
    'sender' => 'max'
    'email' => 'max@xx.xx'
    'message' => 'text text text text text'
  )
  1 => ...
);
```
2. Делает сериализацию данных функцией serialize и записывает их в файл "database/database.txt" с помощью функций работы с файлами (http://php.net/manual/ru/book.filesystem.php)

3. Делат извлеченние данных из файла и конвертирует их назад в массив через unserialize.

4. Выводит массив данных в формате HTML на страницу (в любом оформлении).

5. Представление данных и логика работы скрипта должны быть разделены на отдельные файлы.
