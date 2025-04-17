<?php
if ( ! class_exists( 'Hamburger_Nav_Walker' ) ) {
    class Hamburger_Nav_Walker extends Walker_Nav_Menu {
        private $link_class;

        public function __construct( $args = [] ) {
            $this->link_class = $args['link_class'] ?? 'link'; // Используем твой класс ссылок в бургер-меню
        }

        function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
            $output .= '<li>';
            $output .= '<a href="' . esc_url( $item->url ) . '" class="' . esc_attr( $this->link_class ) . '">' . esc_html( $item->title ) . '</a>';
        }

        function end_el( &$output, $item, $depth = 0, $args = null ) {
            $output .= '</li>';
        }
    }
}







?>