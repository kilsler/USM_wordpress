<?php
/*
Plugin Name: USM Notes
Description: Плагин заметок
Version: 1.0
Author: Morozan Nichita
*/

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

function usm_register_priority_taxonomy() {
    register_taxonomy('priority', 'usm_note', array(
        'label' => 'Приоритет',
        'hierarchical' => true,
        'public' => true,
    ));
}
add_action('init', 'usm_register_priority_taxonomy');

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
function usm_save_meta($post_id) {
    if (!isset($_POST['usm_due_date'])) return;

    $date = $_POST['usm_due_date'];

    if ($date < date('Y-m-d')) {
        return;
    }

    update_post_meta($post_id, '_due_date', $date);
}
add_action('save_post', 'usm_save_meta');



//shortcode 


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





