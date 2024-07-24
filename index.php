<?php

$srcAssetsDir = __DIR__ . '/dist/assets';
$distAssetsDir = __DIR__ . '/assets';

if (!is_dir($distAssetsDir)) {
  mkdir($distAssetsDir, 0755, true);
}
foreach (Dir::index($srcAssetsDir) as $file) {
  $src = $srcAssetsDir . '/' . $file;
  $dist = $distAssetsDir . '/' . $file;
  if (!file_exists($dist) || filemtime($src) > filemtime($dist)) {
    copy($src, $dist);
  }
}

$plugin = Kirby::plugin('vv/map-post', [

  'blueprints' => [
    'blocks/map-spot' => __DIR__ . '/blueprints/blocks/map-spot.yml',
    'pages/map-post' => __DIR__ . '/blueprints/map-post.yml',
  ],

  'controllers' => [
    'map-post' => require_once __DIR__ . '/controllers/map-post.php',
  ],

  'templates' => [
    'map-post' => __DIR__ . '/templates/map-post.php',
  ],

  'snippets' => [
    'blocks/map-spot' => __DIR__ . '/snippets/blocks/map-spot.php',
    'blocks/map-teleportmark' => __DIR__ . '/snippets/blocks/map-teleportmark.php',
    'blocks/map-topmark' => __DIR__ . '/snippets/blocks/map-topmark.php',
    'entry-content' => __DIR__ . '/snippets/entry-content.php',
  ],
]);
