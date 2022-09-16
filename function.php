
// function that runs when shortcode is called
function wpb_breadcrumb() { 
  global $post;
 $output = '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        $output .= "/";
        the_category(' &bull; ');
            if (is_single()) {
               $output .= " / ";
            $output .=    get_the_title();
            }
    } elseif (is_page()) {
		  $output .= " / ";
			$output .=	'<a href="'. get_permalink($post->post_parent).'">'. apply_filters('the_title', get_the_title($post->post_parent)) .'</a>';
        $output .= " / ";
        $output .= get_the_title();
    } elseif (is_search()) {
        $output .= "/Search Results for... ";
        $output .= '"<em>';
        $output .= get_search_query();
        $output .= '</em>"';
    }
  
return $output;
}
// register shortcode
add_shortcode('Breadcrumb', 'wpb_breadcrumb');
