<?php
if ( ! class_exists( 'ReduxFrameworkInstances' ) ) {
	return;
}

class Digicove_CSS_Generator {
	/**
     * @access protected
     * @var scssc
     */
    protected $scssc = null;

    /**
     * ReduxFramework class instance
     *
     * @access protected
     * @var ReduxFramework
     */
    protected $redux = null;

    /**
     * Debug mode is turn on or not
     *
     * @access protected
     * @var boolean
     */
    protected $dev_mode = true;

    /**
     * opt_name of ReduxFramework
     *
     * @access protected
     * @var string
     */
    protected $opt_name = '';

	function __construct() {
		$this->opt_name = digicove()->get_option_name();  
		if ( empty( $this->opt_name ) ) {
			return;
		}
		$this->dev_mode = (defined('THEME_DEV_MODE_SCSS') && THEME_DEV_MODE_SCSS);  
        
		add_filter( 'pxl_scssc_on', '__return_true' );
		add_action( 'init', array( $this, 'init' ) );
	}

	function init() {

		if ( ! class_exists( 'scssc' ) ) {
			return;
		}

		$this->redux = ReduxFrameworkInstances::get_instance( $this->opt_name );

		if ( empty( $this->redux ) || ! $this->redux instanceof ReduxFramework ) {
			return;
		}
		add_action( 'wp', array( $this, 'digicove_generate_with_dev_mode' ) );
		add_action( "redux/options/{$this->opt_name}/saved", function () {
			$this->digicove_generate_file_options();
		} );
	}

	function digicove_generate_with_dev_mode() {
		if ( $this->dev_mode === true ) {
            $this->digicove_generate_file_options();
			$this->digicove_generate_file();
		}
	}

    function digicove_generate_file_options() {
        $scss_dir = get_template_directory() . '/assets/scss/';
        $this->scssc = new scssc();
        $this->scssc->setImportPaths( $scss_dir );
        $_options = $scss_dir . '_options.scss';
        $this->scssc->setFormatter( 'scss_formatter' );
        $this->redux->filesystem->execute( 'put_contents', $_options, array(
            'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->digicove_options_output() )
        ) );
    }

	function digicove_generate_file() {
		$scss_dir = get_template_directory() . '/assets/scss/';
		$css_dir  = get_template_directory() . '/assets/css/';

		$this->scssc = new scssc();
		$this->scssc->setImportPaths( $scss_dir );

		$css_file = $css_dir . 'style.css';

		$this->scssc->setFormatter( 'scss_formatter' );
		$this->redux->filesystem->execute( 'put_contents', $css_file, array(
			'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->scssc->compile( '@import "style.scss"' ) )
		) );
	}

	protected function print_scss_opt_colors($variable,$param){
        if(is_array($variable)){
            $k = [];
            $v = [];
            foreach ($variable as $key => $value) {
                $k[] = str_replace('-', '_', $key);
                $v[] = 'var(--'.str_replace(['#',' '], [''],$key).'-color)';
            }
            if($param === 'key'){
                return implode(',', $k);
            }else{
                return implode(',', $v);
            }
            
        } else {
            return $variable;
        }
    }

	protected function digicove_options_output() {
		$theme_colors                    = digicove_configs('theme_colors');
        $links                           = digicove_configs('link');
        $gradients                           = digicove_configs('gradient');
        $cursor                           = digicove_configs('cursor');
		ob_start();

		printf('$digicove_theme_colors_key:(%s);',$this->print_scss_opt_colors($theme_colors,'key'));
        printf('$digicove_theme_colors_val:(%s);',$this->print_scss_opt_colors($theme_colors,'val'));
        // color rgb only
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color_hex: %2$s;', str_replace('-', '_', $key), $value['value']); 
        }
        // color
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color: %2$s;', str_replace('-', '_', $key), 'var(--'.str_replace(['#',' '], [''],$key).'-color)' );
        }

        // color rgb only
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color_hex: %2$s;', str_replace('-', '_', $key), $value['value']); 
        }
        // color
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color: %2$s;', str_replace('-', '_', $key), 'var(--'.str_replace(['#',' '], [''],$key).'-color)' );
        }
         
        // link color
        foreach ($links as $key => $value) {
            printf('$link_%1$s: %2$s;', str_replace('-', '_', $key), 'var(--link-'.$key.')');
        }

        foreach ($cursor as $key => $value) {
            printf('$cursor_%1$s: %2$s;', str_replace('-', '_', $key), $value);
        }
		return ob_get_clean();
	}

}

new Digicove_CSS_Generator();