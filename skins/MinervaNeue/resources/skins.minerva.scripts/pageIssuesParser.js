( function ( M ) {
	/**
	 * @typedef PageIssue
	 * @prop {string} severity A SEVERITY_LEVEL key.
	 * @prop {Icon} icon
	 */

	var Icon = M.require( 'mobile.startup/Icon' ),
		// Icons are matching the type selector below use a TYPE_* icon. When unmatched, the icon is
		// chosen by severity. Their color is always determined by severity, too.
		ICON_NAME = {
			// Generic severity icons.
			SEVERITY: {
				DEFAULT: 'issue-generic',
				LOW: 'issue-severity-low',
				MEDIUM: 'issue-severity-medium',
				HIGH: 'issue-generic'
			},

			// Icons customized by type.
			TYPE: {
				MOVE: 'issue-type-move',
				POINT_OF_VIEW: 'issue-type-point-of-view'
			}
		},
		ICON_COLOR = {
			DEFAULT: 'defaultColor',
			LOW: 'lowColor',
			MEDIUM: 'mediumColor',
			HIGH: 'highColor'
		},
		// How severities order and compare from least to greatest. For the multiple issues
		// template, severity should be considered the maximum of all its contained issues.
		SEVERITY_LEVEL = {
			DEFAULT: 0,
			LOW: 1,
			MEDIUM: 2,
			HIGH: 3
		},
		// Match the template's color CSS selector to a severity level concept. Derived via the
		// Ambox templates and sub-templates for the top five wikis and tested on page issues
		// inventory:
		// - https://people.wikimedia.org/~jdrewniak/page_issues_inventory
		// - https://en.wikipedia.org/wiki/Template:Ambox
		// - https://es.wikipedia.org/wiki/Plantilla:Metaplantilla_de_avisos
		// - https://ja.wikipedia.org/wiki/Template:Ambox
		// - https://ru.wikipedia.org/wiki/Шаблон:Ambox
		// - https://it.wikipedia.org/wiki/Template:Avviso
		// Severity is the class associated with the color. The ResourceLoader config mimics the
		// idea by using severity for color variants. Severity is determined independently of icons.
		// These selectors should be migrated to their templates.
		SEVERITY_REGEX = {
			LOW: /ambox-style|avviso-stile/, // en, it
			MEDIUM: /ambox-content|avviso-contenuto/, // en, it
			HIGH: /ambox-speedy|ambox-delete|ambox-serious|avviso-importante/ // en, en, es / ru, it
			// ..And everything else that doesn't match should be considered DEFAULT.
		},
		// As above but used to identify specific templates requiring icon customization.
		TYPE_REGEX = {
			MOVE: /ambox-converted|ambox-move|ambox-merge|avviso-struttura/, // en, es / ru, it
			POINT_OF_VIEW: new RegExp( [ // en
				'ambox-Advert',
				'ambox-autobiography',
				'ambox-believerpov',
				'ambox-COI',
				'ambox-coverage',
				'ambox-criticism',
				'ambox-fanpov',
				'ambox-fringe-theories',
				'ambox-geographical-imbalance',
				'ambox-globalize',
				'ambox-npov-language',
				'ambox-POV',
				'ambox-pseudo',
				'ambox-systemic-bias',
				'ambox-unbalanced',
				'ambox-usgovtpov'
			].join( '|' ) )
			// ..And everything else that doesn't match is mapped to a "SEVERITY" type.
		},
		// Variants supported by specific types. The "severity icon" supports all severities but the
		// type icons only support one each by ResourceLoader.
		TYPE_SEVERITY = {
			MOVE: 'DEFAULT',
			POINT_OF_VIEW: 'MEDIUM'
		};

	/**
	 * @param {Element} box
	 * @return {string} An SEVERITY_SELECTOR key.
	 */
	function parseSeverity( box ) {
		var severity, identified;
		identified = Object.keys( SEVERITY_REGEX ).some( function ( key ) {
			var regex = SEVERITY_REGEX[key];
			severity = key;
			return regex.test( box.className );
		} );
		return identified ? severity : 'DEFAULT';
	}

	/**
	 * @param {Element} box
	 * @param {string} severity An SEVERITY_LEVEL key.
	 * @return {{name: string, severity: string}} An ICON_NAME.
	 */
	function parseType( box, severity ) {
		var identified, identifiedType;
		identified = Object.keys( TYPE_REGEX ).some( function ( type ) {
			var regex = TYPE_REGEX[type];
			identifiedType = type;
			return regex.test( box.className );
		} );
		return {
			name: identified ? ICON_NAME.TYPE[identifiedType] : ICON_NAME.SEVERITY[severity],
			severity: identified ? TYPE_SEVERITY[identifiedType] : severity
		};
	}

	/**
	 * @param {Element} box
	 * @param {string} severity An SEVERITY_LEVEL key.
	 * @return {string} A severity or type ISSUE_ICON.
	 */
	function iconName( box, severity ) {
		var nameSeverity = parseType( box, severity );
		// The icon with color variant as expected by ResourceLoader,
		// {iconName}-{severityColorVariant}.
		return nameSeverity.name + '-' + ICON_COLOR[nameSeverity.severity];
	}

	/**
	 * @param {string[]} severityLevels an array of SEVERITY_KEY values.
	 * @return {string} The greatest SEVERITY_LEVEL key.
	 */
	function maxSeverity( severityLevels ) {
		return severityLevels.reduce( function ( max, severity ) {
			return SEVERITY_LEVEL[max] > SEVERITY_LEVEL[severity] ? max : severity;
		}, 'DEFAULT' );
	}

	/**
	 * @param {Element} box
	 * @return {PageIssue}
	 */
	function parse( box ) {
		var severity = parseSeverity( box );
		return {
			severity: severity,
			icon: new Icon( {
				glyphPrefix: 'minerva',
				name: iconName( box, severity )
			} )
		};
	}

	/**
	 * @module skins.minerva.scripts/utils
	 */
	M.define( 'skins.minerva.scripts/pageIssuesParser', {
		/**
		 * Extract an icon for use with the issue.
		 * @param {JQuery.Object} $box element to extract the icon from
		 * @return {Icon} representing the icon
		 */
		parse: parse,
		maxSeverity: maxSeverity,
		iconName: iconName,
		test: {
			parseSeverity: parseSeverity,
			parseType: parseType
		}
	} );

}( mw.mobileFrontend ) );
