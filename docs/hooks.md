# Hooks

- [Actions](#actions)
- [Filters](#filters)

## Actions

*This project does not contain any WordPress actions.*

## Filters

### `govbr_theme_admin_settings_page_tabs`

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`$extra_tabs` |  | 

Source: [govbr/classes/class-gov-br-admin-page.php](classes/class-gov-br-admin-page.php), [line 113](classes/class-gov-br-admin-page.php#L113-L116)

### `govbr_theme_admin_settings_page_plugins`

*Filter for adding extra plugins to be recommended on the theme settings page*

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`$plugins` |  | 

**Changelog**

Version | Description
------- | -----------
`0.1.0` | 

Source: [govbr/classes/class-gov-br-admin-page.php](classes/class-gov-br-admin-page.php), [line 400](classes/class-gov-br-admin-page.php#L400-L411)

### `gov_br_svg_icons_{$group}`

*Filters Gov BRs's array of icons.*

The dynamic portion of the hook name, `$group`, refers to
the name of the group of icons, either "ui" or "social".

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`$arr` | `array` | Array of icons.

**Changelog**

Version | Description
------- | -----------
`0.1.0` | 

Source: [govbr/classes/class-gov-br-svg-icons.php](classes/class-gov-br-svg-icons.php), [line 174](classes/class-gov-br-svg-icons.php#L174-L184)

### `gov_br_social_icons_map`

*Filters Gov BRs's array of domain mappings for social icons.*

By default, each Icon ID is matched against a .com TLD. To override this behavior,
specify all the domains it covers (including the .com TLD too, if applicable).

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`self::$social_icons_map` |  | 

**Changelog**

Version | Description
------- | -----------
`0.1.0` | 

Source: [govbr/classes/class-gov-br-svg-icons.php](classes/class-gov-br-svg-icons.php), [line 214](classes/class-gov-br-svg-icons.php#L214-L224)

### `gov_br_svg_icons_social`

*Filters Gov BR's array of social icons.*

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`self::$social_icons` |  | 

**Changelog**

Version | Description
------- | -----------
`0.1.0` | 

Source: [govbr/classes/class-gov-br-svg-icons.php](classes/class-gov-br-svg-icons.php), [line 226](classes/class-gov-br-svg-icons.php#L226-L233)

### `gov_br_attachment_size`

*Filter the default image attachment size.*

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`'full'` |  | 

**Changelog**

Version | Description
------- | -----------
`0.1.0` | 

Source: [govbr/image.php](image.php), [line 22](image.php#L22-L29)

### `gov_br_starter_content`

*Filters the array of starter content.*

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`$starter_content` | `array` | Array of starter content.

**Changelog**

Version | Description
------- | -----------
`0.1.0` | 

Source: [govbr/inc/starter-content.php](inc/starter-content.php), [line 147](inc/starter-content.php#L147-L154)

### `gov_br_can_show_post_thumbnail`

*Filters whether post thumbnail can be displayed.*

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`!post_password_required() && !is_attachment() && has_post_thumbnail()` |  | 

**Changelog**

Version | Description
------- | -----------
`0.1.0` | 

Source: [govbr/inc/template-functions.php](inc/template-functions.php), [line 99](inc/template-functions.php#L99-L109)

### `the_content`

*This filter is documented in wp-includes/post-template.php*

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`$blocks_content` |  | 

Source: [govbr/inc/template-functions.php](inc/template-functions.php), [line 265](inc/template-functions.php#L265-L266)

### `gov_br_content_width`

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`1152` |  | 

Source: [govbr/functions.php](functions.php), [line 150](functions.php#L150-L150)

### `govbr_html_classes`

*Filters the classes for the main <html> element.*

**Arguments**

Argument | Type | Description
-------- | ---- | -----------
`''` |  | 

**Changelog**

Version | Description
------- | -----------
`0.1.0` | 

Source: [govbr/functions.php](functions.php), [line 316](functions.php#L316-L323)


<p align="center"><a href="https://github.com/pronamic/wp-documentor"><img src="https://cdn.jsdelivr.net/gh/pronamic/wp-documentor@main/logos/pronamic-wp-documentor.svgo-min.svg" alt="Pronamic WordPress Documentor" width="32" height="32"></a><br><em>Generated by <a href="https://github.com/pronamic/wp-documentor">Pronamic WordPress Documentor</a> <code>1.2.0</code></em><p>
