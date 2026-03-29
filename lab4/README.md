# Лабораторная работа №4. Создание плагина WordPress
## Цель работы: Научиться создавать собственную тип записей.

## Шаг 1. Включить отладку

## Шаг 2. Создать основной файл плагина
Путь файла:  
`wp-content/plugins/usm-notes/usm-notes.php`
```php
<?php
/*
Plugin Name: USM Notes
Description: Плагин для заметок с приоритетами и датой напоминания
Version: 1.0
Author: Morozan Nichita
*/

```
## Шаг 3. Созданиекастомного поста кастомног типа (CPT)
```php

function usm_register_notes_cpt() {

    $labels = array(
        'name' => 'Notes',
        'singular_name' => 'Note',
        'add_new' => 'Добавить',
        'add_new_item' => 'Добавить новую заметку',
        'edit_item' => 'Редактировать заметку',
        'new_item' => 'Новая заметка',
        'view_item' => 'Просмотреть заметку',
        'search_items' => 'Искать заметки',
        'not_found' => 'Заметки не найдены',
        'menu_name' => 'Notes'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-edit',
        'supports' => array('title', 'editor', 'author', 'thumbnail')
    );

    register_post_type('usm_note', $args);
}

add_action('init', 'usm_register_notes_cpt');
```

## Шаг 4. Таксономия Priority
```
function usm_register_priority_taxonomy() {
    register_taxonomy('priority', 'usm_note', array(
        'label' => 'Приоритет',
        'hierarchical' => true,
        'public' => true,
    ));
}
add_action('init', 'usm_register_priority_taxonomy');
```
## Шаг 5. Meta Box (дата)
```php
function usm_add_meta_box() {
    add_meta_box(
        'usm_due_date',
        'Дата напоминания',
        'usm_meta_box_callback',
        'usm_note'
    );
}
add_action('add_meta_boxes', 'usm_add_meta_box');

function usm_meta_box_callback($post) {
    $value = get_post_meta($post->ID, '_due_date', true);
    ?>
    <label>Выберите дату:</label>
    <input type="date" name="usm_due_date" value="<?php echo esc_attr($value); ?>" required>
    <?php
}
```
## Шаг 6. Shortcode
```php
function usm_notes_shortcode($atts) {

    $atts = shortcode_atts(array(
        'priority' => '',
        'before_date' => ''
    ), $atts);

    $args = array(
        'post_type' => 'usm_note',
        'posts_per_page' => -1
    );

    // Фильтр по приоритету
    if ($atts['priority']) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'priority',
                'field' => 'slug',
                'terms' => $atts['priority']
            )
        );
    }

    // Фильтр по дате
    if ($atts['before_date']) {
        $args['meta_query'] = array(
            array(
                'key' => '_due_date',
                'value' => $atts['before_date'],
                'compare' => '<=',
                'type' => 'DATE'
            )
        );
    }

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        return "<p>Нет заметок по заданным параметрам</p>";
    }

    $output = "<ul>";

    while ($query->have_posts()) {
        $query->the_post();
        $date = get_post_meta(get_the_ID(), '_due_date', true);

        $output .= "<li>";
        $output .= "<strong>" . get_the_title() . "</strong>";
        $output .= " (до: $date)";
        $output .= "</li>";
    }

    $output .= "</ul>";

    wp_reset_postdata();

    return $output;
}

add_shortcode('usm_notes', 'usm_notes_shortcode');

```
## Шаг 7. Использование
```
[usm_notes]
[usm_notes priority="high"]
[usm_notes before_date="2025-04-30"]
```
## Шаг 8. Скриншоты результата
<img width="1869" height="1007" alt="image" src="https://github.com/user-attachments/assets/e669fb48-072f-45c7-b95f-28f46271e4e1" />
<img width="1877" height="1009" alt="image" src="https://github.com/user-attachments/assets/c7bca572-860d-4b89-88fa-3d039188f663" />
<img width="1872" height="1002" alt="image" src="https://github.com/user-attachments/assets/3b3508ef-1b6e-49b8-bcf6-a5c649ec2ea7" />
<img width="1875" height="1007" alt="image" src="https://github.com/user-attachments/assets/22d72db6-9eb7-43c3-b62a-f650deccf8e8" />


## Шаг 9. Контрольные вопросы


1. Care este diferența esențială dintre o taxonomie personalizată și un metacâmp? Oferă un exemplu când este mai potrivit să folosești taxonomie și când metadate.  
   Таксономия — используется для классификации (группировки).Метаполе — хранит дополнительные данные о записи.  
2. De ce este necesar nonce la salvarea metacâmpurilor și ce se întâmplă dacă nu este verificat?  
Nonce защищает от CSRF-атак
3. Care sunt cei mai importanți parametri ai register_post_type() și register_taxonomy() pentru frontend și UX (numește cel puțin trei și explică de ce)?  
public- делает доступным на фронтенде и в админке  
supports - определяет, какие поля есть (title, editor и т.д.) → влияет на UX  
labels - удобные названия в админке → улучшает интерфейс  
has_archive (для CPT) - создаёт страницу со списком записей  
hierarchical (для taxonomy) - как категории (true) или теги (false) → влияет на структуру  



