<?php
class MedigroupMikadoFieldPortfolioFollow extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $medigroup_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(medigroup_mikado_option_get_value($name) == "portfolio_single_follow") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'medigroup') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(medigroup_mikado_option_get_value($name) == "portfolio_single_no_follow") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'medigroup') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_portfoliofollow" value="portfolio_single_follow"<?php if(medigroup_mikado_option_get_value($name) == "portfolio_single_follow") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldZeroOne extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(medigroup_mikado_option_get_value($name) == "1") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'medigroup') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(medigroup_mikado_option_get_value($name) == "0") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'medigroup') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_zeroone" value="1"<?php if(medigroup_mikado_option_get_value($name) == "1") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldImageVideo extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $medigroup_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch switch-type">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(medigroup_mikado_option_get_value($name) == "image") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Image', 'medigroup') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(medigroup_mikado_option_get_value($name) == "video") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Video', 'medigroup') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_imagevideo" value="image"<?php if(medigroup_mikado_option_get_value($name) == "image") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldYesEmpty extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $medigroup_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(medigroup_mikado_option_get_value($name) == "yes") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'medigroup') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(medigroup_mikado_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'medigroup') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_yesempty" value="yes"<?php if(medigroup_mikado_option_get_value($name) == "yes") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldFlagPage extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $medigroup_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(medigroup_mikado_option_get_value($name) == "page") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'medigroup') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(medigroup_mikado_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'medigroup') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagpage" value="page"<?php if(medigroup_mikado_option_get_value($name) == "page") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldFlagPost extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(medigroup_mikado_option_get_value($name) == "post") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'medigroup') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(medigroup_mikado_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'medigroup') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagpost" value="post"<?php if(medigroup_mikado_option_get_value($name) == "post") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldFlagMedia extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $medigroup_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(medigroup_mikado_option_get_value($name) == "attachment") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'medigroup') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(medigroup_mikado_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'medigroup') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagmedia" value="attachment"<?php if(medigroup_mikado_option_get_value($name) == "attachment") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldFlagPortfolio extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $medigroup_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(medigroup_mikado_option_get_value($name) == "portfolio_page") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'medigroup') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(medigroup_mikado_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'medigroup') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagportfolio" value="portfolio_page"<?php if(medigroup_mikado_option_get_value($name) == "portfolio_page") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldFlagProduct extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        global $medigroup_options;
        $dependence = false;
        if(isset($args["dependence"])) {
            $dependence = true;
        }
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"])) {
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        }
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"])) {
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        }
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->


            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if(medigroup_mikado_option_get_value($name) == "product") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('Yes', 'medigroup') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if(medigroup_mikado_option_get_value($name) == "") {
                                           echo " selected";
                                       } ?><?php if($dependence) {
                                           echo " dependence";
                                       } ?>"><span><?php esc_html_e('No', 'medigroup') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagproduct" value="product"<?php if(medigroup_mikado_option_get_value($name) == "product") {
                                    echo " selected";
                                } ?>/>
                                <input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldRange extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $range_min      = 0;
        $range_max      = 1;
        $range_step     = 0.01;
        $range_decimals = 2;
        if(isset($args["range_min"])) {
            $range_min = $args["range_min"];
        }
        if(isset($args["range_max"])) {
            $range_max = $args["range_max"];
        }
        if(isset($args["range_step"])) {
            $range_step = $args["range_step"];
        }
        if(isset($args["range_decimals"])) {
            $range_decimals = $args["range_decimals"];
        }
        ?>

        <div class="mkd-page-form-section">


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mkd-slider-range-wrapper">
                                <div class="form-inline">
                                    <input type="text"
                                           class="form-control mkd-form-element mkd-form-element-xsmall pull-left mkd-slider-range-value"
                                           name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>

                                    <div class="mkd-slider-range small"
                                         data-step="<?php echo esc_attr($range_step); ?>" data-min="<?php echo esc_attr($range_min); ?>" data-max="<?php echo esc_attr($range_max); ?>" data-decimals="<?php echo esc_attr($range_decimals); ?>" data-start="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldRangeSimple extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        ?>

        <div class="col-lg-3" id="mkd_<?php echo esc_attr($name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>
            <div class="mkd-slider-range-wrapper">
                <div class="form-inline">
                    <em class="mkd-field-description"><?php echo esc_html($label); ?></em>
                    <input type="text"
                           class="form-control mkd-form-element mkd-form-element-xxsmall pull-left mkd-slider-range-value"
                           name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"/>

                    <div class="mkd-slider-range xsmall"
                         data-step="0.01" data-max="1" data-start="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"></div>
                </div>

            </div>
        </div>
    <?php

    }

}

class MedigroupMikadoFieldRadio extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $checked = "";
        if($default_value == $value) {
            $checked = "checked";
        }
        $html = '<input type="radio" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
        echo wp_kses($html, array(
            'input' => array(
                'type'    => true,
                'name'    => true,
                'value'   => true,
                'checked' => true
            ),
            'br'    => true
        ));

    }

}

class MedigroupMikadoFieldRadioGroup extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $dependence = isset($args["dependence"]) && $args["dependence"] ? true : false;
        $show       = !empty($args["show"]) ? $args["show"] : array();
        $hide       = !empty($args["hide"]) ? $args["hide"] : array();

        $use_images    = isset($args["use_images"]) && $args["use_images"] ? true : false;
        $hide_labels   = isset($args["hide_labels"]) && $args["hide_labels"] ? true : false;
        $hide_radios   = $use_images ? 'display: none' : '';
        $checked_value = medigroup_mikado_option_get_value($name);
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>" <?php if($hidden) { ?> style="display: none"<?php } ?>>

            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(is_array($options) && count($options)) { ?>
                                <div class="mkd-radio-group-holder <?php if($use_images) {
                                    echo "with-images";
                                } ?>">
                                    <?php foreach($options as $key => $atts) {
                                        $selected = false;
                                        if($checked_value == $key) {
                                            $selected = true;
                                        }

                                        $show_val = "";
                                        $hide_val = "";
                                        if($dependence) {
                                            if(array_key_exists($key, $show)) {
                                                $show_val = $show[$key];
                                            }

                                            if(array_key_exists($key, $hide)) {
                                                $hide_val = $hide[$key];
                                            }
                                        }
                                        ?>
                                        <label class="radio-inline">
                                            <input
                                                <?php echo medigroup_mikado_get_inline_attr($show_val, 'data-show'); ?>
                                                <?php echo medigroup_mikado_get_inline_attr($hide_val, 'data-hide'); ?>
                                                <?php if($selected) {
                                                    echo "checked";
                                                } ?> <?php medigroup_mikado_inline_style($hide_radios); ?>
                                                type="radio"
                                                name="<?php echo esc_attr($name); ?>"
                                                value="<?php echo esc_attr($key); ?>"
                                                <?php if($dependence) {
                                                    medigroup_mikado_class_attribute("dependence");
                                                } ?>> <?php if(!empty($atts["label"]) && !$hide_labels) {
                                                echo esc_attr($atts["label"]);
                                            } ?>

                                            <?php if($use_images) { ?>
                                                <img title="<?php if(!empty($atts["label"])) {
                                                    echo esc_attr($atts["label"]);
                                                } ?>" src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr("$key image") ?>"/>
                                            <?php } ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php
    }

}

class MedigroupMikadoFieldCheckBox extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

        $checked = "";
        if($default_value == $value) {
            $checked = "checked";
        }
        $html = '<input type="checkbox" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
        echo wp_kses($html, array(
            'input' => array(
                'type'    => true,
                'name'    => true,
                'value'   => true,
                'checked' => true
            ),
            'br'    => true
        ));

    }

}

class MedigroupMikadoFieldCheckBoxGroup extends MedigroupMikadoFieldType {

    public function render($name, $label = '', $description = '', $options = array(), $args = array(), $hidden = false) {
        if(!(is_array($options) && count($options))) {
            return;
        }

        $saved_value = medigroup_mikado_option_get_value($name);

        $enable_empty_checkbox = isset($args["enable_empty_checkbox"]) && $args["enable_empty_checkbox"] ? true : false;
        $inline_checkbox_class = isset($args["inline_checkbox_class"]) && $args["inline_checkbox_class"] ? 'checkbox-inline' : 'checkbox';
        ?>
        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mkd-checkbox-group-holder">
                                <?php if($enable_empty_checkbox) { ?>
                                    <div class="<?php echo esc_attr($inline_checkbox_class); ?>" style="display: none">
                                        <label>
                                            <input checked type="checkbox" value="" name="<?php echo esc_attr($name.'[]'); ?>">
                                        </label>
                                    </div>
                                <?php } ?>
                                <?php foreach($options as $option_key => $option_label) : ?>
                                    <?php
                                    $i = 1;
                                    $checked = is_array($saved_value) && in_array($option_key, $saved_value);
                                    $checked_attr = $checked ? 'checked' : '';
                                    ?>

                                    <div class="<?php echo esc_attr($inline_checkbox_class); ?>">
                                        <label>
                                            <input <?php echo esc_attr($checked_attr); ?> type="checkbox" id="<?php echo esc_attr($option_key).'-'.$i; ?>" value="<?php echo esc_attr($option_key); ?>" name="<?php echo esc_attr($name.'[]'); ?>">
                                            <label for="<?php echo esc_attr($option_key).'-'.$i; ?>"><?php echo esc_html($option_label); ?></label>
                                        </label>
                                    </div>
                                    <?php $i++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->
        </div>
    <?php
    }
}

class MedigroupMikadoFieldDate extends MedigroupMikadoFieldType {

    public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
        $col_width = 2;
        if(isset($args["col_width"])) {
            $col_width = $args["col_width"];
        }
        ?>

        <div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>


            <div class="mkd-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.mkd-field-desc -->

            <div class="mkd-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <input type="text"
                                   id="portfolio_date"
                                   class="datepicker form-control mkd-input mkd-form-element"
                                   name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(medigroup_mikado_option_get_value($name)); ?>"
                                /></div>
                    </div>
                </div>
            </div>
            <!-- close div.mkd-section-content -->

        </div>
    <?php

    }

}

class MedigroupMikadoFieldFactory {

    public function render( $field_type, $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

        switch ( strtolower( $field_type ) ) {

            case 'text':
                $field = new MedigroupMikadoFieldText();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'textsimple':
                $field = new MedigroupMikadoFieldTextSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'textarea':
                $field = new MedigroupMikadoFieldTextArea();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'textareasimple':
                $field = new MedigroupMikadoFieldTextAreaSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'textareahtml':
                $field = new MedigroupMikadoFieldTextAreaHtml();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'color':
                $field = new MedigroupMikadoFieldColor();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'colorsimple':
                $field = new MedigroupMikadoFieldColorSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'image':
                $field = new MedigroupMikadoFieldImage();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'imagesimple':
                $field = new MedigroupMikadoFieldImageSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'font':
                $field = new MedigroupMikadoFieldFont();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'fontsimple':
                $field = new MedigroupMikadoFieldFontSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'select':
                $field = new MedigroupMikadoFieldSelect();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'selectblank':
                $field = new MedigroupMikadoFieldSelectBlank();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'selectsimple':
                $field = new MedigroupMikadoFieldSelectSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'selectblanksimple':
                $field = new MedigroupMikadoFieldSelectBlankSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'yesno':
                $field = new MedigroupMikadoFieldYesNo();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'yesnosimple':
                $field = new MedigroupMikadoFieldYesNoSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'onoff':
                $field = new MedigroupMikadoFieldOnOff();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'portfoliofollow':
                $field = new MedigroupMikadoFieldPortfolioFollow();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'zeroone':
                $field = new MedigroupMikadoFieldZeroOne();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'imagevideo':
                $field = new MedigroupMikadoFieldImageVideo();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'yesempty':
                $field = new MedigroupMikadoFieldYesEmpty();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'flagpost':
                $field = new MedigroupMikadoFieldFlagPost();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'flagpage':
                $field = new MedigroupMikadoFieldFlagPage();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'flagmedia':
                $field = new MedigroupMikadoFieldFlagMedia();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'flagportfolio':
                $field = new MedigroupMikadoFieldFlagPortfolio();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'flagproduct':
                $field = new MedigroupMikadoFieldFlagProduct();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'range':
                $field = new MedigroupMikadoFieldRange();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'rangesimple':
                $field = new MedigroupMikadoFieldRangeSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'radio':
                $field = new MedigroupMikadoFieldRadio();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'checkbox':
                $field = new MedigroupMikadoFieldCheckBox();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'date':
                $field = new MedigroupMikadoFieldDate();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'radiogroup':
                $field = new MedigroupMikadoFieldRadioGroup();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'checkboxgroup':
                $field = new MedigroupMikadoFieldCheckBoxGroup();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'checkboxgroup':
                $field = new MedigroupMikadoFieldCheckBoxGroup();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'multipleimages':
                $field = new MedigroupMikadoMultipleImages($name, $label, $description);
                $field->render();
                break;
            default:
                break;
        }
    }
}