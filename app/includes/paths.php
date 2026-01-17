<?php

// ツリーからURLパスのフラット配列を抽出
function extractPaths($node) {
  $paths = [];
  if(isset($node["path"])) $paths[] = $node["path"];

  if($node["isGroup"]){
    foreach($node["children"] as $childNode) {
      $childPaths = extractPaths($childNode);
      $paths = array_merge($paths, $childPaths);
    }
  }

  return $paths;
}

return function($accela, $node) {
  $paths = extractPaths($node);

  // /*
  $accela->pagePaths("/[name]", function() use ($paths) {
    return array_filter($paths, function($path) {
      if (substr($path, -1) === '/') return false;
      return substr_count($path, '/') === 1;
    });
  });

  // /**/
  $accela->pagePaths("/[...slug]/", function() use ($paths) {
    return array_filter($paths, fn($path) => substr($path, -1) === '/' && $path !== '/');
  });

  // /**/*
  $accela->pagePaths("/[...slug]/[name]", function() use ($paths) {
    return array_filter($paths, function($path) {
      if (substr($path, -1) === '/') return false;
      return substr_count($path, '/') > 1;
    });
  });
};
