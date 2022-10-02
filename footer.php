      <!-- footer -->
      <footer class="footer">
        <div class="container footer__container">
          <div class="footer__top">
            <div class="logo footer__logo">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/logo.svg" class="logo__img" alt="">
              
              <?php if($GLOBALS['rost23ru']['logo_text']) : ?>
                <span class="logo__text"><?php echo $GLOBALS['rost23ru']['logo_text']; ?></span>
              <?php endif; ?>
              
            </div>
            <a href="mailto:<?php echo $GLOBALS['rost23ru']['email']; ?>" class="email">E-mail: <?php echo $GLOBALS['rost23ru']['email']; ?></a>
            <div class="phone footer__phone"> 
              <div class="phone__title footer__phone-title">
                <p>Телефон:</p>
                <a href="<?php echo $GLOBALS['rost23ru']['vk_url']; ?>" class="socials" target="_blank">
                  <svg width="59" height="59" viewBox="0 0 59 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="59" height="59" fill="#0077FF"/>
                    <path d="M30.9492 39.8248C19.8623 39.8248 13.5385 32.0733 13.275 19.1748H18.8286C19.011 28.642 23.1053 32.6521 26.3483 33.4789V19.1748H31.5776V27.3397C34.78 26.9883 38.1446 23.2676 39.2796 19.1748H44.5089C44.0812 21.2974 43.2286 23.3072 42.0045 25.0785C40.7804 26.8497 39.211 28.3443 37.3946 29.4688C39.4222 30.4962 41.213 31.9505 42.6489 33.7356C44.0849 35.5207 45.1333 37.5961 45.725 39.8248H39.9687C39.4376 37.889 38.358 36.1562 36.8653 34.8435C35.3726 33.5308 33.5332 32.6965 31.5776 32.4454V39.8248H30.9492Z" fill="white"/>
                  </svg>
                </a>
              </div>
              <div class="footer__phone-number">
                <a class="phone__item footer__phone-item" href="tel:<?php echo $GLOBALS['rost23ru']['phone_digits']; ?>"><?php echo $GLOBALS['rost23ru']['phone']; ?></a>
                <div class="phone__text footer__phone-text">Бесплатно по Росси</div>
                
                <!-- выводим 2 телефон только если поле в админке заполнено -->
                <?php if($GLOBALS['rost23ru']['second_phone']) : ?>
                  <a class="phone__item footer__phone-item" href="tel:<?php echo $GLOBALS['rost23ru']['second_phone_digits']; ?>"><?php echo $GLOBALS['rost23ru']['second_phone']; ?></a>
                <?php endif; ?>
                </div>
            </div>
          </div>
          <div class="copyright">
            <a href="<?php the_permalink(36); ?>" class="copyright__link">Политика конфиденциальности</a>
            <div><?php echo carbon_get_theme_option('site_footer_text') ?></div>
          </div>
        </div>
        <!-- <div class="phone__links"></div> -->
      </footer>
      <!-- end footer -->
    </div>

    <!-- Modals -->
    <!-- Request a consultation -->
    <div class="popup" data-modal>
      <div class="popup_form">
        <button class="popup__close"></button>
        <form class="form">
          <h2 class="popup__title"><?php echo carbon_get_theme_option('site_popup_title') ?></h2>
          <div class="form__wrapper section-question__form-wrapper">
            <div class="form__input-wrap">
              <input class="form__input js_req" type="text" name="name" placeholder="Имя">
              <input class="form__input js_req" type="text" name="phone" placeholder="Телефон">
            </div>
            <textarea class="form__input" name="сообщение"  placeholder="Напишите ваш вопрос"></textarea>
            <div class="checkbox section-question__checkbox">
              <input type="checkbox" checked id="popupAgreement" name="agreement" class="checkbox__input js_req">
              <label for="popupAgreement" class="checkbox__label">Даю согласие на обработку персональных данных</label>
            </div>
            <button class="btn popup__btn" type="submit">
              <?php echo carbon_get_theme_option('site_popup__btn') ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/green-check.svg" alt="">
            </button>
          </div>
        </form>
      </div>
    </div>
    
    <?php wp_footer(); ?>
  </body>
</html>
