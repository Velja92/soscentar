(function($) {
	'use strict';

	var shortcodes = {};

	mkd.modules.shortcodes = shortcodes;

	shortcodes.mkdInitCounter = mkdInitCounter;
	shortcodes.mkdInitProgressBars = mkdInitProgressBars;
	shortcodes.mkdInitCountdown = mkdInitCountdown;
	shortcodes.mkdInitMessages = mkdInitMessages;
	shortcodes.mkdInitMessageHeight = mkdInitMessageHeight;
	shortcodes.mkdInitTestimonials = mkdInitTestimonials;
	shortcodes.mkdInitCarousels = mkdInitCarousels;
	shortcodes.mkdInitPieChart = mkdInitPieChart;
	shortcodes.mkdInitPieChartDoughnut = mkdInitPieChartDoughnut;
	shortcodes.mkdInitTabs = mkdInitTabs;
	shortcodes.mkdInitTabIcons = mkdInitTabIcons;
	shortcodes.mkdInitBlogListMasonry = mkdInitBlogListMasonry;
	shortcodes.mkdCustomFontResize = mkdCustomFontResize;
	shortcodes.mkdInitImageGallery = mkdInitImageGallery;
	shortcodes.mkdInitAccordions = mkdInitAccordions;
	shortcodes.mkdShowGoogleMap = mkdShowGoogleMap;
	shortcodes.mkdInitPortfolio = mkdInitPortfolio;
	shortcodes.mkdInitPortfolioMarquee = mkdInitPortfolioMarquee;
	shortcodes.mkdInitPortfolioLoadMore = mkdInitPortfolioLoadMore;
	shortcodes.mkdCheckSliderForHeaderStyle = mkdCheckSliderForHeaderStyle;
	shortcodes.mkdInfoBox = mkdInfoBox;
	shortcodes.mkdPricingTables = mkdPricingTables;
	shortcodes.mkdProcess = mkdProcess;
	shortcodes.mkdTwitterSlider = mkdTwitterSlider;
	shortcodes.mkdComparisonPricingTables = mkdComparisonPricingTables;
	shortcodes.mkdIconProgressBar = mkdIconProgressBar;
	shortcodes.mkdBlogSlider = mkdBlogSlider;
	shortcodes.mkdInitMiniTextSlider = mkdInitMiniTextSlider;
	shortcodes.mkdInitTeamSlider = mkdInitTeamSlider;
	shortcodes.mkdInitCardSlider = mkdInitCardSlider;
	shortcodes.mkdOnDocumentReady = mkdOnDocumentReady;
	shortcodes.mkdOnWindowLoad = mkdOnWindowLoad;
	shortcodes.mkdOnWindowResize = mkdOnWindowResize;
	shortcodes.mkdOnWindowScroll = mkdOnWindowScroll;
	shortcodes.emptySpaceResponsive = emptySpaceResponsive;
	shortcodes.mkdBMICalcSelect2 = mkdBMICalcSelect2;
	shortcodes.mkdInitTabSlider = mkdInitTabSlider;
	shortcodes.mkdCoverBoxes = mkdCoverBoxes;
	shortcodes.mkdBookingForm = mkdBookingForm;

	$(document).ready(mkdOnDocumentReady);
	$(window).load(mkdOnWindowLoad);
	$(window).resize(mkdOnWindowResize);
	$(window).scroll(mkdOnWindowScroll);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function mkdOnDocumentReady() {
		mkdInitCounter();
		mkdInitProgressBars();
		mkdInitCountdown();
		mkdIcon().init();
		mkdInitMessages();
		mkdInitMessageHeight();
		mkdInitTestimonials();
		mkdInitCarousels();
		mkdInitPieChart();
		mkdInitPieChartDoughnut();
		mkdInitTabs();
		mkdInitTabIcons();
		mkdButton().init();
		mkdInitBlogListMasonry();
		mkdCustomFontResize();
		mkdInitImageGallery();
		mkdTwitterSlider();
		mkdBlogSlider();
		mkdInitAccordions();
		mkdShowGoogleMap();
		mkdInitPortfolio();
		mkdInitPortfolioMarquee();
		mkdInitPortfolioLoadMore();
		mkdSlider().init();
		mkdSocialIconWidget().init();
		mkdPricingTables();
		mkdProcess().init();
		mkdComparisonPricingTables().init();
		mkdIconProgressBar().init();
		emptySpaceResponsive().init();
		mkdInitMiniTextSlider();
		mkdInitTeamSlider();
		mkdInitCardSlider();
		mkdBMICalcSelect2();
		mkdInitTabSlider();
		mkdCoverBoxes.init();
		mkdBookingForm();
	}

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function mkdOnWindowLoad() {
		mkdInfoBox();
	}

	/*
	 All functions to be called on $(window).resize() should be in this function
	 */
	function mkdOnWindowResize() {
		mkdInitBlogListMasonry();
		mkdCustomFontResize();
		mkdCoverBoxes.handleSize();
	}

	/*
	 All functions to be called on $(window).scroll() should be in this function
	 */
	function mkdOnWindowScroll() {

	}


	/**
	 * Counter Shortcode
	 */
	function mkdInitCounter() {

		var counters = $('.mkd-counter');


		if(counters.length) {
			counters.each(function() {
				var counter = $(this);
				counter.appear(function() {
					counter.parent().addClass('mkd-counter-holder-show');

					//Counter zero type
					if(counter.hasClass('zero')) {
						var max = parseFloat(counter.text());
						counter.countTo({
							from: 0,
							to: max,
							speed: 1500,
							refreshInterval: 100
						});
					} else {
						counter.absoluteCounter({
							speed: 2000,
							fadeInDelay: 1000
						});
					}

				}, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
			});
		}

	}

	/*
	 **	Horizontal progress bars shortcode
	 */
	function mkdInitProgressBars() {

		var progressBar = $('.mkd-progress-bar');

		if(progressBar.length) {

			progressBar.each(function() {

				var thisBar = $(this);

				thisBar.appear(function() {
					mkdInitToCounterProgressBar(thisBar);
					if(thisBar.find('.mkd-floating.mkd-floating-inside') !== 0) {
						var floatingInsideMargin = thisBar.find('.mkd-progress-content').height();
						floatingInsideMargin += parseFloat(thisBar.find('.mkd-progress-title-holder').css('padding-bottom'));
						floatingInsideMargin += parseFloat(thisBar.find('.mkd-progress-title-holder').css('margin-bottom'));
						thisBar.find('.mkd-floating-inside').css('margin-bottom', -(floatingInsideMargin) + 'px');
					}
					var percentage = thisBar.find('.mkd-progress-content').data('percentage'),
						progressContent = thisBar.find('.mkd-progress-content'),
						progressNumber = thisBar.find('.mkd-progress-number');

					progressContent.css('width', '0%');
					progressContent.animate({'width': percentage + '%'}, 1500);
					progressNumber.css('left', '0%');
					progressNumber.animate({'left': percentage + '%'}, 1500);

				});
			});
		}
	}

	/*
	 **	Counter for horizontal progress bars percent from zero to defined percent
	 */
	function mkdInitToCounterProgressBar(progressBar) {
		var percentage = parseFloat(progressBar.find('.mkd-progress-content').data('percentage'));
		var percent = progressBar.find('.mkd-progress-number .mkd-percent');
		if(percent.length) {
			percent.each(function() {
				var thisPercent = $(this);
				thisPercent.parents('.mkd-progress-number-wrapper').css('opacity', '1');
				thisPercent.countTo({
					from: 0,
					to: percentage,
					speed: 1500,
					refreshInterval: 50
				});
			});
		}
	}

	/*
	 **	Function to close message shortcode
	 */
	function mkdInitMessages() {
		var message = $('.mkd-message');
		if(message.length) {
			message.each(function() {
				var thisMessage = $(this);
				thisMessage.find('.mkd-close').click(function(e) {
					e.preventDefault();
					$(this).parent().parent().fadeOut(500);
				});
			});
		}
	}

	/*
	 **	Init message height
	 */
	function mkdInitMessageHeight() {
		var message = $('.mkd-message.mkd-with-icon');
		if(message.length) {
			message.each(function() {
				var thisMessage = $(this);
				var textHolderHeight = thisMessage.find('.mkd-message-text-holder').height();
				var iconHolderHeight = thisMessage.find('.mkd-message-icon-holder').height();

				if(textHolderHeight > iconHolderHeight) {
					thisMessage.find('.mkd-message-icon-holder').height(textHolderHeight);
				} else {
					thisMessage.find('.mkd-message-text-holder').height(iconHolderHeight);
				}
			});
		}
	}

	/**
	 * Countdown Shortcode
	 */
	function mkdInitCountdown() {

		var countdowns = $('.mkd-countdown'),
			year,
			month,
			day,
			hour,
			minute,
			timezone,
			monthLabel,
			dayLabel,
			hourLabel,
			minuteLabel,
			secondLabel;

		if(countdowns.length) {

			countdowns.each(function() {

				//Find countdown elements by id-s
				var countdownId = $(this).attr('id'),
					countdown = $('#' + countdownId),
					digitFontSize,
					labelFontSize;

				//Get data for countdown
				year = countdown.data('year');
				month = countdown.data('month');
				day = countdown.data('day');
				hour = countdown.data('hour');
				minute = countdown.data('minute');
				timezone = countdown.data('timezone');
				monthLabel = countdown.data('month-label');
				dayLabel = countdown.data('day-label');
				hourLabel = countdown.data('hour-label');
				minuteLabel = countdown.data('minute-label');
				secondLabel = countdown.data('second-label');
				digitFontSize = countdown.data('digit-size');
				labelFontSize = countdown.data('label-size');


				//Initialize countdown
				countdown.countdown({
					until: new Date(year, month - 1, day, hour, minute, 44),
					labels: ['Years', monthLabel, 'Weeks', dayLabel, hourLabel, minuteLabel, secondLabel],
					format: 'ODHMS',
					timezone: timezone,
					padZeroes: true,
					onTick: setCountdownStyle
				});

				function setCountdownStyle() {
					countdown.find('.countdown-amount').css({
						'font-size': digitFontSize + 'px',
						'line-height': digitFontSize + 'px'
					});
					countdown.find('.countdown-period').css({
						'font-size': labelFontSize + 'px'
					});
				}

			});

		}

	}

	/**
	 * Object that represents icon shortcode
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var mkdIcon = mkd.modules.shortcodes.mkdIcon = function() {
		//get all icons on page
		var icons = $('.mkd-icon-shortcode');

		/**
		 * Function that triggers icon animation and icon animation delay
		 */
		var iconAnimation = function(icon) {
			if(icon.hasClass('mkd-icon-animation')) {
				icon.appear(function() {
					icon.parent('.mkd-icon-animation-holder').addClass('mkd-icon-animation-show');
				}, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
			}
		};

		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};

				var iconElement = icon.find('.mkd-icon-element');
				var hoverColor = icon.data('hover-color');
				var originalColor = iconElement.css('color');

				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
				}
			}
		};

		/**
		 * Function that triggers icon holder background color hover functionality
		 */
		var iconHolderBackgroundHover = function(icon) {
			if(typeof icon.data('hover-background-color') !== 'undefined') {
				var changeIconBgColor = function(event) {
					event.data.icon.css('background-color', event.data.color);
				};

				var hoverBackgroundColor = icon.data('hover-background-color');
				var originalBackgroundColor = icon.css('background-color');

				if(hoverBackgroundColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
					icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
				}
			}
		};

		/**
		 * Function that initializes icon holder border hover functionality
		 */
		var iconHolderBorderHover = function(icon) {
			if(typeof icon.data('hover-border-color') !== 'undefined') {
				var changeIconBorder = function(event) {
					event.data.icon.css('border-color', event.data.color);
				};

				var hoverBorderColor = icon.data('hover-border-color');
				var originalBorderColor = icon.css('border-color');

				if(hoverBorderColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
					icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
				}
			}
		};

		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						iconAnimation($(this));
						iconHoverColor($(this));
						iconHolderBackgroundHover($(this));
						iconHolderBorderHover($(this));
					});

				}
			}
		};
	};

	/**
	 * Object that represents social icon widget
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var mkdSocialIconWidget = mkd.modules.shortcodes.mkdSocialIconWidget = function() {
		//get all social icons on page
		var icons = $('.mkd-social-icon-widget-holder');

		/**
		 * Function that triggers icon hover color functionality
		 */
		var socialIconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};

				var iconElement = icon;
				var hoverColor = icon.data('hover-color');
				var originalColor = iconElement.css('color');

				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
				}
			}
		};

		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						socialIconHoverColor($(this));
					});

				}
			}
		};
	};

	/**
	 * Init testimonials shortcode
	 */
	function mkdInitTestimonials() {

		var testimonial = $('.mkd-testimonials.testimonials-slider');
		if(testimonial.length) {
			testimonial.each(function() {

				var thisTestimonial = $(this);

				thisTestimonial.appear(function() {
					thisTestimonial.css('visibility', 'visible');
				}, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});

				var interval = 5000;
				var controlNav = false;
				var directionNav = true;
				var animationSpeed = 750;
				if(typeof thisTestimonial.data('animation-speed') !== 'undefined' && thisTestimonial.data('animation-speed') !== false) {
					animationSpeed = thisTestimonial.data('animation-speed');
				}

				//var iconClasses = getIconClassesForNavigation(directionNavArrowsTestimonials); TODO

				thisTestimonial.owlCarousel({
					singleItem: true,
					autoPlay: interval,
					navigation: false,
					// transitionStyle: 'fade', //fade, fadeUp, backSlide, goDown
					autoHeight: true,
					pagination: controlNav,
					slideSpeed: animationSpeed,
					addClassActive: true
				});

			});

		}

	}

	/**
	 * Init Carousel shortcode
	 */
	function mkdInitCarousels() {

		var carouselHolders = $('.mkd-carousel-holder'),
			carousel,
			numberOfItems;

		if(carouselHolders.length) {
			carouselHolders.each(function() {
				carousel = $(this).children('.mkd-carousel');
				numberOfItems = carousel.data('items');

				//Responsive breakpoints
				var items = [
					[0, 1],
					[480, 2],
					[600, 3],
					[768, 4],
					[1024, 5],
					[1280, 6]
				];
				var newItems = [];
				for(var i = 0; i < items.length; i++) {
					if(items[i][1] <= numberOfItems) {
						newItems.push(items[i]);
					}
					else {
						break;
					}
				}

				var showNav = carousel.data('navigation');

				if(typeof showNav !== 'undefined') {
					showNav = showNav === 'yes';
				} else {
					showNav = false;
				}

				carousel.owlCarousel({
					autoPlay: 4000,
					items: numberOfItems,
					itemsCustom: newItems,
					pagination: showNav,
					slideSpeed: 450,
					stopOnHover: true,
					afterInit: function() {
						carousel.css('visibility','visible');
					}
				});

			});
		}

	}

	function mkdTwitterSlider() {
		var twitterSliders = $('.mkd-twitter-slider-inner:not(.slick-initialized)');

		if(twitterSliders.length) {
			twitterSliders.each(function() {

				$(this).slick({
					centerMode: true,
					slidesToShow: 1,
					autoplay: true,
					arrows: false,
					centerPadding: '0px',
					dots: false,
					speed: 750,
					cssEase: 'cubic-bezier(.19,1,.22,1)',
					swipeToSlide: true,
				});
			});
		}
	}

	/**
	 * Init Pie Chart and Pie Chart With Icon shortcode
	 */
	function mkdInitPieChart() {

		var pieCharts = $('.mkd-pie-chart-holder, .mkd-pie-chart-with-icon-holder');

		if(pieCharts.length) {

			pieCharts.each(function() {

				var pieChart = $(this),
					percentageHolder = pieChart.children('.mkd-percentage, .mkd-percentage-with-icon'),
					barColor,
					trackColor,
					lineWidth,
					size = 155;

				if(typeof percentageHolder.data('size') !== 'undefined' && percentageHolder.data('size') !== '') {
					size = percentageHolder.data('size');
				}

				if(typeof pieChart.data('bar-color') !== 'undefined' && pieChart.data('bar-color') !== '') {
					barColor = pieChart.data('bar-color');
				}

				if(typeof pieChart.data('track-color') !== 'undefined' && pieChart.data('track-color') !== '') {
					trackColor = pieChart.data('track-color');
				}

				percentageHolder.appear(function() {
					initToCounterPieChart(pieChart);
					percentageHolder.css('opacity', '1');

					percentageHolder.easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: 6,
						animate: 1500,
						size: size
					});
				}, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});

			});

		}

	}

	/*
	 **	Counter for pie chart number from zero to defined number
	 */
	function initToCounterPieChart(pieChart) {

		pieChart.css('opacity', '1');
		var counter = pieChart.find('.mkd-to-counter'),
			max = parseFloat(counter.text());
		counter.countTo({
			from: 0,
			to: max,
			speed: 1500,
			refreshInterval: 50
		});

	}

	/**
	 * Init Pie Chart shortcode
	 */
	function mkdInitPieChartDoughnut() {

		var pieCharts = $('.mkd-pie-chart-doughnut-holder, .mkd-pie-chart-pie-holder');

		pieCharts.each(function() {

			var pieChart = $(this),
				canvas = pieChart.find('canvas'),
				chartID = canvas.attr('id'),
				chart = document.getElementById(chartID).getContext('2d'),
				data = [],
				jqChart = $(chart.canvas); //Convert canvas to JQuery object and get data parameters

			for(var i = 1; i <= 10; i++) {

				var chartItem,
					value = jqChart.data('value-' + i),
					color = jqChart.data('color-' + i);

				if(typeof value !== 'undefined' && typeof color !== 'undefined') {
					chartItem = {
						value: value,
						color: color
					};
					data.push(chartItem);
				}

			}

			if(canvas.hasClass('mkd-pie')) {
				new Chart(chart).Pie(data,
					{segmentStrokeColor: 'transparent'}
				);
			} else {
				new Chart(chart).Doughnut(data,
					{segmentStrokeColor: 'transparent'}
				);
			}

		});

	}

	/**
	 * Tab Slider
	 */
	function mkdInitTabSlider() {
		var tabSliders = $('.mkd-tab-slider-holder');

		if(tabSliders.length) {
			tabSliders.each(function() {
				var sliderNav = $(this).children('.mkd-tab-slider-nav');
				var sliderCont = $(this).children('.mkd-tab-slider-container');

				sliderCont.find('.mkd-tab-slider-item').each(function(i) {
					var item = $(this);
					var icon = '';
					var customIcon = '';
					if(typeof item.data('icon-html') !== 'undefined' || item.data('icon-html') !== 'false') {
						icon = item.data('icon-html');
					}
					if(typeof item.data('custom-icon-url') !== 'undefined' && item.data('custom-icon-url') !== '') {
						customIcon = '<img class="mkd-tab-slider-icon-image" alt="mkd-tab-slider-icon" src="' + item.data('custom-icon-url') + '">';
					}

					var tabNav = sliderNav.children('.mkd-tab-slider-nav-item').eq(i);

					if(typeof(tabNav) !== 'undefined') {
						var cont = customIcon != '' ? customIcon : icon;
						tabNav.find('.mkd-tab-slider-nav-icon').html(cont);
					}

				});

				sliderCont.flexslider({
					animation: 'slide',
					manualControls: '.mkd-tab-slider-nav .mkd-tab-slider-nav-item',
					selector: '.mkd-tab-slider-container-inner li',
					directionNav: false
				});
			});
		}
	}

	/*
	 **	Init tabs shortcode
	 */
	function mkdInitTabs() {

		var tabs = $('.mkd-tabs');
		if(tabs.length) {
			tabs.each(function() {
				var thisTabs = $(this);

				thisTabs.waitForImages(function(){
					thisTabs.css('visibility', 'visible');
				});

				thisTabs.children('.mkd-tab-container').each(function(index) {
					index = index + 1;
					var that = $(this),
						link = that.attr('id'),
						navItem = that.parent().find('.mkd-tabs-nav li:nth-child(' + index + ') a'),
						navLink = navItem.attr('href');

					link = '#' + link;

					if(link.indexOf(navLink) > -1) {
						navItem.attr('href', link);
					}
				});

				if(thisTabs.hasClass('mkd-horizontal')) {
					thisTabs.tabs();
				}
				else if(thisTabs.hasClass('mkd-vertical')) {
					thisTabs.tabs().addClass('ui-tabs-vertical ui-helper-clearfix');
					thisTabs.find('.mkd-tabs-nav > ul >li').removeClass('ui-corner-top').addClass('ui-corner-left');
				}

				//animated tabs
				if (thisTabs.hasClass('mkd-animated-tabs')) {
					
					var tabContent = thisTabs.find('.mkd-tab-container');

					thisTabs.appear(function(){
						setTimeout(function(){
							tabContent.eq(0).addClass('mkd-appeared');
						},10);
					}, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});

					thisTabs.find('li').each(function(){
						var thisTab = $(this);
							
						thisTab.on('click', function(){
							tabContent.removeClass('mkd-appeared');

							setTimeout(function(){
								tabContent.filter(':visible').addClass('mkd-appeared');
							}, 10);
						});
					});
				}
			});
		}
	}

	/*
	 **	Generate icons in tabs navigation
	 */
	function mkdInitTabIcons() {

		var tabContent = $('.mkd-tab-container');
		if(tabContent.length) {

			tabContent.each(function() {
				var thisTabContent = $(this);

				var id = thisTabContent.attr('id');
				var icon = '';
				if(typeof thisTabContent.data('icon-html') !== 'undefined' || thisTabContent.data('icon-html') !== 'false') {
					icon = thisTabContent.data('icon-html');
				}

				var tabNav = thisTabContent.parents('.mkd-tabs').find('.mkd-tabs-nav > li > a[href="#' + id + '"]');

				if(typeof(tabNav) !== 'undefined') {
					tabNav.children('.mkd-icon-frame').append(icon);
				}
			});
		}
	}

	/**
	 * Button object that initializes whole button functionality
	 * @type {Function}
	 */
	var mkdButton = mkd.modules.shortcodes.mkdButton = function() {
		//all buttons on the page
		var buttons = $('.mkd-btn');

		/**
		 * Initializes button hover color
		 * @param button current button
		 */
		var buttonHoverColor = function(button) {
			if(typeof button.data('hover-color') !== 'undefined') {
				var changeButtonColor = function(event) {
					event.data.button.css('color', event.data.color);
				};

				var originalColor = button.css('color');
				var hoverColor = button.data('hover-color');

				button.on('mouseenter', {button: button, color: hoverColor}, changeButtonColor);
				button.on('mouseleave', {button: button, color: originalColor}, changeButtonColor);
			}
		};


		/**
		 * Initializes button hover background color
		 * @param button current button
		 */
		var buttonHoverBgColor = function(button) {
			if(typeof button.data('hover-bg-color') !== 'undefined') {
				var changeButtonBg = function(event) {
					event.data.button.css('background-color', event.data.color);
				};

				var originalBgColor = button.css('background-color');
				var hoverBgColor = button.data('hover-bg-color');

				button.on('mouseenter', {button: button, color: hoverBgColor}, changeButtonBg);
				button.on('mouseleave', {button: button, color: originalBgColor}, changeButtonBg);
			}
		};

		/**
		 * Initializes button border color
		 * @param button
		 */
		var buttonHoverBorderColor = function(button) {
			if(typeof button.data('hover-border-color') !== 'undefined') {
				var changeBorderColor = function(event) {
					event.data.button.css('border-color', event.data.color);
				};

				var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
				var hoverBorderColor = button.data('hover-border-color');

				button.on('mouseenter', {button: button, color: hoverBorderColor}, changeBorderColor);
				button.on('mouseleave', {button: button, color: originalBorderColor}, changeBorderColor);
			}
		};

		return {
			init: function() {
				if(buttons.length) {
					buttons.each(function() {
						buttonHoverColor($(this));
						buttonHoverBgColor($(this));
						buttonHoverBorderColor($(this));
					});
				}
			}
		};
	};

	/*
	 **	Init blog list masonry type
	 */
	function mkdInitBlogListMasonry() {
		var blogList = $('.mkd-blog-list-holder.mkd-masonry .mkd-blog-list');
		if(blogList.length) {
			blogList.each(function() {
				var thisBlogList = $(this);
				thisBlogList.animate({opacity: 1});
				thisBlogList.isotope({
					itemSelector: '.mkd-blog-list-masonry-item',
					masonry: {
						columnWidth: '.mkd-blog-list-masonry-grid-sizer',
						gutter: '.mkd-blog-list-masonry-grid-gutter'
					}
				});
			});

		}
	}

	/*
	 **	Custom Font resizing
	 */
	function mkdCustomFontResize() {
		var customFont = $('.mkd-custom-font-holder');
		if(customFont.length) {
			customFont.each(function() {
				var thisCustomFont = $(this);
				var fontSize;
				var lineHeight;
				var coef1 = 1;
				var coef2 = 1;

				if(mkd.windowWidth < 1200) {
					coef1 = 0.8;
				}

				if(mkd.windowWidth < 1000) {
					coef1 = 0.7;
				}

				if(mkd.windowWidth < 768) {
					coef1 = 0.6;
					coef2 = 0.7;
				}

				if(mkd.windowWidth < 600) {
					coef1 = 0.5;
					coef2 = 0.6;
				}

				if(mkd.windowWidth < 480) {
					coef1 = 0.4;
					coef2 = 0.5;
				}

				if(typeof thisCustomFont.data('font-size') !== 'undefined' && thisCustomFont.data('font-size') !== false) {
					fontSize = parseInt(thisCustomFont.data('font-size'));

					if(fontSize > 70) {
						fontSize = Math.round(fontSize * coef1);
					}
					else if(fontSize > 35) {
						fontSize = Math.round(fontSize * coef2);
					}

					thisCustomFont.css('font-size', fontSize + 'px');
				}

				if(typeof thisCustomFont.data('line-height') !== 'undefined' && thisCustomFont.data('line-height') !== false) {
					lineHeight = parseInt(thisCustomFont.data('line-height'));

					if(lineHeight > 70 && mkd.windowWidth < 1200) {
						lineHeight = '1.2em';
					}
					else if(lineHeight > 35 && mkd.windowWidth < 768) {
						lineHeight = '1.2em';
					}
					else {
						lineHeight += 'px';
					}

					thisCustomFont.css('line-height', lineHeight);
				}
			});
		}
	}

	/*
	 **	Show Google Map
	 */
	function mkdShowGoogleMap() {

		if($('.mkd-google-map').length) {
			$('.mkd-google-map').each(function() {

				var element = $(this);

				var customMapStyle;
				if(typeof element.data('custom-map-style') !== 'undefined') {
					customMapStyle = element.data('custom-map-style');
				}

				var colorOverlay;
				if(typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
					colorOverlay = element.data('color-overlay');
				}

				var saturation;
				if(typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
					saturation = element.data('saturation');
				}

				var lightness;
				if(typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
					lightness = element.data('lightness');
				}

				var zoom;
				if(typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
					zoom = element.data('zoom');
				}

				var pin;
				if(typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
					pin = element.data('pin');
				}

				var mapHeight;
				if(typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
					mapHeight = element.data('height');
				}

				var uniqueId;
				if(typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
					uniqueId = element.data('unique-id');
				}

				var scrollWheel;
				if(typeof element.data('scroll-wheel') !== 'undefined') {
					scrollWheel = element.data('scroll-wheel');
				}
				var addresses;
				if(typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
					addresses = element.data('addresses');
				}

				var map = "map_" + uniqueId;
				var geocoder = "geocoder_" + uniqueId;
				var holderId = "mkd-map-" + uniqueId;

				mkdInitializeGoogleMap(customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin, map, geocoder, addresses);
			});
		}

	}

	/*
	 **	Init Google Map
	 */
	function mkdInitializeGoogleMap(customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin, map, geocoder, data) {

		var mapStyles = [
			{
				stylers: [
					{hue: color},
					{saturation: saturation},
					{lightness: lightness},
					{gamma: 1}
				]
			}
		];

		var googleMapStyleId;

		if(customMapStyle) {
			googleMapStyleId = 'mkd-style';
		} else {
			googleMapStyleId = google.maps.MapTypeId.ROADMAP;
		}

		var qoogleMapType = new google.maps.StyledMapType(mapStyles,
			{name: "Mikado Google Map"});

		geocoder = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(-34.397, 150.644);

		if(!isNaN(height)) {
			height = height + 'px';
		}

		var myOptions = {

			zoom: zoom,
			scrollwheel: wheel,
			center: latlng,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.RIGHT_CENTER
			},
			scaleControl: false,
			scaleControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			streetViewControl: false,
			streetViewControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			panControl: false,
			panControlOptions: {
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			mapTypeControl: false,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'mkd-style'],
				style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
				position: google.maps.ControlPosition.LEFT_CENTER
			},
			mapTypeId: googleMapStyleId
		};

		map = new google.maps.Map(document.getElementById(holderId), myOptions);
		map.mapTypes.set('mkd-style', qoogleMapType);

		var index;

		for(index = 0; index < data.length; ++index) {
			mkdInitializeGoogleAddress(data[index], pin, map, geocoder);
		}

		var holderElement = document.getElementById(holderId);
		holderElement.style.height = height;
	}

	/*
	 **	Init Google Map Addresses
	 */
	function mkdInitializeGoogleAddress(data, pin, map, geocoder) {
		if(data === '')
			return;
		var contentString = '<div id="content">' +
			'<div id="siteNotice">' +
			'</div>' +
			'<div id="bodyContent">' +
			'<p>' + data + '</p>' +
			'</div>' +
			'</div>';
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});
		geocoder.geocode({'address': data}, function(results, status) {
			if(status === google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
					icon: pin,
					title: data['store_title']
				});
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map, marker);
				});

				google.maps.event.addDomListener(window, 'resize', function() {
					map.setCenter(results[0].geometry.location);
				});

			}
		});
	}

	function mkdInitAccordions() {
		var accordion = $('.mkd-accordion-holder');
		if(accordion.length) {
			accordion.each(function() {

				var thisAccordion = $(this);

				if(thisAccordion.hasClass('mkd-accordion')) {

					thisAccordion.accordion({
						animate: "swing",
						collapsible: false,
						active: 0,
						icons: "",
						heightStyle: "content"
					});
				}

				if(thisAccordion.hasClass('mkd-toggle')) {

					var toggleAccordion = $(this);
					var toggleAccordionTitle = toggleAccordion.find('.mkd-title-holder');
					var toggleAccordionContent = toggleAccordionTitle.next();

					toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
					toggleAccordionTitle.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom");
					toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

					toggleAccordionTitle.each(function() {
						var thisTitle = $(this);
						thisTitle.hover(function() {
							thisTitle.toggleClass("ui-state-hover");
						});

						thisTitle.on('click', function() {
							thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
							thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
						});
					});
				}
			});
		}
	}

	function mkdInitImageGallery() {

		var galleries = $('.mkd-image-gallery');

		if(galleries.length) {
			galleries.each(function() {
				var gallery = $(this).children('.mkd-image-gallery-slider'),
					autoplay = gallery.data('autoplay'),
					animation = (gallery.data('animation') == 'slide') ? false : gallery.data('animation'),
					navigation = (gallery.data('navigation') == 'yes'),
					pagination = (gallery.data('pagination') == 'yes');

				gallery.owlCarousel({
					singleItem: true,
					autoPlay: autoplay * 1000,
					navigation: navigation,
					transitionStyle: animation, //fade, fadeUp, backSlide, goDown
					autoHeight: true,
					pagination: pagination,
					slideSpeed: 450,
					stopOnHover: true,
					navigationText: [
						'<span class="mkd-prev-icon"><i class="fa fa-angle-left"></i></span>',
						'<span class="mkd-next-icon"><i class="fa fa-angle-right"></i></span>'
					]
				});
			});
		}

	}

	/**
	 * Initializes portfolio list
	 */
	function mkdInitPortfolio() {
		var portList = $('.mkd-portfolio-list-holder-outer.mkd-ptf-standard, .mkd-portfolio-list-holder-outer.mkd-ptf-gallery');
		if(portList.length) {
			portList.each(function() {
				var thisPortList = $(this);
				mkdInitPortMixItUp(thisPortList);
			});
		}
	}

	/**
	 * Initializes portfolio marquee
	 */
	function mkdInitPortfolioMarquee() {
		var ptfm = $('.mkd-portfolio-marquee');

		if(ptfm.length) {
			ptfm.each(function() {
				var numberOfItems = $(this).data('columns');
				var customColumns = [
					[0, 1],
					[480, 2],
					[768, 3],
					[1024, 4],
					[1400, 5]
				];
				var newCols = [];
				for(var i = 0; i < customColumns.length; i++) {
					if(numberOfItems > i) newCols.push(customColumns[i]);
					else break;
				}

				var autoplay = $(this).data('autoplay') === 'disable' ? false : $(this).data('autoplay');
				var ptfmSlider = $(this).children('.mkd-portfolio-marquee-inner');

				ptfmSlider.owlCarousel({
					items: numberOfItems,
					autoPlay: autoplay * 1000,
					navigation: false,
					autoHeight: true,
					pagination: false,
					slideSpeed: 450,
					itemsCustom: newCols,
					stopOnHover: true,
					afterInit: function() {
						ptfmSlider.css('visibility','visible');
					}
				});
			});
		}
	}

	/**
	 * Initializes mixItUp function for specific container
	 */
	function mkdInitPortMixItUp(container) {
		var filterClass = '';
		if(container.hasClass('mkd-ptf-has-filter')) {
			filterClass = container.find('.mkd-portfolio-filter-holder-inner ul li').data('class');
			filterClass = '.' + filterClass;
		}

		var holderInner = container.find('.mkd-portfolio-list-holder');
		holderInner.mixItUp({
			callbacks: {
				onMixLoad: function() {
					holderInner.find('article').css('visibility', 'visible');
				},
				onMixStart: function() {
					holderInner.find('article').css('visibility', 'visible');
				},
				onMixBusy: function() {
					holderInner.find('article').css('visibility', 'visible');
				}
			},
			selectors: {
				filter: filterClass
			},
			animation: {
				effects: 'fade',
				duration: 400
			}
		});

	}

	/**
	 * Initializes portfolio load more function
	 */
	function mkdInitPortfolioLoadMore() {
		var portList = $('.mkd-portfolio-list-holder-outer.mkd-ptf-load-more');
		if(portList.length) {
			portList.each(function() {

				var thisPortList = $(this);
				var thisPortListInner = thisPortList.find('.mkd-portfolio-list-holder');
				var nextPage;
				var maxNumPages;
				var loadMoreButton = thisPortList.find('.mkd-ptf-list-load-more a');

				if(typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
					maxNumPages = thisPortList.data('max-num-pages');
				}

				loadMoreButton.on('click', function(e) {
					var loadMoreDatta = mkdGetPortfolioAjaxData(thisPortList);
					nextPage = loadMoreDatta.nextPage;
					e.preventDefault();
					e.stopPropagation();
					if(nextPage <= maxNumPages) {
						var ajaxData = mkdSetPortfolioAjaxData(loadMoreDatta);
						$.ajax({
							type: 'POST',
							data: ajaxData,
							url: mkdCoreAjaxUrl,
							success: function(data) {
								nextPage++;
								thisPortList.data('next-page', nextPage);
								var response = $.parseJSON(data);
								var responseHtml = mkdConvertHTML(response.html); //convert response html into jQuery collection that Mixitup can work with
								thisPortList.waitForImages(function() {
									setTimeout(function() {
										thisPortListInner.mixItUp('append', responseHtml);
									}, 400);
								});
							}
						});
					}
					if(nextPage === maxNumPages) {
						loadMoreButton.hide();
					}
				});

			});
		}
	}

	function mkdConvertHTML(html) {
		var newHtml = $.trim(html),
			$html = $(newHtml),
			$empty = $();

		$html.each(function(index, value) {
			if(value.nodeType === 1) {
				$empty = $empty.add(this);
			}
		});

		return $empty;
	}

	/**
	 * Initializes portfolio load more data params
	 * @param portfolio list container with defined data params
	 * return array
	 */
	function mkdGetPortfolioAjaxData(container) {
		var returnValue = {};

		returnValue.type = '';
		returnValue.columns = '';
		returnValue.gridSize = '';
		returnValue.orderBy = '';
		returnValue.order = '';
		returnValue.number = '';
		returnValue.imageSize = '';
		returnValue.customImageDimensions = '';
		returnValue.filter = '';
		returnValue.filterOrderBy = '';
		returnValue.category = '';
		returnValue.selectedProjectes = '';
		returnValue.showLoadMore = '';
		returnValue.titleTag = '';
		returnValue.nextPage = '';
		returnValue.maxNumPages = '';
		returnValue.showExcerpt = '';

		if(typeof container.data('type') !== 'undefined' && container.data('type') !== false) {
			returnValue.type = container.data('type');
		}

		if(typeof container.data('grid-size') !== 'undefined' && container.data('grid-size') !== false) {
			returnValue.gridSize = container.data('grid-size');
		}

		if(typeof container.data('columns') !== 'undefined' && container.data('columns') !== false) {
			returnValue.columns = container.data('columns');
		}

		if(typeof container.data('order-by') !== 'undefined' && container.data('order-by') !== false) {
			returnValue.orderBy = container.data('order-by');
		}

		if(typeof container.data('order') !== 'undefined' && container.data('order') !== false) {
			returnValue.order = container.data('order');
		}

		if(typeof container.data('number') !== 'undefined' && container.data('number') !== false) {
			returnValue.number = container.data('number');
		}

		if(typeof container.data('image-size') !== 'undefined' && container.data('image-size') !== false) {
			returnValue.imageSize = container.data('image-size');
		}

		if(typeof container.data('custom-image-dimensions') !== 'undefined' && container.data('custom-image-dimensions') !== false) {
			returnValue.customImageDimensions = container.data('custom-image-dimensions');
		}

		if(typeof container.data('filter') !== 'undefined' && container.data('filter') !== false) {
			returnValue.filter = container.data('filter');
		}

		if(typeof container.data('filter-order-by') !== 'undefined' && container.data('filter-order-by') !== false) {
			returnValue.filterOrderBy = container.data('filter-order-by');
		}

		if(typeof container.data('category') !== 'undefined' && container.data('category') !== false) {
			returnValue.category = container.data('category');
		}

		if(typeof container.data('selected-projects') !== 'undefined' && container.data('selected-projects') !== false) {
			returnValue.selectedProjectes = container.data('selected-projects');
		}

		if(typeof container.data('show-load-more') !== 'undefined' && container.data('show-load-more') !== false) {
			returnValue.showLoadMore = container.data('show-load-more');
		}

		if(typeof container.data('title-tag') !== 'undefined' && container.data('title-tag') !== false) {
			returnValue.titleTag = container.data('title-tag');
		}

		if(typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
			returnValue.nextPage = container.data('next-page');
		}

		if(typeof container.data('max-num-pages') !== 'undefined' && container.data('max-num-pages') !== false) {
			returnValue.maxNumPages = container.data('max-num-pages');
		}

		if(typeof container.data('show-excerpt') !== 'undefined' && container.data('show-excerpt') !== false) {
			returnValue.showExcerpt = container.data('show-excerpt');
		}

		return returnValue;
	}

	/**
	 * Sets portfolio load more data params for ajax function
	 * @param portfolio list container with defined data params
	 * return array
	 */
	function mkdSetPortfolioAjaxData(container) {
		var returnValue = {
			action: 'mkd_core_portfolio_ajax_load_more',
			type: container.type,
			columns: container.columns,
			gridSize: container.gridSize,
			orderBy: container.orderBy,
			order: container.order,
			number: container.number,
			imageSize: container.imageSize,
			customImageDimensions: container.customImageDimensions,
			filter: container.filter,
			filterOrderBy: container.filterOrderBy,
			category: container.category,
			selectedProjectes: container.selectedProjectes,
			showLoadMore: container.showLoadMore,
			titleTag: container.titleTag,
			nextPage: container.nextPage,
			showExcerpt: container.showExcerpt
		};
		return returnValue;
	}

	/**
	 * Slider object that initializes whole slider functionality
	 * @type {Function}
	 */
	var mkdSlider = mkd.modules.shortcodes.mkdSlider = function() {

		//all sliders on the page
		var sliders = $('.mkd-slider .carousel');
		//image regex used to extract img source
		var imageRegex = /url\(["']?([^'")]+)['"]?\)/;
		//default responsive breakpoints set
		var responsiveBreakpointSet = [1600, 1200, 900, 650, 500, 320];
		//var init for coefficiens array
		var coefficientsGraphicArray;
		var coefficientsTitleArray;
		var coefficientsSubtitleArray;
		var coefficientsTextArray;
		var coefficientsButtonArray;
		//var init for slider elements responsive coefficients
		var sliderGraphicCoefficient;
		var sliderTitleCoefficient;
		var sliderSubtitleCoefficient;
		var sliderTextCoefficient;
		var sliderButtonCoefficient;
		var sliderTitleCoefficientLetterSpacing;
		var sliderSubtitleCoefficientLetterSpacing;
		var sliderTextCoefficientLetterSpacing;

		/*** Functionality for translating image in slide - START ***/

		var matrixArray = {
			zoom_center: '1.2, 0, 0, 1.2, 0, 0',
			zoom_top_left: '1.2, 0, 0, 1.2, -150, -150',
			zoom_top_right: '1.2, 0, 0, 1.2, 150, -150',
			zoom_bottom_left: '1.2, 0, 0, 1.2, -150, 150',
			zoom_bottom_right: '1.2, 0, 0, 1.2, 150, 150'
		};

		// regular expression for parsing out the matrix components from the matrix string
		var matrixRE = /\([0-9epx\.\, \t\-]+/gi;

		// parses a matrix string of the form "matrix(n1,n2,n3,n4,n5,n6)" and
		// returns an array with the matrix components
		var parseMatrix = function(val) {
			return val.match(matrixRE)[0].substr(1).split(",").map(function(s) {
				return parseFloat(s);
			});
		};

		// transform css property names with vendor prefixes;
		// the plugin will check for values in the order the names are listed here and return as soon as there
		// is a value; so listing the W3 std name for the transform results in that being used if its available
		var transformPropNames = [
			"transform",
			"-webkit-transform"
		];

		var getTransformMatrix = function(el) {
			// iterate through the css3 identifiers till we hit one that yields a value
			var matrix = null;
			transformPropNames.some(function(prop) {
				matrix = el.css(prop);
				return (matrix !== null && matrix !== "");
			});

			// if "none" then we supplant it with an identity matrix so that our parsing code below doesn't break
			matrix = (!matrix || matrix === "none") ?
				"matrix(1,0,0,1,0,0)" : matrix;
			return parseMatrix(matrix);
		};

		// set the given matrix transform on the element; note that we apply the css transforms in reverse order of how its given
		// in "transformPropName" to ensure that the std compliant prop name shows up last
		var setTransformMatrix = function(el, matrix) {
			var m = "matrix(" + matrix.join(",") + ")";
			for(var i = transformPropNames.length - 1; i >= 0; --i) {
				el.css(transformPropNames[i], m + ' rotate(0.01deg)');
			}
		};

		// interpolates a value between a range given a percent
		var interpolate = function(from, to, percent) {
			return from + ((to - from) * (percent / 100));
		};

		$.fn.transformAnimate = function(opt) {
			// extend the options passed in by caller
			var options = {
				transform: "matrix(1,0,0,1,0,0)"
			};
			$.extend(options, opt);

			// initialize our custom property on the element to track animation progress
			this.css("percentAnim", 0);

			// supplant "options.step" if it exists with our own routine
			var sourceTransform = getTransformMatrix(this);
			var targetTransform = parseMatrix(options.transform);
			options.step = function(percentAnim, fx) {
				// compute the interpolated transform matrix for the current animation progress
				var $this = $(this);
				var matrix = sourceTransform.map(function(c, i) {
					return interpolate(c, targetTransform[i],
						percentAnim);
				});

				// apply the new matrix
				setTransformMatrix($this, matrix);

				// invoke caller's version of "step" if one was supplied;
				if(opt.step) {
					opt.step.apply(this, [matrix, fx]);
				}
			};

			// animate!
			return this.stop().animate({percentAnim: 100}, options);
		};

		/*** Functionality for translating image in slide - END ***/


		/**
		 * Calculate heights for slider holder and slide item, depending on window width, but only if slider is set to be responsive
		 * @param slider, current slider
		 * @param defaultHeight, default height of slider, set in shortcode
		 * @param responsive_breakpoint_set, breakpoints set for slider responsiveness
		 * @param reset, boolean for reseting heights
		 */
		var setSliderHeight = function(slider, defaultHeight, responsive_breakpoint_set, reset) {
			var sliderHeight = defaultHeight;
			if(!reset) {
				if(mkd.windowWidth > responsive_breakpoint_set[0]) {
					sliderHeight = defaultHeight;
				} else if(mkd.windowWidth > responsive_breakpoint_set[1]) {
					sliderHeight = defaultHeight * 0.75;
				} else if(mkd.windowWidth > responsive_breakpoint_set[2]) {
					sliderHeight = defaultHeight * 0.6;
				} else if(mkd.windowWidth > responsive_breakpoint_set[3]) {
					sliderHeight = defaultHeight * 0.55;
				} else if(mkd.windowWidth <= responsive_breakpoint_set[3]) {
					sliderHeight = defaultHeight * 0.45;
				}
			}

			slider.css({'height': (sliderHeight) + 'px'});
			slider.find('.mkd-slider-preloader').css({'height': (sliderHeight) + 'px'});
			slider.find('.mkd-slider-preloader .mkd-ajax-loader').css({'display': 'block'});
			slider.find('.item').css({'height': (sliderHeight) + 'px'});
		};

		/**
		 * Calculate heights for slider holder and slide item, depending on window size, but only if slider is set to be full height
		 * @param slider, current slider
		 */
		var setSliderFullHeight = function(slider) {
			var mobileHeaderHeight = mkd.windowWidth < 1000 ? mkdGlobalVars.vars.mkdMobileHeaderHeight + $('.mkd-top-bar').height() : 0;
			slider.css({'height': (mkd.windowHeight - mobileHeaderHeight) + 'px'});
			slider.find('.mkd-slider-preloader').css({'height': (mkd.windowHeight) + 'px'});
			slider.find('.mkd-slider-preloader .mkd-ajax-loader').css({'display': 'block'});
			slider.find('.item').css({'height': (mkd.windowHeight) + 'px'});
		};

		/**
		 * Set initial sizes for slider elements and put them in global variables
		 * @param slideItem, each slide
		 * @param index, index od slide item
		 */
		var setSizeGlobalVariablesForSlideElements = function(slideItem, index) {
			window["slider_graphic_width_" + index] = [];
			window["slider_graphic_height_" + index] = [];
			window["slider_title_" + index] = [];
			window["slider_subtitle_" + index] = [];
			window["slider_text_" + index] = [];
			window["slider_button1_" + index] = [];
			window["slider_button2_" + index] = [];

			//graphic size
			window["slider_graphic_width_" + index].push(parseFloat(slideItem.find('.mkd-thumb img').data("width")));
			window["slider_graphic_height_" + index].push(parseFloat(slideItem.find('.mkd-thumb img').data("height")));

			// font-size (0)
			window["slider_title_" + index].push(parseFloat(slideItem.find('.mkd-slide-title').css("font-size")));
			window["slider_subtitle_" + index].push(parseFloat(slideItem.find('.mkd-slide-subtitle').css("font-size")));
			window["slider_text_" + index].push(parseFloat(slideItem.find('.mkd-slide-text').css("font-size")));
			window["slider_button1_" + index].push(parseFloat(slideItem.find('.mkd-btn:eq(0)').css("font-size")));
			window["slider_button2_" + index].push(parseFloat(slideItem.find('.mkd-btn:eq(1)').css("font-size")));

			// line-height (1)
			window["slider_title_" + index].push(parseFloat(slideItem.find('.mkd-slide-title').css("line-height")));
			window["slider_subtitle_" + index].push(parseFloat(slideItem.find('.mkd-slide-subtitle').css("line-height")));
			window["slider_text_" + index].push(parseFloat(slideItem.find('.mkd-slide-text').css("line-height")));
			window["slider_button1_" + index].push(parseFloat(slideItem.find('.mkd-btn:eq(0)').css("line-height")));
			window["slider_button2_" + index].push(parseFloat(slideItem.find('.mkd-btn:eq(1)').css("line-height")));

			// letter-spacing (2)
			window["slider_title_" + index].push(parseFloat(slideItem.find('.mkd-slide-title').css("letter-spacing")));
			window["slider_subtitle_" + index].push(parseFloat(slideItem.find('.mkd-slide-subtitle').css("letter-spacing")));
			window["slider_text_" + index].push(parseFloat(slideItem.find('.mkd-slide-text').css("letter-spacing")));
			window["slider_button1_" + index].push(parseFloat(slideItem.find('.mkd-btn:eq(0)').css("letter-spacing")));
			window["slider_button2_" + index].push(parseFloat(slideItem.find('.mkd-btn:eq(1)').css("letter-spacing")));

			// margin-bottom (3)
			window["slider_title_" + index].push(parseFloat(slideItem.find('.mkd-slide-title').css("margin-bottom")));
			window["slider_subtitle_" + index].push(parseFloat(slideItem.find('.mkd-slide-subtitle').css("margin-bottom")));


			// slider_button padding top/bottom(3), padding left/right(4)
			window["slider_button1_" + index].push(parseFloat(slideItem.find('.mkd-btn:eq(0)').css("padding-top")));
			window["slider_button2_" + index].push(parseFloat(slideItem.find('.mkd-btn:eq(1)').css("padding-top")));

			window["slider_button1_" + index].push(parseFloat(slideItem.find('.mkd-btn:eq(0)').css("padding-left")));
			window["slider_button2_" + index].push(parseFloat(slideItem.find('.mkd-btn:eq(1)').css("padding-left")));
		};

		/**
		 * Set responsive coefficients for slider elements
		 * @param responsiveBreakpointSet, responsive breakpoints
		 * @param coefficientsGraphicArray, responsive coeaficcients for graphic
		 * @param coefficientsTitleArray, responsive coeaficcients for title
		 * @param coefficientsSubtitleArray, responsive coeaficcients for subtitle
		 * @param coefficientsTextArray, responsive coeaficcients for text
		 * @param coefficientsButtonArray, responsive coeaficcients for button
		 */
		var setSliderElementsResponsiveCoeffeicients = function(responsiveBreakpointSet, coefficientsGraphicArray, coefficientsTitleArray, coefficientsSubtitleArray, coefficientsTextArray, coefficientsButtonArray) {

			function coefficientsSetter(graphicArray, titleArray, subtitleArray, textArray, buttonArray) {
				sliderGraphicCoefficient = graphicArray;
				sliderTitleCoefficient = titleArray;
				sliderSubtitleCoefficient = subtitleArray;
				sliderTextCoefficient = textArray;
				sliderButtonCoefficient = buttonArray;
			}

			if(mkd.windowWidth > responsiveBreakpointSet[0]) {
				coefficientsSetter(coefficientsGraphicArray[0], coefficientsTitleArray[0], coefficientsSubtitleArray[0], coefficientsTextArray[0], coefficientsButtonArray[0]);
			} else if(mkd.windowWidth > responsiveBreakpointSet[1]) {
				coefficientsSetter(coefficientsGraphicArray[1], coefficientsTitleArray[1], coefficientsSubtitleArray[1], coefficientsTextArray[1], coefficientsButtonArray[1]);
			} else if(mkd.windowWidth > responsiveBreakpointSet[2]) {
				coefficientsSetter(coefficientsGraphicArray[2], coefficientsTitleArray[2], coefficientsSubtitleArray[2], coefficientsTextArray[2], coefficientsButtonArray[2]);
			} else if(mkd.windowWidth > responsiveBreakpointSet[3]) {
				coefficientsSetter(coefficientsGraphicArray[3], coefficientsTitleArray[3], coefficientsSubtitleArray[3], coefficientsTextArray[3], coefficientsButtonArray[3]);
			} else if(mkd.windowWidth > responsiveBreakpointSet[4]) {
				coefficientsSetter(coefficientsGraphicArray[4], coefficientsTitleArray[4], coefficientsSubtitleArray[4], coefficientsTextArray[4], coefficientsButtonArray[4]);
			} else if(mkd.windowWidth > responsiveBreakpointSet[5]) {
				coefficientsSetter(coefficientsGraphicArray[5], coefficientsTitleArray[5], coefficientsSubtitleArray[5], coefficientsTextArray[5], coefficientsButtonArray[5]);
			} else {
				coefficientsSetter(coefficientsGraphicArray[6], coefficientsTitleArray[6], coefficientsSubtitleArray[6], coefficientsTextArray[6], coefficientsButtonArray[6]);
			}

			// letter-spacing decrease quicker
			sliderTitleCoefficientLetterSpacing = sliderTitleCoefficient;
			sliderSubtitleCoefficientLetterSpacing = sliderSubtitleCoefficient;
			sliderTextCoefficientLetterSpacing = sliderTextCoefficient;
			if(mkd.windowWidth <= responsiveBreakpointSet[0]) {
				sliderTitleCoefficientLetterSpacing = sliderTitleCoefficient / 2;
				sliderSubtitleCoefficientLetterSpacing = sliderSubtitleCoefficient / 2;
				sliderTextCoefficientLetterSpacing = sliderTextCoefficient / 2;
			}
		};

		/**
		 * Set sizes for slider elements
		 * @param slideItem, each slide
		 * @param index, index od slide item
		 * @param reset, boolean for reseting sizes
		 */
		var setSliderElementsSize = function(slideItem, index, reset) {

			if(reset) {
				sliderGraphicCoefficient = sliderTitleCoefficient = sliderSubtitleCoefficient = sliderTextCoefficient = sliderButtonCoefficient = sliderTitleCoefficientLetterSpacing = sliderSubtitleCoefficientLetterSpacing = sliderTextCoefficientLetterSpacing = 1;
			}

			slideItem.find('.mkd-thumb').css({
				"width": Math.round(window["slider_graphic_width_" + index][0] * sliderGraphicCoefficient) + 'px',
				"height": Math.round(window["slider_graphic_height_" + index][0] * sliderGraphicCoefficient) + 'px'
			});

			slideItem.find('.mkd-slide-title').css({
				"font-size": Math.round(window["slider_title_" + index][0] * sliderTitleCoefficient) + 'px',
				"line-height": Math.round(window["slider_title_" + index][1] * sliderTitleCoefficient) + 'px',
				"letter-spacing": Math.round(window["slider_title_" + index][2] * sliderTitleCoefficient) + 'px',
				"margin-bottom": Math.round(window["slider_title_" + index][3] * sliderTitleCoefficient) + 'px'
			});

			slideItem.find('.mkd-slide-subtitle').css({
				"font-size": Math.round(window["slider_subtitle_" + index][0] * sliderSubtitleCoefficient) + 'px',
				"line-height": Math.round(window["slider_subtitle_" + index][1] * sliderSubtitleCoefficient) + 'px',
				"margin-bottom": Math.round(window["slider_subtitle_" + index][3] * sliderSubtitleCoefficient) + 'px',
				"letter-spacing": Math.round(window["slider_subtitle_" + index][2] * sliderSubtitleCoefficientLetterSpacing) + 'px'
			});

			slideItem.find('.mkd-slide-text').css({
				"font-size": Math.round(window["slider_text_" + index][0] * sliderTextCoefficient) + 'px',
				"line-height": Math.round(window["slider_text_" + index][1] * sliderTextCoefficient) + 'px',
				"letter-spacing": Math.round(window["slider_text_" + index][2] * sliderTextCoefficientLetterSpacing) + 'px'
			});

			slideItem.find('.mkd-btn:eq(0)').css({
				"font-size": Math.round(window["slider_button1_" + index][0] * sliderButtonCoefficient) + 'px',
				"line-height": Math.round(window["slider_button1_" + index][1] * sliderButtonCoefficient) + 'px',
				"letter-spacing": Math.round(window["slider_button1_" + index][2] * sliderButtonCoefficient) + 'px',
				"padding-top": Math.round(window["slider_button1_" + index][3] * sliderButtonCoefficient) + 'px',
				"padding-bottom": Math.round(window["slider_button1_" + index][3] * sliderButtonCoefficient) + 'px',
				"padding-left": Math.round(window["slider_button1_" + index][4] * sliderButtonCoefficient) + 'px',
				"padding-right": Math.round(window["slider_button1_" + index][4] * sliderButtonCoefficient) + 'px'
			});
			slideItem.find('.mkd-btn:eq(1)').css({
				"font-size": Math.round(window["slider_button2_" + index][0] * sliderButtonCoefficient) + 'px',
				"line-height": Math.round(window["slider_button2_" + index][1] * sliderButtonCoefficient) + 'px',
				"letter-spacing": Math.round(window["slider_button2_" + index][2] * sliderButtonCoefficient) + 'px',
				"padding-top": Math.round(window["slider_button2_" + index][3] * sliderButtonCoefficient) + 'px',
				"padding-bottom": Math.round(window["slider_button2_" + index][3] * sliderButtonCoefficient) + 'px',
				"padding-left": Math.round(window["slider_button2_" + index][4] * sliderButtonCoefficient) + 'px',
				"padding-right": Math.round(window["slider_button2_" + index][4] * sliderButtonCoefficient) + 'px'
			});
		};

		/**
		 * Set heights for slider and elemnts depending on slider settings (full height, responsive height od set height)
		 * @param slider, current slider
		 */
		var setHeights = function(slider) {

			slider.find('.item').each(function(i) {
				setSizeGlobalVariablesForSlideElements($(this), i);
				setSliderElementsSize($(this), i, false);
			});

			if(slider.hasClass('mkd-full-screen')) {

				setSliderFullHeight(slider);

				$(window).resize(function() {
					setSliderElementsResponsiveCoeffeicients(responsiveBreakpointSet, coefficientsGraphicArray, coefficientsTitleArray, coefficientsSubtitleArray, coefficientsTextArray, coefficientsButtonArray);
					setSliderFullHeight(slider);
					slider.find('.item').each(function(i) {
						setSliderElementsSize($(this), i, false);
					});
				});

			} else if(slider.hasClass('mkd-responsive-height')) {

				var defaultHeight = slider.data('height');
				setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);

				$(window).resize(function() {
					setSliderElementsResponsiveCoeffeicients(responsiveBreakpointSet, coefficientsGraphicArray, coefficientsTitleArray, coefficientsSubtitleArray, coefficientsTextArray, coefficientsButtonArray);
					setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
					slider.find('.item').each(function(i) {
						setSliderElementsSize($(this), i, false);
					});
				});

			} else {
				var defaultHeight = slider.data('height');

				slider.find('.mkd-slider-preloader').css({'height': (slider.height()) + 'px'});
				slider.find('.mkd-slider-preloader .mkd-ajax-loader').css({'display': 'block'});

				mkd.windowWidth < 1000 ? setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false) : setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);

				$(window).resize(function() {
					setSliderElementsResponsiveCoeffeicients(responsiveBreakpointSet, coefficientsGraphicArray, coefficientsTitleArray, coefficientsSubtitleArray, coefficientsTextArray, coefficientsButtonArray);
					if(mkd.windowWidth < 1000) {
						setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
						slider.find('.item').each(function(i) {
							setSliderElementsSize($(this), i, false);
						});
					} else {
						setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);
						slider.find('.item').each(function(i) {
							setSliderElementsSize($(this), i, true);
						});
					}
				});
			}
		};

		/**
		 * Set prev/next numbers on navigation arrows
		 * @param slider, current slider
		 * @param currentItem, current slide item index
		 * @param totalItemCount, total number of slide items
		 */
		var setPrevNextNumbers = function(slider, currentItem, totalItemCount) {
			if(currentItem == 1) {
				slider.find('.left.carousel-control .prev').html(totalItemCount);
				slider.find('.right.carousel-control .next').html(currentItem + 1);
			} else if(currentItem == totalItemCount) {
				slider.find('.left.carousel-control .prev').html(currentItem - 1);
				slider.find('.right.carousel-control .next').html(1);
			} else {
				slider.find('.left.carousel-control .prev').html(currentItem - 1);
				slider.find('.right.carousel-control .next').html(currentItem + 1);
			}
		};

		/**
		 * Set video background size
		 * @param slider, current slider
		 */
		var initVideoBackgroundSize = function(slider) {
			var min_w = 1500; // minimum video width allowed
			var video_width_original = 1920;  // original video dimensions
			var video_height_original = 1080;
			var vid_ratio = 1920 / 1080;

			slider.find('.item .mkd-video .mkd-video-wrap').each(function() {

				var slideWidth = mkd.windowWidth;
				var slideHeight = $(this).closest('.carousel').height();

				$(this).width(slideWidth);

				min_w = vid_ratio * (slideHeight + 20);
				$(this).height(slideHeight);

				var scale_h = slideWidth / video_width_original;
				var scale_v = (slideHeight - mkdGlobalVars.vars.mkdMenuAreaHeight) / video_height_original;
				var scale = scale_v;
				if(scale_h > scale_v)
					scale = scale_h;
				if(scale * video_width_original < min_w) {
					scale = min_w / video_width_original;
				}

				$(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original + 2));
				$(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original + 2));
				$(this).scrollLeft(($(this).find('video').width() - slideWidth) / 2);
				$(this).find('.mejs-overlay, .mejs-poster').scrollTop(($(this).find('video').height() - slideHeight) / 2);
				$(this).scrollTop(($(this).find('video').height() - slideHeight) / 2);
			});
		};

		/**
		 * Init video background
		 * @param slider, current slider
		 */
		var initVideoBackground = function(slider) {
			$('.item .mkd-video-wrap .video').mediaelementplayer({
				enableKeyboard: false,
				iPadUseNativeControls: false,
				pauseOtherPlayers: false,
				// force iPhone's native controls
				iPhoneUseNativeControls: false,
				// force Android's native controls
				AndroidUseNativeControls: false
			});

			$(window).resize(function() {
				initVideoBackgroundSize(slider);
			});

			//mobile check
			if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
				$('.mkd-slider .mkd-mobile-video-image').show();
				$('.mkd-slider .mkd-video-wrap').remove();
			}
		};

		/**
		 * initiate slider
		 * @param slider, current slider
		 * @param currentItem, current slide item index
		 * @param totalItemCount, total number of slide items
		 * @param slideAnimationTimeout, timeout for slide change
		 */
		var initiateSlider = function(slider, totalItemCount, slideAnimationTimeout) {

			//set active class on first item
			slider.find('.carousel-inner .item:first-child').addClass('active');
			//check for header style
			mkdCheckSliderForHeaderStyle($('.carousel .active'), slider.hasClass('mkd-header-effect'));
			// setting numbers on carousel controls
			if(slider.hasClass('mkd-slider-numbers')) {
				setPrevNextNumbers(slider, 1, totalItemCount);
			}
			// set video background if there is video slide
			if(slider.find('.item video').length) {
				initVideoBackgroundSize(slider);
				initVideoBackground(slider);
			}

			//init slider
			if(slider.hasClass('mkd-auto-start')) {
				slider.carousel({
					interval: slideAnimationTimeout,
					pause: false
				});

				//pause slider when hover slider button
				slider.find('.slide_buttons_holder .qbutton')
					.mouseenter(function() {
						slider.carousel('pause');
					})
					.mouseleave(function() {
						slider.carousel('cycle');
					});
			} else {
				slider.carousel({
					interval: 0,
					pause: false
				});
			}


			//initiate image animation
			if($('.carousel-inner .item:first-child').hasClass('mkd-animate-image') && mkd.windowWidth > 1000) {
				slider.find('.carousel-inner .item.mkd-animate-image:first-child .mkd-image').transformAnimate({
					transform: "matrix(" + matrixArray[$('.carousel-inner .item:first-child').data('mkd_animate_image')] + ")",
					duration: 30000
				});
			}
		};

		return {
			init: function() {
				if(sliders.length) {
					sliders.each(function() {
						var $this = $(this);
						var slideAnimationTimeout = $this.data('slide_animation_timeout');
						var totalItemCount = $this.find('.item').length;
						if($this.data('mkd_responsive_breakpoints')) {
							if($this.data('mkd_responsive_breakpoints') == 'set2') {
								responsiveBreakpointSet = [1600, 1300, 1000, 768, 567, 320];
							}
						}
						coefficientsGraphicArray = $this.data('mkd_responsive_graphic_coefficients').split(',');
						coefficientsTitleArray = $this.data('mkd_responsive_title_coefficients').split(',');
						coefficientsSubtitleArray = $this.data('mkd_responsive_subtitle_coefficients').split(',');
						coefficientsTextArray = $this.data('mkd_responsive_text_coefficients').split(',');
						coefficientsButtonArray = $this.data('mkd_responsive_button_coefficients').split(',');

						setSliderElementsResponsiveCoeffeicients(responsiveBreakpointSet, coefficientsGraphicArray, coefficientsTitleArray, coefficientsSubtitleArray, coefficientsTextArray, coefficientsButtonArray);

						setHeights($this);

						/*** wait until first video or image is loaded and than initiate slider - start ***/
						if(mkd.htmlEl.hasClass('touch')) {
							if($this.find('.item:first-child .mkd-mobile-video-image').length > 0) {
								var src = imageRegex.exec($this.find('.item:first-child .mkd-mobile-video-image').attr('style'));
							} else {
								var src = imageRegex.exec($this.find('.item:first-child .mkd-image').attr('style'));
							}
							if(src) {
								var backImg = new Image();
								backImg.src = src[1];
								$(backImg).load(function() {
									$('.mkd-slider-preloader').fadeOut(500);
									initiateSlider($this, totalItemCount, slideAnimationTimeout);
								});
							}
						} else {
							if($this.find('.item:first-child video').length > 0) {
								$this.find('.item:first-child video').get(0).addEventListener('loadeddata', function() {
									$('.mkd-slider-preloader').fadeOut(500);
									initiateSlider($this, totalItemCount, slideAnimationTimeout);
								});
							} else {
								var src = imageRegex.exec($this.find('.item:first-child .mkd-image').attr('style'));
								if(src) {
									var backImg = new Image();
									backImg.src = src[1];
									$(backImg).load(function() {
										$('.mkd-slider-preloader').fadeOut(500);
										initiateSlider($this, totalItemCount, slideAnimationTimeout);
									});
								}
							}
						}
						/*** wait until first video or image is loaded and than initiate slider - end ***/

						/* before slide transition - start */
						$this.on('slide.bs.carousel', function() {
							$this.addClass('mkd-in-progress');
							$this.find('.active .mkd-slider-content-outer').fadeTo(250, 0);
						});
						/* before slide transition - end */

						/* after slide transition - start */
						$this.on('slid.bs.carousel', function() {
							$this.removeClass('mkd-in-progress');
							$this.find('.active .mkd-slider-content-outer').fadeTo(0, 1);

							// setting numbers on carousel controls
							if($this.hasClass('mkd-slider-numbers')) {
								var currentItem = $('.item').index($('.item.active')[0]) + 1;
								setPrevNextNumbers($this, currentItem, totalItemCount);
							}

							// initiate image animation on active slide and reset all others
							$('.item.mkd-animate-image .mkd-image').stop().css({
								'transform': '',
								'-webkit-transform': ''
							});
							if($('.item.active').hasClass('mkd-animate-image') && mkd.windowWidth > 1000) {
								$('.item.mkd-animate-image.active .mkd-image').transformAnimate({
									transform: "matrix(" + matrixArray[$('.item.mkd-animate-image.active').data('mkd_animate_image')] + ")",
									duration: 30000
								});
							}
						});
						/* after slide transition - end */

						/* swipe functionality - start */
						$this.swipe({
							swipeLeft: function() {
								$this.carousel('next');
							},
							swipeRight: function() {
								$this.carousel('prev');
							},
							threshold: 20
						});
						/* swipe functionality - end */

					});

					//adding parallax functionality on slider
					if($('.no-touch .carousel').length) {
						var skrollr_slider = skrollr.init({
							smoothScrolling: false,
							forceHeight: false
						});
						skrollr_slider.refresh();
					}

					$(window).scroll(function() {
						//set control class for slider in order to change header style
						if($('.mkd-slider .carousel').height() < mkd.scroll) {
							$('.mkd-slider .carousel').addClass('mkd-disable-slider-header-style-changing');
						} else {
							$('.mkd-slider .carousel').removeClass('mkd-disable-slider-header-style-changing');
							mkdCheckSliderForHeaderStyle($('.mkd-slider .carousel .active'), $('.mkd-slider .carousel').hasClass('mkd-header-effect'));
						}

						//hide slider when it is out of viewport
						if($('.mkd-slider .carousel').hasClass('mkd-full-screen') && mkd.scroll > mkd.windowHeight && mkd.windowWidth > 1000) {
							$('.mkd-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
						} else if(!$('.mkd-slider .carousel').hasClass('mkd-full-screen') && mkd.scroll > $('.mkd-slider .carousel').height() && mkd.windowWidth > 1000) {
							$('.mkd-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
						} else {
							$('.mkd-slider .carousel').find('.carousel-inner, .carousel-indicators').show();
						}
					});
				}
			}
		};
	};

	/**
	 * Check if slide effect on header style changing
	 * @param slide, current slide
	 * @param headerEffect, flag if slide
	 */

	function mkdCheckSliderForHeaderStyle(slide, headerEffect) {

		if($('.mkd-slider .carousel').not('.mkd-disable-slider-header-style-changing').length > 0) {

			var slideHeaderStyle = "";
			if(slide.hasClass('light')) {
				slideHeaderStyle = 'mkd-light-header';
			}
			if(slide.hasClass('dark')) {
				slideHeaderStyle = 'mkd-dark-header';
			}

			if(slideHeaderStyle !== "") {
				if(headerEffect) {
					mkd.body.removeClass('mkd-dark-header mkd-light-header').addClass(slideHeaderStyle);
				}
			} else {
				if(headerEffect) {
					mkd.body.removeClass('mkd-dark-header mkd-light-header').addClass(mkd.defaultHeaderStyle);
				}

			}
		}
	}

	function mkdInfoBox() {
		var infoBoxes = $('.mkd-info-box-holder');

		var getBottomHeight = function(bottomHolder) {
			if(bottomHolder.length) {
				return bottomHolder.height();
			}

			return false;
		}

		var infoBoxesHeight = function() {
			if(infoBoxes.length) {
				var maxHeight = 0;
				var heightestBox;

				infoBoxes.each(function() {
					var bottomHolder = $(this).find('.mkd-ib-bottom-holder');
					var topHolder = $(this).find('.mkd-ib-top-holder')

					var currentHeight = getBottomHeight(bottomHolder) + topHolder.height();

					maxHeight = Math.max(maxHeight, currentHeight);

					if(maxHeight <= currentHeight) {
						heightestBox = $(this);
						maxHeight = currentHeight;
					}
				});

				infoBoxes.height(maxHeight);
			}
		}

		var initHover = function(infoBox) {
			var timeline = new TimelineLite({paused: true}),
				topHolder = infoBox.find('.mkd-ib-top-holder'),
				bottomHolder = infoBox.find('.mkd-ib-bottom-holder'),
				bottomHeight = getBottomHeight(bottomHolder);

			timeline.to(topHolder, 0.6, {y: -(bottomHeight / 2), ease: Back.easeInOut.config(2)});
			timeline.to(bottomHolder, 0.4, {y: -(bottomHeight / 2), opacity: 1, ease: Back.easeOut}, '-=0.3');

			infoBox.hover(function() {
				timeline.restart();
			}, function() {
				timeline.reverse();
			});
		}

		if(infoBoxes.length) {
			infoBoxesHeight();

			$(mkd.window).resize(function() {
				infoBoxesHeight();
			});

			infoBoxes.each(function() {
				var thisInfoBox = $(this);
				initHover(thisInfoBox);

				$(mkd.window).resize(function() {
					initHover(thisInfoBox);
				});
			});
		}
	}

	/*
	* Pricing tables appear effect
	*/
	function mkdPricingTables() {
		var pricingTablesShortcodes = $('.mkd-pricing-tables.mkd-appear-effect-yes');

		if (pricingTablesShortcodes.length) {
			pricingTablesShortcodes.each(function(){
				var pricingTablesShortcode = $(this),
					pricingTables = pricingTablesShortcode.find('.mkd-price-table');

					pricingTables.each(function(i){
						var pricingTable = $(this);

						pricingTablesShortcode.appear(function(){
							setTimeout(function(){
								pricingTable.addClass('mkd-appeared');
							}, i*250);
						}, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
					});
			});
		}
	}

	function mkdProcess() {
		var processes = $('.mkd-process-holder');

		var processLoad = function(process) {
			process.waitForImages(function(){
				process.css('visibility','visible');
			});
		}

		var setProcessItemsPosition = function(process) {
			var items = process.find('.mkd-process-item-holder');
			var highlighted = items.filter('.mkd-pi-highlighted');

			if(highlighted.length) {
				if(highlighted.length === 1) {
					var afterHighlighed = highlighted.nextAll();

					if(afterHighlighed.length) {
						afterHighlighed.addClass('mkd-pi-push-right');
					}
				} else {
					process.addClass('mkd-process-multiple-highlights');
				}
			}
		}

		var processAnimation = function(process) {
			if(!mkd.body.hasClass('mkd-no-animations-on-touch')) {
				var items = process.find('.mkd-process-item-holder');
				var background = process.find('.mkd-process-bg-holder');

				process.appear(function() {
					var tl = new TimelineLite();
					tl.fromTo(background, 0.2, {y: 50, opacity: 0, delay: 0.1}, {opacity: 1, y: 0, delay: 0.1});
					tl.staggerFromTo(items, 0.3, {opacity: 0, y: 50, ease: Back.easeOut.config(2)}, {
						opacity: 1,
						y: 0,
						ease: Back.easeOut.config(2)
					}, 0.2);
				}, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
			}
		}

		return {
			init: function() {
				if(processes.length) {
					processes.each(function() {
						processLoad($(this));
						setProcessItemsPosition($(this));
						processAnimation($(this));
					});
				}
			}
		}
	};

	function mkdComparisonPricingTables() {
		var pricingTablesHolder = $('.mkd-comparision-pricing-tables-holder');

		var alterPricingTableColumn = function(holder) {
			var featuresHolder = holder.find('.mkd-cpt-features-item');
			var pricingTables = holder.find('.mkd-comparision-table-holder');

			if(pricingTables.length) {
				pricingTables.each(function() {
					var currentPricingTable = $(this);
					var pricingItems = currentPricingTable.find('.mkd-cpt-table-content li');

					if(currentPricingTable.is('.mkd-cpt-featured')) {
						var marginTop = parseInt(currentPricingTable.find('.mkd-cpt-table-border-top').css('margin-top'), 10);
						pricingTablesHolder.css('padding-top', Math.abs(marginTop) + 'px');
					}
					if(pricingItems.length) {
						pricingItems.each(function(i) {
							var pricingItemFeature = featuresHolder[i];
							var pricingItem = this;
							var pricingItemContent = pricingItem.innerHTML;

							if(typeof pricingItemFeature !== 'undefined') {
								pricingItem.innerHTML = '<span class="mkd-cpt-table-item-feature">' + $(pricingItemFeature).text() + ': </span>' + pricingItemContent;
							}
						});
					}
				});
			}
		};

		return {
			init: function() {
				if(pricingTablesHolder.length) {
					pricingTablesHolder.each(function() {
						alterPricingTableColumn($(this));
					});
				}
			}
		}
	}

	function mkdIconProgressBar() {
		var progressBars = $('.mkd-icon-progress-bar');

		var animateActiveIcons = function(progressBar) {
			var timeouts = [];
			progressBar.appear(function() {
				var numberOfActive = parseInt(progressBar.data('number-of-active-icons'));
				var icons = progressBar.find('.mkd-ipb-icon');
				var customColor = progressBar.data('icon-active-color');

				if(typeof numberOfActive !== 'undefined') {

					icons.each(function(i) {
						if(i < numberOfActive) {
							var time = (i + 1) * 150;
							var currentIcon = $(this);

							timeouts[i] = setTimeout(function() {
								animateSingleIcon(currentIcon, customColor);
								$(icons[i]).addClass('active');
							}, time);
						}
					});
				}
			}, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
		};

		var animateSingleIcon = function(icon, customColor) {
			icon.addClass('mkd-ipb-active');

			if(typeof customColor !== 'undefined' && customColor !== '') {
				icon.find('.mkd-ipb-icon-elem').css('color', customColor);
			}
		}

		return {
			init: function() {
				if(progressBars.length) {
					progressBars.each(function() {
						animateActiveIcons($(this));
					});
				}
			}
		}
	}

	function mkdBlogSlider() {
		var blogSliders = $('.mkd-blog-slider-holder:not(.slick-initialized)');
		var verticalHeader = $('body').hasClass('mkd-header-vertical') ? true : false;

		if(blogSliders.length) {
			blogSliders.each(function() {
				var thisSlider = $(this);
				var postsToShow = 3;

				if(typeof $(this).data('posts_to_show') !== 'undefined') {
					postsToShow = $(this).data('posts_to_show');
				}

				thisSlider.on('init', function () {
					thisSlider.css({'opacity': '1'});

				}).slick({
					autoplay: true,
					autoplaySpeed: 4500,
					infinite: true,
					cssEase: 'cubic-bezier(0.77, 0, 0.175, 1)',
					speed: 850,
					arrows: true,
					slidesToShow: postsToShow,
					slidesToScroll: 1,
					responsive: [
						{
							breakpoint: 1441,
							settings: {
								slidesToShow: verticalHeader ? 2 : 3,
								slidesToScroll: verticalHeader ? 2 : 3
							}
						},
						{
							breakpoint: 1025,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2
							}
						},
						{
							breakpoint: 769,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						},
						{
							breakpoint: 481,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1,
								arrows: false
							}
						}
					]
				});
			});
		}
	}

	function mkdInitMiniTextSlider() {
		var sliders = $('.mkd-mini-text-slider');

		if(sliders.length) {
			sliders.each(function() {
				var mts = $(this).find('.mkd-mts-inner');

				mts.owlCarousel({
					singleItem: true,
					autoPlay: 4000,
					navigation: true,
					autoHeight: false,
					pagination: false,
					slideSpeed: 450,
					stopOnHover: true,
                    transitionStyle : 'backSlide', //fade, fadeUp, backSlide, goDown
					navigationText: [
						'<span class="mkd-prev-icon"><span class="arrow_carrot-left"></span></span>',
						'<span class="mkd-next-icon"><span class="arrow_carrot-right"></span></span>'
					],
					afterInit: function() {
						mts.css('visibility','visible');
					}
				});
			});
		}
	}

	function mkdInitTeamSlider() {
		var sliders = $('.mkd-team-slider');

		if(sliders.length) {
			sliders.each(function() {
				var mts = $(this).find('.mkd-team-slider-inner');
				var columns = typeof $(this).data('columns') !== 'undefined' ? $(this).data('columns') : 4;
				//Responsive breakpoints
				var items = [
					[0, 1],
					[481, 2],
					[769, 3],
					[1025, columns]
				];

				mts.owlCarousel({
					items: columns,
					itemsCustom: items,
					autoPlay: 4000,
					navigation: true,
					autoHeight: false,
					pagination: false,
					slideSpeed: 450,
					stopOnHover: true,
					navigationText: [
						'<span class="mkd-prev-icon"><span class="lnr lnr-chevron-left"></span></span>',
						'<span class="mkd-next-icon"><span class="lnr lnr-chevron-right"></span></span>'
					]
				});
			});
		}
	}

	function mkdInitCardSlider() {
		var sliders = $('.mkd-card-slider');

		if(sliders.length) {
			sliders.each(function() {
				var space = typeof $(this).data('space') !== 'undefined' ? $(this).data('space') + 'px' : '';
				var columns = typeof $(this).data('columns') !== 'undefined' ? $(this).data('columns') : 4;
				var separation = typeof $(this).data('separation') !== 'undefined' ? parseInt($(this).data('separation'), 10) : 0;
				$(this).css('margin', '0 -' + (separation / 2) + 'px');

				var cs = $(this).find('.mkd-card-slider-inner');
				var cards = cs.find('.mkd-card');
				cards.each(function() {
					$(this).css('padding', '0 ' + (separation / 2) + 'px');
					$(this).find('.mkd-card-below-image').css('height', space);
				});
				//Responsive breakpoints
				var items = [
					[0, 1],
					[481, 2],
					[769, 2],
					[1025, columns]
				];
				cs.owlCarousel({
					items: columns,
					margin: 20,
					autoPlay: 4000,
					navigation: true,
					autoHeight: false,
					pagination: false,
					slideSpeed: 450,
					stopOnHover: true,
					itemsCustom: items,
					navigationText: [
						'<span class="mkd-prev-icon"><span class="lnr lnr-chevron-left"></span></span>',
						'<span class="mkd-next-icon"><span class="lnr lnr-chevron-right"></span></span>'
					],
					afterInit: function() {
						cs.css('visibility','visible');
					}
				});

				//appear effect for 3 column layout
				if (columns == 3) {
					if (cs.find('.mkd-card').length == 3) {
						cards.each(function(i) { 
							var card = $(this);

							card.appear(function(){
								setTimeout(function(){
									card.addClass('mkd-appeared');
								}, i*250);
							}, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
						});
					} else {
						cards.addClass('mkd-appeared');
					}
				}
			});
		}
	}

	function mkdBMICalcSelect2() {
		var BMICalcHolder = $('.mkd-bmi-calculator-holder'),
			select;

		if(BMICalcHolder.length) {
			select = BMICalcHolder.find('select');

			select.each(function() {
				$(this).select2({
					minimumResultsForSearch: Infinity
				});
			});
		}
	}

	function emptySpaceResponsive() {
		var emptySpaces = $('.vc_empty_space');

		var sizes = {
			'large_laptop': 1559,
			'laptop': 1279,
			'tablet_landscape': 1023,
			'tablet_portrait': 767,
			'phone_landscape': 599,
			'phone_portrait': 479
		}

		var sizeValues = function() {
			var values = [];
			for(var size in sizes) {
				values.push(sizes[size]);
			}
			;

			return values;
		}();

		var getHeights = function(emptySpace) {
			var heights = {};

			for(var size in sizes) {
				var dataValue = emptySpace.data(size);
				if(typeof dataValue !== 'undefined' && dataValue !== '') {
					heights[size] = dataValue;
				}
			}

			return heights;
		};

		var usedSizes = function(emptySpace) {
			var usedSizes = [];

			for(var size in sizes) {
				var dataValue = emptySpace.data(size);
				if(typeof dataValue !== 'undefined' && dataValue !== '') {
					usedSizes.push(sizes[size]);
				}
			}

			return usedSizes;
		};

		var resizeEmptySpace = function(heights, emptySpace) {
			if(typeof heights !== 'undefined') {
				var originalHeight = emptySpace.data('original-height');
				var sizeValues = usedSizes(emptySpace);
				var heightestSize = Math.max.apply(null, sizeValues);

				for(var size in sizes) {
					if(mkd.windowWidth <= sizes[size]) {
						emptySpace.height(heights[size]);
					} else if(mkd.windowWidth > heightestSize) {
						emptySpace.height(originalHeight);
					}
				}
			}
		};

		return {
			init: function() {
				if(emptySpaces.length) {
					emptySpaces.each(function() {
						var heights = getHeights($(this));

						resizeEmptySpace(heights, $(this));

						var thisEmptySpace = $(this);

						$(window).resize(function() {
							resizeEmptySpace(heights, thisEmptySpace);
						});
					});
				}
			}
		}
	}

	var mkdCoverBoxes = new function() {
		mkd.modules.shortcodes.mkdCoverBoxes = this;
		this.holders = $('.mkd-cover-boxes');
		this.columns = 0;

		this.init = function() {
			mkdCoverBoxes.holders.each(function() {
				var holder = $(this);
				var boxes = holder.find('.mkd-cover-box');
				boxes.eq(0).addClass('active');
				boxes
					.mouseenter(function() {
						if (typeof holder.data('final-columns') !== 'undefined') {
							var cols = holder.data('final-columns');
							if(cols >= 2) {
								var offset = Math.floor(boxes.index($(this)) / cols) * cols;
								for(var i = 0; i < cols; i++) {
									boxes.eq(offset + i).removeClass('active');
								}
							}
							$(this).addClass('active');
						}
					});
			});
			mkdCoverBoxes.handleSize();
		};

		this.determineActive = function(boxes) {
			var holder = boxes.eq(0).closest('.mkd-cover-boxes');
			var cols = holder.data('final-columns');
			if(cols >= 2) {
				var activeArrStr = '';
				var activeArr = [];
				if (cols == 2) {
					activeArrStr = holder.data('active-two');
				}
				else if (cols == 3) {
					activeArrStr = holder.data('active-three');
				}

				if (typeof activeArrStr !== 'undefined' && activeArrStr != '') {
					var tempArr = activeArrStr.trim().split(',');
					for (var i=0; i<tempArr.length; i++) {
						activeArr.push(parseInt(tempArr[i].trim()));
					}
				}

				if (activeArr.length) {
					boxes.each(function(i) {
						if ($.inArray(i+1,activeArr) >= 0) {
							$(this).addClass('active');
						}
						else {
							$(this).removeClass('active');
						}
					});
				}
				else {
					boxes.each(function(i) {
						if(i % cols == 0) {
							$(this).addClass('active');
						}
						else {
							$(this).removeClass('active');
						}
					});
				}
			}

		};

		this.handleSize = function() {
			mkdCoverBoxes.holders.each(function() {
				var boxes = $(this).find('.mkd-cover-box');
				boxes.css('transition', 'none');
				var totalWidth = $(this).innerWidth();
				var columns = parseInt($(this).data('columns'), 10);
				var maxColumns = totalWidth <= 600 ? 0 : (totalWidth <= 800 ? 1 : (totalWidth <= 1200 ? 2 : 3));
				var finalColumns = Math.min(columns, maxColumns);
				$(this).data('final-columns', finalColumns).removeClass('mkd-cb-columns-0 mkd-cb-columns-1 mkd-cb-columns-2 mkd-cb-columns-3').addClass('mkd-cb-columns-' + finalColumns);
				var activeSize = boxes.filter('.active').eq(0).children('.mkd-cover-box-inner').innerWidth();
				boxes.find('.mkd-cb-content').width(activeSize);
				mkdCoverBoxes.determineActive(boxes);
				boxes.css('transition', '');
			});
		};
	};

	function mkdBookingForm() {
		function handleSize(form) {
			if (form.is('.mkd-bf-layout-horizontal')) {
				var container = form.closest('.mkd-vertical-align-containers');
				var menuArea = container.closest('.mkd-menu-area');
				var formInner = form.find('.mkd-booking-form-inner');

				formInner.css({
					width: menuArea.width() + 'px',
					left: -form.offset().left + 'px',
					top: form.height()/2 + menuArea.height()/2 + 'px',
					'padding-left': (menuArea.width() - container.width())/2+'px',
					'padding-right': (menuArea.width() - container.width())/2+'px'
				});
			}

			if (form.is('.mkd-bf-floating')) {
				var prevSection = form.closest('.mkd-section').prev('.mkd-section');
				if (!prevSection.length) {
					form.hide();
				}
				else {
					form.css('bottom', ((prevSection.outerHeight() - form.find('.mkd-booking-form-inner').outerHeight())/2 + parseInt(prevSection.css('margin-bottom'))) + 'px');
					var revSlider = prevSection.find('.rev_slider');
					if (revSlider.length) {
						revSlider.eq(0).on('revolution.slide.onloaded', function() {
							form.css('bottom', ((prevSection.outerHeight() - form.find('.mkd-booking-form-inner').outerHeight())/2 + parseInt(prevSection.css('margin-bottom'))) + 'px');
						});
					}
				}
			}
		}

		var bookingForms = $('.mkd-booking-form');
		var timePickers;
		bookingForms.each(function(index) {
			var form = $(this);
			var formInner = form.find('.mkd-booking-form-inner');
			var formItself = form.find('form');
			var responseDiv = formItself.find('.mkd-bf-form-response-holder');
			var deptDocs = form.data('depts-doctors');
			var formDoctors = form.find('select.mkd-bf-select-doctor');

			form.filter('.mkd-bf-layout-horizontal').closest('.widget_mkd_booking_form_widget') //.find('.mkd-booking-form-widget-button')
			.mouseenter(function() {
				formInner.stop().slideDown(300, 'easeOutQuint');
			})
			.mouseleave(function() {
				if (typeof timePickers === 'undefined' || !timePickers.length) {
					timePickers = $('.xdsoft_datetimepicker');
				}
				var select2Active = form.find('.select2-dropdown-open');
				var datePicker = timePickers.eq(index*2),
					timePicker = timePickers.eq(index*2+1);
				if (!select2Active.length && !datePicker.is(':visible') && !timePicker.is(':visible')) {
					formInner.stop().slideUp(400, 'easeInOutQuint');
				}
			});

			form.find('select.mkd-bf-select-department')
			.select2({
				minimumResultsForSearch: Infinity
			}).
			on('change', function (ev) {
				formDoctors.find('option').not(':first-child').remove();
				formDoctors.select2({
					minimumResultsForSearch: Infinity
				});
				var newHtml = '';
				var newDoctors = deptDocs[ev.val];
				for (var i=0; typeof newDoctors !== 'undefined' && i < newDoctors.length; i++) {
					newHtml += '<option value="' + newDoctors[i] + '">' + newDoctors[i] + '</option>';
				}
				formDoctors.append(newHtml);
			});

			formDoctors.select2({
				minimumResultsForSearch: Infinity
			});

			form.find('.mkd-bf-input-date').datetimepicker({
				timepicker: false,
				minDate: 0,
				format: 'Y-m-d'
			});
			form.find('.mkd-bf-input-time').datetimepicker({
				datepicker: false,
				step: 15,
				format: 'H:i'
			});

			formItself.submit(function(e) {
				e.preventDefault();

				var enquiryData = {
					department: formItself.find('select.mkd-bf-select-department').val(),
					doctor: formItself.find('select.mkd-bf-select-doctor').val(),
					date: formItself.find('input.mkd-bf-input-date').val(),
					time: formItself.find('input.mkd-bf-input-time').val(),
					name: formItself.find('input.mkd-bf-input-name').val(),
					contact: formItself.find('input.mkd-bf-input-contact').val(),
					message: formItself.find('textarea.mkd-bf-input-request').val(),
					nonce: formItself.find('.nonce input:first-child').val()
				};

				var requestData = {
					action: 'mkd_action_send_booking_form',
					data: enquiryData
				};

				
				$.ajax({
					type: 'POST',
					data: requestData,
					url: MikadoAjaxUrl,
					success: function( response ) {
						responseDiv.html(response.data).slideDown(300);
						setTimeout(function() {
							responseDiv.slideUp(300, function() {
								responseDiv.html('');
							});
						}, 3000);
					}
				});
			});

			handleSize(form);
			$(window).resize(function() {
				handleSize(form);
			});
		});
	}

})(jQuery);