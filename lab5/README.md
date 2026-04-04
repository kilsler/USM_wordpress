
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

Настройка Login lockout  
<img width="1873" height="1005" alt="image" src="https://github.com/user-attachments/assets/01249c0d-22af-4247-a4d9-5e6b7a200153" />
Настройка force logout  
<img width="1871" height="1004" alt="image" src="https://github.com/user-attachments/assets/96b00ec8-3c93-4013-8fec-d93c1e88c8b8" />
Если есть пользователь admin -> меняем через AIOS
<img width="1693" height="219" alt="image" src="https://github.com/user-attachments/assets/ab188ce1-0cdb-4c36-84f4-21aa92387250" />
Отключаем авто-регистрацию или включаем manual approval
<img width="1872" height="1005" alt="image" src="https://github.com/user-attachments/assets/79edebc5-7ff8-4bf3-8ad3-318152f758de" />
Filesystem Security  
Scan -> Fix permissions

<img width="1874" height="1005" alt="image" src="https://github.com/user-attachments/assets/c8e73e7b-ff88-4f81-b99e-a358af9b8248" />
Firewall
Включаем: Basic Firewall, Bad Query Strings, XSS protection, Disable directory browsing

BruteForce
<img width="1866" height="1005" alt="image" src="https://github.com/user-attachments/assets/49533c65-233e-4328-aaa7-a6b2ac4fa4e3" />
Backup
<img width="1873" height="1005" alt="image" src="https://github.com/user-attachments/assets/5a228f41-0b5b-4aa9-a859-7f1289f5c5bf" />
Notifications
<img width="1092" height="349" alt="image" src="https://github.com/user-attachments/assets/55cf201c-5b52-49a0-9f61-4305aeaadcb3" />

Notifications
user settings -> user lockout -> включить отправку сообщений на почту.


## Шаг 9. Контрольные вопросы



    1. De ce DISALLOW_FILE_EDIT și permisiunile corecte pe wp-config.php reduc semnificativ riscul post-exploit?
    2. Ce setări ai ales pentru Login Lockdown/Firewall și de ce (explică echilibrul între securitate și experiența utilizatorului)?
    3. Cu ce se deosebesc măsurile de protecție la nivel WordPress (plugin/WAF) față de cele la nivelul serverului web și al sistemului de operare?
    4. Ce trebuie inclus neapărat într-un backup „complet” WordPress și cum verifici dacă restaurarea funcționează cu adevărat?




