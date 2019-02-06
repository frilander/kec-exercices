<?php

class KecWidget extends \WP_Widget
{

    function __construct()
    {
        parent::__construct('KecWidget', __('Kec social'), array('description' => __('Add social links '),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $kecFacebookUrl = $instance['kec_facebook_url'];
        $kecTwitterUrl = $instance['kec_facebook_url'];
        $title = $instance['kec_title'];

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        // display the output on frontend
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        if (!empty($kecFacebookUrl) || !empty($kecTwitterUrl)) {

            echo '<ul>';
            if (!empty($kecFacebookUrl)) {
                echo '<li><a href="' . $kecFacebookUrl . '">' . __('Facebook') . '</a></li>';
            }

            if (!empty($kecTwitterUrl)) {
                echo '<li><a href="' . $kecTwitterUrl . '">' . __('Twitter') . '</a></li>';
            }
            echo '</ul>';
        }
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $kecTitle = ($instance['kec_title']) ? $instance['kec_title'] : __('');
        $kecFacebookUrl = ($instance['kec_facebook_url']) ? $instance['kec_facebook_url'] : __('');
        $kecTwitterUrl = ($instance['kec_twitter_url']) ? $instance['kec_twitter_url'] : __('');

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('kec_title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('kec_title'); ?>"
                   name="<?php echo $this->get_field_name('kec_title'); ?>" type="text"
                   value="<?php echo esc_attr($kecTitle); ?>"/>
        </p>

        <p>
            <label
                for="<?php echo $this->get_field_id('kec_facebook_url'); ?>"><?php _e('Facebook url (include https://):'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('kec_facebook_url'); ?>"
                   name="<?php echo $this->get_field_name('kec_facebook_url'); ?>" type="text"
                   value="<?php echo esc_attr($kecFacebookUrl); ?>"/>
        </p>


        <p>
            <label
                for="<?php echo $this->get_field_id('kec_twitter_url'); ?>"><?php _e('Twitter url (include https://):'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('kec_twitter_url'); ?>"
                   name="<?php echo $this->get_field_name('kec_twitter_url'); ?>" type="text"
                   value="<?php echo esc_attr($kecTwitterUrl); ?>"/>
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['kec_title'] = (!empty($new_instance['kec_title'])) ? strip_tags($new_instance['kec_title']) : '';
        $instance['kec_facebook_url'] = (!empty($new_instance['kec_facebook_url'])) ? strip_tags($new_instance['kec_facebook_url']) : '';
        $instance['kec_twitter_url'] = (!empty($new_instance['kec_twitter_url'])) ? strip_tags($new_instance['kec_twitter_url']) : '';
        return $instance;
    }
}