# LatteFontAwesomeIcon
New font awesome icons - latte generator. Replace older https://github.com/kravcik/nette-macro-fontawesome.

# Register Extension

```neon
latte:
	extensions: 
		- Kravcik\LatteFontAwesomeIcon\Extension
```

You can also set default values, it is quite simple:

```neon
latte:
	extensions: 
		- Kravcik\LatteFontAwesomeIcon\Extension(defaultStyle: far, defaultFixedWidth: false, defaultElement: i)
```

## Extension parameters

1. `defaultStyle` - choose FA style (_fas|far|fal|fab etc._), default is `fal`
2. `defaultFixedWidth` - auto adding `fa-fw` to icons, defaults is `true`
3. `defaultElement` - HTML element to generate icon, default is `span`

## Macro parameters
Parameters can be named or ordered by numeral indexes (see examples)

1. `color` - color for current icon, generate `text-primary` for bootstrap colors, for others go `color-xxx`
2. `size` - size for current icon, for numeric generate `fa-2x`, for strings `fa-lg`
3. `fw` - fixed width `fa-fw` for current icon
4. `style` - style for current icon (_fas|far|fal|fab etc._)
5. `class` - icon name without `fa-`

## Examples

Examples depends on default values, so we using default setting (fal, fw, span).

`{icon star}` -> `<span class="fal fa-star fa-fw"></i>`
`{icon star, primary}` -> `<span class="fal fa-star text-primary fa-fw"></span>`
`{icon star, red}` -> `<span class="fal fa-star color-red fa-fw"></span>`
`{icon star, null, lg}` -> `<span class="fal fa-star fa-lg fa-fw"></span>`
`{icon star, yellow, 2}` -> `<span class="fal fa-star color-yellow fa-2x fa-fw"></span>`
`{icon star, blue, size: 2, style: far}` -> `<span class="fal fa-star color-blue fa-2x"></span>`
`{icon star, class: foo, color: green}` -> `<span class="fal fa-star color-green foo"></span>`


Package |   PHP   |  Latte  | Font Awesome | Bootstrap |
:------:|:-------:|:-------:|:------------:|:---------:|
   v1   | \>=8.1  | \>=3    |      \>5     |     5     |