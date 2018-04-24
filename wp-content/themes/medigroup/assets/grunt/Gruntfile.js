module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // CONFIG ===================================/
        watch: {
            compass: {
                files: ['../css/**/*.scss'],
                tasks: ['sass:dev']
            },
            concat: {
                files: ['../js/modules/*.js'],
                tasks: ['concat']
            },
            cssmin:{
                files: ['../css/*.css'],
                tasks: ['cssmin']
            },
            uglify:{
                files: ['../js/*.js'],
                tasks: ['uglify']
            }
        },
		browserSync: {
			default_options: {
				files: {
					src: [
						"../css/*.css",
						"../../**/*.php"
					]
				},
				options: {
					watchTask: true,
					proxy: 'medical.dev'
				}
			}
		},
        sass: {
            dev: {
                files: [{
                    expand: true,
                    cwd: '../css/scss',
                    src: ['*.scss'],
                    dest: '../css',
                    ext: '.css'
                }],
                options: {
                    sourceMap: true,
                    outputStyle: 'expanded',
                    imagePath: "../img",
                }
            }
        },
        uglify: {
            all: {
                files: {
                    '../js/modules.min.js': ['../js/modules.js'],
                    '../js/blog.min.js': ['../js/blog.js'],
                    '../js/like.min.js': ['../js/like.js'],
                    '../js/third-party.min.js': ['../js/third-party.js']
                }
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1,
                sourceMap: true
            },
            target: {
                files: {
                    '../css/blog.min.css': ['../css/blog.css'],
                    '../css/blog-responsive.min.css': ['../css/blog-responsive.css'],
                    '../css/modules.min.css': ['../css/modules.css'],
                    '../css/modules-responsive.min.css': ['../css/modules-responsive.css'],
                    '../css/plugins.min.css': ['../css/plugins.css'],
                    '../css/woocommerce.min.css': ['../css/woocommerce.css'],
                    '../css/woocommerce-responsive.min.css': ['../css/woocommerce-responsive.css'],
                    '../css/wpml.min.css': ['../css/wpml.css'],
					'../css/timetable-schedule.min.css': ['../css/timetable-schedule.css']
                }
            }
        },
        concat: {
            all: {
                src: [
                    '../js/modules/global.js',
                    '../js/modules/common.js',
                    '../js/modules/ajax.js',
                    '../js/modules/headers.js',
                    '../js/modules/title.js',
                    '../js/modules/shortcodes.js',
                    '../js/modules/woocommerce.js',
                    '../js/modules/portfolio.js'
                ],
                dest: '../js/modules.js'
            },
            third_party: {
                src: [
                    '../js/modules/plugins/jquery.appear.js',
                    '../js/modules/plugins/modernizr.custom.85257.js',
                    '../js/modules/plugins/jquery.appear.js',
                    '../js/modules/plugins/jquery.hoverIntent.min.js',
                    '../js/modules/plugins/jquery.plugin.js',
                    '../js/modules/plugins/jquery.countdown.min.js',
                    '../js/modules/plugins/owl.carousel.min.js',
                    '../js/modules/plugins/parallax.min.js',
                    '../js/modules/plugins/select2.min.js',
                    '../js/modules/plugins/easypiechart.js',
                    '../js/modules/plugins/jquery.waypoints.min.js',
                    '../js/modules/plugins/Chart.min.js',
                    '../js/modules/plugins/counter.js',
                    '../js/modules/plugins/absoluteCounter.js',
                    '../js/modules/plugins/fluidvids.min.js',
                    '../js/modules/plugins/jquery.prettyPhoto.js',
                    '../js/modules/plugins/jquery.nicescroll.min.js',
                    '../js/modules/plugins/jquery.datetimepicker.min.js',
                    //'../js/modules/plugins/ScrollToPlugin.min.js',
                    '../js/modules/plugins/TweenLite.min.js',
                    '../js/modules/plugins/TimelineLite.min.js',
                    '../js/modules/plugins/CSSPlugin.min.js',
                    '../js/modules/plugins/EasePack.min.js',
                    '../js/modules/plugins/jquery-scrollspy.js',
                    '../js/modules/plugins/jquery.mixitup.min.js',      
                    '../js/modules/plugins/jquery.waitforimages.js',     
                    '../js/modules/plugins/jquery.infinitescroll.min.js',
                    '../js/modules/plugins/jquery.easing.1.3.js',
                    '../js/modules/plugins/jquery.flexslider-min.js',
                    '../js/modules/plugins/skrollr.js',
                    '../js/modules/plugins/slick.min.js',
                    '../js/modules/plugins/bootstrapCarousel.js',
                    '../js/modules/plugins/jquery.touchSwipe.min.js'
                ],
                dest: '../js/third-party.js'
            }
        }
    });


    grunt.util.linefeed = '\n';
    grunt.util.normalizelf('\n');

    // DEPENDENT PLUGINS =========================/

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-browser-sync');

    // TASKS =====================================/

    grunt.registerTask('default', ['sass:dev', 'concat:all', 'concat:third_party']);
	grunt.registerTask('dev', ['browserSync', 'watch']);
    grunt.registerTask('js', ['concat', 'uglify']);
    grunt.registerTask('css', ['sass', 'cssmin']);
    grunt.registerTask('minify', ['sass', 'cssmin', 'concat', 'uglify']);

};