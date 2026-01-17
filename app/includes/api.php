<?php

namespace App;

use function Accela\env;

return function($accela, $allProps) {
  $accela->api("md/[...slugs].json", function($query=[]) use ($allProps) {
    $relPath =implode("/", $query["slugs"]);
    $filePath = env("dataDir", __DIR__ . "/../../data") . "/{$relPath}.md";

    if(!file_exists($filePath)){
      http_response_code(404);
      echo json_encode(["error" => "Not found"]);
      return;
    }

    $markdown = file_get_contents($filePath);

    // Remove Front Matter
    $parsed = parseFrontMatter($markdown);
    $content = $parsed['content'];

    echo json_encode(["markdown" => $content]);
  });

  $accela->apiPaths("md/[...slug].json", function() use ($allProps) {
    return array_map(function($path) {
      if (substr($path, -1) === "/") {
        $apiPath = "/api/md" . $path . "index.json";
      } else {
        $apiPath = "/api/md" . $path . ".json";
      }
      return $apiPath;
    }, array_keys($allProps));
  });
};
