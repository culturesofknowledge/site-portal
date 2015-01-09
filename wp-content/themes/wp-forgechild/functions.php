<?
add_filter('json_prepare_post', 'json_api_encode_acf');

/* Make sure we can access the custom fields we added */
function json_api_encode_acf($post) {
    
    $acf = get_fields($post['ID']);
    
    if (isset($post)) {
      $post['acf'] = $acf;
    }

    return $post;

}
?>
