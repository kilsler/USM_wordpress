# Лабораторная работа №3. Разработка простой темы WordPress
## Цель работы: Научиться создавать собственную тему WordPress, понять её минимальную структуру и принципы работы шаблонов.

# Шаг 1. Подготовка среды
1. Перейти в папку WordPress:
wp-content/themes  

2. Создать папку темы:
usm-theme  

4. Включить режим отладки  
Открыть файл:  
wp-config.php  
Добавить:  
define('WP_DEBUG', true);  

# Шаг 2. Создание обязательных файлов темы
2.1 Файл style.css

# Шаг 3. Общие компоненты шаблонов
1.  header.php
2.  footer.php
# Шаг 4. Файл functions.php
functions.php
# Шаг 5. Дополнительные шаблоны

1. single.php
2. page.php
3. sidebar.php
4. comments.php
5. archive.php


# Скришноты результатов:
Выбор темы:
<img width="1867" height="1006" alt="image" src="https://github.com/user-attachments/assets/c8dbc9da-181d-40c2-ae75-f8b2774490c1" />
Homepage
<img width="1865" height="1001" alt="image" src="https://github.com/user-attachments/assets/5426971a-738d-4939-9ab3-a59015dccbb7" />
Blog + open sidebar
<img width="1870" height="962" alt="image" src="https://github.com/user-attachments/assets/eaf9b23a-02cc-4233-bd93-ba5d5cf30b33" />
Blog + closed sidebar
<img width="1870" height="960" alt="image" src="https://github.com/user-attachments/assets/5712284e-5e44-4439-a58e-e9c729f15338" />
Contact page
<img width="1868" height="966" alt="image" src="https://github.com/user-attachments/assets/07c306fe-0a45-47cf-b904-3ad3437dc8b2" />
Single post 
<img width="1872" height="960" alt="image" src="https://github.com/user-attachments/assets/836c1fee-0f49-4499-9fa6-cfc7799a6e5d" />

## Контрольные вопросы
Какие два файла обязательны для любой темы WordPress?  
style.css — содержит метаданные темы и стили.  
index.php — основной шаблон, который WordPress использует, если другие шаблоны не заданы.  
Как подключаются общие части шаблонов (header, footer, sidebar)?  

```php
<?php
get_header();
get_footer();
get_sidebar(); 
```  
В чем разница между index.php, single.php и page.php?  

index.php	Основной шаблон. Используется, если нет других подходящих шаблонов.  
single.php	Отображение отдельной записи блога.  
page.php	Отображение обычных страниц WordPress.  

Какова роль файла functions.php в теме?  
Он расширяет функциональность темы, не меняя файлы ядра WordPress, позволяет добавлять функции темы, подключать стили и скрипты.  
