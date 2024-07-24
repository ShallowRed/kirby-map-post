<?php

use Kirby\Cms\PluginAssets;

return function ($page, $pages, $site, $kirby) {
  $shared = kirby()->controller('post', compact('page', 'pages', 'site', 'kirby'));

  $pluginDir = __DIR__ . '/../dist';
  $pluginAssetsUrl = '/media/plugins/vv/map-post/';
  $manifest = json_decode(file_get_contents($pluginDir . '/.vite/manifest.json'), true);
  $entry = $manifest['scripts/kirby-plugin.js'];

  $pluginMediaUrl = '/media/plugins/vv/map-post/';
  $script = Str::replace($entry['file'], 'assets/', $pluginMediaUrl);
  $stylesheet = Str::replace($entry['css'][0], 'assets/', $pluginMediaUrl);

  return A::merge(
      $shared,
      compact([
        "stylesheet",
        "script",
      ])
  );
};
