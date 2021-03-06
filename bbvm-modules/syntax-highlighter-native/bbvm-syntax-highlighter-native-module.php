<?php // phpcs:ignore
class BBVapor_Syntax_Highlighter_Native_Module extends FLBuilderModule {
	/**
	 * Class Constructor.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Syntax Highlighter', 'bb-vapor-modules-pro' ),
				'description'     => __( 'Syntax Highlighter for Beaver Builder', 'bb-vapor-modules-pro' ),
				'category'        => __( 'Base', 'bb-vapor-modules-pro' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules-pro' ) ),
				'dir'             => BBVAPOR_PRO_BEAVER_BUILDER_DIR . '/bbvm-modules/syntax-highlighter-native/',
				'url'             => BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/syntax-highlighter-native/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => false, // Defaults to false and can be omitted.
			)
		);
	}

	/**
	 * Enqueue the highlighter and theme.
	 */
	public function enqueue_scripts() {
		if ( $this->settings && 'none' !== $this->settings->code ) {
			$this->add_js( 'syntax-highlighter', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/syntax-highlighter-native/js/highlight.pack.js', array( 'jquery' ), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, true );
			$theme = $this->settings->theme;
			$this->add_css( 'syntax-highlighter', BBVAPOR_PRO_BEAVER_BUILDER_URL . 'bbvm-modules/syntax-highlighter-native/js/styles/' . $theme . '.css', array(), BBVAPOR_PRO_BEAVER_BUILDER_VERSION, 'all' );
		}
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Syntax_Highlighter_Native_Module',
	array(
		'general' => array(
			'title'    => __( 'General', 'bb-vapor-modules-pro' ),
			'sections' => array(
				'general' => array(
					'title'  => __( 'Syntax Highlighter', 'bb-vapor-modules-pro' ),
					'fields' => array(
						'code'  => array(
							'type'        => 'select',
							'label'       => __( 'Enter Your Code Type', 'bb-vapor-modules-pro' ),
							'options'     => array(
								'none'           => __( 'None', 'bb-vapor-modules-pro' ),
								'1c'             => '1C',
								'abnf'           => 'ABNF',
								'accesslog'      => 'Access logs',
								'ada'            => 'Ada',
								'armasm, arm'    => 'ARM assembler',
								'avrasm'         => 'AVR assembler',
								'actionscript'   => 'ActionScript',
								'apache'         => 'Apache',
								'applescript'    => 'AppleScript',
								'asciidoc'       => 'AsciiDoc',
								'aspectj'        => 'AspectJ',
								'autohotkey'     => 'AutoHotkey',
								'autoit'         => 'AutoIt',
								'awk'            => 'Awk',
								'axapta'         => 'Axapta',
								'bash, sh, zsh'  => 'Bash',
								'basic'          => 'Basic',
								'bnf'            => 'BNF',
								'brainfuck'      => 'Brainfuck',
								'cs, csharp'     => 'C#',
								'cpp'            => 'C++',
								'cal'            => 'C/AL',
								'cos'            => 'Cache Object Script',
								'cmake'          => 'CMake',
								'coq'            => 'Coq',
								'csp'            => 'CSP',
								'css'            => 'CSS',
								'capnproto'      => 'Capn Proto',
								'clojure'        => 'Clojure',
								'coffeescript'   => 'CoffeeScript',
								'crmsh'          => 'Crmsh',
								'crystal'        => 'Crystal',
								'd'              => 'D',
								'dns'            => 'DNS Zone file',
								'dos'            => 'DOS',
								'dart'           => 'Dart',
								'delphi'         => 'Delphi',
								'diff'           => 'Diff',
								'django'         => 'Django',
								'dockerfile'     => 'Dockerfile',
								'dsconfig'       => 'dsconfig',
								'dts'            => 'DTS (Device Tree)',
								'dust, dst'      => 'Dust',
								'ebnf'           => 'EBNF',
								'elixir'         => 'Elixir',
								'elm'            => 'Elm',
								'erlang'         => 'Erlang',
								'excel'          => 'Excel',
								'fsharp'         => 'F#',
								'fix'            => 'FIX',
								'fortran'        => 'Fortran',
								'gcode'          => 'G-Code',
								'gams'           => 'Gams',
								'gauss'          => 'GAUSS',
								'gherkin'        => 'Gherkin',
								'go'             => 'Go',
								'golo'           => 'Golo',
								'gradle'         => 'Gradle',
								'groovy'         => 'Groovy',
								'xml'            => 'HTML, XML',
								'http'           => 'HTTP',
								'haml'           => 'Haml',
								'handlebars'     => 'Handlebars',
								'haskell'        => 'Haskell',
								'haxe'           => 'Haxe',
								'hy'             => 'Hy',
								'ini'            => 'Ini',
								'inform7'        => 'Inform7',
								'irpf90'         => 'IRPF90',
								'json'           => 'JSON',
								'java'           => 'Java',
								'javascript'     => 'JavaScript',
								'leaf'           => 'Leaf',
								'lasso'          => 'Lasso',
								'less'           => 'Less',
								'ldif'           => 'LDIF',
								'lisp'           => 'Lisp',
								'livecodeserver' => 'LiveCode Server',
								'livescript'     => 'LiveScript',
								'lua'            => 'Lua',
								'makefile'       => 'Makefile',
								'markdown'       => 'Markdown',
								'mathematica'    => 'Mathematica',
								'matlab'         => 'Matlab',
								'maxima'         => 'Maxima',
								'mel'            => 'Maya Embedded Language',
								'mercury'        => 'Mercury',
								'mizar'          => 'Mizar',
								'mojolicious'    => 'Mojolicious',
								'monkey'         => 'Monkey',
								'moonscript'     => 'Moonscript',
								'n1ql'           => 'N1QL',
								'nsis'           => 'NSIS',
								'nginx'          => 'Nginx',
								'nimrod'         => 'Nimrod',
								'nix'            => 'Nix',
								'ocaml'          => 'OCaml',
								'objectivec'     => 'Objective C',
								'glsl'           => 'OpenGL Shading Language',
								'openscad'       => 'OpenSCAD',
								'ruleslanguage'  => 'Oracle Rules Language',
								'oxygene'        => 'Oxygene',
								'pf'             => 'PF',
								'php'            => 'PHP',
								'parser3'        => 'Parser3',
								'perl'           => 'Perl',
								'pony'           => 'Pony',
								'powershell'     => 'PowerShell',
								'processing'     => 'Processing',
								'prolog'         => 'Prolog',
								'protobuf'       => 'Protocol Buffers',
								'puppet'         => 'Puppet',
								'python'         => 'Python',
								'profile'        => 'Python profiler results',
								'k'              => 'Q',
								'qml'            => 'QML',
								'r'              => 'R',
								'rib'            => 'RenderMan RIB',
								'rsl'            => 'RenderMan RSL',
								'graph'          => 'Roboconf',
								'ruby'           => 'Ruby',
								'rust'           => 'Rust',
								'scss'           => 'SCSS',
								'sql'            => 'SQL',
								'p21'            => 'STEP Part 21',
								'scala'          => 'Scala',
								'scheme'         => 'Scheme',
								'scilab'         => 'Scilab',
								'shell'          => 'Shell',
								'smali'          => 'Smali',
								'smalltalk'      => 'Smalltalk',
								'stan'           => 'Stan',
								'stata'          => 'Stata',
								'stylus'         => 'Stylus',
								'subunit'        => 'SubUnit',
								'swift'          => 'Swift',
								'tap'            => 'Test Anything Protocol',
								'tcl'            => 'Tcl',
								'tex'            => 'TeX',
								'thrift'         => 'Thrift',
								'tp'             => 'TP',
								'twig'           => 'Twig',
								'typescript'     => 'TypeScript',
								'vbnet'          => 'VB.Net',
								'vbscript'       => 'VBScript',
								'vhdl'           => 'VHDL',
								'vala'           => 'Vala',
								'verilog'        => 'Verilog',
								'vim'            => 'Vim Script',
								'x86asm'         => 'x86 Assembly',
								'xl'             => 'XL',
								'xpath'          => 'XQuery',
								'zephir'         => 'Zephir',
							),
							'description' => __( 'You will need to save the module and refresh Beaver Builder to see the changes', 'bb-vapor-modules-pro' ),
						),
						'theme' => array(
							'type'        => 'select',
							'label'       => __( 'Enter Your Theme Type', 'bb-vapor-modules-pro' ),
							'description' => __( 'You may need to save/publish and refresh to see the theme in action', 'bb-vapor-modules-pro' ),
							'options'     => array(
								'default'                  => __( 'Default', 'bb-vapor-modules-pro' ),
								'a11y-dark'                => 'A 11 Y Dark',
								'a11y-light'               => 'A 11 Y Light',
								'agate'                    => 'Agate',
								'an-old-hope'              => 'An Old Hope',
								'androidstudio'            => 'Android Studio',
								'arduino-light'            => 'Arduino Light',
								'arta'                     => 'Arta',
								'ascetic'                  => 'Ascetic',
								'atelier-cave-dark'        => 'Atelier Cave Dark',
								'atelier-cave-light'       => 'Atelier Cave Light',
								'atelier-dune-dark'        => 'Atelier Dune Dark',
								'atelier-dune-light'       => 'Atelier Dune Light',
								'atelier-estuary-dark'     => 'Atelier Estuary Dark',
								'atelier-estuary-light'    => 'Atelier Estuary Light',
								'atelier-forest-dark'      => 'Atelier Forest Dark',
								'atelier-forest-light'     => 'Atelier Forest Light',
								'atelier-heath-dark'       => 'Atelier Heath Dark',
								'atelier-heath-light'      => 'Atelier Heath Light',
								'atelier-lakeside-dark'    => 'Atelier Lakeside Dark',
								'atelier-lakeside-light'   => 'Atelier Lakeside Light',
								'atelier-plateau-dark'     => 'Atelier Plateau Dark',
								'atelier-plateau-light'    => 'Atelier Plateau Light',
								'atelier-savanna-dark'     => 'Atelier Savanna Dark',
								'atelier-savanna-light'    => 'Atelier Savanna Light',
								'atelier-seaside-dark'     => 'Atelier Seaside Dark',
								'atelier-seaside-light'    => 'Atelier Seaside Light',
								'atelier-sulphurpool-dark' => 'Atelier Sulphur Pool Dark',
								'atelier-sulphurpool-light' => 'Atelier Sulphur Pool Light',
								'atom-one-dark-reasonable' => 'Atom One Dark Reasonable',
								'atom-one-dark'            => 'Atom One Dark',
								'atom-one-light'           => 'Atom One Light',
								'brown-paper'              => 'Brown Paper',
								'codepen-embed'            => 'Codepen Embed',
								'color-brewer'             => 'Color Brewer',
								'darcula'                  => 'Darcula',
								'dark'                     => 'Dark',
								'darkula'                  => 'Darkula',
								'default'                  => 'Default',
								'docco'                    => 'Docco',
								'dracula'                  => 'Dracula',
								'far'                      => 'Far',
								'foundation'               => 'Foundation',
								'github-gist'              => 'GitHub Gist',
								'github'                   => 'GitHub',
								'gml'                      => 'GML',
								'googlecode'               => 'Google Code',
								'grayscale'                => 'Grayscale',
								'gruvbox-dark'             => 'Gruvbox Dark',
								'gruvbox-light'            => 'Gruvbox Light',
								'hopscotch'                => 'Hop Scotch',
								'hybrid'                   => 'Hybrid',
								'idea'                     => 'Idea',
								'ir-black'                 => 'IR Black',
								'isbl-editor-dark'         => 'ISBL Editor Dark',
								'isbl-editor-light'        => 'ISBL Editor Light',
								'kimbie.dark'              => 'Kimbie Dark',
								'kimbie.light'             => 'Kimbie Light',
								'lightfair'                => 'Light Fair',
								'magula'                   => 'Magula',
								'mono-blue'                => 'Mono Blue',
								'monokai-sublime'          => 'Monokai Sublime',
								'monokai'                  => 'Monokai',
								'nord'                     => 'Nord',
								'obsidian'                 => 'Obsidian',
								'ocean'                    => 'Ocean',
								'paraiso-dark'             => 'Paraiso Dark',
								'paraiso-light'            => 'Paraiso Light',
								'pojoaque.css'             => 'Pojaque',
								'purebasic'                => 'Pure Basic',
								'qtcreator_dark'           => 'QT Creator Dark',
								'qtcreator_light'          => 'GQ Creator Light',
								'railcasts'                => 'Rail Casts',
								'rainbow'                  => 'Rainbow',
								'routeros'                 => 'Routeros',
								'school-book'              => 'School Book',
								'shades-of-purple'         => 'Shades of Purple',
								'solarized-dark'           => 'Solarized Dark',
								'solarized-light'          => 'Solarized Light',
								'sunburst'                 => 'Sunburst',
								'tomorrow-night-blue'      => 'Tomorrow Night Blue',
								'tomorrow-night-bright'    => 'Tomorrow Night Bright',
								'tomorrow-night-eighties'  => 'Tomorrow Night Eighties',
								'tomorrow-night'           => 'Tomorrow Night',
								'tomorrow'                 => 'Tomorrow',
								'vs'                       => 'VS',
								'vs2015'                   => 'VS 2015',
								'xcode'                    => 'XCODE',
								'xt256'                    => 'XT256',
								'zenburn'                  => 'zenburn',
							),
							'description' => __( 'You will need to save the module and refresh Beaver Builder to see the changes. Only one theme can be used per page. Takes from the top-most module.', 'bb-vapor-modules-pro' ),
						),
						'raw'   => array(
							'type'  => 'code',
							'label' => __( 'Enter your code here.', 'bb-vapor-modules-pro' ),
							'rows'  => '18',
						),
					),
				),
			),
		),
	)
);
