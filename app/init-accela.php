<?php

namespace App;
use Accela\Accela;
use function Accela\env;

$accela = new Accela([
  "appDir" => __DIR__,
  "url" => env("url", "http://localhost"),
  "lang" => "ja",
  "serverLoadInterval" => 60,
  "plugins" => [
    "sitemap-xml" => true
  ]
]);

require_once __DIR__ . '/includes/helpers.php';

$rootNode = buildDataFileTree();
$allProps = flattenNodeProps($rootNode);

// PagePaths, PageProps, API定義を読み込み
(require_once __DIR__ . '/includes/paths.php')($accela, $rootNode);
(require_once __DIR__ . '/includes/props.php')($accela, $rootNode, $allProps);
(require_once __DIR__ . '/includes/api.php')($accela, $allProps);

// サーバコンポーネント用に登録
$accela->setData("allProps", $allProps);

return $accela;
