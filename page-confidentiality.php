<?php
/*
Template Name: Политика конфиденциальности
*/
?>
<?php $page_id = get_the_ID(); ?>
<?php get_header(); ?>  
      
  <main class="main">
    <section class="section single-page">
      <div class="container single-page__container">
        <h1 class="title page-title"><?php the_title(); ?></h1>

        <?php if (have_posts() ) : ?>     
          <?php while (have_posts() ) : the_post(); ?>
          <div class="single-page__content">
            <?php the_content(); ?>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>
      
      </div>
    </section>
  </main>   
        
<?php get_footer(); ?>