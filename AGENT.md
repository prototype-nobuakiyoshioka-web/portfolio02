# Project Overview

このプロジェクトは、Webサイト制作の営業活動で使用する個人ポートフォリオサイトです。
目的は、営業メールを受け取った相手に「この人にWeb制作を依頼できそう」と感じてもらうことです。

## Goal

- Web制作スキルを信頼感のある形で伝える
- 制作実績を見やすく掲載する
- 問い合わせ・相談につながる導線を作る
- デザイン性と実装力の両方を見せる

## Tech Stack

- WordPress
- Original WordPress Theme
- PHP
- HTML
- CSS
- JavaScript
- GSAP for animation
- ACF for custom fields

## Site Direction

参考サイト：
- https://production-hasu.work
- https://shinyaokano.jp

方向性：
- 余白を活かした高級感
- 大きなタイポグラフィ
- Works中心の構成
- スムーズなスクロールアニメーション
- 派手すぎず、制作会社に近い信頼感

## Content Structure

主なページ：
- TOP
- WORKS
- WORKS DETAIL
- ABOUT
- SERVICE
- CONTACT

## Custom Post Type

制作実績は `works` というカスタム投稿タイプで管理する。

各実績に必要な項目：
- タイトル
- サムネイル
- 制作年
- 担当範囲
- 使用技術
- サイトURL
- 概要
- 課題
- 提案内容
- 成果
- ギャラリー画像

## Coding Rules

- 既存コードを優先して確認してから作業する
- 不要なライブラリを増やさない
- デザイン崩れを起こす大規模変更は避ける
- WordPress標準関数を優先する
- セキュリティのため出力時は esc_html, esc_url, esc_attr を使う
- PHPファイルでは直接DB操作をしない
- wp-config.php は変更しない
- core WordPress files は変更しない

## Animation Rules

- アニメーションはGSAPを使用する
- 目的のない過剰なアニメーションは禁止
- 初回表示、スクロール時、hoverの3種類を中心にする
- モバイルでは動きを控えめにする

## Design Rules

- 余白を広めに取る
- 黒・白・グレーをベースにする
- アクセントカラーは最小限にする
- 画像を大きく見せる
- 8pxグリッドを意識する
- SP表示を必ず確認する

## Do Not Touch

- wp-config.php
- WordPress core files
- database directly
- plugins directory unless explicitly instructed

## Completion Criteria

作業完了時は以下を報告する：
- 変更したファイル
- 追加した機能
- 確認した表示
- 未対応のこと
- 次にやるべきこと
