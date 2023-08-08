<?php
/**
 * Cookies Manager Classe
 *
 * @since 0.1.0
 */

/**
 * This class is in charge of Cookies Manager features.
 */
class Gov_BR_Cookies_Manager {

	protected $cookies_settings;

	/**
	 * Instantiate the object.
	 *
	 * @since 0.1.0
	 */
	public function __construct() {

		if ( !get_theme_mod( 'enable_feature_cookies_manager', true ) )
			return;

		/**
		 * Filter for tweaking the cookies settings.
		 * 
		 * @since 0.1.0
		 * 
		 * @param array $cookies_settings Array of settings for the cookies manager.
		 */
		$this->cookies_settings	= apply_filters(
			'gov_br_theme_cookies_settings',
			array(
				'allOptOut' => array(
					'default' => true,
					'label' => __( 'Propriedade que define se o Cookiebar é optIn (false) ou optOut (true)', 'govbr' ),
					'slug' => 'all_opt_out',
					'type' => 'checkbox'
				),
				'acceptButton' => array(
					'default' => 'Aceitar',
					'label' => __( 'Label do botão primário', 'govbr' ),
					'slug' => 'accept_button',
					'type' => 'text'
				),
				'optInButton' => array(
					'default' => 'Ver Política de Cookies',
					'label' => __( 'Label do botão secundário caso a propriedade allOptOut seja false', 'govbr' ),
					'slug' => 'opt_in_button',
					'type' => 'text'
				),
				'optOutButton' => array(
					'default' => 'Definir Cookies',
					'label' => __( 'Texto do Botão de Ver Política de Cookies', 'govbr' ),
					'slug' => 'opt_in_button',
					'type' => 'text'
				),
				'infoText' => array(
					'default' => 'Minim pariatur amet laboris sint consectetur enim do voluptate',
					'label' => __( 'Texto que aparece quando o Cookiebar está fechado', 'govbr' ),
					'slug' => 'info_text',
					'type' => 'textarea'
				),
				'mainTitle' => array(
					'default' => 'Exercitation et proident',
					'label' => __( 'Título principal', 'govbr' ),
					'slug' => 'main_title',
					'type' => 'text'
				),
				'lastUpdate' => array(
					'default' => '01/02/2021',
					'label' => __( 'Inforamção sobre última atualização', 'govbr' ),
					'slug' => 'last_update',
					'type' => 'text'
				),
				'entryText' => array(
					'default' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus aspernatur neque culpa nisi alias. Voluptatem dicta nihil magnam, cumque voluptatum animi distinctio molestias recusandae ipsam, sapiente unde error repellendus quibusdam?',
					'label' => __( 'Informação sobre atualização', 'govbr' ),
					'slug' => 'entry_text',
					'type' => 'textarea'
				),
				'selectAll' => array(
					'default' => false,
					'label' => __( 'Informa se o checkbox de seleção geral está true ou false', 'govbr'),
					'slug' => 'select_all',
					'type' => 'checkbox'
				),
				'allAlertMessage' => array(
					'default' => 'Ao desativar essa opção, sua navegação ficará comprometida.',
					'label' => __( 'Mensagem de alerta para todo o cookiebar', 'govbr'),
					'slug' => 'all_alert_message',
					'type' => 'text'
				),
				'closeLabel' => array(
					'default' => 'fechar',
					'label' => __( 'Nome usado no atributo aria-label do botão de fechar o cookiebar', 'govbr'),
					'slug' => 'close_label',
					'type' => 'text'
				),
				'lastUpdateLabel' => array(
					'default' => 'Última atualização',
					'label' => __( 'Label para o campo de que informa a data de atualização', 'govbr'),
					'slug' => 'last_update_label',
					'type' => 'text'
				),
				'cookiesGroupsLabel' => array(
					'default' => 'Classes de cookies',
					'label' => __( ' Label da área das classes de cookies', 'govbr'),
					'slug' => 'cookies_groups_label',
					'type' => 'text'
				),
				'selectAllLabel' => array(
					'default' => 'Selecionar tudo',
					'label' => __( 'Label para o checkbox de seleção geral, caso esteja true ou contenha o atributo indeterminate', 'govbr'),
					'slug' => 'select_all_label',
					'type' => 'text'
				),
				'unselectAllLabel' => array(
					'default' => 'Desselecionar tudo',
					'label' => __( 'Label para o checkbox de seleção geral, caso esteja false', 'govbr'),
					'slug' => 'unselect_all_label',
					'type' => 'text'
				),
				'selectAllGroupLabel' => array(
					'default' => 'Selecionar toda a classe',
					'label' => __( 'Label para o checkbox de seleção da classe (grupo) de cookies, caso esteja true ou contenha o atributo indeterminate', 'govbr'),
					'slug' => 'select_all_group_label',
					'type' => 'text'
				),
				'unselectAllGroupLabel' => array(
					'default' => 'Desselecionar toda classe',
					'label' => __( 'Label para o checkbox de seleção da classe (grupo) de cookies, caso esteja false', 'govbr'),
					'slug' => 'unselect_all_group_label',
					'type' => 'text'
				),
				'onLabel' => array(
					'default' => 'Ligado',
					'label' => __( 'Label para o switch de seleção do cookie, caso esteja true', 'govbr'),
					'slug' => 'on_label',
					'type' => 'text'
				),
				'offLabel' => array(
					'default' => 'Desligado',
					'label' => __( 'Label para o swtich de seleção do cookie, caso esjeta false', 'govbr'),
					'slug' => 'off_label',
					'type' => 'text'
				),
				'alwaysActiveLabel' => array(
					'default' => 'Sempre ativo',
					'label' => __( 'Label usado caso a classe (grupo) de cookies seja optIn', 'govbr'),
					'slug' => 'always_active_label',
					'type' => 'text'
				),		
				'cookieNameLabel' => array(
					'default' => 'Cookies',
					'label' => __( 'Label para a propriedade nome do cookie', 'govbr'),
					'slug' => 'cookie_name_label',
					'type' => 'text'
				),			
				'expiresLabel' => array(
					'default' => 'Vencimento',
					'label' => __( 'Label para a propriedade Vencimento', 'govbr'),
					'slug' => 'expires_label',
					'type' => 'text'
				),			
				'domainLabel' => array(
					'default' => 'Domínio',
					'label' => __( 'Label para a propriedade Domínio', 'govbr'),
					'slug' => 'domain_label',
					'type' => 'text'
				),			
				'enterpriseLabel' => array(
					'default' => 'Empresa',
					'label' => __( 'Label para a propriedade Empresa', 'govbr'),
					'slug' => 'enterprise_label',
					'type' => 'text'
				),			
				'purposeLabel' => array(
					'default' => 'Finalidade',
					'label' => __( 'Label para a propriedade Finalidade', 'govbr'),
					'slug' => 'purpose_label',
					'type' => 'text'
				),		
				'descriptionLabel' => array(
					'default' => 'Descrição',
					'label' => __( 'Label para a propriedade Descrição', 'govbr'),
					'slug' => 'description_label',
					'type' => 'text'
				),
				'cookieGroups' => array(
					'label' => __( 'Grupo de Cookies', 'govbr'),
					'slug' => 'cookie_groups',
					'type' => 'array',
					'default' => array(
						array(
							array(
								'default' => 'necessarios',
								'label' => __( 'ID do Grupo', 'govbr'),
								'slug' => 'groupId',
								'type' => 'text'
							),
							array(
								'default' => 'Estritamente necessários',
								'label' => __( 'Nome do Grupo', 'govbr'),
								'slug' => 'groupName',
								'type' => 'text'
							),
							array(
								'default' => false,
								'label' => __( 'O grupo é optOut (true) ou optIn (false)', 'govbr'),
								'slug' => 'groupOptOut',
								'type' => 'checkbox'
							),
							array(
								'default' => false,
								'label' => __( 'O grupo começa selecionado', 'govbr'),
								'slug' => 'groupSelected',
								'type' => 'checkbox'
							),
							array(
								'default' => 'Alerta do grupo 0',
								'label' => __( 'Mensagem de alerta do grupo', 'govbr'),
								'slug' => 'groupAlertMessage',
								'type' => 'text'
							),
							array(
								'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum delectus fuga omnis, placeat harum id aliquam, blanditiis consectetur est cupiditate ipsam alias vitae veritatis beatae, aperiam totam assumenda. Sed, modi!',
								'label' => __( 'Texto do Grupo', 'govbr'),
								'slug' => 'groupText',
								'type' => 'textarea'
							),
							array(
								'label' => __( 'Lista de Cookies do Grupo 0', 'govbr'),
								'slug' => 'cookieList',
								'type' => 'array',
								'default' => array(
									array(
										array(
											'default' => 'necessario-1',
											'label' => __( 'ID do Cookie', 'govbr'),
											'slug' => 'cookieId',
											'type' => 'text'
										),
										array(
											'default' => false,
											'label' => __( 'O cookie é optOut (true) ou optIn (false)', 'govbr'),
											'slug' => 'cookieOptOut',
											'type' => 'checkbox'
										),
										array(
											'default' => false,
											'label' => __( 'O cookie começa selecionado', 'govbr'),
											'slug' => 'cookieSelected',
											'type' => 'checkbox'
										),
										array(
											'default' => 'optimizelyEndUserId',
											'label' => __( 'Cookie 1', 'govbr'),
											'slug' => 'cookieName',
											'type' => 'text'
										),
										array(
											'default' => '30 minutos',
											'label' => __( 'Tempo para expirar', 'govbr'),
											'slug' => 'expires',
											'type' => 'text'
										),
										array(
											'default' => 'Alerta grupo 0 - cookie 0',
											'label' => __( 'Nome do Cookie', 'govbr'),
											'slug' => 'alertMessage',
											'type' => 'text'
										),
										array(
											'default' => 'Serpro',
											'label' => __( 'Empresa', 'govbr'),
											'slug' => 'enterprise',
											'type' => 'text'
										),
										array(
											'default' => 'serpro.gov.br',
											'label' => __( 'Domínio', 'govbr'),
											'slug' => 'domain',
											'type' => 'text'
										),
										array(
											'default' => 'Autorização',
											'label' => __( 'Propósito', 'govbr'),
											'slug' => 'purpose',
											'type' => 'text'
										),
										array(
											'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum delectus fuga omnis, placeat harum id aliquam, blanditiis consectetur est cupiditate ipsam alias vitae veritatis beatae, aperiam totam assumenda. Sed, modi!',
											'label' => __( 'Descrição', 'govbr'),
											'slug' => 'description',
											'type' => 'textarea'
										)
									),
									array(
										array(
											'default' => 'necessario-2',
											'label' => __( 'ID do Cookie', 'govbr'),
											'slug' => 'cookieId',
											'type' => 'text'
										),
										array(
											'default' => true,
											'label' => __( 'O cookie é optOut (true) ou optIn (false)', 'govbr'),
											'slug' => 'cookieOptOut',
											'type' => 'checkbox'
										),
										array(
											'default' => true,
											'label' => __( 'O cookie começa selecionado', 'govbr'),
											'slug' => 'cookieSelected',
											'type' => 'checkbox'
										),
										array(
											'default' => 'optimizelyEndUserId',
											'label' => __( 'Cookie 1', 'govbr'),
											'slug' => 'cookieName',
											'type' => 'text'
										),
										array(
											'default' => '30 minutos',
											'label' => __( 'Tempo para expirar', 'govbr'),
											'slug' => 'expires',
											'type' => 'text'
										),
										array(
											'default' => 'Alerta grupo 0 - cookie 0',
											'label' => __( 'Nome do Cookie', 'govbr'),
											'slug' => 'alertMessage',
											'type' => 'text'
										),
										array(
											'default' => 'Serpro',
											'label' => __( 'Empresa', 'govbr'),
											'slug' => 'enterprise',
											'type' => 'text'
										),
										array(
											'default' => 'serpro.gov.br',
											'label' => __( 'Domínio', 'govbr'),
											'slug' => 'domain',
											'type' => 'text'
										),
										array(
											'default' => 'Autorização',
											'label' => __( 'Propósito', 'govbr'),
											'slug' => 'purpose',
											'type' => 'text'
										),
										array(
											'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum delectus fuga omnis, placeat harum id aliquam, blanditiis consectetur est cupiditate ipsam alias vitae veritatis beatae, aperiam totam assumenda. Sed, modi!',
											'label' => __( 'Descrição', 'govbr'),
											'slug' => 'description',
											'type' => 'text'
										)
									)
								)
							)
						),
						array(
							array(
								'default' => 'desempenho',
								'label' => __( 'ID do Grupo', 'govbr'),
								'slug' => 'groupId',
								'type' => 'text'
							),
							array(
								'default' => 'Desempenho, funcionamento, marketing e personalização',
								'label' => __( 'Nome do Grupo', 'govbr'),
								'slug' => 'groupName',
								'type' => 'text'
							),
							array(
								'default' => true,
								'label' => __( 'O grupo é optOut (true) ou optIn (false)', 'govbr'),
								'slug' => 'groupOptOut',
								'type' => 'checkbox'
							),
							array(
								'default' => true,
								'label' => __( 'O grupo começa selecionado', 'govbr'),
								'slug' => 'groupSelected',
								'type' => 'checkbox'
							),
							array(
								'default' => 'Alerta do grupo 1',
								'label' => __( 'Mensagem de alerta do grupo', 'govbr'),
								'slug' => 'groupAlertMessage',
								'type' => 'text'
							),
							array(
								'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum delectus fuga omnis, placeat harum id aliquam, blanditiis consectetur est cupiditate ipsam alias vitae veritatis beatae, aperiam totam assumenda. Sed, modi!',
								'label' => __( 'Texto do Grupo', 'govbr'),
								'slug' => 'groupText',
								'type' => 'textarea'
							),
							array(
								'label' => __( 'Lista de Cookies do Grupo 1', 'govbr'),
								'slug' => 'cookieList',
								'type' => 'array',
								'default' => array(
									array(
										array(
											'default' => 'desempenho-1',
											'label' => __( 'ID do Cookie', 'govbr'),
											'slug' => 'cookieId',
											'type' => 'text'
										),
										array(
											'default' => true,
											'label' => __( 'O cookie é optOut (true) ou optIn (false)', 'govbr'),
											'slug' => 'cookieOptOut',
											'type' => 'checkbox'
										),
										array(
											'default' => false,
											'label' => __( 'O cookie começa selecionado', 'govbr'),
											'slug' => 'cookieSelected',
											'type' => 'checkbox'
										),
										array(
											'default' => 'optimizelyEndUserId',
											'label' => __( 'Cookie 1', 'govbr'),
											'slug' => 'cookieName',
											'type' => 'text'
										),
										array(
											'default' => '30 minutos',
											'label' => __( 'Tempo para expirar', 'govbr'),
											'slug' => 'expires',
											'type' => 'text'
										),
										array(
											'default' => 'Alerta grupo 1 - cookie 0',
											'label' => __( 'Nome do Cookie', 'govbr'),
											'slug' => 'alertMessage',
											'type' => 'text'
										),
										array(
											'default' => 'Serpro',
											'label' => __( 'Empresa', 'govbr'),
											'slug' => 'enterprise',
											'type' => 'text'
										),
										array(
											'default' => 'serpro.gov.br',
											'label' => __( 'Domínio', 'govbr'),
											'slug' => 'domain',
											'type' => 'text'
										),
										array(
											'default' => 'Autorização',
											'label' => __( 'Propósito', 'govbr'),
											'slug' => 'purpose',
											'type' => 'text'
										),
										array(
											'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum delectus fuga omnis, placeat harum id aliquam, blanditiis consectetur est cupiditate ipsam alias vitae veritatis beatae, aperiam totam assumenda. Sed, modi!',
											'label' => __( 'Descrição', 'govbr'),
											'slug' => 'description',
											'type' => 'text'
										)
									)
								)
							)
						)
					)
				),
				'noteTitle' => array(
					'default' => 'Aviso sobre cookies',
					'label' => __( 'Label para a propriedade Descrição', 'govbr'),
					'slug' => 'note_title',
					'type' => 'text'
				),
				'noteList' => array(
					'label' => __( 'Lista de Notas', 'govbr'),
					'slug' => 'note_list',
					'type' => 'array',
					'default' => array(
						array(
							array(
								'default' => 'O que são cookies?',
								'label' => __( 'Pegunta', 'govbr'),
								'slug' => 'question',
								'type' => 'text'
							),
							array(
								'default' => 'Cookies são pequenos arquivos de texto que podem ser usados por sites para tornar a experiência do usuário mais eficiente.',
								'label' => __( 'Resposta', 'govbr'),
								'slug' => 'answer',
								'type' => 'textarea'
							)
						),
						array(
							array(
								'default' => 'Qual a finalidade?',
								'label' => __( 'Pegunta', 'govbr'),
								'slug' => 'question',
								'type' => 'text'
							),
							array(
								'default' => 'Os cookies têm como finalidade armazenar informações sobre a navegação do usuário, a fim de tornar a experiência mais eficiente.',
								'label' => __( 'Resposta', 'govbr'),
								'slug' => 'answer',
								'type' => 'textarea'
							)
						)
					)
				),
				'links' => array(
					'label' => __( 'Lista de Links', 'govbr'),
					'slug' => 'links',
					'type' => 'array',
					'default' => array(
						array(
							array(
								'default' => 'Política de Privacidade',
								'label' => __( 'Rótulo', 'govbr'),
								'slug' => 'name',
								'type' => 'text'
							),
							array(
								'default' => '/politica-de-privacidade',
								'label' => __( 'URL', 'govbr'),
								'slug' => 'url',
								'type' => 'text'
							)
						)
					)
				)
			)						
		);

		// Adiciona páginas com configurações de Cookies
		add_action('admin_menu', array( $this, 'add_cookies_settings_page') );

		// Adiciona as configurações e campos de Cookies
		add_action('admin_init', array( $this, 'init_cookies_settings') );

		// Add scripts and styles for cookies toggler.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );


		// Carrega scripts e css necessários
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts') );
	}

	/**
	 * Enqueues necessary scripts and styles on the admin side
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	function enqueue_admin_scripts() {
		$current_screen = get_current_screen();

		if ( strpos($current_screen->base, 'cookies-settings' ) === false)
			return;
		
		wp_enqueue_style( 'govbr-cookies-manager-style', get_template_directory_uri() . '/assets/css/style-cookie-settings.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		
		wp_enqueue_script( 'govbr-cookies-manager-script', get_template_directory_uri() . '/assets/js/cookies-manager.js', array('gov-br-setup-script'), wp_get_theme()->get( 'Version' ), true );

		$tema_govbr_cookies_manager = [];
		foreach( $this->cookies_settings as $key => $setting )
			$tema_govbr_cookies_manager = $this->add_to_cookies_settings_json($setting, $key, $tema_govbr_cookies_manager);
		
		wp_localize_script( 'govbr-cookies-manager-script', 'tema_govbr_cookies_manager',
			$tema_govbr_cookies_manager
		);
	}

	/**
	 * Recursive function to build JSON-like array with cookie manager settings
	 * 
	 * @since 0.1.0
	 * 
	 * @return array
	 */
	function add_to_cookies_settings_json($setting, $key, $tema_govbr_cookies_manager) {

		if ( $setting['type'] != 'array' )
			$tema_govbr_cookies_manager[$key] = get_option( $setting['slug'], $setting['default'] );

		else if ( is_array($setting['default']) && count($setting['default']) ) {
			
			foreach($setting['default'] as $subsetting) {

				if ( is_array($subsetting) && count($subsetting) ) {
					
					$subsettings = [];
					foreach($subsetting as $subsetting_item)
						$subsettings = $this->add_to_cookies_settings_json($subsetting_item, $subsetting_item['slug'], $subsettings);
					
					$tema_govbr_cookies_manager[$key][] = $subsettings;
				}
			}
		}

		return $tema_govbr_cookies_manager;
	} 

	/**
	 * Render the cookies settings page.
	 * 
	 * @since 0.1.0
	 */
	function add_cookies_settings_page() {
		add_options_page(
			'Configurações de Cookies do Tema Gov BR',
			'Configurações de Cookies',
			'manage_options',
			'cookies-settings',
			array( $this, 'render_cookies_settings_page' )
		);
	}
	/**
     * Add a settings field for cookies configuration.
     *
     * @since 0.1.0
     *
     * @param string $slug        The slug of the setting field.
     * @param string $title       The title of the setting field.
     * @param string $default     The default value for the setting field.
	 * @param string|array $type        The type of the setting field.
     * @param string $section     The section where the setting field should be added.
     */
    private function add_cookie_setting_field( $slug, $title, $default, $type, $section = 'cookies_settings_section') {
		
		if ( $type == 'array' )
			
			if ( !is_array($default) || !count( $default ) )
				return;
			else {
				add_settings_field(
					$slug,
					$title,
					array( $this, 'cookie_setting_field_callback' ),
					'cookies_settings',
					$section,
					array( 'slug' => $slug, 'default' => $default, 'type' => $type, 'class' => $slug )
				);

				foreach( $default as $subkey => $subsetting ) {
					if ( is_array($subsetting) && count( $subsetting ) ) {
						foreach( $subsetting as $subkey_index => $subsetting_item )
							$this->add_cookie_setting_field( $slug . '_' . $subkey . '_' . $subkey_index, $subsetting_item['label'], $subsetting_item['default'], $subsetting_item['type'], $section );
					}
				}
			}
			
		else {
			register_setting( 'cookies_settings', $slug );
			add_settings_field(
				$slug,
				$title,
				array( $this, 'cookie_setting_field_callback' ),
				'cookies_settings',
				$section,
				array( 'slug' => $slug, 'default' => $default, 'type' => $type, 'class' => $slug )
			);
		}
    }

    /**
     * Callback function for cookie setting fields.
     *
     * @since 0.1.0
     *
     * @param array $args      Arguments for the field callback.
     */
    public function cookie_setting_field_callback( $args ) {
        $value = get_option( $args['slug'], $args['default'] );
		
		$type = $args['type'];

		switch( $type ) {
			case 'array':
				echo '<hr>';
				break;
			case 'checkbox':
				echo '<input type="' . $type . '" name="' . esc_attr( $args['slug'] ) . '" value="1"' . checked(1, $value, false) . ' />';
				break;
			case 'textarea':
				echo '<textarea " name="' . esc_attr( $args['slug'] ) . '" rows="3">' . esc_attr( $value ) . '</textarea>';
				break;
			default:
				echo '<input type="' . $type . '" name="' . esc_attr( $args['slug'] ) . '" value="' . esc_attr( $value ) . '" />';
		}
    }

    /**
     * Initialize cookies settings.
     *
     * @since 0.1.0
     */
    public function init_cookies_settings() {

		// Seção de configurações de cookies
		add_settings_section(
			'cookies_settings_section',
			'Configurações de Cookies',
			array( $this, 'cookies_settings_section_callback' ),
			'cookies_settings' // Nome do grupo de opções
		);

        // Add settings fields
		foreach ( $this->cookies_settings as $setting )
        	$this->add_cookie_setting_field( $setting['slug'], $setting['label'], $setting['default'], $setting['type'], 'cookies_settings_section' );
    }

	// Callback function for the section
	function cookies_settings_section_callback() {
		echo '<p>Personalize as configurações do painel de cookies do seu tema:</p>';
	}

	// Função para renderizar a página de configurações de cookies
	function render_cookies_settings_page() {
		?>
		<div class="wrap">
			<h1><?php _e( 'Configurações de Cookies do Tema Gov BR', 'govbr'); ?></h1>
			<form method="post" action="options.php">
				<?php
				// Renderize as configurações de cookies registradas com o grupo 'cookies_settings'
				settings_fields('cookies_settings');
				do_settings_sections('cookies_settings');
				submit_button();
				?>
			</form>
		</div>
		<?php
	}
}
