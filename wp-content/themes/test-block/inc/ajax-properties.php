<?php
/**
 * AJAX handlers for Properties
 */

/* SORT PROPERTIES */

add_action('wp_ajax_sort_properties', 'ajax_sort_properties');
add_action('wp_ajax_nopriv_sort_properties', 'ajax_sort_properties');

function ajax_sort_properties() {

  $order = ($_GET['order'] ?? 'asc') === 'desc' ? 'DESC' : 'ASC';

  $query = new WP_Query([
    'post_type'      => 'properties',
    'posts_per_page' => 5,
    'paged'          => 1,
    'meta_key'       => 'price',
    'orderby'        => 'meta_value_num',
    'order'          => $order,
  ]);

  // Повертаємо ВЕСЬ блок (list + Load More)
  get_template_part(
    'template-parts/properties-loop',
    null,
    ['query' => $query]
  );

  wp_reset_postdata();
  wp_die();
}


/* LOAD MORE PROPERTIES */

add_action('wp_ajax_load_more_properties', 'ajax_load_more_properties');
add_action('wp_ajax_nopriv_load_more_properties', 'ajax_load_more_properties');

function ajax_load_more_properties() {

  $page  = max(1, intval($_GET['page'] ?? 1));
  $order = ($_GET['order'] ?? 'asc') === 'desc' ? 'DESC' : 'ASC';

  $query = new WP_Query([
    'post_type'      => 'properties',
    'posts_per_page' => 5,
    'paged'          => $page,
    'meta_key'       => 'price',
    'orderby'        => 'meta_value_num',
    'order'          => $order,
  ]);

  if ($query->have_posts()) {

    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('template-parts/property-card');
    }

    wp_reset_postdata();
    wp_die(); 

  } else {
    wp_die('');
  }
}
