---
title: サイトマップ
description: Accela Wikiのサイトマップ自動生成について説明します。
---

# サイトマップ

## 自動生成

`/sitemap.xml`にアクセスすると、自動生成されたサイトマップを取得できます。

## lastmod

各ページのlastmodは以下の順で決定されます：

1. Front Matterの`modtime`
2. ファイルの更新日時（フォールバック）

```markdown
---
title: ページタイトル
modtime: 2026-01-15 12:00:00
---
```
