<?php
/**
 * Admin Theme Page with settings.
 *
 * @package Gov_BR
 * @since Gov BR 0.1.0
 */

if ( ! class_exists( 'Gov_BR_Admin_Page' ) ) {
	/**
	 * Admin Page Settings.
	 *
	 * @since Gov BR 0.1.0
	 */
	class Gov_BR_Admin_Page {

		private $page_slug = 'govbr-settings';

		/**
		 * Constructor. Instantiate the object.
		 *
		 * @since Gov BR 0.1.0
		 */
		public function __construct() {
			add_action( 'admin_menu', array( $this, 'add_page_to_menu' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts') );
		}

		/**
		 * Returns the page slug
		 * @var string
		 * 
		 * @since Gov BR 0.1.0
		 */
		public function get_page_slug() {
			return $this->page_slug;
		}

		/**
		 * Adds the submenu with the page
		 *
		 * @since Gov BR 0.1.0
		 *
		 * @return void
		 */
		function add_page_to_menu() {
			add_theme_page(
				__( 'Configurações do Tema Gov BR', 'govbr'),
				'Gov BR',
				'manage_options',
				$this->get_page_slug() . '.php',
				array( $this, 'govbr_settings_page' )
			); 
		}

		/**
		 * Enqueues necessary scripts and styles
		 *
		 * @since Gov BR 0.1.0
		 *
		 * @return void
		 */
		function enqueue_admin_scripts() {
			$current_screen = get_current_screen();

			if ( strpos($current_screen->base, 'appearance_page_' . $this->get_page_slug() ) === false)
				return;
			
			wp_enqueue_style( 'gov-br-admin-settings', get_template_directory_uri() . '/assets/css/style-admin-settings.css', array(), wp_get_theme()->get( 'Version' ) );
		}

		/**
		 * The theme settings page
		 *
		 * @since Gov BR 0.1.0
		 *
		 * @return void
		 */
		function govbr_settings_page() {

			$default_tabs = array(
				'home' => array(
					'label' => __( 'Início', 'govbr' ),
					'content' => array( $this, 'render_settings_home_tab' ),
				)
			);

			$extra_tabs = array(
				'features' => array(
					'label' => __( 'Funcionalidades', 'govbr' ),
					'content'	=> array( $this, 'render_settings_features_tab' ),
				),
				'plugins' => array(
					'label' => __( 'Plugins', 'govbr' ),
					'content'	=> array( $this, 'render_settings_plugins_tab' ),
				),
				'about' => array(
					'label' => __( 'Sobre', 'govbr' ),
					'content'	=> array( $this, 'render_settings_about_tab' ),
				)
			);

			/**
			 * Filter for adding extra tabs to be displayed on the theme settings page
			 */
			$tabs = array_merge(
				$default_tabs,
				apply_filters(
					'govbr_theme_admin_settings_page_tabs',
					$extra_tabs
				)
			);

			$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'home';

			?>

			<div class="govbr-theme-settings-header">
				<div class="govbr-theme-settings-title-section">
					<h1><?php _e( 'Tema', 'govbr'); ?><img src="<?php echo get_template_directory_uri() . '/assets/images/govbr-logo.png' ?>" alt="<?php esc_attr_e( 'Gov BR', 'govbr'); ?>"></h1>
				</div>
				<nav class="govbr-theme-settings-tabs-wrapper hide-if-no-js tab-count-<?php echo count($tabs); ?>" aria-label="<?php _e( 'Menu secundário', 'govbr'); ?>">
					<?php foreach( $tabs as $tab_slug => $tab ) : ?>
						<a
								href="<?php echo get_admin_page_parent() . '?page=' . $this->get_page_slug(); ?>&tab=<?php echo $tab_slug; ?>"
								class="govbr-theme-settings-tab <?php echo $current_tab === $tab_slug ? 'active' : ''; ?>">
							<?php echo $tab['label'] ? esc_html( $tab['label'] ) : __( 'Aba sem nome', 'govbr' ); ?>
						</a>
					<?php endforeach; ?>
				</nav>
			</div>
			
			<hr class="wp-header-end">

			<div class="wrap govbr-theme-settings-body hide-if-no-js">
				<?php echo $tabs[$current_tab]['content']() ?>
			</div>

			<?php
		}


		/**
		 * Render the settings home tab content
		 * 
		 * @since Gov BR 0.1.0
		 * 
		 * @return string HTML content
		 */
		function render_settings_home_tab() {
			?>
			<div class="govbr-theme-settings-section">
				<h2><?php _e( 'Bem vindo ao tema Gov BR', 'govbr' ); ?></h2>
			</div>
			<?php
		}

		/**
		 * Render the settings plugin tab content
		 * 
		 * @since Gov BR 0.1.0
		 * 
		 * @return string HTML content
		 */
		function render_settings_plugins_tab() {

			$plugins = array(
				'icon-block' => array(
					'name' => __( 'Icon Block', 'govbr'),
					'description' => __( 'O plugin Icon Block permite a inserção de ícones em SVG facilmente através de um bloco para o editor gutenberg. No Tema Gov BR, são carregados ícones Font Awesome comumente usados em padrões de blocos como os Cartões com Ícones.', 'govbr'),
				),
				'tainacan' => array(
					'name' => __( 'Tainacan', 'govbr'),
					'description' => __( 'O Tainacan é um software livre cujo desenvolvimento é fortemente fomentado por instituições públicas brasileiras como o IBRAM, voltado para gestão de acervos digitais em instituições culturais como museus, bibliotecas e galerias.', 'govbr'),
				)
			);

			/**
			 * Filter for adding extra plugins to be recommended on the theme settings page
			 */
			$plugins = 
				apply_filters(
					'govbr_theme_admin_settings_page_plugins',
					$plugins
				);

			?>
			<div class="govbr-theme-settings-section">
				<h2><?php _e( 'Plugin recomendados', 'govbr' ); ?></h2>
				<p><?php _e( 'O tema Gov BR funciona sem a necessidade de plugins instalados. Porém, alguns plugins do WordPress podem ser instalados para expandir suas funcionalidades.', 'govbr'); ?></p>
				<p><?php _e( 'Os plugins que recomendamos a seguir, são plugins que tem uma base de usuários sólida e em alguns casos, são ferramentas para as quais tivemos algum esforço de realizar uma integração visual entre os recursos oferecidos pelo plugin e o que diz respeito ao tema em si.', 'govbr' ); ?></p>
			
				<div class="govbr-theme-settings-cards-container">
					<?php foreach ($plugins as $plugin_slug => $plugin) : ?>
						<div class="card">
							<h3><?php echo esc_html( $plugin['name'] ); ?></h3>
							<p><?php echo esc_html( $plugin['description'] ); ?></p>
							<?php if ( is_plugin_active( $plugin_slug . '/' . $plugin_slug . '.php' ) ) : ?>
								<p><em><?php _e( 'Este plugin já está instalado e ativo!', 'govbr' ); ?></em>&nbsp;&#x2705;</p>
							<?php else : ?>
								<a class="button" href="<?php echo get_admin_url() . 'plugin-install.php?tab=plugin-information&plugin=' . $plugin_slug; ?>"><?php _e( 'Ver plugin', 'govbr' ); ?></a>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php
		}

		/**
		 * Render the settings features tab content
		 * 
		 * @since Gov BR 0.1.0
		 * 
		 * @return string HTML content
		 */
		function render_settings_features_tab() {
			?>
			<div class="govbr-theme-settings-section">
				<h2><?php _e( 'Funcionalidades do tema', 'govbr' ); ?></h2>
			</div>
			<?php
		}

		/**
		 * Render the settings about tab content
		 * 
		 * @since Gov BR 0.1.0
		 * 
		 * @return string HTML content
		 */
		function render_settings_about_tab() {
			?>
			<div class="govbr-theme-settings-section">
				<h2><?php _e( 'Sobre o tema', 'govbr' ); ?></h2>
				<p><?php _e( 'O objetivo deste projeto é criar um tema que permita o uso do WordPress como alternativa ao Plone em portais vinculados ao Governo Federal Brasileiro. Há muitos recursos no WordPress dos quais diferentes instituições podem tirar proveito e fazer uma migração de existentes não é uma tarefa simples. Mesmo em situações onde projetos não diretamente relacionados queiram manter uma aproximação visual com os sites institucionais, é um grande desafio. Por isso estamos criando este projeto que visa respeitar a nova identidade visual proposta pelo Design System do Gov.br (DSGov).', 'govbr'); ?></p>

				<hr>
				
				<h2><?php _e( 'Registro de alterações', 'govbr' ); ?></h2>
				<h3><?php _e( 'Versão Beta 0.1.0', 'govbr' ); ?></h3>
				<ul>
					<li><?php _e( 'Primeira versão do tema Gov BR', 'govbr'); ?></li>
				</ul>
			</div>
			<?php
		}
	
	}
}