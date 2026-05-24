---
status: implemented
target: Portfolio Theme (WordPress)
mode: dark
tokens:
  colors:
    surface: '#0f1418'
    surface-dim: '#0f1418'
    surface-bright: '#343a3e'
    surface-container-lowest: '#090f13'
    surface-container-low: '#171c20'
    surface-container: '#1b2125'
    surface-container-high: '#252b2f'
    surface-container-highest: '#30363a'
    on-surface: '#e0e2e5'
    on-surface-variant: '#c1c7ce'
    outline: '#8b9198'
    outline-variant: '#41484d'
    primary: '#00adef'
    primary-container: '#004c6a'
    on-primary: '#ffffff'
    on-primary-container: '#c1e8ff'
    secondary: '#b6c9d8'
    secondary-container: '#3b4955'
    on-secondary: '#21323e'
    on-secondary-container: '#d2e5f5'
    accent-gradient: 'linear-gradient(to bottom, #00adef, #c069ff, #ff8c42)'
  typography:
    font-family: "'Hanken Grotesk', 'Noto Sans JP', sans-serif"
    headings:
      h1: { size: 4rem,  weight: 800, letter-spacing: '-0.02em' }
      h2: { size: 2.5rem, weight: 700, letter-spacing: '-0.01em' }
      h3: { size: 1.5rem, weight: 700, letter-spacing: '-0.01em' }
    body: { size: 1rem, line-height: 1.6, weight: 400 }
    mono: "'JetBrains Mono', ui-monospace, Menlo, monospace"
  layout:
    max-width: 1200px
    wide-width: 1360px
    spacing-unit: 8px
    grid: { columns: 12, gap: 24px }
    radius: { sm: 4px, md: 8px, pill: 999px }
  motion:
    easing: 'cubic-bezier(0.3, 0.1, 0.1, 1)'
    duration: { fast: 0.2s, base: 0.45s, slow: 0.8s }
---

# Portfolio Theme — Design System

Web制作の営業活動で使用する個人ポートフォリオの、ビジュアルとインタラクションの指針。
既存実装（[assets/css/main.css](assets/css/main.css)、[assets/js/main.js](assets/js/main.js)、[archive-works.php](archive-works.php)）の段階的アップデートを想定する。

---

## 1. Concept / Visual Identity

**信頼感のある静けさと、実装力を示すアクセント。**

- **基調**: ディープなダークサーフェイス（`#0f1418` 系）で長時間閲覧しても疲れない静かな画面
- **アクセント**: シアン → パープル → オレンジの3色グラデーションを「ヒーロー」「ホバー時のフォーカス」「重要なCTA」など、ポイントに限定使用
- **意図**: 制作会社・大手企業からの案件問い合わせを想定し、派手すぎず・地味すぎず。装飾よりも情報設計と一貫性で信頼を醸成する
- **CLAUDE.md との整合**: 「余白を広めに」「黒・白・グレーをベース」「アクセントカラーは最小限」を、ダーク反転バージョンとして満たす

---

## 2. Design Tokens

CSS実装では `:root` のカスタムプロパティとして公開する。命名は Material Design 3 由来のサーフェイス階層を採用し、コンポーネント側はトークンを直接参照する。

### 2.1 Color

| Token | Hex | 用途 |
|---|---|---|
| `--surface` | `#0f1418` | ページの最も基本的な背景 |
| `--surface-container-lowest` | `#090f13` | 沈み込ませたい領域（フッター下、コードブロック背景） |
| `--surface-container-low` | `#171c20` | カードの淡い背景 |
| `--surface-container` | `#1b2125` | 標準カード背景 |
| `--surface-container-high` | `#252b2f` | ホバー時のカード背景 |
| `--surface-container-highest` | `#30363a` | アクティブ/フォーカス時 |
| `--surface-bright` | `#343a3e` | 浮き上がるパネル |
| `--on-surface` | `#e0e2e5` | 標準テキスト |
| `--on-surface-variant` | `#c1c7ce` | 補助テキスト・キャプション |
| `--outline` | `#8b9198` | 強めの罫線・アイコン |
| `--outline-variant` | `#41484d` | 区切り線・カード境界 |
| `--primary` | `#00adef` | リンク・主要アクション |
| `--primary-container` | `#004c6a` | プライマリのコンテナ背景 |
| `--on-primary` | `#ffffff` | プライマリ上のテキスト |
| `--on-primary-container` | `#c1e8ff` | プライマリコンテナ上のテキスト |
| `--secondary` | `#b6c9d8` | サブアクション |
| `--secondary-container` | `#3b4955` | サブコンテナ |
| `--on-secondary` | `#21323e` | セカンダリ上のテキスト |
| `--on-secondary-container` | `#d2e5f5` | セカンダリコンテナ上のテキスト |
| `--accent-gradient` | `linear-gradient(to bottom, #00adef, #c069ff, #ff8c42)` | ヒーロー見出し・重要CTA・スライダーの進捗バー |

**コントラスト**: 本文（`--on-surface` on `--surface`）は WCAG AA 4.5:1 以上を満たす。`--on-surface-variant` も 4.5:1 を満たすため、補助テキストも視認性確保。

**使用ルール**:
1. アクセントグラデーションは1ビューポート内で最大2箇所まで
2. プライマリカラー単色（`#00adef`）はフォーカスリング・ホバー強調に限定。本文中の通常リンクは下線＋`--on-surface`
3. セマンティックカラー（エラー・警告・成功）が必要になった時点で別途追加。今は未定義のまま

### 2.2 Typography

```
font-family: 'Hanken Grotesk', 'Noto Sans JP', sans-serif;
```

- **Hanken Grotesk**: 英字・数字。幾何学的でモダン。Google Fonts から `self-host` し、`font-display: swap` + `preload`
- **Noto Sans JP**: 日本語。ウェイトは 400 / 700 / 800 のみ読み込み
- **JetBrains Mono**: 番号（`#01`）・カウンター（`01 / 06`）・年表記など機能的な数字に限定使用

| Style | Size | Weight | LH | Letter-spacing |
|---|---|---|---|---|
| h1 (hero) | `clamp(2.75rem, 7vw, 4rem)` | 800 | 0.98 | -0.02em |
| h2 (section) | `clamp(2rem, 4vw, 2.5rem)` | 700 | 1.05 | -0.01em |
| h3 (card) | 1.5rem | 700 | 1.2 | -0.01em |
| body | 1rem | 400 | 1.6 | 0 |
| caption | 0.875rem | 400 | 1.5 | 0 |
| label | 0.78rem | 700 | 1 | 0.04em (UPPERCASE) |
| mono | 0.82rem | 400 | 1 | 0.05em |

**Webフォントの読み込み戦略**: 初期表示は Hanken Grotesk Regular + Bold + 日本語 Regular のみ。重みは段階的にフェッチ。Lighthouse Performance を 90 以上に維持するため、合計フォント転送量を 200KB 以内に収める。

### 2.3 Layout & Spacing

- **コンテンツ幅**: 標準 `1200px`、Worksなどメディアを大きく見せる箇所は `1360px`
- **8pxグリッド**: すべての spacing は 8 の倍数（`8 / 16 / 24 / 32 / 48 / 64 / 96 / 128 / 160`）
- **セクション間**: `clamp(80px, 12vw, 160px)`
- **グリッド**: 12カラム / gap 24px / ガター 16px（モバイル）
- **ブレークポイント**: `640px`（SP→Tablet）、`900px`（Tablet→PC）、`1280px`（PC→Wide）
- **角丸**: 既定は `4px`、ピル形ボタンは `999px`

### 2.4 Motion

- **イージング**: `cubic-bezier(0.3, 0.1, 0.1, 1)`（やや早めに動き出して滑らかに止まる）
- **時間**: ホバー `200ms`、reveal `450ms`、ページ遷移 `600–800ms`
- **`prefers-reduced-motion`**: 必ず尊重。reveal は即時表示、自動再生は停止（既存実装で実装済み）

---

## 3. Components

### 3.1 Navigation

- **配置**: 上部固定、スクロール時は `backdrop-filter: blur(16px)` + 半透明背景
- **項目**: `Top / Works / About / Service / Contact`
- **スタイル**: 全文字 UPPERCASE、`0.82rem`、`mono` ではなく Hanken Grotesk Bold
- **アクティブ表現**: `aria-current="page"` の項目は `--on-surface`、それ以外は `--on-surface-variant`
- **モバイル**: 横並びを維持しつつ余白を詰める。ハンバーガーは設けない（項目数が少ないため）

### 3.2 Buttons

| Variant | 背景 | 文字 | ボーダー | 用途 |
|---|---|---|---|---|
| `primary` | `--accent-gradient` | `#ffffff` | なし | ヒーローCTA、Contact最終誘導 |
| `dark` (solid) | `--on-surface` | `--surface` | 同色 | セクション内のCTA |
| `ghost` | 透明 | `--on-surface` | `--outline` | サブアクション、外部リンク |

- 形状: `pill` (`border-radius: 999px`)
- 最小ヒット領域: `48 × 48px`
- ホバー: 0.45s で背景反転。プライマリは `filter: brightness(1.05)` のみ（グラデーションは反転しない）
- フォーカスリング: `outline: 2px solid var(--primary); outline-offset: 3px`

### 3.3 Cards

- **背景**: `--surface-container`
- **罫線**: `1px solid var(--outline-variant)`
- **角丸**: `4px`
- **パディング**: `28px`（コンテンツ）/ `0`（メディアカード）
- **ホバー**: `translateY(-4px)` + `border-color: var(--outline)` + 画像 `scale(1.04)`
- **画像処理**: 既定で `grayscale(1)`、ホバー時 `grayscale(0)`（hasu参考）

### 3.4 Works Slider（既存実装の拡張）

[archive-works.php](archive-works.php) と [assets/js/main.js](assets/js/main.js) で実装済みの split-view を、ダークテーマ + アクセント反映で更新する。

- **左カラム**: リスト。アクティブ項目の左に `--accent-gradient` の 2px 縦バー
- **右カラム**: プレビュー。背景 `--surface-container-low`、ボーダー `--outline-variant`
- **遷移**: GSAP で `autoAlpha` + `x` を slide。`duration: 0.55s`, `ease: 'power3.out'`
- **カウンター**: mono フォントで `01 / 06`。進捗バーを下端に `--accent-gradient` で描画
- **自動再生**: 4.2秒間隔。マウスホバー / `prefers-reduced-motion` で停止

### 3.5 Forms (Contact)

このプロジェクトはメールリンク経由のため、フォームは初期スコープ外。将来 Contact Form 7 を導入する場合：
- 入力背景 `--surface-container-low`、フォーカス時 `--surface-container-high`
- 罫線下線スタイル（box ではなく underline）
- エラー色は専用に追加定義

---

## 4. Pages Structure

### 4.1 Top (`/`) — front-page.php

- **Hero**: 大型タイポグラフィの見出し（`h1` をアクセントグラデーションでフィル: `background-clip: text`）。視覚的インパクトを最優先
- **Selected Works**: 3件のカード横並び。「All Works →」リンク
- **Service**: 3ステップ（Direction / Design / WordPress）
- **Contact CTA**: ダークパネル + プライマリボタン

### 4.2 Works (`/works/`) — archive-works.php

- **Layout**: split-view スライダー（左=リスト、右=大きなプレビュー）。既存実装を維持
- **Items**: 番号（`#01`）/ サムネ（grayscale）/ タイトル / 制作年
- **Interaction**: ホバーでスライド切り替え＋アクセントカラー反映、矢印キー操作、タッチスワイプ、自動再生
- **将来**: ページネーション or 無限スクロールで件数増加に対応

### 4.3 Works Detail (`/works/{slug}/`) — single-works.php

- **Hero**: 大きなメインビジュアル + タイトル
- **Meta**: 制作年・担当範囲・使用技術・サイトURL（ACFフィールド）
- **Case Study**: 概要 → 課題 → 提案 → 成果 の4ブロック
- **Gallery**: 画像4枚までグリッド表示
- **Back Link**: 「← All Works」

### 4.4 About (`/about/`) — page-about.php

- **Sections**: Intro / Profile / Skill / Philosophy / Contact CTA
- **Skill**: 3カード（WordPress / Frontend / Design）。ホバーで浮き上がり（既存実装）
- **Profile**: 経歴 + SNSリンク（X / GitHub など、必要に応じて追加）

### 4.5 Service (`/service/`) — page-service.php

- **Menu**: 4カード（Webサイト制作 / WordPress構築 / LP制作 / 保守改善）
- **Process**: 4ステップ（ヒアリング → 構成設計 → デザイン実装 → 確認公開）。テキスト主体のクリーンな構成

### 4.6 Contact (`/contact/`) — page-contact.php

- **Sections**: 相談できる内容 / 問い合わせ導線
- **Action**: メール（`mailto:`）+ GitHub ボタン
- **将来**: フォーム導入時は §3.5 のルールを適用

---

## 5. Interactions / Motion

### 5.1 Page Reveal（スクロール時）

- 対象: `.section-reveal`
- 動作: 初期 `opacity: 0` + `translateY(32px)`、ビューポート 84% 到達で `opacity: 1` + `translateY(0)`
- 実装: GSAP + ScrollTrigger（既存）
- ScrollTrigger は `once: true`（戻り時は再生しない）

### 5.2 Hover

- リンク: `--primary` → `--accent-gradient` のテキストフィル
- ボタン: 背景反転 200ms
- カード: `translateY(-4px)` + ボーダー色変化 + 画像 `scale(1.04)` & グレースケール解除

### 5.3 Page Transition

- 採用方針: クラシックなフェード（150ms out → 300ms in）
- 実装案: `barba.js` または独自実装。WordPressのフルリロード遷移を抑制
- 注意: SEO・初期 Lighthouse スコアに影響しない範囲で導入。導入はオプション

### 5.4 Cursor

- カスタムカーソル（小さな `〇` + 軌跡）はオプション機能とする
- 採用する場合: `pointer: fine` のみ、かつ `prefers-reduced-motion: no-preference` のみ有効
- 既定はネイティブカーソル

### 5.5 Icons / Affordances

- 矢印は `→` / `↗`（外部）を統一使用
- リンクの後ろに常に矢印を置かず、CTA とナビゲーションに限定

---

## 6. Accessibility

- **コントラスト**: 本文・補助テキストとも WCAG AA 4.5:1 以上を維持
- **フォーカス可視性**: すべてのインタラクティブ要素に明示的なフォーカスリング（`--primary`、`outline-offset: 3px`）
- **キーボード**: Works スライダーは矢印キー / Home / End で操作可能（既存）
- **スキップリンク**: `header.php` 先頭に「Skip to content」を配置（既存）
- **動きの抑制**: `prefers-reduced-motion: reduce` で全アニメ無効化、自動再生停止
- **Lighthouse Accessibility ≥ 90** を CI 的に維持（[tools/lighthouse.mjs](tools/lighthouse.mjs)）

---

## 7. Performance

- **目標**: Lighthouse 4カテゴリ全て **90以上**（現状: Top/Works/About/Contact ともに 100）
- **フォント**: self-host + `preload` + `font-display: swap`、合計 ≤ 200KB
- **画像**: WebP 優先、`loading="lazy"` + `decoding="async"`、Worksの先頭1枚のみ `eager`
- **JS**: GSAP + ScrollTrigger をローカルバンドル（[tools/build.mjs](tools/build.mjs) で実装済み）
- **CSS**: csso で minify、main.css は 15KB 以内を目安
- **CLS**: 画像には必ず `width` / `height` を指定

---

## 8. Implementation Plan（既存 → 提案版への移行）

現状（light theme）から本デザインシステムへ移行する想定ステップ:

1. **トークン定義**: [assets/css/main.css](assets/css/main.css) の `:root` を本書 §2.1〜2.4 のトークンに置換
2. **ダークモード化**: `--color-background` 系から `--surface*` 系へ全置換
3. **アクセントグラデーション**: ヒーロー見出し / 主要CTA / Workssliderの進捗バーに適用
4. **フォント導入**: Hanken Grotesk + Noto Sans JP を self-host
5. **コンポーネント差分の適用**: Button / Card / Slider を §3 のルールで更新
6. **検証**: `npm run verify` で Lighthouse 4カテゴリ ≥ 90、3ブレークポイントでスクリーンショット確認
7. **段階リリース**: 各ステップ後にコミット。WordPress側のフロントエンドが壊れていないか確認

---

## 9. Out of Scope（このドキュメントでは扱わない）

- カラーモード切替（ダーク/ライトのトグル）→ 別途検討
- 多言語対応の文字組ルール → コンテンツが固まってから策定
- フォーム入力UI → Contact Form 7 等の導入時に追加
- Cursor 演出の詳細実装 → §5.4 の方針のみ示し、実装は判断保留

---

## 10. Change Log

- **2026-05-24**: 初版作成。Production HASU 由来のトークンを Web制作者向けポートフォリオに適合させた仕様として整備
- **2026-05-25**: ダークテーマへの再構築を実装。`assets/css/main.css` を全面書き換え（M3 surface 階層）、Hanken Grotesk Variable を self-host、アクセントグラデーションをヒーロー h1 / primary CTA / Works スライダー進捗バー / Contact CTA 左帯に適用。Lighthouse 4カテゴリ 100点維持を確認
