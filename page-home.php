<?php
/*
Template Name: Главная
*/
?>
<?php $page_id = get_the_ID(); ?>
<?php get_header(); ?>  
      
      <main class="main">
        <!-- section-top -->
        <?php
          $top_img_id = carbon_get_post_meta($page_id, 'top_img');
          $top_img_src = wp_get_attachment_image_url($top_img_id, 'full'); 
          $product_pros = carbon_get_post_meta($page_id, 'top_plus');
        ?>
        <section class="section-top">
          <div class="container section-top__container">
            <div class="section-top__info">
              <h1 class="section-top__title"><?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'top_title' )); ?></h1>
              <div class="section-top__list">
                <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'top_list' )); ?>
              </div>
              <button class="btn section-btn section-btn--check js_popup_consultation_btn">
                <?php echo carbon_get_post_meta( $page_id, 'top_btn_text' ); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/green-check.svg" alt="">
              </button>
            </div>
            <div class="section-top__images">
              <div class="section-top__img-wrap" style="background-image: url('<?php echo $top_img_src; ?>"></div>
              <ul class="section-top__img-list">
                
                <?php if ($product_pros) : ?>
                  <?php foreach ($product_pros as $plus) : ?>
                    <?php
                      $plus_img_id = $plus['img'];
                      $plus_img_src = wp_get_attachment_image_url($plus_img_id, 'full');
                      $plus_img_src_webp = convertToWebpSrc($plus_img_src);
                    ?>
                    <li class="section-top__img-item">
                      <picture>
                        <source srcset="<?php echo $plus_img_src_webp; ?>" type="image/webp">
                        <img src="<?php echo $plus_img_src; ?>" alt="">
                      </picture>
                      <span><?php echo $plus['desc']; ?></span>
                    </li>
                  <?php endforeach;?>
                <?php endif; ?>  

              </ul>
            </div>
          </div>
        </section>
        <!-- end section-top -->
        
        <!-- section-benefits -->
        <?php
          $benefits_img_id = carbon_get_post_meta($page_id, 'benefits_img');
          $benefits_img_src = wp_get_attachment_image_url($benefits_img_id, 'full'); 
          $benefits_img_src_webp = convertToWebpSrc($benefits_img_src);
          $benefits = carbon_get_post_meta($page_id, 'benefits_enumeration');
        ?>
        <section class="section-benefits">
          <div class="container section-benefits__container">
            <div class="section-benefits__columns">
              
            <?php if ($benefits) : ?>
              <?php foreach ($benefits as $item) : ?>
                <div class="section-benefits__column">
                  <div class="section-benefits__title"><?php echo $item['title']; ?></div>
                  <div class="section-benefits__text">
                    <p><?php echo $item['desc']; ?></p>
                  </div>
                </div>
              <?php endforeach;?>
            <?php endif; ?> 

            </div>
            <div class="order">
              <div class="order__description">
                <h2 class="title order__title"><?php echo carbon_get_post_meta( $page_id, 'benefits_title' ); ?></h2>
                <div class="order__text">
                  <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'benefits_text' )); ?>
                </div>
              </div>
              <div class="order__img">
                <picture>
                  <source srcset="<?php echo $benefits_img_src_webp; ?>" type="image/webp">
                  <img src="<?php echo $benefits_img_src; ?>" alt="">
                </picture>
              </div>
              <button class="btn section-btn order__btn js_popup_consultation_btn"><?php echo carbon_get_post_meta( $page_id, 'benefits_btn_text' ); ?></button>
            </div>
          </div>
        </section>
        <!-- end section-benefits -->
        
        <!-- section-promotion -->
        <?php
          $promotion_img_id = carbon_get_post_meta($page_id, 'promotion_img');
          $promotion_img_src = wp_get_attachment_image_url($promotion_img_id, 'full'); 
          $promotion_img_src_webp = convertToWebpSrc($promotion_img_src);
        ?>
        <section class="section-promotion">
          <div class="container section-promotion__container">
            <h2 class="section-promotion__title"><?php echo carbon_get_post_meta( $page_id, 'promotion_title' ); ?></h2>
            <div class="section-promotion__content">
              <div class="check-list section-promotion__list">
                <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'promotion_text' )); ?>
                <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'promotion_text2' )); ?>
              </div>
              <div class="section-promotion__img">
                <div class="section-promotion__substrate"></div>
                <picture>
                  <source srcset="<?php echo $promotion_img_src_webp; ?>" type="image/webp">
                  <img src="<?php echo $promotion_img_src; ?>" alt="">
                </picture>
              </div>
            </div>
          </div>
        </section>
        <!-- end section-promotion -->
        
        <!-- section-advice -->
        <?php
          $advice_items = carbon_get_post_meta($page_id, 'advice_list');
        ?>
        <section class="section-advice">
          <div class="container section-advice__container">
            <h2 class="title section-advice__title"><?php echo carbon_get_post_meta( $page_id, 'advice_title' ); ?></h2>
            <div class="section-advice__content">
              
              <?php if ($advice_items) : ?>               
                <?php for($i = 0; $i < count($advice_items); $i++ ) : ?>
                  <div class="section-advice__item">
                    
                    <?php if ($i <= 8) { ?>
                      <span>0<?php echo $i + 1; ?></span>
                    <?php } else { ?>
                      <span><?php echo $i + 1; ?></span> 
                    <?php } ?>                

                    <p><?php echo $advice_items[$i]['desc']; ?></p>
                  </div>
                <?php endfor;?>
              <?php endif; ?> 
            </div>
          </div>
        </section>
        <!-- end section-advice -->
        
        <!-- section-consultation -->
        <?php
          $visit_img_id = carbon_get_post_meta($page_id, 'visit_img');
          $visit_img_src = wp_get_attachment_image_url($visit_img_id, 'full'); 
          $visit_img_src_webp = convertToWebpSrc($visit_img_src);
	    	?> 
        <section class="section-visit">
          <div class="container section-visit__container">
            <h2 class="section-visit__title"><?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'visit_title' )); ?></h2>
            <div class="section-visit__content">
              <div class="section-visit__img">
                <picture>
                  <source srcset="<?php echo $visit_img_src_webp; ?>" type="image/webp">
                  <img src="<?php echo $visit_img_src; ?>" alt="">
                </picture>
              </div>
              <div class="section-visit__desc">
                <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'visit_text' )); ?>
                <div class="section-visit__list">
                  <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'visit_list' )); ?>
                </div>
                <form class="form section-visit__form">
                  <div class="form__input-wrap">
                    <input class="form__input js_req" type="text" name="name" placeholder="Имя">
                    <input class="form__input js_req" type="text" name="phone" placeholder="Телефон">
                  </div>
                  <div class="checkbox section-question__checkbox">
                    <input type="checkbox" checked id="formAgreement" name="agreement" class="checkbox__input js_req">
                    <label for="formAgreement" class="checkbox__label">Даю согласие на обработку персональных данных</label>
                  </div>
                  <button class="btn form__btn" type="submit"><?php echo carbon_get_post_meta( $page_id, 'visit_btn_text' ); ?></button>
                </form>
              </div>
            </div>
          </div>
        </section>
        <!-- end section-consultation -->
        
        <!-- section-info -->
        <?php
          $info_img_id = carbon_get_post_meta($page_id, 'info_img');
          $info_img_src = wp_get_attachment_image_url($info_img_id, 'full'); 
          $info_img_src_webp = convertToWebpSrc($info_img_src);
          $info_boxes = carbon_get_post_meta($page_id, 'info_boxes');
		    ?>
        <section class="section-info">
          <div class="container section-info__container">
            <h2 class="title section-info__title"><?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'info_title' )); ?></h2>
            <div class="section-info__content">
              <div class="section-info__boxes">
                
              <?php if ($info_boxes) : ?>
                <?php foreach ($info_boxes as $box) : ?>
                  <?php
                      $box_img_id = $box['img'];
                      $box_img_src = wp_get_attachment_image_url($box_img_id, 'full');
                      $box_img_src_webp = convertToWebpSrc($box_img_src);
                  ?>
                  <div class="section-info__box">
                    <picture>
                      <source srcset="<?php echo $box_img_src_webp; ?>" type="image/webp">
                      <img src="<?php echo $box_img_src; ?>" alt="">
                    </picture>
                    <div class="section-info__text"><?php echo $box['desc']; ?></div>
                  </div>
                <?php endforeach;?>
              <?php endif; ?>

              </div>
              <picture>
                <source srcset="<?php echo $info_img_src_webp; ?>" type="image/webp">
                <img src="<?php echo $info_img_src; ?>" class="section-info__img"  alt="">
              </picture>
            </div>
          </div>
        </section>
        <!-- end section-info -->      
        
        <!-- section-about -->
        <?php
          $about_stages = carbon_get_post_meta($page_id, 'about_stages');
        ?>
        <section class="section-about">
          <div class="container section-about__container">
            <h2 class="title section-about__title"><?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'about_title' )); ?></h2>
            <div class="section-about__content">
              <div class="section-about__row">
                <div><?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'about_text_left' )); ?></div>
                <div><?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'about_text_right' )); ?></div>
              </div>
              <?php if(carbon_get_post_meta( $page_id, 'about_text_accent' )) : ?>
                <div class="section-about__text"><?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'about_text_accent' )); ?></div>
              <?php endif; ?>
              <?php if(carbon_get_post_meta( $page_id, 'about_text_big' )) : ?>
                <div class="section-about__big-text"><?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'about_text_big' )); ?></div>
              <?php endif; ?>
            </div>
              <div class="section-about__stages"> 
  
                <?php if ($about_stages) : ?>               
                  <?php for($i = 0; $i < count($about_stages); $i++ ) : ?>
                    <div class="stage">
                      <div class="stage__number"><?php echo $i + 1; ?></div>
                      <div class="stage__text">
                        <div class="stage__title"><?php echo $about_stages[$i]['title']; ?></div>
                        <p><?php echo $about_stages[$i]['desc']; ?></p>
                      </div>
                    </div>
                  <?php endfor;?>
                <?php endif; ?> 

              </div>
          </div>
        </section>
        <!-- end section-about -->

        <!-- section-note -->
        <?php
          $note_img_id = carbon_get_post_meta($page_id, 'note_img');
          $note_img_src = wp_get_attachment_image_url($note_img_id, 'full'); 
          $note_img_src_webp = convertToWebpSrc($note_img_src);
		    ?> 
        <section class="section-note section-note--foto_with_like">
          <div class="container section-note__container">
              <div class="note__photo">
                <picture>
                  <source srcset="<?php echo $note_img_src_webp; ?>" type="image/webp">
                  <img src="<?php echo $note_img_src; ?>" class="note__img" alt="">
                </picture>
                
                <?php if(carbon_get_post_meta( $page_id, 'note_signature' )) : ?>
                  <div class="note__signature">
                    <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'note_signature' )); ?>
                  </div>
                <?php endif; ?>
                
              </div>
              <div class="note__description">
                <h2 class="title note__title"><?php echo carbon_get_post_meta( $page_id, 'note_title' ); ?></h2>
                <div class="note__text">
                  <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'note_text' )); ?>
                </div>
              </div>
              <button class="btn section-btn section-btn--check note__btn js_popup_consultation_btn">
                <?php echo carbon_get_post_meta( $page_id, 'note_btn_text' ); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/green-check.svg" alt="">
              </button>
          </div>
        </section>
        <!-- end section-note -->
        
        <!-- section-note -->
        <?php
          $note_img_id_2 = carbon_get_post_meta($page_id, 'note_img_2');
          $note_img_src_2 = wp_get_attachment_image_url($note_img_id_2, 'full'); 
          $note_img_src_webp_2 = convertToWebpSrc($note_img_src_2);
		    ?> 
        <section class="section-note section-note--mirror">
          <div class="container section-note__container">
              <div class="note__photo">
                <picture>
                  <source srcset="<?php echo $note_img_src_webp_2; ?>" type="image/webp">
                  <img src="<?php echo $note_img_src_2; ?>" class="note__img" alt="">
                </picture>
              </div>
              <div class="note__description">
                <h2 class="title note__title"><?php echo carbon_get_post_meta( $page_id, 'note_title_2' ); ?></h2>
                <div class="note__text">
                  <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'note_text_2' )); ?>
                </div>
              </div>
              <button class="btn section-btn section-btn--check note__btn js_popup_consultation_btn">
                <?php echo carbon_get_post_meta( $page_id, 'note_btn_text_2' ); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/green-check.svg" alt="">
              </button>
          </div>
        </section>
        <!-- end section-note -->
        
        <!-- section-note -->
        <section class="section-note section-note--no_img">
          <div class="container section-note__container">
            <div class="note__photo">
              <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'note_text_left' )); ?>
            </div>
            <div class="note__description">
              <h2 class="title note__title"><?php echo carbon_get_post_meta( $page_id, 'note_title_right' ); ?></h2>
            </div>
            <button class="btn section-btn note__btn js_popup_consultation_btn"><?php echo carbon_get_post_meta( $page_id, 'note_btn_text_3' ); ?></button>
          </div>
        </section>
        <!-- end section-note -->
        
        <!-- section-question -->
        <?php
          $question_img_id = carbon_get_post_meta($page_id, 'question_img');
          $question_img_src = wp_get_attachment_image_url($question_img_id, 'full'); 
          $question_img_src_webp = convertToWebpSrc($question_img_src);
		    ?> 
        <section class="section-question">
          <div class="container section-question__container">
            <div class="section-question__subtitle"><?php echo carbon_get_post_meta( $page_id, 'question_title' ); ?></div>
            <div class="section-question__content">
              <form class="form section-question__form">
                <h2 class="title section-question__title"><?php echo carbon_get_post_meta( $page_id, 'question_title_form'); ?></h2>
                <div class="form__wrapper section-question__form-wrapper">
                  <div class="form__input-wrap">
                    <input class="form__input js_req" type="text" name="name" placeholder="Имя">
                    <input class="form__input js_req" type="text" name="phone" placeholder="Телефон">
                  </div>
                  <textarea class="form__input" name="сообщение"  placeholder="Напишите ваш вопрос"></textarea>
                  <div class="checkbox section-question__checkbox">
                    <input type="checkbox" checked id="formAgreement" name="agreement" class="checkbox__input js_req">
                    <label for="formAgreement" class="checkbox__label">Даю согласие на обработку персональных данных</label>
                  </div>
                  <button class="btn form__btn section-question__btn" type="submit"><?php echo carbon_get_post_meta( $page_id, 'question_btn_text' ); ?></button>
                </div>
                <p class="section-question__text-bottom"><?php echo carbon_get_post_meta( $page_id, 'question_text'); ?></p>
              </form>
              <div class="section-question__info">
                <div class="section-question__list">
                  <div>В стоимость входит:</div>
                  <?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'question_ul' )); ?>
                </div>
                <div class="section-question__img">
                  <picture>
                    <source srcset="<?php echo $question_img_src_webp; ?>" type="image/webp">
                    <img src="<?php echo $question_img_src; ?>" alt="">
                  </picture>
                  <span><?php echo carbon_get_post_meta( $page_id, 'question_text_img'); ?></span>
                </div>
              </div>             
            </div>
          </div>
        </section>
        <!-- end section-question -->
        
        <!-- section-reparation -->
        <?php
          $reparation_img_id = carbon_get_post_meta($page_id, 'reparation_img');
          $reparation_img_src = wp_get_attachment_image_url($reparation_img_id, 'full'); 
          $reparation_img_src_webp = convertToWebpSrc($reparation_img_src);
		    ?> 
        <section class="section-reparation">
          <div class="container section-reparation__container">
            <div class="section-reparation__text">
              <h2 class="section-reparation__title"><?php echo apply_filters('the_content',carbon_get_post_meta( $page_id, 'reparation_title' )); ?></span></h2>
              <?php echo carbon_get_post_meta( $page_id, 'reparation_text' ); ?>
            </div>
            <div class="section-reparation__img">
              <picture>
                <source srcset="<?php echo $reparation_img_src_webp; ?>" type="image/webp">
                <img src="<?php echo $reparation_img_src; ?>" alt="">
              </picture>
            </div>
          </div>
        </section>
        <!-- end section-reparation -->
      </main>   
        
<?php get_footer(); ?>

