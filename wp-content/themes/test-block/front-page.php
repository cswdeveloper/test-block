<?php
/**
 * Front Page Template
 */

get_header();
?>

<main id="primary" class="site-main">

    <div class="container">

        <!-- PAGE CONTENT -->
        <div class="row">
            <div class="col-12">

                <header class="page-header mb-4">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </header>

                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        the_content(); // Gutenberg + ACF Blocks
                    endwhile;
                endif;
                ?>

            </div>
        </div>

        <!-- PROPERTIES SECTION -->

        <header class="page-header my-5 text-center">
            <h1 class="page-title">Properties CPT Title</h1>
        </header>

        <?php
        $query = new WP_Query([
            'post_type' => 'properties', // ✅ ВИПРАВЛЕНО
            'posts_per_page' => 5,
            'meta_key' => 'price',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
        ]);
        ?>

        <section class="properties-section py-5" id="properties">

            <!-- HEADER (НЕ міняється) -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <button class="btn btn-link p-0 text-decoration-none fw-medium js-sort" data-order="asc">
                    Sort by price (Low to High) <span class="ms-1">↓</span>
                </button>

                <span class="text-muted small js-items-count">
                    <?= esc_html($query->found_posts) ?> items
                </span>
            </div>

            <!-- DYNAMIC AREA -->
            <div id="properties-dynamic">
                <?php
                get_template_part(
                    'template-parts/properties-loop',
                    null,
                    ['query' => $query]
                );
                ?>
            </div>

        </section>


    </div>

</main>

<?php get_footer(); ?>