<?php
/**
 * Team info on hover shortcode template
 */
global $medigroup_IconCollections;
$number_of_social_icons = 5;
?>

<div class="mkd-team">
	<div class="mkd-team-inner">
		<?php if($team_image !== '') { ?>
			<div class="mkd-team-image-holder">
				<div class="mkd-team-image">
					<img src="<?php print $team_image_src; ?>" alt="mkd-team-image"/>

					<div class="mkd-team-social-holder">
						<div class="mkd-team-social <?php echo esc_attr($team_social_icon_type) ?>">
							<div class="mkd-team-social-inner">

								<?php foreach($team_social_icons as $team_social_icon) {
									print $team_social_icon;
								} ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if ($team_name !== '' || $team_position !== '' || $team_description != "" || $show_skills == 'yes') { ?>
			<div class="mkd-team-info">
				<?php if ($team_name !== '' || $team_position !== '') { ?>
					<div class="mkd-team-title-holder <?php echo esc_attr($team_social_icon_type) ?>">
						<?php if ($team_name !== '') { ?>
							<<?php echo esc_attr($team_name_tag); ?> class="mkd-team-name <?php echo esc_attr($light_class);?>">
								<?php echo ($team_name_link != '' ? '<a href="'.esc_url($team_name_link).'" target="'.esc_url($team_name_link_target).'">' : '') . esc_html($team_name) . ($team_name_link != '' ? '</a>' : ''); ?>
							</<?php echo esc_attr($team_name_tag); ?>>
						<?php } ?>
						<?php if ($team_position !== "") { ?>
							<h6 class="mkd-team-position <?php echo esc_attr($light_class);?>"><?php echo esc_attr($team_position) ?></h6>
						<?php } ?>
					</div>
				<?php } ?>

				<?php if ($team_description != "") { ?>
					<div class='mkd-team-text'>
						<div class='mkd-team-text-inner'>
							<div class='mkd-team-description <?php echo esc_attr($light_class);?>'>
								<p><?php echo esc_attr($team_description) ?></p>
							</div>
						</div>
					</div>
				<?php }
			} ?>

	</div>
</div>
</div>