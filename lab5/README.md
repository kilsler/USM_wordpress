<img width="1873" height="1003" alt="image" src="https://github.com/user-attachments/assets/0cc70834-f247-44a8-a51d-61f5871e9a5e" />
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

## Шаг 6 Проверка brute force
После 6 неуспешных попыток аутентификации
<img width="1861" height="1044" alt="image" src="https://github.com/user-attachments/assets/dc2bdc31-0a47-4efd-bad8-e8bd3db05488" />
<img width="1861" height="1001" alt="image" src="https://github.com/user-attachments/assets/bde2d46d-47c4-4d03-8902-a79f1ce2a5a4" />

## Шаг 7 Проверка Backup
Скриншот постов  удаления:  
<img width="1873" height="1003" alt="image" src="https://github.com/user-attachments/assets/32b6ad72-a117-40c0-a5ad-46abde566f22" />

Скриншот восстановления постов:  

<img width="1871" height="1004" alt="image" src="https://github.com/user-attachments/assets/1f7404be-08ea-47e1-bbfc-77b30ced7f43" />
<img width="1870" height="1007" alt="image" src="https://github.com/user-attachments/assets/73e26636-e6cd-40a6-a90b-ee207091ceca" />

## Шаг 9. Контрольные вопросы



    1. De ce DISALLOW_FILE_EDIT și permisiunile corecte pe wp-config.php reduc semnificativ riscul post-exploit?
    2. Ce setări ai ales pentru Login Lockdown/Firewall și de ce (explică echilibrul între securitate și experiența utilizatorului)?
    3. Cu ce se deosebesc măsurile de protecție la nivel WordPress (plugin/WAF) față de cele la nivelul serverului web și al sistemului de operare?
    4. Ce trebuie inclus neapărat într-un backup „complet” WordPress și cum verifici dacă restaurarea funcționează cu adevărat?




