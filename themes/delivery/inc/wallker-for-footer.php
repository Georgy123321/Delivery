<?php 

if ( ! class_exists( 'Footer_Nav_Walker' ) ) {
    class Footer_Nav_Walker extends Walker_Nav_Menu {
        private $link_class;

        public function __construct( $args = [] ) {
            $this->link_class = $args['link_class'] ?? 'footer_link'; // Класс для ссылок в футере
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