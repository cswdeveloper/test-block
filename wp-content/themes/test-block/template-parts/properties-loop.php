<?php
$query = $args['query'] ?? null;

if (!$query || !$query->have_posts()) {
  echo '<p class="text-muted">No properties found.</p>';
  return;
}
?>

<div id="properties-list">
  <?php
  while ($query->have_posts()) {
    $query->the_post();
    get_template_part('template-parts/property-card');
  }
  ?>
</div>

<?php if ($query->max_num_pages > 1): ?>
  <div class="text-center mt-4">
    <button
      class="btn btn-outline-dark js-load-more"
      data-page="1"
      data-order="<?= esc_attr(strtolower($query->get('order'))) ?>"
      data-max="<?= esc_attr($query->max_num_pages) ?>"
    >
      Load more
    </button>
  </div>
<?php endif; ?>
