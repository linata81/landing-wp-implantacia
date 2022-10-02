<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" rel="shortcut icon">
    <title>Стоматологический центр в Краснодаре</title>
    
    <?php wp_head();?>
  </head>
    
  <body>
    <div class="wrapper">
      <!-- header -->
      <header class="header">
        <div class="container header__container">
            
            <?php if(is_front_page()) : ?>
              <div class="logo header__logo">
                <img src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('site_logo')); ?>" class="logo__img" alt="" width="150" height="73">
                <?php if($GLOBALS['rost23ru']['logo_text']) : ?>
                  <span class="logo__text"><?php echo $GLOBALS['rost23ru']['logo_text']; ?></span>
                <?php endif; ?>
              </div>
            <?php else : ?>
              <a href="<?php echo get_home_url(); ?>">
                <div class="logo header__logo">
                  <img src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('site_logo')); ?>" class="logo__img" alt="" width="150" height="73">
                  <?php if($GLOBALS['rost23ru']['logo_text']) : ?>
                    <span class="logo__text"><?php echo $GLOBALS['rost23ru']['logo_text']; ?></span>
                  <?php endif; ?>
                </div>
              </a>
            <?php endif; ?>      
          
          <div class="adress header__adress">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/mark.svg" class="adress__icon" alt="Указатель" width="39" height="39">
            <div class="adress__text"><span>Адрес: </span><?php echo $GLOBALS['rost23ru']['address']; ?></div>
          </div>
          
          <div class="hamburger-menu">
            <div class="phone header__phone">
              <a class="phone__item header__phone-item" href="tel:<?php echo $GLOBALS['rost23ru']['phone_digits']; ?>">
                <svg class="phone__icon" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M22.1339 17.1339L25.444 20.444C25.8892 20.8892 25.8892 21.6108 25.444 22.056C23.0375 24.4625 19.2277 24.7332 16.505 22.6912L14.5357 21.2143C12.3563 19.5797 10.4203 17.6437 8.78571 15.4643L7.30876 13.495C5.26676 10.7723 5.53752 6.96248 7.94404 4.55596C8.38916 4.11084 9.11084 4.11084 9.55596 4.55596L12.8661 7.86612C13.3543 8.35427 13.3543 9.14573 12.8661 9.63388L11.5897 10.9103C11.3868 11.1132 11.3365 11.4231 11.4648 11.6797C12.9482 14.6463 15.3537 17.0518 18.3203 18.5352C18.5769 18.6635 18.8868 18.6132 19.0897 18.4103L20.3661 17.1339C20.8543 16.6457 21.6457 16.6457 22.1339 17.1339Z" stroke="#00A0E3"/>
                </svg>
                <?php echo $GLOBALS['rost23ru']['phone']; ?>
              </a>
              <!-- выводим 2 телефон только если поле в админке заполнено -->
              <?php if($GLOBALS['rost23ru']['second_phone']) : ?>
                <a class="phone__item header__phone-item" href="tel:<?php echo $GLOBALS['rost23ru']['second_phone_digits']; ?>">
                  <svg class="phone__icon" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.1339 17.1339L25.444 20.444C25.8892 20.8892 25.8892 21.6108 25.444 22.056C23.0375 24.4625 19.2277 24.7332 16.505 22.6912L14.5357 21.2143C12.3563 19.5797 10.4203 17.6437 8.78571 15.4643L7.30876 13.495C5.26676 10.7723 5.53752 6.96248 7.94404 4.55596C8.38916 4.11084 9.11084 4.11084 9.55596 4.55596L12.8661 7.86612C13.3543 8.35427 13.3543 9.14573 12.8661 9.63388L11.5897 10.9103C11.3868 11.1132 11.3365 11.4231 11.4648 11.6797C12.9482 14.6463 15.3537 17.0518 18.3203 18.5352C18.5769 18.6635 18.8868 18.6132 19.0897 18.4103L20.3661 17.1339C20.8543 16.6457 21.6457 16.6457 22.1339 17.1339Z" stroke="#00A0E3"/>
                  </svg>
                  <?php echo $GLOBALS['rost23ru']['second_phone']; ?>
                </a>
              <?php endif; ?>
              <div class="phone__text">Бесплатно по Росси</div>
            </div>
            <div class="header__buttons">
              <button class="btn header__btn btn-1 js_popup_consultation_btn" type="button" data-popup="popup-menu"><?php echo carbon_get_theme_option('site_header_btn_text') ?></button>
              <button class="btn header__btn btn-2 header__btn--bold js_popup_consultation_btn" type="button"><?php echo carbon_get_theme_option('site_header_btn2_text') ?></button>
              <button class="btn header__btn btn-3 header__btn--long js_popup_consultation_btn" type="button"><?php echo carbon_get_theme_option('site_header_btn3_text') ?></button>  
            </div>
          </div>
        
          <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>

        </div>
      </header>
      <!-- end header -->   