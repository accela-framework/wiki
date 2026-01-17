---
title: 基本的な使い方
description:
---

# 基本的な使い方

## トップページ

`data/index.md`がトップページとして扱われます。

## 下層ページ

### URLのマッピング

index.mdはディレクトリインデックス、{name}.mdはスラッシュ無しのURLが生成されます。

| ファイルパス例 | URL |
|---------------|-----|
| `data/file.md` | `/file` |
| `data/dir/index.md` | `/dir/` |
| `data/dir/file.md` | `/dir/file` |
| `data/dir1/dir2/index.md` | `/dir1/dir2/` |

### 並び順

ファイル名に、`01_`、`02_`などのプレフィックスを付けると、その順番で並び替えることができます。
URLとタイトルではプレフィックスは無視(削除)されます。

### コンテンツ無しディレクトリ

index.mdがない、もしくはFront Matterのみのindex.mdがあるディレクトリは、サイドバーには表示されますがページは生成されません。

## タイトル・メタ情報

タイトル・メタ情報は、Front Matter形式で記述することができます。
現在対応しているのは、title, description, modtimeのみです。

### Front Matter例

```markdown
---
title: ページタイトル
description: ページの説明文
modtime: 2026-01-01 12:00:00
---

# ページタイトル
本文...
```

### タイトルの優先順位

HTML上の&lt;title&gt;&lt;/title&gt;、サイドバーに表示されるタイトルは、下記の順で精査され、決定されます。

1. Front Matter タイトル
2. マークダウン上のH1
3. ファイル名（index.mdの場合はディレクトリ名）

### description

空の場合、最初の段落から自動抽出されます。

### modtime

ドキュメントの更新日時を文字列で指定することができます。
空の場合、ファイルの更新日時が適用されます。
