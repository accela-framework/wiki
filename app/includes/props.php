<?php

namespace App;

return function($accela, $node, $allProps) {
  // グローバル
  $accela->globalProps(function() use ($node) {
    return [
      "rootNode" => $node
    ];
  });

  // ルート
  $accela->pageProps("/", function() use ($allProps) {
    return $allProps['/'] ?? [];
  });

  // /*
  $accela->pageProps("/[name]", function($query=[]) use ($allProps) {
    $name = $query['name'] ?? '';
    $path = '/' . $name;
    return $allProps[$path] ?? [];
  });

  // /**/
  $accela->pageProps("/[...slug]/", function($query=[]) use ($allProps) {
    $slug = $query['slug'] ?? [];
    $path = '/' . implode('/', $slug) . '/';
    return $allProps[$path] ?? [];
  });

  // /**/*
  $accela->pageProps("/[...slug]/[name]", function($query=[]) use ($allProps) {
    $slug = $query['slug'] ?? [];
    $name = $query['name'] ?? '';
    $path = '/' . implode('/', $slug) . '/' . $name;
    return $allProps[$path] ?? [];
  });
};
