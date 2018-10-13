<?php


/**
 * Codeless Count Share Counts
 * 
 * @since 1.0.0
 */


class Codeless_Share_Counts
{

    function __construct() {

        add_action('wp_ajax_codeless_share_counts', array(&$this,
            'action_trigger'
        ));
        add_action('wp_ajax_nopriv_codeless_share_counts', array(&$this,
            'action_trigger'
        ));

    }

    function action_trigger($post_id) {
        
        if (isset($_POST['post_id'])) {
            $post_id = $_POST['post_id'];
            echo self::share_count($post_id, 'update');
        } 
        else {
            $post_id = $_POST['post_id'];
            echo self::share_count($post_id, 'get');
        }
        
        exit;
    }

    static function share_count($post_id, $action = 'get') {
        
        if (!is_numeric($post_id)) return;
        
        switch ($action) {
            case 'get':
                $share_count = get_post_meta($post_id, '_codeless_share_count', true);
                if (!$share_count) {
                    $share_count = 0;
                    add_post_meta($post_id, '_codeless_share_count', $share_count, true);
                }
                
                return '<span class="codeless-share-count codeless-count">' . $share_count . '</span>';
                break;

            case 'update':
                $share_count = get_post_meta($post_id, '_codeless_share_count', true);
                $share_count++;

                update_post_meta($post_id, '_codeless_share_count', $share_count);

                return '<span class="codeless-share-count codeless-count">' . $share_count . '</span>';
                break;
            }
    }
    



    static function count($icon = 'cl-icon-share-variant') {
        global $post;
        
        $share_count = self::share_count($post->ID);
        
        
        return '<a href="#" class="share" id=""><i class="'.$icon.'"></i> ' . $share_count . '</a>';

    }
}
new Codeless_Share_Counts();

?>