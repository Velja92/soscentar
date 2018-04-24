<?php

//top header bar
add_action('medigroup_mikado_before_page_header', 'medigroup_mikado_get_header_top');

//mobile header
add_action('medigroup_mikado_after_page_header', 'medigroup_mikado_get_mobile_header');