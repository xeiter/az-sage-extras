<?php

namespace AZ;

class Location_Controller extends Controller {

    public function run( $view = null ) {

        global $post;

        $this->set_variable( 'phone_number', $post->az_location_phone );
        $this->set_variable( 'email_label', $post->az_location_email_label );

    }

}
