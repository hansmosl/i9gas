<?php
/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
//require_once get_template_directory() . '/core/classes/class-shortcodes-menu.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';
// require_once get_template_directory() . '/core/classes/class-post-status.php';
//require_once get_template_directory() . '/core/classes/class-term-meta.php';

if ( ! function_exists( 'i9gas_setup_features' ) ) {

	function i9gas_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'i9gas', get_stylesheet_directory() . '/languages' );

		/**
		 * Support The Excerpt on pages.
		 */
		add_post_type_support( 'page', 'excerpt' );

		add_action( 'after_setup_theme', 'i9gas_setup_features' );
		
		register_nav_menus(
			array(
				'footer-menu' => __( 'Menu Rodapé', 'i9gas' ),
				'menu-mobile' => __( 'Menu Mobile', 'i9gas' )
			)
		);
		
	}
}

add_action( 'after_setup_theme', 'i9gas_setup_features' );

/*
* CPT Imprensa (Lojas)
*/

function i9gas_loja_cpt() {
    $cpt = new Odin_Post_Type(
        'Loja', // Nome (Singular) do Post Type.
        'loja' // Slug do Post Type.
    );

    $cpt->set_labels(
        array(
            'menu_name' => __( 'Nossas Lojas', 'i9gas' )
        )
    );

    $cpt->set_arguments(
        array(
					'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
					'menu_icon' => 'dashicons-store'
        )
    );
}

// add_action( 'init', 'i9gas_loja_cpt', 1 );

//
// Limpa nome de arquivo com caracteres especiais
//

function sanitize_file_name_chars($filename) {

	$sanitized_filename = remove_accents($filename); // Convert to ASCII

	// Standard replacements
	$invalid = array(
		' ' => '-',
		'%20' => '-',
		'_' => '-'
	);
	$sanitized_filename = str_replace(array_keys($invalid), array_values($invalid), $sanitized_filename);

	$sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except .
	$sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last .
	$sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
	$sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
	$sanitized_filename = strtolower($sanitized_filename); // Lowercase

	return $sanitized_filename;
}

add_filter('sanitize_file_name', 'sanitize_file_name_chars', 10);

/*
* social share sem uso de plugins
* http://crunchify.com/how-to-create-social-sharing-button-without-any-plugin-and-script-loading-wordpress-speed-optimization-goal/
*/
//[sharebuttons]
function social_sharing_buttons($sharebuttons) {	
	$post_url = get_permalink();
	// URL da página
	$post_url = get_permalink();
	// Título da página com substituição do espaço em branco
	$post_title = str_replace( ' ', '%20', get_the_title() );
	// Imagem para o Pinterest
	$post_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );		
	//Pegando primeira imagem do Array;
	$post_image = $post_image[0];		
	// Montando URL de compartilhamento
	$twitterURL = "https://twitter.com/intent/tweet?text=$post_title&amp;url=$post_url&amp;via=Crunchify";
	$facebookURL = "https://www.facebook.com/sharer/sharer.php?u=$post_url";
	$googleURL = "https://plus.google.com/share?url=$post_url";				
	$pinterestURL = "https://pinterest.com/pin/create/button/?url=$post_url&amp;media=$post_image&amp;description=$post_title"; 
	
	// Add sharing button at the end of page/page content
	
	$labelshare = "Compartilhe";
	$sharebuttons .= "<div class='social-share'>";
	$sharebuttons .= "<h5 class='sr-only'>$labelshare</h5>";
	$sharebuttons .= "<ul class='list-inline'>";
	$sharebuttons .= "<li><a class='twitter icon-twitter' href='$twitterURL' target='_blank' title='Compartilhe no Twitter'><span class='sr-only'>Twitter</span></a>";
	$sharebuttons .= "<li><a class='facebook icon-facebook' href='$facebookURL' target='_blank' title='Compartilhe no Facebook'><span class='sr-only'>Facebook</span></a>";
	$sharebuttons .= "<li><a class='google icon-google-plus' href='$googleURL' target='_blank' title='Compartilhe no Google+'><span class='sr-only'>Google+</span></a>";		
	$sharebuttons .= "<li><a class='pinterest icon-pinterest-p' href='$pinterestURL' target='_blank' title='Compartilhe no Pinterest'><span class='sr-only'>Pinterest</span></a>";
	$sharebuttons .= "</ul></div>";
	return $sharebuttons;	
};
add_shortcode( 'sharebuttons', 'social_sharing_buttons');

/**
 * Odin Theme Options
 */
function i9gas_theme_settings() {

	$odin_theme_options = new Odin_Theme_Options( 
			'opcoes-tema', // Slug/ID da página (Obrigatório)
			'Opções do tema', // Titulo da página (Obrigatório)
			'manage_options' // Nível de permissão (Opcional) [padrão é manage_options]
	);

	$odin_theme_options->set_tabs(
			array(
					array(
							'id' => 'odin_general', // ID da aba e nome da entrada no banco de dados.
							'title' => 'Configurações', // Título da aba.
					),
					array(
							'id' => 'odin_codigos', // ID da aba e nome da entrada no banco de dados.
							'title' => 'Códigos Adicionais', // Título da aba.
					)
			)
	);

	$odin_theme_options->set_fields(
		array(
			'general_section' => array(
				'tab'   => 'odin_general', // Sessão da aba odin_general
				'title' => 'Contatos',
				'fields' => array(
					array(
							'id' => 'facebook',
							'label' => 'Facebook',
							'type' => 'text'
					),
          array(
							'id' => 'youtube',
							'label' => 'Youtube',
							'type' => 'text'
					),
          array(
							'id' => 'instagram',
							'label' => 'instagram',
							'type' => 'text'
					),          
					array(
							'id' => 'telefone',
							'label' => 'Telefone',
							'type' => 'text'
					),
					array(
							'id' => 'email',
							'label' => 'E-mail',
							'type' => 'text'
					),
					array(
							'id'					=> 'rodape-mensagem',
							'label'				=> 'Mensagem do Rodapé',
							'type'        => 'editor', // Obrigatório						
							'description' => 'Texto será inserido no início do Rodapé', // Opcional
							'options'     => array( // Opcional (aceita argumentos do wp_editor)
								'textarea_rows' => 10
							),
					)
				)
			),
			'codigo_section' => array(
				'tab'   => 'odin_codigos', // Sessão da aba odin_codigos
				'title' => 'Códigos',
				'fields' => array(
					array(
							'id' => 'codigo_head_fim',
							'label' => 'Head do HTML',
							'type' => 'textarea',
							'description' => 'O código daqui será impressao antes da tag head'
					),
					array(
							'id' => 'codigo_body_inicio',
							'label' => 'Início do Body do HTML',
							'type' => 'textarea',
							'description' => 'O código daqui será impressao após da tag body'
					),
				)
			)
		)
	);
}//fecha a funcao
add_action( 'init', 'i9gas_theme_settings', 1 );

/*
* Pontos de Venda
*/

function odin_pdv_cpt() {
	$pdv = new Odin_Post_Type(
			'Ponto de Venda', // Nome (Singular) do Post Type.
			'pdv' // Slug do Post Type.
	);

	$pdv->set_labels(
			array(
					'menu_name' => __( 'Pontos de Venda', 'odin' )
			)
	);

	$pdv->set_arguments(
			array(
					'supports' => array( 'title', 'editor', 'thumbnail'),
					'menu_icon' => 'dashicons-location-alt'
			)
	);
}

add_action( 'init', 'odin_pdv_cpt', 1 );

function odin_pdv_taxonomy() {
    $pdv_tax = new Odin_Taxonomy(
        'Local', // Nome (Singular) da nova Taxonomia.
        'local', // Slug do Taxonomia.
        'pdv' // Nome do tipo de conteúdo que a taxonomia irá fazer parte.
    );

    $pdv_tax->set_labels(
        array(
            'menu_name' => __( 'Local', 'odin' )
        )
    );

    $pdv_tax->set_arguments(
        array(
            'hierarchical' => true
        )
    );
}
add_action( 'init', 'odin_pdv_taxonomy', 1 );

function odin_pdv_bandeira() {
    $pdv_tag = new Odin_Taxonomy(
        'Bandeira', // Nome (Singular) da nova Taxonomia.
        'bandeira', // Slug do Taxonomia.
        'pdv' // Nome do tipo de conteúdo que a taxonomia irá fazer parte.
    );

    $pdv_tag->set_labels(
        array(
            'menu_name' => __( 'Bandeira', 'odin' )
        )
    );

    $pdv_tag->set_arguments(
        array(
            'hierarchical' => true
        )
    );
}
add_action( 'init', 'odin_pdv_bandeira', 1 );

// Include the Odin_Term_Meta class.
require_once get_template_directory() . '/core/classes/class-term-meta.php';

function pdv_metabox() {

    $pdv_metabox = new Odin_Metabox(
        'pdv_metabox', // Slug/ID of the Metabox (Required)
        'Dados Adicionais', // Metabox name (Required)
        'pdv', // Slug of Post Type (Optional)
        'normal', // Context (options: normal, advanced, or side) (Optional)
        'high' // Priority (options: high, core, default or low) (Optional)
    );

    $pdv_metabox->set_fields(
        array(
            // Text Field.
            array(
                'id'         => 'endereco',
                'label'      => 'Endereço',
                'type'       => 'text',
            ),
            // HTML5 tel field.
            array(
                'id'          => 'telefone',
                'label'       => 'Telefone',
                'type'        => 'input',
                'attributes'  => array(
                    'type' => 'tel'
                )
            ),
        )
    );
}
add_action( 'init', 'pdv_metabox', 1 );


function implement_ajax() {
	if(isset($_POST['main_catid'])){
		$args = array(
			'child_of' => $_POST['main_catid'],
			'hide_empty' => 1,
			'taxonomy' => 'local',
			'show_count' => 0,
		);	
		$categories=  get_categories($args);
		foreach ($categories as $cat) {
			$option .= '<option value="'.$cat->slug.'" name="local">';
			$option .= $cat->cat_name;
			$option .= '</option>';
		}
		echo '<option value="-1" selected="selected">Cidade</option>'.$option;
		die();
	} // end if
}
add_action('wp_ajax_my_special_ajax_call', 'implement_ajax');
add_action('wp_ajax_nopriv_my_special_ajax_call', 'implement_ajax');//for users that are not logged in.

/*
* Registrando os scripts para uso futuro
*/
function carregar_scripts() {
	// Modelo de parametros
	//wp_register_script( $handle, $src, $deps, $ver, $in_footer );
	// Registra o código
	wp_register_script('calculadora', get_stylesheet_directory_uri() . '/assets/js/calculadora-inovegas.js', array('jquery'), false, true);
	wp_register_script('calculadora-lp', get_stylesheet_directory_uri() . '/assets/js/calculadora-inovegas-lp.js', array('jquery'), false, true);
	// Carregar o código somente na Front Page
	if( is_front_page() ){wp_enqueue_script('calculadora');}
	if( is_page_template('tpl-calculadora.php') ){wp_enqueue_script('calculadora-lp');}
	 
	//Carrego direto script de navegação por âncora suave
	wp_enqueue_script('smoothscrolling', get_stylesheet_directory_uri() . '/assets/js/smoothscrolling.js', array('jquery'), false, false);
}
//Inicia a Função
add_action('wp_enqueue_scripts', 'carregar_scripts');

#
# Disparando evento pelo ID do formulário
# Se um formulário tiver o id igual ao abaixo
# [contact-form-7 id="123" title="Contact form 1"]
#
add_action( 'wp_footer', 'mycustom_wp_footer', 15);
function mycustom_wp_footer() {

  if(is_page(1181)):
?>
  <script type='text-javascript'>gtag('event', 'conversion', {'send_to': 'AW-896596391/lPKnCLqLiKMBEKfzw6sD'});</script>
<?php
  endif;
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
	if ( '44' == event.detail.contactFormId ) {
			ga( 'gtag_UA_69845920_1.send', 'event', 'formulario', 'envio', 'contato' );
	}
		if ( '45' == event.detail.contactFormId ) {
			ga( 'gtag_UA_69845920_1.send', 'event', 'formulario', 'envio', 'trabalhe-conosco' );
	}
		if ( '48' == event.detail.contactFormId ) {
			var inputs = event.detail.inputs;
			for ( var i = 0; i < inputs.length; i++ ) {
					if ( 'your-loja' == inputs[i].name ) {
							var loja = inputs[i].value;
							break;
					}
			}
			ga( 'gtag_UA_69845920_1.send', 'event', 'formulario', 'orcamento', loja );
	}
		if ( '78' == event.detail.contactFormId ) {
			var inputs = event.detail.inputs;
			for ( var i = 0; i < inputs.length; i++ ) {
					if ( 'your-loja' == inputs[i].name ) {
							var loja = inputs[i].value;
							break;
					}
			}
			ga( 'gtag_UA_69845920_1.send', 'event', 'formulario', 'orcamento-home', loja );
	}
}, false );
</script>
<?php
}

if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Opções Avançadas',
		'menu_title' 	=> 'Opções Avançadas',
		'menu_slug' 	=> 'opcoes-avancadas',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
 
}

/*************
 * AJAX
 ************/
include('ajax/listar-lojas.php');
include('ajax/salvar-contato.php');
include('ajax/email-loja.php');
include('ajax/zap-loja.php');
include('ajax/telefone-loja.php');
include('ajax/monta-formulario.php');
include('ajax/email-callcenter.php');

function inovegas_scripts() {
  $template_url = get_stylesheet_directory_uri();
  // $versao 	= rand(0,999);
	$versao 	= 16;
  
  wp_enqueue_script( 'main', $template_url . '/assets/js/main.js', array(), null, true );
  
  wp_register_style( 'orcamento-css', $template_url . '/assets/css/orcamento.css', 1, $versao, 'all');
  wp_register_script('mask', $template_url . '/assets/js/jquery.mask.min.js', array('jquery'), $versao, true);
  //wp_register_script('mascaraTelefone', $template_url . '/assets/js/mascara-telefone.js', array(), $versao, true);
  wp_register_script('orcamentoAjax', $template_url . '/assets/js/orcamento-ajax.js', array('jquery'), $versao, true);  
  //wp_register_script('orcamento-js', $template_url . '/assets/js/orcamento.js', array('jquery'), $versao, true);

  if(
    is_front_page() OR
    is_page_template('tpl-landingpage.php') OR
    is_page_template('tpl-loja-interno.php') OR
    is_page_template('page-orcamento.php')
  ){
    wp_enqueue_style('orcamento-css');
    wp_enqueue_script('mask');
    //wp_enqueue_script('mascaraTelefone');
    wp_enqueue_script('orcamentoAjax');
  }
  
  wp_enqueue_style( 'custom', $template_url . '/assets/css/custom.css', 1, $versao, 'all');
  
	$wpVars = [
		'ajaxurl' => admin_url('admin-ajax.php'),
	];		
	wp_localize_script( 'orcamentoAjax', 'wp', $wpVars );
}
add_action( 'wp_enqueue_scripts', 'inovegas_scripts' );

/*
* https://contactform7.com/getting-default-values-from-shortcode-attributes/
*/ 
//add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
  $loja_attr = 'your-loja';
  if ( isset( $atts[$loja_attr] ) ) {
    $out[$loja_attr] = $atts[$loja_attr];
  }
  $telefone_attr = 'your-telefone';
  if ( isset( $atts[$telefone_attr] ) ) {
    $out[$telefone_attr] = $atts[$telefone_attr];
  }
  return $out;
}

//
function single_content_end( $content ) {    
    if( is_singular('post') ) {
      $content_end = get_field('post_end', 'options');
      if(!empty($content_end)){
        $content .= $content_end;
      }
    }
    return $content;
}
add_filter( 'the_content', 'single_content_end' );

function chamada_zap(){
	$link = get_field('chamada-zap', 'options');	
	if($link){
		$botao = '<a href="'.$link.'" title="Contato via WhatsApp" target="_blank" id="chamada-zap" style="position:fixed;z-index:99;right:1rem;bottom:1rem;"><img src="https://www.inovegas.com.br/site/wp-content/uploads/2021/01/whatsapp-logo.svg" width="45px" height="45px" alt="WhatsApp" /></a>';
		echo $botao;
    
    ?>
<script>
(function($){
  jQuery('#chamada-zap').click( function() {
    ga( 'gtag_UA_69845920_1.send', 'event', 'whatsapp', 'btn-fixo');
  });
})(jQuery);
</script>
    <?php
	}
}
add_action( 'wp_footer', 'chamada_zap', 10 );