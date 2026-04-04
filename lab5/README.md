
# Лабораторная работа №5. Безопастность WordPress

## Шаг 1. Включить отладку

wp-config.php  

```php
define('WP_DEBUG', true);
```
## Шаг 2. Пользователи и пароли
Users -> Add New  
 Выбрать роль: Author

<img width="1873" height="1006" alt="image" src="https://github.com/user-attachments/assets/99318071-9d4c-4e13-a757-9b65973c4780" />

## Шаг 3. Обновления
В админке:  
Dashboard -> Updates
обновить:WordPress, темы, плагины

Потом включить автообновления: Plugins -> Auto-update, Themes

## Шаг 4. Базовая защита (Hardening)
Отключить редактор файлов:  
```php
define('DISALLOW_FILE_EDIT', true);
```
Права доступа  
```bash
chmod -R 755 wp-content
find . -type f -exec chmod 644 {} \;
```
  
В wp_lab2/.htaccess:  
```
<files wp-config.php>
order allow,deny
deny from all
</files>
```
## Шаг 5. Установка AIOS


## Шаг 8. Скриншоты результата



## Шаг 9. Контрольные вопросы



    1. De ce DISALLOW_FILE_EDIT și permisiunile corecte pe wp-config.php reduc semnificativ riscul post-exploit?
    2. Ce setări ai ales pentru Login Lockdown/Firewall și de ce (explică echilibrul între securitate și experiența utilizatorului)?
    3. Cu ce se deosebesc măsurile de protecție la nivel WordPress (plugin/WAF) față de cele la nivelul serverului web și al sistemului de operare?
    4. Ce trebuie inclus neapărat într-un backup „complet” WordPress și cum verifici dacă restaurarea funcționează cu adevărat?




