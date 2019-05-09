<?php
if ( site_url() == "http://lwhh.web" ) {
	define( "VERSION", time() );
} else {
	define( "VERSION", wp_get_theme()->get( "Version" ) );
}
function launcher_theme_setup() {
	load_theme_textdomain( "launcher" );
	add_theme_support( "post-thumbnails" );
	add_theme_support( "title-tag" );
}

add_action( "after_setup_theme", "launcher_theme_setup" );

function launcher_assets() {
	/*CSS File Injecting*/
	wp_enqueue_style( "animate-css", get_theme_file_uri( "/assets/css/animate.css" ) );
	wp_enqueue_style( "icomoon-css", get_theme_file_uri( "/assets/css/icomoon.css" ) );
	wp_enqueue_style( "bootstrap-css", get_theme_file_uri( "/assets/css/bootstrap.css" ) );
	wp_enqueue_style( "style-css", get_theme_file_uri( "/assets/css/style.css" ), null, VERSION );
	wp_enqueue_style( "launcher-css", get_stylesheet_uri(), null, VERSION );

	/*JS File Injecting*/
	wp_enqueue_script( "easing-jquery-js", get_theme_file_uri( "/assets/js/jquery.easing.1.3.js" ), array( "jquery" ),
		null, true );
	wp_enqueue_script( "bootstrap-jquery-js", get_theme_file_uri( "/assets/js/bootstrap.min.js" ), array( "jquery" ),
		null, true );
	wp_enqueue_script( "waypoints-jquery-js", get_theme_file_uri( "/assets/js/jquery.waypoints.min.js" ),
		array( "jquery" ), null, true );
	wp_enqueue_script( "simplyCountdown-jquery-js", get_theme_file_uri( "/assets/js/simplyCountdown.js" ),
		array( "jquery" ), null, true );
	wp_enqueue_script( "main-jquery-js", get_theme_file_uri( "/assets/js/main.js" ), array( "jquery" ), VERSION, true );

	$launcher_year  = get_post_meta( get_the_ID(), "year", true );
	$launcher_month = get_post_meta( get_the_ID(), "month", true );
	$launcher_day   = get_post_meta( get_the_ID(), "day", true );

	wp_localize_script( "main-jquery-js", "datedata", array(
		'year'  => $launcher_year,
		'month' => $launcher_month,
		'day'   => $launcher_day,
	) );

}

add_action( "wp_enqueue_scripts", "launcher_assets" );

function launcher_sidebar() {
	register_sidebar(
		array(
			'name'          => __( 'Footer Left', "launcher" ),
			'id'            => 'footer-left',
			'description'   => __( 'Widgetized Area On The Left Footer"', 'launcher' ),
			'before_widget' => '<section id="fh5co-social %1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Right', "launcher" ),
			'id'            => 'footer-right',
			'description'   => __( 'Widgetized Area On The Right Footer"', 'launcher' ),
			'before_widget' => '<section id="%1$s" class="text-right widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( "widgets_init", "launcher_sidebar" );

function launcher_style() {
	if ( is_page() ) {
		$thumbnail_url = get_the_post_thumbnail_url( null, "large" );
		?>
        <style>
            .side-style {
                background-image: url(<?php echo $thumbnail_url;?>);
            }
        </style>
	<?php }
}

add_filter( "wp_head", "launcher_style" );
