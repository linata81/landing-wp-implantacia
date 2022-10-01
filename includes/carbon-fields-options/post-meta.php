<?php 

if (!defined('ABSPATH')) {
  exit;
}

use Carbon_Fields\Container; //подключаем класс контейнер
use Carbon_Fields\Field;     //подключаем класс Field


//создаем контейнер, даем тип контейнера
Container::make( 'post_meta', 'Дополнительные поля' )
  ->show_on_page(7)
  ->add_tab( '1-Первый экран', [
      Field::make( 'rich_text', 'top_title',   'Заголовок' ),
      Field::make( 'rich_text', 'top_list',    'Список' ), 
      Field::make( 'text',      'top_btn_text','Текст кнопки' ),
      Field::make( 'complex',   'top_plus',    'Список плюсов' )
        ->set_max(3)
        ->add_fields( [
        Field::make( 'image', 'img',  'Картинка' ) ->set_width(50),
        Field::make( 'text',  'desc', 'Описание' ) ->set_width(50),
      ]),
      Field::make( 'image',     'top_img',     'Изображение' ), 
  ])
  ->add_tab( '2-Преимущества', [
    Field::make( 'complex',   'benefits_enumeration',    'Перечень преимуществ' )
    ->add_fields( [
      Field::make( 'text', 'title',  'Заголовок' ) ->set_width(50),
      Field::make( 'text',  'desc',  'Описание' )  ->set_width(50),
    ]),
    Field::make( 'rich_text',  'benefits_title',   'Заголовок' ), 
    Field::make( 'rich_text', 'benefits_text',     'Текст' ), 
    Field::make( 'text',      'benefits_btn_text', 'Текст кнопки' ),
    Field::make( 'image',     'benefits_img',      'Изображение' ), 
  ])
  ->add_tab( '3-Продвижение', [
    Field::make( 'text', 'promotion_title', 'Заголовок' ), 
    Field::make( 'rich_text', 'promotion_text', 'Список' ), 
    Field::make( 'rich_text', 'promotion_text2', 'Список 2' ), 
    Field::make( 'image', 'promotion_img', 'Изображение' ), 
  ])
  ->add_tab( '4-Рекомендуем', [
    Field::make( 'rich_text', 'advice_title',   'Заголовок' ), 
    Field::make( 'complex',   'advice_list',    'Список' )
    ->add_fields( [
      Field::make( 'text', 'desc',  'Текст' ),
    ]), 
  ])
->add_tab( '5-Экран визит', [
  Field::make( 'rich_text', 'visit_title',     'Заголовок' ), 
  Field::make( 'rich_text', 'visit_text',     'Текст' ), 
  Field::make( 'rich_text', 'visit_list',    'Список' ), 
  Field::make( 'image',     'visit_img',      'Изображение' ),
  Field::make( 'text',      'visit_btn_text', 'Текст кнопки' ), 
  ])
->add_tab( '6-Экран инфо', [
  Field::make( 'rich_text', 'info_title',          'Заголовок' ), 
  Field::make( 'complex',   'info_boxes',    'Текст с картинкой' )
  ->set_max(3)
  ->add_fields( [
    Field::make( 'image', 'img',  'Картинка' ) ->set_width(50),
    Field::make( 'text',  'desc', 'Описание' ) ->set_width(50),
  ]),
  Field::make( 'image',     'info_img',      'Изображение' ),
  ])
->add_tab( '7-О нас', [
  Field::make( 'rich_text',  'about_title',          'Заголовок' ), 
  Field::make( 'rich_text', 'about_text_left',      'Текст слева' ), 
  Field::make( 'rich_text', 'about_text_right',     'Текст справа' ), 
  Field::make( 'rich_text', 'about_text_accent',   'Акцентный текст'), 
  Field::make( 'rich_text', 'about_text_big',      'Крупный текст'),
  Field::make( 'complex',   'about_stages',         'Этапы' )
  ->set_max(4)
  ->add_fields([
    Field::make( 'text', 'title',  'Заголовок' ),
    Field::make( 'rich_text', 'desc', 'Описание' ),
  ]), 
])
->add_tab( '8-Форма заказа', [
  Field::make( 'text',      'note_title',      'Заголовок' ), 
  Field::make( 'rich_text', 'note_text',       'Текст' ), 
  Field::make( 'text',      'note_btn_text',   'Текст кнопки' ), 
  Field::make( 'rich_text', 'note_signature',  'Подпись изображения' ),
  Field::make( 'image',     'note_img',       'Изображение' ),
])
->add_tab( '9-Форма заказа 2', [
  Field::make( 'text',      'note_title_2',      'Заголовок' ), 
  Field::make( 'rich_text', 'note_text_2',       'Текст' ), 
  Field::make( 'text',      'note_btn_text_2',   'Текст кнопки' ), 
  Field::make( 'image',     'note_img_2',       'Изображение' ),
])
->add_tab( '10-Форма заказа 3', [
  Field::make( 'rich_text', 'note_text_left',       'Текст слева' ), 
  Field::make( 'text',      'note_title_right',    'Заголовок справа' ), 
  Field::make( 'text',      'note_btn_text_3',      'Текст кнопки' ), 
])
->add_tab( '11-Задать вопрос', [
  Field::make( 'rich_text', 'question_title',         'Заголовок' ), 
  Field::make( 'rich_text', 'question_title_form',    'Заголовок формы' ), 
  Field::make( 'text',      'question_list_title',    'Заголовок списка' ), 
  Field::make( 'rich_text', 'question_ul'  ,          'Список' ), 
  Field::make( 'text',      'question_btn_text',      'Текст кнопки' ), 
  Field::make( 'text',      'question_text',          'Текст снизу' ),
  Field::make( 'text',      'question_text_img',       'Подпись изображения' ),
  Field::make( 'image',     'question_img',           'Изображение' ), 
])
->add_tab( '12-Возмещение', [
  Field::make( 'rich_text', 'reparation_title',         'Заголовок' ), 
  Field::make( 'text',      'reparation_text',          'Текст' ),
  Field::make( 'image',     'reparation_img',           'Изображение' ), 
]);
  

