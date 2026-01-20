<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header py-3 border-bottom">
  <div class="container">
    <div class="row align-items-center">
      <div class="col">
        <a href="<?= esc_url(home_url('/')); ?>" class="fw-bold text-decoration-none text-dark">
          Test Project
        </a>
      </div>
    </div>
  </div>
</header>
