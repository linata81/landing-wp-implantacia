<?php 

if (!defined('ABSPATH')) {
  exit;
}

use Carbon_Fields\Container; //подключаем класс контейнер
use Carbon_Fields\Field;     //подключаем класс Field


//создаем контейнер, даем тип контейнера
Container::make( 'theme_options', 'Настройки сайта' )
  ->add_tab( 'Общие настройки', [
      Field::make( 'image', 'site_logo', 'Логотип' ), 
      Field::make( 'text', 'site_logo_text', 'Текст логотипа' ), 
      Field::make( 'text', 'site_header_btn_text', 'Текст кнопки' )
        ->set_width(50),
      Field::make( 'text', 'site_header_btn2_text', 'Текст 2 кнопки')
        ->set_width(50), 
      Field::make( 'text', 'site_header_btn3_text', 'Текст 3 кнопки'), 
      Field::make( 'text', 'site_footer_text', 'Текст в подвале' ),
  ])

  ->add_tab( 'Контакты', [
      Field::make( 'text', 'site_phone', 'Телефон' ), 
      Field::make( 'text', 'site_phone_digits', 'Телефон без пробелов в формате +79999999999' ), 
      Field::make( 'text', 'site_second_phone', 'Телефон № 2 (необязательно)' ), 
      Field::make( 'text', 'site_second_phone_digits', 'Телефон № 2 без пробелов в формате +79999999999' ), 
      Field::make( 'text', 'site_address', 'Адрес' ), 
      Field::make( 'text', 'site_email', 'email' ), 
      Field::make( 'text', 'site_vk_url', 'Вконтакте' ), 
  ])
  ->add_tab( 'Всплывающая форма', [
      Field::make( 'text', 'site_popup_title', 'Заголовок' ), 
      Field::make( 'text', 'site_popup__btn', 'Текст кнопки' ), 
  ]);