<?php
// Shared header — Royal Associates Insurance Brokers
$navActive = $navActive ?? '';
?><!DOCTYPE html>
<html data-wf-domain="www.royalassociates.co.ke" data-wf-page="6941fd8f651ca29cd5bc3589" data-wf-site="6941fd8f651ca29cd5bc3597" lang="en" class=" w-mod-js"><head><style>.wf-force-outline-none[tabindex="-1"]:focus{outline:none;}</style><meta charset="utf-8"><meta content="Because we care — corporate and individual insurance brokerage across Kenya and East Africa." name="description"><meta content="<?= $pageTitle ?? 'Royal Associates Insurance Brokers' ?>" property="og:title"><meta content="Because we care — corporate and individual insurance brokerage across Kenya and East Africa." property="og:description"><meta content="/assets/images/6967fcaec4a604c140d2daf8_Frame%202147227436.jpg" property="og:image"><meta content="<?= $pageTitle ?? 'Royal Associates Insurance Brokers' ?>" name="twitter:title"><meta content="Because we care — corporate and individual insurance brokerage across Kenya and East Africa." name="twitter:description"><meta property="og:type" content="website"><meta content="summary_large_image" name="twitter:card"><meta content="width=device-width, initial-scale=1" name="viewport"><link href="/assets/css/shepherd.css" rel="stylesheet" type="text/css"><script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script><link href="/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon"><link href="/assets/images/6944717162f4506446a11947_Frame%202147227430.jpg" rel="apple-touch-icon"><link href="https://www.royalassociates.co.ke" rel="canonical">
<?php wp_head(); ?>

<style>

.swiper-container{overflow: visible}
.loader{display: flex;}
.page_code_wrap{display: none;}
.page_content { padding-top: calc(var(--nav--height) + 1rem); }
.grid-wrapper{display: none;}

/*/ Lenis Smooth Scroll /*/
html.lenis, html.lenis body {
  height: auto;
}

.lenis.lenis-smooth {
  scroll-behavior: auto !important;
}

.lenis.lenis-smooth [data-lenis-prevent] {
  overscroll-behavior: contain;
}

.lenis.lenis-stopped {
  overflow: hidden;
}

.lenis.lenis-smooth iframe {
  pointer-events: none;
}

/*/ Code for Webflow Edidor /*/
.w-editor {}

/*/ Accordeon /*/
.drawer-bottom{  
	grid-template-rows: 0fr;
}
.w-editor .drawer-bottom{  
	grid-template-rows: 1fr;
}
</style>
</head><body <?php body_class(); ?>><div data-barba="wrapper" class="page_wrap"><div class="u-position-fixed"><div class="w-embed"><style>
:root {
  --grid-breakout: [full-start] minmax(0, 1fr) [content-start] repeat(var(--site--column-count), minmax(0, var(--site--column-width))) [content-end] minmax(0, 1fr) [full-end];
  --grid-breakout-single: [full-start] minmax(0, 1fr) [content-start] minmax(0, calc(100% - var(--site--margin) * 2)) [content-end] minmax(0, 1fr) [full-end];
}
::before, ::after {
	box-sizing: border-box;
}
.w-embed:before, .w-embed:after,
.w-richtext:before, .w-richtext:after {
	content: unset;
}
html {
	background-color: var(--_theme---background);
}
button {
	background-color: unset;
	padding: unset;
	text-align: inherit;
}
button:not(:disabled) {
	cursor: pointer;
}
video {
	width: 100%;
	object-fit: cover;
}
/* remove padding of empty element */
.wf-empty {
	padding: 0;
}
svg {
	max-width: 100%;
}
@media (prefers-color-scheme: light) {
	option { color: black; }
}
img::selection {
	background: transparent;
}
/* Typography */
body {
	text-transform: var(--_text-style---text-transform);
	font-smoothing: antialiased;
	-webkit-font-smoothing: antialiased;
}
/* Clear Defaults */
a:not([class]) {
	text-decoration: underline;
}
h1,h2,h3,h4,h5,h6,p,blockquote,label {
	font-family: inherit;
	font-size: inherit;
	font-weight: inherit;
	line-height: inherit;
	letter-spacing: inherit;
	text-transform: inherit;
	text-wrap: inherit;
	margin-top: 0;
	margin-bottom: 0;
}
select:has(option[value=""]:checked) {
	color: color-mix(in lab, currentcolor 60%, transparent)
}

/* Margin Trim */
:is(.u-margin-trim,.u-rich-text,.u-content-wrapper,[class*="u-container"]) > :not(:not(.w-condition-invisible,.u-cover-absolute,.u-ignore-trim) ~ :not(.w-condition-invisible,.u-cover-absolute,.u-ignore-trim)),
:is(.u-margin-trim,.u-rich-text,.u-content-wrapper,[class*="u-container"]) > :not(:not(.w-condition-invisible,.u-cover-absolute,.u-ignore-trim) ~ :not(.w-condition-invisible,.u-cover-absolute,.u-ignore-trim)).u-display-contents > :first-child {
	margin-top: 0;
}
:is(.u-margin-trim,.u-rich-text,.u-content-wrapper,[class*="u-container"]) > :not(:has(~ :not(.w-condition-invisible,.u-cover-absolute,.u-ignore-trim))),
:is(.u-margin-trim,.u-rich-text,.u-content-wrapper,[class*="u-container"]) > :not(:has(~ :not(.w-condition-invisible,.u-cover-absolute,.u-ignore-trim))).u-display-contents > :last-child {
	margin-bottom: 0;
}
/* Line Height Trim */
:not(.u-text-trim-off) > :is(h1,h2,h3,h4,h5,h6,p):not(.u-text-trim-off,:has([class*="u-text-style-"]))::before,
[class*="u-text-style-"]:not(.u-text-trim-off,:has(h1,h2,h3,h4,h5,h6,p))::before {
	content: "";
	display: table;
	margin-bottom: calc(-0.5lh + var(--_text-style---trim-top));
}
:not(.u-text-trim-off) > :is(h1,h2,h3,h4,h5,h6,p):not(.u-text-trim-off,:has([class*="u-text-style-"]))::after,
[class*="u-text-style-"]:not(.u-text-trim-off,:has(h1,h2,h3,h4,h5,h6,p))::after {
	content: "";
	display: table;
	margin-bottom: calc(-0.5lh + var(--_text-style---trim-bottom));
}
/* Rich Text Links */
.w-richtext a {
	position: relative;
	z-index: 4;
}
/* Line Clamp */
[class*="u-line-clamp"]:not(.w-richtext),
[class*="u-line-clamp"].w-richtext > * {
	display: -webkit-box;
	-webkit-line-clamp: 1;
	-webkit-box-orient: vertical;
	overflow: hidden;
}
.u-line-clamp-2:not(.w-richtext), .u-line-clamp-2.w-richtext > * { -webkit-line-clamp: 2; }
.u-line-clamp-3:not(.w-richtext), .u-line-clamp-3.w-richtext > * { -webkit-line-clamp: 3; }
.u-line-clamp-4:not(.w-richtext), .u-line-clamp-4.w-richtext > * { -webkit-line-clamp: 4; }
/* Text Max Width */
.u-text > * {
	width: 100%;
	max-width: inherit !important;
  margin-inline: 0 !important;
	margin-top: 0 !important;
}
/* Background Slot Children */
.u-background-slot > * {
	position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  aspect-ratio: unset !important;
}
/* Hide */
.u-hide-if-empty:empty,
.u-hide-if-empty:has(> *):not(:has(> :not(.w-condition-invisible))),
.u-hide-if-empty-cms:not(:has(.w-dyn-item)) {
	display: none !important;
}
/* Focus State */
a, button, :where([tabindex]), input {
	outline-offset: var(--focus--offset-outer);
}
a:focus-visible,
button:focus-visible,
[tabindex]:focus-visible,
input:focus-visible {
	outline-color: var(--_theme---text);
	outline-width: var(--focus--width);
	outline-style: solid;
}
/* Disabled - removed to keep buttons fully interactive */
/* Global / Clickable Component */
.wf-design-mode .clickable_wrap { z-index: 0; }
.clickable_wrap a[href="#"] { display: none; }
.clickable_wrap a[href="#"] ~ button { display: block; }
/* Number Attributes */
[data-number="-1"]{--number: initial;}[data-number="0"]{--number: 0;}[data-number="1"]{--number:1}[data-number="2"]{--number:2}[data-number="3"]{--number:3}[data-number="4"]{--number:4}[data-number="5"]{--number:5}[data-number="6"]{--number:6}[data-number="7"]{--number:7}[data-number="8"]{--number:8}[data-number="9"]{--number:9}
[data-number="10"]{--number:10}[data-number="11"]{--number:11}[data-number="12"]{--number:12}[data-number="13"]{--number:13}[data-number="14"]{--number:14}[data-number="15"]{--number:15}[data-number="16"]{--number:16}[data-number="17"]{--number:17}[data-number="18"]{--number:18}[data-number="19"]{--number:19}
[data-number="20"]{--number:20}[data-number="21"]{--number:21}[data-number="22"]{--number:22}[data-number="23"]{--number:23}[data-number="24"]{--number:24}[data-number="25"]{--number:25}[data-number="26"]{--number:26}[data-number="27"]{--number:27}[data-number="28"]{--number:28}[data-number="29"]{--number:29}
[data-number="30"]{--number:30}[data-number="31"]{--number:31}[data-number="32"]{--number:32}[data-number="33"]{--number:33}[data-number="34"]{--number:34}[data-number="35"]{--number:35}[data-number="36"]{--number:36}[data-number="37"]{--number:37}[data-number="38"]{--number:38}[data-number="39"]{--number:39}
[data-number="40"]{--number:40}[data-number="41"]{--number:41}[data-number="42"]{--number:42}[data-number="43"]{--number:43}[data-number="44"]{--number:44}[data-number="45"]{--number:45}[data-number="46"]{--number:46}[data-number="47"]{--number:47}[data-number="48"]{--number:48}[data-number="49"]{--number:49}
[data-number="50"]{--number:50}[data-number="51"]{--number:51}[data-number="52"]{--number:52}[data-number="53"]{--number:53}[data-number="54"]{--number:54}[data-number="55"]{--number:55}[data-number="56"]{--number:56}[data-number="57"]{--number:57}[data-number="58"]{--number:58}[data-number="59"]{--number:59}
[data-number="60"]{--number:60}[data-number="61"]{--number:61}[data-number="62"]{--number:62}[data-number="63"]{--number:63}[data-number="64"]{--number:64}[data-number="65"]{--number:65}[data-number="66"]{--number:66}[data-number="67"]{--number:67}[data-number="68"]{--number:68}[data-number="69"]{--number:69}
[data-number="70"]{--number:70}[data-number="71"]{--number:71}[data-number="72"]{--number:72}[data-number="73"]{--number:73}[data-number="74"]{--number:74}[data-number="75"]{--number:75}[data-number="76"]{--number:76}[data-number="77"]{--number:77}[data-number="78"]{--number:78}[data-number="79"]{--number:79}
[data-number="80"]{--number:80}[data-number="81"]{--number:81}[data-number="82"]{--number:82}[data-number="83"]{--number:83}[data-number="84"]{--number:84}[data-number="85"]{--number:85}[data-number="86"]{--number:86}[data-number="87"]{--number:87}[data-number="88"]{--number:88}[data-number="89"]{--number:89}
[data-number="90"]{--number:90}[data-number="91"]{--number:91}[data-number="92"]{--number:92}[data-number="93"]{--number:93}[data-number="94"]{--number:94}[data-number="95"]{--number:95}[data-number="96"]{--number:96}[data-number="97"]{--number:97}[data-number="98"]{--number:98}[data-number="99"]{--number:99}[data-number="100"]{--number:100}
/* State Manager */
[data-state] { --_state---true: 1; --_state---false: 0; }
.is-active,
[data-state~="checked"]:is(:checked, :has(:checked)),
[data-state~="current"]:is(.w--current, :has(.w--current)),
[data-state~="open"]:is(.w--open, :has(.w--open)),
[data-state~="pressed"]:is([aria-pressed="true"], :has([aria-pressed="true"])),
[data-state~="expanded"]:is([aria-expanded="true"], :has([aria-expanded="true"])),
[data-state~="external"]:is([target="_blank"], :has([target="_blank"])) { 
	--_state---true: 0; --_state---false: 1;
}
.wf-design-mode [data-trigger~="preview"],
[data-trigger~="focus"]:is(:focus-visible, :has(:focus-visible)),
[data-trigger~="group"]:has([data-trigger~="focus-other"]:focus-visible, [data-trigger~="focus-other"] :focus-visible)
  [data-trigger~="focus-other"]:not(:focus-visible, :has(:focus-visible)) {
	--_trigger---on: 0; --_trigger---off: 1;
}
@media (hover: hover) {
	[data-trigger~="hover"]:hover,
  [data-trigger~="hover-if-clickable"]:has(.clickable_wrap:not(.w-condition-invisible)):hover,
	[data-trigger~="group"]:has([data-trigger~="hover-other"]:hover) [data-trigger~="hover-other"]:not(:hover) { 
		--_trigger---on: 0; --_trigger---off: 1;
	}
	[data-trigger~="hover-other"]:hover { --_trigger---on: 1 !important; --_trigger---off: 0 !important; }
}
@media (hover: none) {
  [data-trigger~="mobile"] { --_trigger---on: 0; --_trigger---off: 1; }
}
/* Slot Styler */
[data-slot] > .w-dyn-list,
[data-slot] > .w-dyn-list > *,
[data-slot] > .w-dyn-list > * > *,
[data-slot] > .u-display-contents > .w-dyn-list,
[data-slot] > .u-display-contents > .w-dyn-list > *,
[data-slot] > .u-display-contents > .w-dyn-list > * > *,
[data-slot] > .u-display-contents > .u-display-contents > .w-dyn-list,
[data-slot] > .u-display-contents > .u-display-contents > .w-dyn-list > *,
[data-slot] > .u-display-contents > .u-display-contents > .w-dyn-list > * > * {
  display: contents;
}
/* Responsive Styles */
[data-large-columns="1"] { display: flex; }
[data-large-columns="2"] { display: grid; --_column-count---value: 2; }
[data-large-columns="3"] { display: grid; --_column-count---value: 3; }
[data-large-columns="4"] { display: grid; --_column-count---value: 4; }
[data-large-columns="5"] { display: grid; --_column-count---value: 5; }
[data-large-columns="6"] { display: grid; --_column-count---value: 6; }
[data-large-columns="7"] { display: grid; --_column-count---value: 7; }
[data-large-columns="8"] { display: grid; --_column-count---value: 8; }
[data-large-columns="9"] { display: grid; --_column-count---value: 9; }
[data-large-columns="10"] { display: grid; --_column-count---value: 10; }
[data-large-columns="11"] { display: grid; --_column-count---value: 11; }
[data-large-columns="12"] { display: grid; --_column-count---value: 12; }
* { --_responsive---large: 1; --_responsive---medium: 0; --_responsive---small: 0; --_responsive---xsmall: 0; }
.slider_offset { --slide-count: var(--lg); --lg: 3; --md: var(--lg); --sm: var(--md); --xs: var(--sm); }
@container (width < 50em) {
	* { --_responsive---large: 0; --_responsive---medium: 1; --_responsive---small: 0; --_responsive---xsmall: 0; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="1"] { display: flex; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="2"] { display: grid; --_column-count---value: 2; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="3"] { display: grid; --_column-count---value: 3; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="4"] { display: grid; --_column-count---value: 4; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="5"] { display: grid; --_column-count---value: 5; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="6"] { display: grid; --_column-count---value: 6; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="7"] { display: grid; --_column-count---value: 7; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="8"] { display: grid; --_column-count---value: 8; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="9"] { display: grid; --_column-count---value: 9; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="10"] { display: grid; --_column-count---value: 10; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="11"] { display: grid; --_column-count---value: 11; }
  :not([data-wf--grid--variant*="auto"]) > [data-medium-columns="12"] { display: grid; --_column-count---value: 12; }
	.u-order-first-medium { order: -1; }
	.u-order-auto-medium { order: 0; }
	.u-order-last-medium { order: 1; }
	.u-display-contents-medium { display: contents; }
	.u-display-block-medium { display: block; }
	.u-display-grid-medium { display: grid; }
	.u-display-flex-medium { display: flex; }
	.u-display-none-medium { display: none; }
	.u-all-unset-medium { all: unset; }
	.slider_offset { --slide-count: var(--md); }
}
@container (width < 35em) {
	* { --_responsive---large: 0; --_responsive---medium: 0; --_responsive---small: 1;  --_responsive---xsmall: 0; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="1"] { display: flex; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="2"] { display: grid; --_column-count---value: 2; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="3"] { display: grid; --_column-count---value: 3; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="4"] { display: grid; --_column-count---value: 4; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="5"] { display: grid; --_column-count---value: 5; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="6"] { display: grid; --_column-count---value: 6; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="7"] { display: grid; --_column-count---value: 7; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="8"] { display: grid; --_column-count---value: 8; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns"9"] { display: grid; --_column-count---value: 9; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="10"] { display: grid; --_column-count---value: 10; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="11"] { display: grid; --_column-count---value: 11; }
  :not([data-wf--grid--variant*="auto"]) > [data-small-columns="12"] { display: grid; --_column-count---value: 12; }
	.u-order-first-small { order: -1; }
	.u-order-auto-small { order: 0; }
	.u-order-last-small { order: 1; }
	.u-display-contents-small { display: contents; }
	.u-display-block-small { display: block; }
	.u-display-grid-small { display: grid; }
	.u-display-flex-small { display: flex; }
	.u-display-none-small { display: none; }
	.u-all-unset-small { all: unset; }
	.slider_offset { --slide-count: var(--sm); }
}
@container (width < 20em) {
	* { --_responsive---large: 0; --_responsive---medium: 0; --_responsive---small: 0; --_responsive---xsmall: 1; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="1"] { display: flex; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="2"] { display: grid; --_column-count---value: 2; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="3"] { display: grid; --_column-count---value: 3; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="4"] { display: grid; --_column-count---value: 4; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="5"] { display: grid; --_column-count---value: 5; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="6"] { display: grid; --_column-count---value: 6; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="7"] { display: grid; --_column-count---value: 7; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="8"] { display: grid; --_column-count---value: 8; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="9"] { display: grid; --_column-count---value: 9; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="10"] { display: grid; --_column-count---value: 10; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="11"] { display: grid; --_column-count---value: 11; }
  :not([data-wf--grid--variant*="auto"]) > [data-xsmall-columns="12"] { display: grid; --_column-count---value: 12; }
	.u-order-first-xsmall { order: -1; }
	.u-order-auto-xsmall { order: 0; }
	.u-order-last-xsmall { order: 1; }
	.u-display-contents-xsmall { display: contents; }
	.u-display-block-xsmall { display: block; }
	.u-display-grid-xsmall { display: grid; }
	.u-display-flex-xsmall { display: flex; }
	.u-display-none-xsmall { display: none; }
	.u-all-unset-xsmall { all: unset; }
	.slider_offset { --slide-count: var(--xs); }
}

/* Added CSS */


[max=ch10],[max=ch11],[max=ch12],[max=ch13],[max=ch14],[max=ch15],[max=ch16],[max=ch17],[max=ch18],[max=ch19],[max=ch20],[max=ch21],[max=ch22],[max=ch23],[max=ch24],[max=ch25],[max=ch30],[max=ch35],[max=ch40],[max=ch45],[max=ch50],[max=ch55],[max=ch5],[max=ch60],[max=ch65],[max=ch70],[max=ch75]{text-wrap:balance}[max=ch5]{max-width:5ch}[max=ch10]{max-width:10ch}[max=ch11]{max-width:11ch}[max=ch12]{max-width:12ch}[max=ch13]{max-width:13ch}[max=ch14]{max-width:14ch}[max=ch15]{max-width:15ch}[max=ch16]{max-width:16ch}[max=ch17]{max-width:17ch}[max=ch18]{max-width:18ch}[max=ch19]{max-width:19ch}[max=ch20]{max-width:20ch}[max=ch21]{max-width:21ch}[max=ch22]{max-width:22ch}[max=ch23]{max-width:23ch}[max=ch24]{max-width:24ch}[max=ch25]{max-width:25ch}[max=ch30]{max-width:30ch}[max=ch35]{max-width:35ch}[max=ch40]{max-width:40ch}[max=ch45]{max-width:45ch}[max=ch50]{max-width:50ch}[max=ch55]{max-width:55ch}[max=ch60]{max-width:60ch}[max=ch65]{max-width:65ch}[max=ch70]{max-width:70ch}[max=ch75]{max-width:75ch}[z-1]{z-index: 1}
[z-2]{z-index: 2}
[z-3]{z-index: 3}
[nowrap]{text-wrap: pretty}


.w-richtext figure{max-width: none}
.w-richtext figure div {width: 100%}

.menu-mobile-wrap::-webkit-scrollbar, [remove-scrollbar]::-webkit-scrollbar {
  display: none;
}

.menu-mobile-wrap, [remove-scrollbar] {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}


.hide, [hide]{
  display: none !important;
}

@media screen and (min-width: 992px) {
    [class*="show-t"], [show-t] {
        display: none !important;
    }
}

@media screen and (max-width: 991px) {
    [class*="hide-t"], [hide-t] {
        display: none !important;
    }
}
  @media screen and (min-width: 768px) {
    [class*="show-ml"], [show-ml] {
      display: none !important;
    }
}
  @media screen and (max-width: 767px) {
    [class*="hide-ml"], [hide-ml] {
      display: none !important;
    }
    [class*="show-ml"], [show-ml] {
      display: block !important;
    }
}
  @media screen and (min-width: 480px) {
    [class*="show-mp"], [show-mp] {
      display: none !important;
    }
}
  @media screen and (max-width: 479px) {
    [class*="hide-mp"], [hide-mp] {
      display: none !important;
    }
}

section{
  position: relative;
  display: flex;
  flex-flow: column;
  justify-content: center;
  align-items: stretch;
  background-color: var(--_theme---background);
  color: var(--_theme---text);
 }

.slider_offset {
  --slide-count: var(--lg);
	--lg: 3;
  --md: var(--lg);
  --sm: var(--md);
  --xs: var(--sm);
}
@container (width < 992px) {
	.slider_offset { --slide-count: var(--md); }
}
@container (width < 35em) {
	.slider_offset { --slide-count: var(--sm); }
}
@container (width < 20em) {
	.slider_offset { --slide-count: var(--xs); }
}

html .slider_list > :not(.u-display-contents, .w-dyn-list),
.slider_list > .w-dyn-list > * > * > *,
.slider_list > .u-display-contents > *,
.slider_list > .u-display-contents > .u-display-contents > *,
.slider_list > .u-display-contents > .w-dyn-list > * > * > *,
.slider_list > .u-display-contents > .u-display-contents > .w-dyn-list > * > * > * {
	padding-inline: calc(var(--_gap---size) / 2);
	height: auto !important;
	flex: 0 0 auto;
	width: calc(100% / var(--slide-count));
}

/* Selection Color */
::selection {
	background-color: var(--_theme---selection-background);
	color: var(--_theme---selection-text);
}

/* Button hover effects — scale + shadow */
.button_main_element {
  transition: transform 280ms cubic-bezier(0.22,1,0.36,1), box-shadow 280ms cubic-bezier(0.22,1,0.36,1), background-color 200ms ease !important;
}
.button_main_wrap:hover .button_main_element {
  transform: scale(1.04);
  box-shadow: 0 4px 16px rgba(42,45,138,0.2);
}
.button_main_wrap:active .button_main_element {
  transform: scale(0.98);
}
@media (prefers-reduced-motion: reduce) {
  .button_main_element {
    transition: none !important;
  }
  .button_main_wrap:hover .button_main_element {
    transform: none;
    box-shadow: none;
  }
}
</style></div><div class="code w-embed"><style>

[max=ch10],[max=ch11],[max=ch12],[max=ch13],[max=ch14],[max=ch15],[max=ch16],[max=ch17],[max=ch18],[max=ch19],[max=ch20],[max=ch21],[max=ch22],[max=ch23],[max=ch24],[max=ch25],[max=ch30],[max=ch35],[max=ch40],[max=ch45],[max=ch50],[max=ch55],[max=ch5],[max=ch60],[max=ch65],[max=ch70],[max=ch75]{text-wrap:balance}[max=ch5]{max-width:5ch}[max=ch10]{max-width:10ch}[max=ch11]{max-width:11ch}[max=ch12]{max-width:12ch}[max=ch13]{max-width:13ch}[max=ch14]{max-width:14ch}[max=ch15]{max-width:15ch}[max=ch16]{max-width:16ch}[max=ch17]{max-width:17ch}[max=ch18]{max-width:18ch}[max=ch19]{max-width:19ch}[max=ch20]{max-width:20ch}[max=ch21]{max-width:21ch}[max=ch22]{max-width:22ch}[max=ch23]{max-width:23ch}[max=ch24]{max-width:24ch}[max=ch25]{max-width:25ch}[max=ch30]{max-width:30ch}[max=ch35]{max-width:35ch}[max=ch40]{max-width:40ch}[max=ch45]{max-width:45ch}[max=ch50]{max-width:50ch}[max=ch55]{max-width:55ch}[max=ch60]{max-width:60ch}[max=ch65]{max-width:65ch}[max=ch70]{max-width:70ch}[max=ch75]{max-width:75ch}[z-1]{z-index: 1}
[z-2]{z-index: 2}
[z-3]{z-index: 3}
[nowrap]{text-wrap: pretty}

/* These classes are never overwritten */
.hide, [hide]{
  display: none !important;
}

@media screen and (min-width: 992px) {
    [class*="show-t"], [show-t] {
        display: none !important;
    }
}

@media screen and (max-width: 991px) {
    [class*="hide-t"], [hide-t] {
        display: none !important;
    }
}
  @media screen and (min-width: 768px) {
    [class*="show-ml"], [show-ml] {
      display: none !important;
    }
}
  @media screen and (max-width: 767px) {
    [class*="hide-ml"], [hide-ml] {
      display: none !important;
    }
    [class*="show-ml"], [show-ml] {
      display: block !important;
    }
}
  @media screen and (min-width: 480px) {
    [class*="show-mp"], [show-mp] {
      display: none !important;
    }
}
  @media screen and (max-width: 479px) {
    [class*="hide-mp"], [hide-mp] {
      display: none !important;
    }
}

  .outline-card{border-left-width:0px!important}

  @media screen and (min-width: 992px) {
  .outline-card:nth-child(3n+3){border-right-width: 0px}
  
  }
  @media screen and (max-width: 991px) {
    .outline-card:nth-child(2n+2){border-right-width: 0px}
  
  }
  @media screen and (max-width: 767px) {
  .outline-card{border-right-width: 0px}
  }
  @media screen and (max-width: 479px) {
  
  }
  
  .wf-design-mode .swiper-wrapper{overflow: scroll}
  
  /* Client request: remove the decorative black SVG/GIF arrows (txt-icon-arrow)
     used in the core values section and section hero texts. Keep the spans in
     markup but suppress the pseudo-element so no arrow glyph renders. */
  .txt-icon-arrow { display: inline-block; }
  .txt-icon-arrow::after {
    content: none;
    background: none;
    display: inline-block;
    vertical-align: middle;
    width: 0;
    height: 0;
    margin: 0;
  }
  .txt-icon-arrow.is-square::after {
    content: none;
    background: none;
    display: inline-block;
    vertical-align: middle;
    width: 0;
    height: 0;
    margin: 0;
  }
  .txt-icon-arrow.is-up::after {
    content: none;
    background: none;
    display: inline-block;
    vertical-align: middle;
    width: 0;
    height: 0;
    margin: 0;
  }
  .txt-icon-arrow.is-img::after {
    background: url('/assets/images/69611b396cd12b4ce90fabfe_Group%202147210670.webp') 0px 0px / contain no-repeat;
    display: inline-block;
    vertical-align: middle;
    width: 1.75em;
    height: 0.75em;
    transform: translate(0px, 0em);
    margin: -0.2em -0.4em -0.1em -0.1em;
  }

.wf-design-mode .trigger{opacity: 1}
.w--current .nav-line{width: 100%}
[pt-child], .savings-card-main-txt{pointer-events: none}
[pt-child]>* , .savings-card-main-txt>*{pointer-events: auto}


  @media screen and (min-width: 102rem) {
  .u-container.is-hero{width: 100%}
  }

.wf-design-mode .clickable_wrap{pointer-events: none}

.wf-design-mode .scroll-dropdown-bottom-wrap{height: auto}

[hov-img] img {
  transition: transform 0.6s ease;
}

[hov-img]:hover img {
  transform: scale(1.05);
}
[hov-img]:hover .img-overlay {
  opacity: 1;
}

.is-active .filter-x{display: flex}

.button_main_element:hover {
  --_trigger---on: 0;
  --_trigger---off: 1;
}

.button_main_element:not(.w-variant-e85564cd-af30-a478-692b-71732aefb3ab):not(.w-variant-625d5df4-ad91-f7dc-9e2f-2e69f3fd7400):not(.w-variant-f3411d48-6319-fd1f-022f-07d76f9c73e0):not(.w-variant-28dbea6b-1838-df17-d642-59092f70edf3) {
  background-color: var(--swatch--dark) !important;
  color: var(--swatch--light) !important;
}

.button_main_element.w-variant-e85564cd-af30-a478-692b-71732aefb3ab {
  background-color: transparent !important;
  color: var(--swatch--dark) !important;
}

.clickable_btn { display: none !important; }
.blog-item:nth-child(7n + 1){grid-column-end: span 2}
.blog-item:nth-child(7n + 1) .blog-author{display: flex}

.wf-design-mode .appetite-details-title{display: block}
.wf-design-mode .appetite-details{display: flex}
.accordion_item:last-child .accordion_component{border-bottom-width: 0px}

[data-wf--centered-card--variant="transparent"] .centered-card-wrap{clip-path: url(#Subtract)}

.u-rich-text p{line-height: 1.25}

.wf-design-mode .dropdown-bottom{height: auto}
.wf-design-mode .value-bloc{position: relative; opacity : 1; margin-bottom: 12rem}
.wf-design-mode .core-values-wrap{max-height: none}
.tags-item:last-child .coma{display: none}

.blog-rt p, .blog-rt li{font-family: arial; letter-spacing: 0; font-size: 19px; line-height: 1.3; opacity: 0.8}
.blog-rt h5 {font-size: calc(var(--_typography---font-size--h5)*1.4)}


.form-field.is-select {
  padding: 0;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}


</style></div></div><div class="guide_wrap"><div class="w-embed"><style>
html.wf-design-mode .guide_wrap {
	display: block;
}
.guide_layout {
	counter-reset: gridguides;
}
.guide_layout > div::before {
  counter-increment: gridguides;
  content: counter(gridguides);
}
</style></div><div data-padding-bottom="none" data-padding-top="none" class="guide_contain u-container"><div class="guide_layout"><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div><div class="guide_column"></div></div></div></div><div class="all-pages-wrap"><div class="nav_drop_backdrop"></div></div><div data-barba="container" class="page_main"><div data-wf--nav--nav-position="overlap" class="nav_component w-variant-dd866659-1d7d-6447-6461-66ca86ca367f is-solid" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);"><div class="u-embed-css w-embed"><style>
body:has(.nav_component .w-nav-button.w--open):not(:has(.nav_desktop_wrap:not(.w-condition-invisible))) { overflow: hidden; }
/* on smaller screens */
@media (width < 52em) {
	/* disable scroll when mobile menu is open */
	body:has(.nav_component .w-nav-button.w--open) { overflow: hidden; }
}
/* on larger screens */
@media (min-width: 52em) {
	/* show desktop nav & dropdown backdrop */
	.nav_desktop_wrap, .nav_dropdown_backdrop { display: block !important; }
  /* hide mobile nav & mobile menu backdrop */
  .nav_desktop_wrap:not(.w-condition-invisible) ~ .nav_mobile_wrap, .nav_desktop_wrap:not(.w-condition-invisible) ~ .nav_menu_backdrop { display: none !important; }
}
/* Single-nav visibility guard: the Webflow nav collapse (52em ≈ 832px) left a
   gap at 768–991px where BOTH desktop and mobile navs rendered and overlapped.
   Force exactly one nav per range using the standard 991px breakpoint. */
@media (max-width: 991px) {
  .nav_desktop_wrap { display: none !important; }
}
@media (min-width: 992px) {
  .nav_mobile_wrap { display: none !important; }
}
/* dropdown list: initial state */
html:not(.wf-design-mode) .nav_dropdown_component > .w-dropdown-list {
	/* removes display none to enable css transitions */
	display: grid !important;
	grid-template-columns: minmax(0, 1fr);
	/* sets list to 0 height by default */
	grid-template-rows: 0fr;
	transition: grid-template-rows var(--nav--dropdown-close-duration);
	/* makes list content not focusable when closed */
	visibility: hidden;
	opacity: 0;
}
/* makes list content focusable when opened */
html:not(.wf-design-mode) .nav_dropdown_component > .w-dropdown-list.w--open {
	visibility: visible;
	opacity: 1;
}
/* sets list child to overflow hidden to enable css height transition */
.nav_dropdown_component > .w-dropdown-list > * {
	overflow: hidden;
}
/* set open state of dropdown list */
.nav_dropdown_component:has(> .w-dropdown-toggle[aria-expanded="true"]) > .w-dropdown-list {
	--nav--dropdown-close-duration: var(--nav--dropdown-open-duration);
	grid-template-rows: 1fr;
}
/* on desktop, delay dropdown opening if another dropdown is open */
.nav_desktop_wrap:has(.nav_dropdown_component > .w-dropdown-toggle.w--open[aria-expanded="false"]) .nav_dropdown_component:has(> .w--open[aria-expanded="true"]) > .w-dropdown-list {
	transition-delay: 0;
}
/* reveal dropdown backdrop when dropdown open */
.nav_dropdown_backdrop {
	transition: opacity var(--nav--dropdown-close-duration);
}
body:has(.nav_dropdown_component > [aria-expanded="true"]) .nav_dropdown_backdrop {
	opacity: 1;
}
/* reveal mobile menu backdrop on menu open */
.nav_menu_backdrop {
	transition: opacity var(--nav--menu-close-duration);
}
.nav_component:has(.w-nav-button.w--open) .nav_menu_backdrop {
	opacity: 1;
}
/* menu animations */
@keyframes menuOpen {
 from { clip-path: polygon(0 0, 100% 0, 100% 0, 0 0); }
 to { clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); }
}
@keyframes menuClose {
 from { clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); }
 to { clip-path: polygon(0 0, 100% 0, 100% 0, 0 0); }
}
/* menu open */
.nav_component:has(.w-nav-button.w--open) .w-nav-menu {
	animation: menuOpen var(--nav--menu-open-duration) ease-in-out forwards;
}
/* menu close */
.nav_component:has(.w-nav-button:not(.w--open)) .w-nav-menu {
	animation: menuClose var(--nav--menu-close-duration) ease-in-out forwards;
}
/* position overflow to top of screen */
.nav_component .w-nav-overlay {
 top: 0;
 min-height: 100vh;
}
/* open dropdown on mobile */
.nav_mobile_wrap [data-open-on-mobile] > .w-dropdown-toggle {
	display: none;
}
.nav_mobile_wrap [data-open-on-mobile] > .w-dropdown-list {
	visibility: visible !important;
	opacity: 1 !important;
	display: block !important;
	grid-template-rows: 1fr !important;
}
.wf-design-mode .nav_mobile_menu_wrap {
	width: 100%;
}

body:has(.nav_dropdown_component > [aria-expanded="true"]) .nav_drop_backdrop {
	opacity: 1;
}
/* Fix: enable pointer events on nav so it's clickable */
.nav_component {
  pointer-events: auto !important;
}
.nav_component .nav_dropdown_backdrop,
.nav_component .nav_menu_backdrop {
  pointer-events: none;
}


/* Fallback: show core value blocks if scroll animation doesn't initialize */
.value-bloc:first-child {
  opacity: 1;
}



/* Position mega menu under the nav button (not full-nav top) */
.nav_links_item .nav_dropdown_component {
  position: relative !important;
}
.nav_component .nav_dropdown_mega_wrap {
  position: absolute !important;
  top: 100% !important;
  left: 0 !important;
  right: auto !important;
  bottom: auto !important;
  width: max-content !important;
  min-width: max-content !important;
  max-width: min(22rem, 90vw) !important;
  margin: 0 !important;
  padding: 0 !important;
  transform: none !important;
  color: #ffffff;
  box-shadow: none !important;
  border: none !important;
  overflow: hidden;
}
.nav_component .nav_dropdown_mega_content,
.nav_component .nav_dropdown_mega_scroll,
.nav_component .nav_dropdown_mega_contain,
.nav_component .nav_dropdown_mega_layout {
  width: auto !important;
  min-width: 0 !important;
  max-width: none !important;
  margin: 0 !important;
}
.nav_dropdown_mega_contain {
  padding: 0.55rem 0 !important;
}
.nav_dropdown_list {
  display: flex !important;
  flex-direction: column !important;
  gap: 0 !important;
  margin: 0 !important;
  padding: 0 !important;
  width: max-content !important;
}
.nav_dropdown_item {
  width: 100%;
}
.nav_dropdown_link {
  display: block !important;
  padding: 0.55rem 1.15rem !important;
  white-space: nowrap !important;
  width: 100% !important;
}

.nav_mobile_wrap {
  background: rgba(10, 10, 20, 0.98) !important;
}

.w-nav-overlay {
  background: rgba(10, 10, 20, 0.98) !important;
}

/* Dropdown starts flush with nav bottom — no overlap seam */
.nav_component.is-solid .nav_desktop_contain {
  padding-bottom: 0 !important;
}

/* Solid nav — translucent frosted glass, turns fully opaque when scrolled */
.nav_component.is-solid {
  background: #00ADEF !important;
  --_theme---background: #00ADEF;
  --_theme---text: #ffffff;
  color: #ffffff;
}

/* Solid nav link text — white */
.nav_component.is-solid .nav_links_item .nav_link_text,
.nav_component.is-solid .nav_dropdown_toggle {
  color: #ffffff !important;
}

/* Solid nav Contact button — white fill with deep blue text for contrast */
.nav_component.is-solid .nav_buttons_item:not(.is-main) .button_main_element {
  background-color: #ffffff !important;
  color: #2A2D8A !important;
}

.nav_component.is-solid .nav_buttons_item:not(.is-main) .button_main_element:hover {
  background-color: #f0f0f0 !important;
}

/* Solid nav About button text — white */
.nav_component.is-solid .nav_buttons_item.is-main .button_main_element {
  color: #ffffff !important;
}


</style></div><a href="#main" class="nav_skip_wrap w-inline-block"><div class="nav_skip_text u-text-style-small">Skip to main content</div></a><header class="nav_desktop_wrap"><div class="nav_desktop_contain"><div class="nav_desktop_layout"><a aria-label="Home Page" href="/" class="nav_desktop_logo w-inline-block<?= $navActive === 'home' ? ' w--current' : '' ?>"<?= $navActive === 'home' ? ' aria-current="page"' : '' ?>><img src="/assets/images/royal-logo.webp" alt="Royal Associates Insurance Brokers" class="logo-svg"></a><nav aria-label="Main" data-wf--menu--variant="desktop" class="nav_links_component w-variant-23049969-09ac-2789-520b-3c6ae895bbc6"><ul role="list" class="nav_links_wrap w-variant-23049969-09ac-2789-520b-3c6ae895bbc6 w-list-unstyled"><li class="nav_links_item w-variant-23049969-09ac-2789-520b-3c6ae895bbc6"><div class="nav_links_link w-variant-23049969-09ac-2789-520b-3c6ae895bbc6"><div role="listitem" class="footer_group_item"><a href="/" class="footer_link_wrap w-inline-block<?= ($navActive ?? '') === 'home' ? ' w--current' : '' ?>"<?= ($navActive ?? '') === 'home' ? ' aria-current="page"' : '' ?>><div class="footer_link_text u-text-style-small">Home</div></a></div></div></li><li class="nav_links_item w-variant-23049969-09ac-2789-520b-3c6ae895bbc6"><div data-delay="400" data-hover="true" class="nav_dropdown_component w-variant-23049969-09ac-2789-520b-3c6ae895bbc6 w-dropdown"><div data-state="expanded" class="nav_links_link w-variant-23049969-09ac-2789-520b-3c6ae895bbc6 w-dropdown-toggle" id="w-dropdown-toggle-0" aria-controls="w-dropdown-list-0" aria-haspopup="menu" aria-expanded="false" role="button" tabindex="0"><a href="/products/" class="w-inline-block"><div class="nav_links_text u-text-style-small">PRODUCTS</div></a><div class="nav_links_svg"><svg data-wf--icon-arrow--direction="bottom" viewBox="0 0 66 70" fill="none" width="100%" height="100%" aria-hidden="true" class="u-svg w-variant-caa8b8e9-e8ec-6eb3-4526-30f19f7326f5"><path d="M17 2L50 34.9999L17 68" class="u-path"></path></svg></div></div><nav class="nav_dropdown_mega_wrap w-variant-23049969-09ac-2789-520b-3c6ae895bbc6 w-dropdown-list" id="w-dropdown-list-0" aria-labelledby="w-dropdown-toggle-0"><div class="nav_dropdown_mega_content w-variant-23049969-09ac-2789-520b-3c6ae895bbc6"><div data-lenis-prevent="" class="nav_dropdown_mega_scroll"><div class="nav_dropdown_mega_contain w-variant-23049969-09ac-2789-520b-3c6ae895bbc6"><div class="nav_dropdown_mega_layout w-variant-23049969-09ac-2789-520b-3c6ae895bbc6"><ul role="list" class="nav_dropdown_list"><li class="nav_dropdown_item"><a href="/products/" class="nav_dropdown_link w-variant-23049969-09ac-2789-520b-3c6ae895bbc6 w-inline-block" tabindex="0"><div class="nav_links_text u-text-style-small">Overview</div></a></li><li class="nav_dropdown_item"><a href="/products#corporate" class="nav_dropdown_link w-variant-23049969-09ac-2789-520b-3c6ae895bbc6 w-inline-block" tabindex="0"><div class="nav_links_text u-text-style-small">Corporate Insurance</div></a></li><li class="nav_dropdown_item"><a href="/products#individual" class="nav_dropdown_link w-variant-23049969-09ac-2789-520b-3c6ae895bbc6 w-inline-block" tabindex="0"><div class="nav_links_text u-text-style-small">Individual Insurance</div></a></li></ul></div></div></div></div></nav>
