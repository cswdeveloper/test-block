<?php
$price = get_field('price');
$address = get_field('address');
$area = get_field('area');
$rooms = get_field('rooms');
$floor = get_field('floor');
$desc = get_field('short_description');
?>

<div class="property-card mb-4">
  <div class="row g-0 align-items-stretch">

    <div class="col-12 col-md-12 col-lg-3">
      <div class="property-image h-100">
        <?php the_post_thumbnail('medium_large', [
          'class' => 'img-fluid h-100 w-100 object-fit-cover'
        ]); ?>
      </div>
    </div>

    <div class="col-12 col-md-8 col-lg-9">
      <div class="p-4 h-100 d-flex flex-column">

        <div class="d-flex justify-content-between align-items-start mb-3">
          <div>
            <h4 class="fw-semibold mb-1">$<?= number_format($price) ?></h4>
            <p class="text-muted mb-2"><?= esc_html($address) ?></p>
            <ul class="list-inline small text-muted mb-0">
              <li class="mb-1"> <img class="me-1" src="<?= esc_url(get_template_directory_uri() . '/assets/svg/tabler-icon-arrow.svg'); ?>" alt=""> <?= $area ?> m²</li>
              <li class="mb-1"> <img class="me-1" src="<?= esc_url(get_template_directory_uri() . '/assets/svg/tabler-icon-door.svg'); ?>" alt="" ><?= $rooms ?> rooms</li>
              <li class="mb-1"> <img class="me-1" src="<?= esc_url(get_template_directory_uri() . '/assets/svg/tabler-icon-stairs.svg'); ?>" alt="" ><?= esc_html($floor) ?> floor</li>
            </ul>
          </div>

          <?php if ($area): ?>
            <span class="small text-muted">
              $<?= number_format($price / $area) ?> for m²
            </span>
          <?php endif; ?>
        </div>

        <p class="text-muted small flex-grow-1">
          <?= esc_html($desc) ?>
        </p>

        <div>
          <a href="<?php the_permalink(); ?>" class="fw-medium text-decoration-none text-dark">
            More details →
          </a>
        </div>

      </div>
    </div>

  </div>
</div>