<?php
/**
 * Product navigation sub-links for the PRODUCTS dropdown.
 * Builds Corporate + Individual insurance product links from products_data.php
 * so the navbar always mirrors the products page (anchor #product-{id}).
 */

if (!function_exists('raib_product_nav_items')) {
    function raib_product_nav_items(string $tab): string
    {
        static $products = null;
        if ($products === null) {
            $products = require __DIR__ . '/products_data.php';
        }
        if (!isset($products[$tab])) {
            return '';
        }
        $out = '';
        foreach ($products[$tab] as $id => $p) {
            $name = htmlspecialchars($p['name'], ENT_QUOTES);
            $href = '/products#product-' . (int) $id;
            $out .= '<li class="nav_dropdown_item"><a href="' . $href . '" class="nav_dropdown_link w-variant-23049969-09ac-2789-520b-3c6ae895bbc6 w-inline-block" tabindex="0"><div class="nav_links_text u-text-style-small">' . $name . '</div></a></li>';
        }
        return $out;
    }
}
