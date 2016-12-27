# pico-prismplugin
colorize pico markdown code block with prismjs.

pico is a php CMS software that render html from markdown(.md).
you can get more details at http://picocms.org/.

prismjs is a js and css library that makes colorize code in html. 
you can get more details at http://prismjs.com/.

# How to Install

## Setup prism(js and css).
1. visit prism website
1. customize download option (download all languages are recommended)
1. place prism into your pico-blog theme directory.
 * you are using default theme, place js and css into themes/default
1. customize twig template to include prism js and css.
```
example

<head>
  ...
  <link rel="stylesheet" href="{{ theme_url }}/style.css" type="text/css" />
  ...
</head>
<body>
  ...
  <script type="text/javascript" src="{{ theme_url }}/prism.js"></script>
  ...
</body>
```

## Install Plugin 
Copy/save plugin(PrismPlugin.php) into plugins directory.

# Colorize code block in markdown

## Write code block
1. add code block in your content(markdown).
```python
example

``` import os ```

```

2. (Optional) In default, this plugin colorize code by html syntax. If you want to colorize by another language, add PrismLang metadata in markdown.

```
example: colorize by python syntax

---
...
PrismLang: python
...
---

```