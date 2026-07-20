<?php
/**
 * Product navigation for the PRODUCTS dropdown.
 * Renders Corporate + Individual insurance as collapsible sub-groups; clicking a
 * category reveals only its own product links (nested sub-dropdown pattern).
 * Built from products_data.php so it always mirrors the products page
 * (anchors #product-{id}).
 */

if (!function_exists('raib_product_nav_groups')) {
    function raib_product_nav_groups(): string
    {
        static $products = null;
        if ($products === null) {
            $products = require __DIR__ . '/products_data.php';
        }
        $tabs = [
            'corporate' => 'Corporate Insurance',
            'individual' => 'Individual Insurance',
        ];
        $w = 'w-variant-23049969-09ac-2789-520b-3c6ae895bbc6';
        $out = '';
        foreach ($tabs as $tab => $label) {
            if (!isset($products[$tab])) {
                continue;
            }
            $items = '';
            foreach ($products[$tab] as $id => $p) {
                $name = htmlspecialchars($p['name'], ENT_QUOTES);
                $href = '/products#product-' . (int) $id;
                $items .= '<li class="nav_subdrop_item"><a href="' . $href . '" class="nav_subdrop_link ' . $w . ' w-inline-block" tabindex="0"><div class="nav_links_text u-text-style-small">' . $name . '</div></a></li>';
            }
            $out .= '<li class="nav_dropdown_item nav_subdrop" data-subdrop="' . $tab . '">'
                . '<button type="button" class="nav_subdrop_toggle ' . $w . ' w-inline-block" aria-expanded="false" aria-controls="subdrop-' . $tab . '">'
                . '<div class="nav_links_text u-text-style-small">' . htmlspecialchars($label, ENT_QUOTES) . '</div>'
                . '<div class="nav_links_svg"><svg data-wf--icon-arrow--direction="bottom" viewBox="0 0 66 70" fill="none" width="100%" height="100%" aria-hidden="true" class="u-svg ' . $w . '"><path d="M17 2L50 34.9999L17 68" class="u-path"></path></svg></div>'
                . '</button>'
                . '<ul role="list" class="nav_subdrop_list" id="subdrop-' . $tab . '" hidden>' . $items . '</ul>'
                . '</li>';
        }
        return $out;
    }
}
