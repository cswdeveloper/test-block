<?php
$cards = get_field('cards');
if (!$cards)
  return;
?>

<section class="section-cards">
  <div class="container">
    <div class="row g-4">

      <?php foreach ($cards as $card):

        $col = 'col-lg-' . intval($card['card_col']);
        $type = esc_attr($card['card_type']);
        $bg = esc_attr($card['card_bg']);
        ?>

        <div class="col-12 <?= $col ?>">
          <div class="card-item bgr-<?= $bg ?> type-<?= $type ?>">

            <div class="card-inner">

              <div class="card-content">
                <?php if ($card['title']): ?>
                  <h3 class="card-title"><?= esc_html($card['title']) ?></h3>
                <?php endif; ?>

                <?php if ($card['text']): ?>
                  <p><?= esc_html($card['text']) ?></p>
                <?php endif; ?>

                <?php if ($card['button']): ?>
                  <a class="btn btn-dark" href="<?= esc_url($card['button']['url']) ?>" target="<?= esc_attr($card['button']['target'] ?: '_self') ?>">
                    <?= esc_html($card['button']['title']) ?>
                  </a>
                <?php endif; ?>
              </div>

              <?php if ($type !== 'text' && $card['image']): ?>
                <div class="card-media">
                  <?php
                  $size = ($type === 'image_bottom') ? 'card-bottom' : 'card-right';
                  echo wp_get_attachment_image($card['image'], $size);
                  ?>
                </div>
              <?php endif; ?>

            </div>

          </div>
        </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>