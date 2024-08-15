<?php
require 'vendor/autoload.php';

use FontLib\Font;

$font = Font::load('storage/fonts/font_awesome_5_brands_normal.ttf');
$font->parse();
$font->saveAdobeFontMetrics('storage/fonts/font_awesome_5_brands_normal.ufm');