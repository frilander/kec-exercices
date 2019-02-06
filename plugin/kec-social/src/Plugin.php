<?php

namespace Kecsocial;

class Plugin
{
    public function init()
    {
        $this->registerWidget();

    }

    private function registerWidget() {
        add_action('widgets_init', function() {
            register_widget('KecWidget');
        });
    }

}


