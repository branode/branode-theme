<?php
/**
 * Branode functions and definitions.
 *
 */
function register_new_menu() {
  register_nav_menu('bottom-menu',__( 'Menu de Rodapé inferior' ));
}
add_action( 'init', 'register_new_menu' );

function branode_widgets_init() {
	register_sidebar( array(
		'name'          =>__( 'Widget Bottom 1', 'coletivo' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tainacan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Bottom 2', 'coletivo' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tainacan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Bottom 3', 'coletivo' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tainacan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'branode_widgets_init' );


// Altera a função do footer, originalmente no arquivo inc/template-tags.php

if ( ! function_exists( 'coletivo_footer_site_info' ) ) {
    /**
     * Add Copyright and Credit text to footer
     * @since 1.1.3
     */
    function coletivo_footer_site_info()
    {
        ?>
        <div class="row">
            <div class="col-sm-6 bottom-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'bottom-menu' ) ); ?>
            </div>
    		<div class="col-sm-6 credits">
            <?php printf(esc_html__('Desenvolvido com %1$s', 'coletivo'), '<a class="logo-wp" href="' . esc_url('https://br.wordpress.org', 'coletivo') . '"><i class="fa fa-wordpress" aria-hidden="true"></i></a>'); ?>
            </div>
        </div>
        <?php
    }
}
add_action( 'coletivo_footer_site_info', 'coletivo_footer_site_info' );

/**
 * Hook to add custom section before feature section
 *
 * @see wp-content/themes/tema-coletivo/template-frontpage.php
 */
/*
function add_custom_section_branode(){

$coletivo_branode_id        = get_theme_mod( 'coletivo_branode_id', esc_html__('branode', 'coletivo') );
$coletivo_branode_disable   = get_theme_mod( 'coletivo_branode_disable' ) == 1 ? true : false;
$coletivo_branode_title     = get_theme_mod( 'coletivo_branode_title', esc_html__('Seção branode', 'coletivo' ));
$coletivo_branode_subtitle  = get_theme_mod( 'coletivo_branode_subtitle', esc_html__('Section subtitle', 'coletivo' ));
$coletivo_branode_more_link = get_theme_mod( 'coletivo_branode_more_link', '#' );
$coletivo_branode_more_text = get_theme_mod( 'coletivo_branode_more_text', esc_html__('More', 'coletivo' ));
$desc = get_theme_mod( 'coletivo_branode_desc' );

if ( coletivo_is_selective_refresh() ) {
    $disable = false;
}
if ( ! $coletivo_branode_disable  ) :

if ( ! coletivo_is_selective_refresh() ){ ?>
<section id="<?php if ( $coletivo_branode_id != '' ) echo $coletivo_branode_id; ?>" <?php do_action( 'coletivo_section_atts', 'coletivo' ); ?> class="<?php echo esc_attr( apply_filters( 'coletivo_section_class', 'section-branode section-padding onepage-section', 'coletivo' ) ); ?>">
<?php } ?>
    <?php do_action( 'coletivo_section_before_inner', 'coletivo' ); ?>
    <div class="container">
        <?php if ( $coletivo_branode_title ||  $coletivo_branode_subtitle ||  $desc ) { ?>
        <div class="section-title-area">
            <?php if ( $coletivo_branode_subtitle != '' ) echo '<h5 class="section-subtitle">' . esc_html( $coletivo_branode_subtitle ) . '</h5>'; ?>
            <?php if ( $coletivo_branode_title != '' ) echo '<h2 class="section-title">' . esc_html( $coletivo_branode_title ) . '</h2>'; ?>
            <?php if ( $desc ) {
                echo '<div class="section-desc">' . apply_filters( 'the_content', wp_kses_post( $desc ) ) . '</div>';
            } ?>
        </div>
        <?php } ?>

        <?php if ( $coletivo_branode_more_link != '' ) { ?>
    <div class="more-link">
        <a class="btn btn-theme-primary btn-lg" href="<?php echo esc_url($coletivo_branode_more_link) ?>"><?php if ( $coletivo_branode_more_text != '' ) echo esc_html( $coletivo_branode_more_text ); ?></a>
    </div>
    <?php } ?>
    </div>
    <?php do_action( 'coletivo_section_after_inner', 'tainacan' ); ?>
<?php if ( ! coletivo_is_selective_refresh() ){ ?>
</section>
<?php } ?>
<?php endif;
wp_reset_query();

}
add_action( 'coletivo_before_section_hero', 'add_custom_section_branode'  );
 */

/*
function coletivo_customize_after_register( $wp_customize ) {

    $wp_customize->add_section( 'coletivo_branode_settings' ,
        array(
            'priority'    => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'       => esc_html__( 'Seção branode', 'coletivo' ),
            'description' => '',
            'panel'          => 'theme_options',
        )
    );
    // Show Content
    $wp_customize->add_setting( 'coletivo_branode_disable',
        array(
            'sanitize_callback' => 'coletivo_sanitize_checkbox',
            'default'           => '',
        )
    );
    $wp_customize->add_control( 'coletivo_branode_disable',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Hide this section?', 'coletivo'),
            'section'     => 'coletivo_branode_settings',
            'description' => esc_html__('Check this box to hide this section.', 'coletivo'),
        )
    );
    // Section ID
    $wp_customize->add_setting( 'coletivo_branode_id',
        array(
            'sanitize_callback' => 'coletivo_sanitize_text',
            'default'           => esc_html__('branode', 'coletivo'),
        )
    );
    $wp_customize->add_control( 'coletivo_branode_id',
        array(
            'label'     => esc_html__('Section ID:', 'coletivo'),
            'section'       => 'coletivo_branode_settings',
            'description'   => esc_html__( 'The section id, we will use this for link anchor.', 'coletivo' )
        )
    );
    // Title
    $wp_customize->add_setting( 'coletivo_branode_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Sobre a branode', 'coletivo'),
        )
    );
    $wp_customize->add_control( 'coletivo_branode_title',
        array(
            'label'     => esc_html__('Section Title', 'coletivo'),
            'section'       => 'coletivo_branode_settings',
            'description'   => '',
        )
    );
    // Sub Title
    $wp_customize->add_setting( 'coletivo_branode_subtitle',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Section subtitle', 'coletivo'),
        )
    );
    $wp_customize->add_control( 'coletivo_branode_subtitle',
        array(
            'label'     => esc_html__('Section Subtitle', 'coletivo'),
            'section'       => 'coletivo_branode_settings',
            'description'   => '',
        )
    );

    // Description
    $wp_customize->add_setting( 'coletivo_branode_desc',
        array(
            'sanitize_callback' => 'coletivo_sanitize_text',
            'default'           => '',
        )
    );
    $wp_customize->add_control( new coletivo_Editor_Custom_Control(
        $wp_customize,
        'coletivo_branode_desc',
        array(
            'label'         => esc_html__('Section Description', 'coletivo'),
            'section'       => 'coletivo_branode_settings',
            'description'   => '',
        )
    ));

    // More Button
    $wp_customize->add_setting( 'coletivo_branode_more_link',
        array(
            'sanitize_callback' => 'esc_url',
            'default'           => '#',
        )
    );
    $wp_customize->add_control( 'coletivo_branode_more_link',
        array(
            'label'       => esc_html__('More branode button link', 'coletivo'),
            'section'     => 'coletivo_branode_settings',
            'description' => esc_html__(  'It should be your blog page link.', 'coletivo' )
        )
    );
    $wp_customize->add_setting( 'coletivo_branode_more_text',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('More', 'coletivo'),
        )
    );
    $wp_customize->add_control( 'coletivo_branode_more_text',
        array(
            'label'         => esc_html__('More Button', 'coletivo'),
            'section'       => 'coletivo_branode_settings',
            'description'   => '',
        )
    );

}
add_action( 'coletivo_customize_after_register', 'coletivo_customize_after_register' );


function coletivo_customizer_child_partials( $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }

    $selective_refresh_keys = array(

        // section branode
        array(
            'id' => 'branode',
            'selector' => '.section-branode',
            'settings' => array(
                'coletivo_branode_title',
                'coletivo_branode_subtitle',
                'coletivo_branode_desc',
                'coletivo_branode_more_text',
                'coletivo_branode_more_link',
            ),
        )
    );
}
add_action( 'customize_register', 'coletivo_customizer_child_partials', 50 );
*/