<?php

$mkd_pages = array();
$pages = get_pages(); 
foreach($pages as $page) {
	$mkd_pages[$page->ID] = $page->post_title;
}

global $medigroup_IconCollections;

//Portfolio Images

$mkdPortfolioImages = new MedigroupMikadoMetaBox("portfolio-item", esc_html__("Portfolio Images (multiple upload)", 'medigroup'), '', '', 'portfolio_images');
$medigroup_Framework->mkdMetaBoxes->addMetaBox("portfolio_images",$mkdPortfolioImages);

	$mkd_portfolio_image_gallery = new MedigroupMikadoMultipleImages("mkd_portfolio-image-gallery",esc_html__("Portfolio Images", 'medigroup'),"Choose your portfolio images");
	$mkdPortfolioImages->addChild("mkd_portfolio-image-gallery",$mkd_portfolio_image_gallery);

//Portfolio Images/Videos 2

$mkdPortfolioImagesVideos2 = new MedigroupMikadoMetaBox("portfolio-item", esc_html__("Portfolio Images/Videos (single upload)", 'medigroup'));
$medigroup_Framework->mkdMetaBoxes->addMetaBox("portfolio_images_videos2",$mkdPortfolioImagesVideos2);

	$mkd_portfolio_images_videos2 = new MedigroupMikadoImagesVideosFramework(esc_html__("Portfolio Images/Videos 2", 'medigroup'),"ThisIsDescription");
	$mkdPortfolioImagesVideos2->addChild("mkd_portfolio_images_videos2",$mkd_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

$mkdAdditionalSidebarItems = new MedigroupMikadoMetaBox("portfolio-item", esc_html__("Additional Portfolio Sidebar Items", 'medigroup'));
$medigroup_Framework->mkdMetaBoxes->addMetaBox("portfolio_properties",$mkdAdditionalSidebarItems);

	$mkd_portfolio_properties = new MedigroupMikadoOptionsFramework(esc_html__("Portfolio Properties", 'medigroup'),"ThisIsDescription");
	$mkdAdditionalSidebarItems->addChild("mkd_portfolio_properties",$mkd_portfolio_properties);

