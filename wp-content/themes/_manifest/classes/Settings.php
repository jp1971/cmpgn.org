<?php
// The theme setings for the Manifest theme

namespace Athletics\Manifest;

class Settings {

	private static $instance = false;

	public static function get_instance() {

	  if ( ! self::$instance ) {

	    self::$instance = new self();
	  }

	  return self::$instance;

	}

	private function __construct() {

		//Define plugin specific variables

		// add_options_page variables
		$this->options_page_title = 'Manifest Theme Settings';
		$this->options_page_menu_title = 'Manifest Settings';
		$this->options_page_menu_slug ='manifest_settings';

		// add_settings_section variables
		$this->section_id_01 = 'settings_plugin_section';
		$this->section_title_01 = '';
		$this->section_callback_01 = array( $this, 'settings_plugin_section_callback' );

		$this->section_id_02 = 'settings_login_section';
		$this->section_title_02 = '';
		$this->section_callback_02 = array( $this, 'settings_login_section_callback' );

		$this->section_id_03 = 'settings_image_section';
		$this->section_title_03 = '';
		$this->section_callback_03 = array( $this, 'settings_image_section_callback' );

		// register_setting/register_settings_fields variables
		$this->option_group = 'manifest_settings';

		// Add action hooks
		add_action( 'admin_menu', array( $this, 'add_plugin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_plugin_settings' ) );
		add_action( 'admin_print_styles-settings_page_' . $this->options_page_menu_slug, array( $this, 'options_page_css' ) );

	}

	public function add_plugin_menu() {

		// Add options page
		// http://codex.wordpress.org/Function_Reference/add_options_page
		add_options_page( 
			$this->options_page_title,
			$this->options_page_menu_title,
			'manage_options',
			$this->options_page_menu_slug,
			array( $this, 'render_options_page' )
		);

	}

	public function register_plugin_settings() {

		// Add settings section(s)
		// http://codex.wordpress.org/Function_Reference/add_settings_section
		add_settings_section(
			$this->section_id_01,
			$this->section_title_01,
			$this->section_callback_01,
			$this->options_page_menu_slug
		);

		add_settings_section(
			$this->section_id_02,
			$this->section_title_02,
			$this->section_callback_02,
			$this->options_page_menu_slug
		);

		add_settings_section(
			$this->section_id_03,
			$this->section_title_03,
			$this->section_callback_03,
			$this->options_page_menu_slug
		);

		// Add settings field(s)
		// e.g. add_settings_field( $id, $title, $callback, $page, $section, $args );
		// http://codex.wordpress.org/Function_Reference/add_settings_field
		add_settings_field(
			'manifest_cpss_plugin',
			'Manifest CPSS',
			array( $this, 'cpss_plugin_callback' ),
			$this->options_page_menu_slug,
			$this->section_id_01
		);

		add_settings_field(
			'manifest_docs_plugin',
			'Manifest Docs',
			array( $this, 'docs_plugin_callback' ),
			$this->options_page_menu_slug,
			$this->section_id_01
		);

		add_settings_field(
			'manifest_gallery_plugin',
			'Manifest Gallery',
			array( $this, 'gallery_plugin_callback' ),
			$this->options_page_menu_slug,
			$this->section_id_01
		);

		add_settings_field(
			'manifest_acf_plugin',
			'Advanced Custom Fields',
			array( $this, 'acf_plugin_callback' ),
			$this->options_page_menu_slug,
			$this->section_id_01
		);

		add_settings_field(
			'manifest_require_login',
			'',
			array( $this, 'require_login_callback' ),
			$this->options_page_menu_slug,
			$this->section_id_02
		);

		add_settings_field(
			'manifest_disable_open_sans',
			'',
			array( $this, 'disable_open_sans_callback' ),
			$this->options_page_menu_slug,
			$this->section_id_02
		);

		add_settings_field(
			'manifest_image_settings',
			'',
			array( $this, 'manifest_image_settings_callback' ),
			$this->options_page_menu_slug,
			$this->section_id_03
		);

		// Register plugin settings
		// register_setting( $option_group, $option_name, $sanitize_callback );
		// http://codex.wordpress.org/Function_Reference/register_setting
		register_setting ( $this->option_group, 'manifest_cpss_plugin' );
		register_setting ( $this->option_group, 'manifest_docs_plugin' );
		register_setting ( $this->option_group, 'manifest_gallery_plugin' );
		register_setting ( $this->option_group, 'manifest_acf_plugin' );
		register_setting ( $this->option_group, 'manifest_require_login' );
		register_setting ( $this->option_group, 'manifest_disable_open_sans' );
		register_setting ( $this->option_group, 'manifest_image_settings' );

	}

	public function settings_plugin_section_callback() {

		echo '<h2 style="margin-bottom: 0;">Plugins</h2>Turn plugins bundled with the Manifest theme on and off.';

	}

	public function settings_login_section_callback() {

		echo '<h2 style="margin-bottom: 0;">Privacy</h2>Manifest can keep your site private by requiring login to view, disabling admin web fonts and more.';

	}

	public function settings_image_section_callback() {

		echo '<h2 style="margin-bottom: 0;">Images</h2>Manifest has opinions on image handling in WordPress. This setting will turn off thumbnails, set default image link type to none and set default image size to full.';

	}

	public function cpss_plugin_callback() {

		$cpss = esc_attr( get_option( 'manifest_cpss_plugin' ) );

	?>

		<label for="manifest_cpss_plugin">Activate</label>
		<input type="checkbox" name="manifest_cpss_plugin" value="1" <?php checked( $cpss, 1 ); ?> />
		<br />
		<small><em>The Compatible Post Sharing System allows site visitors to share posts and pages via email.</em></small>
		<hr>

	<?php

	}

	public function docs_plugin_callback() {

		$docs = esc_attr( get_option( 'manifest_docs_plugin' ) );

	?>

		<label for="manifest_docs_plugin">Activate</label>
		<input type="checkbox" name="manifest_docs_plugin" value="1" <?php checked( $docs, 1 ); ?> />
		<br />
		<small><em>Write and display site documentation directly in WordPress.</em></small>
		<hr>

	<?php

	}

	public function gallery_plugin_callback() {

		$docs = esc_attr( get_option( 'manifest_gallery_plugin' ) );

	?>

		<label for="manifest_gallery_plugin">Activate</label>
		<input type="checkbox" name="manifest_gallery_plugin" value="1" <?php checked( $docs, 1 ); ?> />
		<br />
		<small><em>Create collections of images for use in galleries, slideshows, etc.</em></small>
		<hr>

	<?php

	}

	public function acf_plugin_callback() {

		$acf = esc_attr( get_option( 'manifest_acf_plugin' ) );

	?>

		<label for="manifest_acf_plugin">Activate</label>
		<input type="checkbox" name="manifest_acf_plugin" value="1" <?php checked( $acf, 1 ); ?> />
		<br />
		<small><em>The Advanced Custom Fields third party plugin.</em></small>
		<hr>

	<?php

	}

	public function require_login_callback() {

		$login = esc_attr( get_option( 'manifest_require_login' ) );

	?>

		<label for="manifest_require_login">Require login?</label>
		<input type="checkbox" name="manifest_require_login" value="1" <?php checked( $login, 1 ); ?> />
		<br />
		<small><em>Require login to view site.</em></small>
		<hr>

	<?php

	}

	public function disable_open_sans_callback() {

		$disable = esc_attr( get_option( 'manifest_disable_open_sans' ) );

	?>
		<label for="manifest_disable_open_sans">Disable Open Sans?</label>
		<input type="checkbox" name="manifest_disable_open_sans" value="1" <?php checked( $disable, 1 ); ?> />
		<br />
		<small><em>Disable loading Open Sans from Google Fonts.</em></small>
		<hr>

	<?php

	}

	public function manifest_image_settings_callback() {

		$image = esc_attr( get_option( 'manifest_image_settings' ) );

	?>

		<label for="manifest_image_settings">Use Manifest image settings?</label>
		<input type="checkbox" name="manifest_image_settings" value="1" <?php checked( $image, 1 ); ?> />
		<br />
		<small><em>Use the Manifest image handling settings.</em></small>
		<hr>

	<?php

	}

	public function render_options_page() {

	?>

		<div class="wrap">
			<h2><?php echo $this->options_page_menu_title; ?></h2>
			<form action="options.php" method="POST">
				<?php settings_fields( $this->option_group ); ?>
				<?php do_settings_sections( $this->options_page_menu_slug ); ?>
				<?php submit_button(); ?>
			</form>
		</div>

	<?php

	}

	public function options_page_css() {

		wp_register_style( 'manifest_settings', get_template_directory_uri() . '/css/manifest_settings.css' );
		wp_enqueue_style( 'manifest_settings' );

	}

}
$settings = Settings::get_instance();