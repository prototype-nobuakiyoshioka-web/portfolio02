const SITE_NAME = 'Portfolio Theme';

function layout({ title, description, body, active }) {
  const nav = [
    { href: '/index.html', label: 'Top', key: 'top' },
    { href: '/works.html', label: 'Works', key: 'works' },
    { href: '/about.html', label: 'About', key: 'about' },
    { href: '/service.html', label: 'Service', key: 'service' },
    { href: '/contact.html', label: 'Contact', key: 'contact' },
  ];
  return `<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>${title}</title>
<meta name="description" content="${description}">
<meta name="theme-color" content="#0f1418">
<link rel="preload" href="/assets/fonts/hanken-grotesk.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/assets/main.css" as="style">
<link rel="stylesheet" href="/assets/main.css">
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Cdefs%3E%3ClinearGradient id='g' x1='0' y1='0' x2='1' y2='1'%3E%3Cstop offset='0%25' stop-color='%2300adef'/%3E%3Cstop offset='55%25' stop-color='%23c069ff'/%3E%3Cstop offset='100%25' stop-color='%23ff8c42'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width='32' height='32' fill='%230f1418' rx='6'/%3E%3Ctext x='16' y='22' text-anchor='middle' font-family='Helvetica' font-size='18' fill='url(%23g)' font-weight='800'%3EP%3C/text%3E%3C/svg%3E">
</head>
<body>
<a href="#primary" class="skip-link">Skip to content</a>
<header class="site-header">
  <a class="site-header__brand" href="/index.html">${SITE_NAME}</a>
  <nav class="site-header__nav" aria-label="Primary navigation">
    <ul>
      ${nav
        .map(
          (n) =>
            `<li><a href="${n.href}"${n.key === active ? ' aria-current="page"' : ''}>${n.label}</a></li>`
        )
        .join('\n      ')}
    </ul>
  </nav>
</header>
${body}
<footer class="site-footer">
  <p>&copy; 2026 ${SITE_NAME}</p>
  <p>Web Production / Portfolio</p>
</footer>
<script src="/assets/main.js" defer></script>
</body>
</html>
`;
}

const placeholderFigure = (label) =>
  `<figure class="work-card__media"><img src="/assets/placeholder.svg" alt="${label}" width="800" height="1000" loading="lazy" decoding="async"></figure>`;

function topBody() {
  return `<main id="primary" class="site-main site-main--front">
  <section class="front-hero section-reveal" aria-labelledby="front-hero-title">
    <div class="front-hero__inner">
      <p class="section-label">Portfolio / Web Production</p>
      <h1 id="front-hero-title">伝わる設計と、<span class="gradient">静かな余白</span>で<br>信頼をつくるWeb制作。</h1>
      <p class="front-hero__lead">営業先の担当者が安心して相談できるように、目的整理から実装まで一貫して形にします。WordPressを中心に、運用しやすく美しいサイトを制作します。</p>
      <div class="front-hero__actions">
        <a class="button button--primary" href="/works.html">View Works</a>
        <a class="button button--ghost" href="/contact.html">Contact</a>
      </div>
    </div>
    <div class="front-hero__meta" aria-label="Strengths">
      <p>WordPress Theme</p>
      <p>Responsive Design</p>
      <p>GSAP Motion</p>
    </div>
  </section>

  <section class="section-block section-reveal" aria-labelledby="works-heading">
    <div class="section-heading">
      <p class="section-label">Selected Works</p>
      <h2 id="works-heading">制作実績</h2>
      <a class="text-link" href="/works.html">All Works</a>
    </div>
    <div class="works-grid">
      ${[1, 2, 3]
        .map(
          (i) => `
      <article class="work-card">
        <a class="work-card__link" href="/works.html">
          ${placeholderFigure('Work ' + i)}
          <div class="work-card__body">
            <p class="work-card__number">#0${i}</p>
            <h3>Project Sample ${i}</h3>
            <p>WordPressオリジナルテーマでの構築事例。目的整理から実装まで一貫して担当しました。</p>
          </div>
        </a>
      </article>`
        )
        .join('')}
    </div>
  </section>

  <section class="section-block section-reveal" aria-labelledby="service-heading">
    <div class="section-heading">
      <p class="section-label">Service</p>
      <h2 id="service-heading">相談から公開後の運用まで見据えた制作。</h2>
    </div>
    <div class="service-list">
      <article>
        <p>01</p><h3>Direction</h3>
        <p>目的、導線、掲載内容を整理し、営業に使いやすい構成へ落とし込みます。</p>
      </article>
      <article>
        <p>02</p><h3>Design</h3>
        <p>余白、タイポグラフィ、写真の見せ方を整え、信頼感のある印象を作ります。</p>
      </article>
      <article>
        <p>03</p><h3>WordPress</h3>
        <p>更新しやすいオリジナルテーマとして実装し、公開後の運用まで考慮します。</p>
      </article>
    </div>
  </section>

  <section class="contact-cta section-reveal" aria-labelledby="contact-heading">
    <p class="section-label">Contact</p>
    <h2 id="contact-heading">Web制作の相談を、まずは小さく始めましょう。</h2>
    <a class="button button--primary" href="/contact.html">Contact</a>
  </section>
</main>`;
}

function worksBody() {
  const items = [
    { title: 'Project Sample 1', caption: 'コーポレートサイト / WordPressオリジナルテーマ実装', year: '2024' },
    { title: 'Project Sample 2', caption: 'サービス紹介サイト / ACF + カスタム投稿', year: '2024' },
    { title: 'Project Sample 3', caption: '個人ポートフォリオ / GSAP演出', year: '2024' },
    { title: 'Project Sample 4', caption: 'LP / 問い合わせ導線改善', year: '2023' },
    { title: 'Project Sample 5', caption: 'リニューアル / 保守運用継続中', year: '2023' },
    { title: 'Project Sample 6', caption: 'オウンドメディア / 投稿設計', year: '2023' },
  ];

  return `<main id="primary" class="site-main works-archive">
  <header class="archive-hero section-reveal">
    <p class="section-label">Works</p>
    <h1>制作実績</h1>
    <p>目的、設計、実装の意図が伝わるように、担当範囲と成果を整理して掲載します。リストにカーソルを合わせると、右側のスライドが切り替わります。</p>
  </header>

  <section class="works-slider section-reveal" aria-label="Works slider" data-works-slider>
    <ol class="works-slider__list" role="tablist" aria-label="Works list">
      ${items
        .map(
          (it, i) => `
      <li class="works-slider__item${i === 0 ? ' is-active' : ''}" role="tab" tabindex="${i === 0 ? '0' : '-1'}" data-index="${i}" data-caption="${it.caption}" aria-selected="${i === 0 ? 'true' : 'false'}" aria-controls="works-slide-${i}" id="works-tab-${i}">
        <a class="works-slider__link" href="/works.html">
          <span class="works-slider__index">#${String(i + 1).padStart(2, '0')}</span>
          <span class="works-slider__thumb" aria-hidden="true">
            <img src="/assets/placeholder.svg" alt="" width="120" height="80" loading="lazy" decoding="async">
          </span>
          <span class="works-slider__title">${it.title}</span>
          <span class="works-slider__year">${it.year}</span>
        </a>
      </li>`
        )
        .join('')}
    </ol>

    <div class="works-slider__preview" aria-live="polite">
      <div class="works-slider__stage">
        ${items
          .map(
            (it, i) => `
        <figure class="works-slider__slide${i === 0 ? ' is-active' : ''}" id="works-slide-${i}" role="tabpanel" aria-labelledby="works-tab-${i}" data-index="${i}"${i === 0 ? '' : ' aria-hidden="true"'}>
          <img src="/assets/placeholder.svg" alt="${it.title} preview" width="800" height="1000" loading="${i === 0 ? 'eager' : 'lazy'}" decoding="async">
        </figure>`
          )
          .join('')}
      </div>
      <div class="works-slider__progress" data-progress style="--progress: ${Math.round(100 / items.length)}%"></div>
      <div class="works-slider__meta">
        <p class="works-slider__counter"><span data-current>01</span> / <span data-total>${String(items.length).padStart(2, '0')}</span></p>
        <p class="works-slider__caption" data-caption>${items[0].caption}</p>
      </div>
    </div>
  </section>
</main>`;
}

function aboutBody() {
  return `<main id="primary" class="site-main lower-page">
  <section class="lower-hero section-reveal" aria-labelledby="about-title">
    <p class="section-label">About</p>
    <h1 id="about-title">目的を整理し、<span class="gradient">伝わる形</span>まで責任を持つ制作者です。</h1>
  </section>

  <section class="lower-section lower-section--intro section-reveal" aria-labelledby="about-intro">
    <p class="section-label">Intro</p>
    <h2 id="about-intro">見た目の美しさだけでなく、営業や問い合わせにつながる設計を大切にしています。</h2>
    <p>Webサイトを作る前の目的整理、情報設計、WordPress実装、公開後の更新しやすさまでを一貫して考えます。</p>
  </section>

  <section class="lower-section profile-layout section-reveal" aria-labelledby="profile-title">
    <div>
      <p class="section-label">Profile</p>
      <h2 id="profile-title">Nobuaki Yoshioka</h2>
    </div>
    <div class="lower-text">
      <p>個人事業や中小規模のサービスサイトを中心に、信頼感のあるWebサイト制作を行います。見る人が迷わず情報にたどり着ける構成と、運用しやすいWordPressテーマ実装を得意としています。</p>
    </div>
  </section>

  <section class="lower-section section-reveal" aria-labelledby="skill-title">
    <div class="section-heading">
      <p class="section-label">Skill</p>
      <h2 id="skill-title">設計、デザイン、実装をつなげて考える。</h2>
    </div>
    <div class="skill-grid">
      <article><h3>WordPress</h3><p>オリジナルテーマ、カスタム投稿、ACFを使った更新しやすい構成。</p></article>
      <article><h3>Frontend</h3><p>HTML/CSS/JavaScriptを使ったレスポンシブ実装と軽やかな演出。</p></article>
      <article><h3>Design</h3><p>余白、タイポグラフィ、導線を整えた信頼感のある画面作り。</p></article>
    </div>
  </section>

  <section class="lower-section philosophy section-reveal" aria-labelledby="philosophy-title">
    <p class="section-label">Philosophy</p>
    <h2 id="philosophy-title">派手さよりも、長く使える確かさを。</h2>
    <p>更新する人、見る人、相談する人。それぞれにとって無理のないWebサイトを目指します。目的のない装飾や過剰な動きではなく、情報の伝わり方を支えるデザインと実装を大切にしています。</p>
  </section>

  <section class="contact-cta section-reveal" aria-labelledby="about-cta">
    <p class="section-label">CTA</p>
    <h2 id="about-cta">制作の相談や実績について、お気軽にご連絡ください。</h2>
    <a class="button button--primary" href="/contact.html">Contact</a>
  </section>
</main>`;
}

function serviceBody() {
  return `<main id="primary" class="site-main lower-page">
  <section class="lower-hero section-reveal" aria-labelledby="service-title">
    <p class="section-label">Service</p>
    <h1 id="service-title">Web制作を、<span class="gradient">相談しやすく</span>運用しやすい形で。</h1>
  </section>

  <section class="lower-section service-menu section-reveal" aria-labelledby="service-menu-title">
    <div class="section-heading">
      <p class="section-label">Menu</p>
      <h2 id="service-menu-title">必要な範囲を整理し、無理のない制作内容を提案します。</h2>
    </div>
    <div class="service-list service-list--page">
      <article><p>01</p><h3>Webサイト制作</h3><p>コーポレートサイト、個人サイト、サービス紹介サイト。</p></article>
      <article><p>02</p><h3>WordPress構築</h3><p>更新しやすい管理画面、カスタム投稿、ACFを活用したオリジナルテーマ。</p></article>
      <article><p>03</p><h3>LP制作</h3><p>商品やサービスの魅力を整理し、問い合わせや申込みにつながる1ページ。</p></article>
      <article><p>04</p><h3>保守・改善</h3><p>公開後の更新、軽微な修正、表示改善などのサポート。</p></article>
    </div>
  </section>

  <section class="lower-section process section-reveal" aria-labelledby="process-title">
    <p class="section-label">Process</p>
    <h2 id="process-title">制作の流れ</h2>
    <ol class="process-list">
      <li><h3>ヒアリング</h3><p>目的、ターゲット、掲載内容、希望納期を整理します。</p></li>
      <li><h3>構成・設計</h3><p>ページ構成、導線、必要な更新項目を決めます。</p></li>
      <li><h3>デザイン・実装</h3><p>WordPressテーマとして実装します。</p></li>
      <li><h3>確認・公開</h3><p>PC/SP表示、基本動作、更新しやすさを確認して公開します。</p></li>
    </ol>
  </section>

  <section class="contact-cta section-reveal" aria-labelledby="service-cta">
    <p class="section-label">CTA</p>
    <h2 id="service-cta">作りたいサイトの方向性が固まっていなくても相談できます。</h2>
    <a class="button button--primary" href="/contact.html">Contact</a>
  </section>
</main>`;
}

function contactBody() {
  return `<main id="primary" class="site-main lower-page">
  <section class="lower-hero section-reveal" aria-labelledby="contact-title">
    <p class="section-label">Contact</p>
    <h1 id="contact-title">Web制作の相談を、<span class="gradient">気軽に</span>お聞かせください。</h1>
  </section>

  <section class="lower-section contact-intro section-reveal" aria-labelledby="contact-intro-title">
    <p class="section-label">Contact intro</p>
    <h2 id="contact-intro-title">まだ内容が固まっていない段階でも大丈夫です。</h2>
    <p>目的、参考サイト、必要なページ、希望公開時期など、分かる範囲でお知らせください。</p>
  </section>

  <section class="lower-section section-reveal" aria-labelledby="contact-topics">
    <div class="section-heading">
      <p class="section-label">Topics</p>
      <h2 id="contact-topics">相談できる内容</h2>
    </div>
    <div class="skill-grid">
      <article><h3>新規サイト制作</h3><p>事業紹介、サービス紹介、個人ポートフォリオなどの新規制作。</p></article>
      <article><h3>WordPress化</h3><p>既存デザインのテーマ化、更新しやすい投稿設計、ACFの導入。</p></article>
      <article><h3>改善・保守</h3><p>表示崩れ修正、導線改善、ページ追加、軽微な更新作業。</p></article>
    </div>
  </section>

  <section class="contact-panel section-reveal" aria-labelledby="contact-way">
    <p class="section-label">Contact Link</p>
    <h2 id="contact-way">問い合わせ導線</h2>
    <p>制作内容、参考サイト、予算感、希望納期を添えていただくと、より具体的に返信できます。</p>
    <div class="contact-panel__actions">
      <a class="button button--primary" href="mailto:hello@example.com">hello@example.com</a>
      <a class="button button--ghost" href="https://github.com/prototype-nobuakiyoshioka-web" target="_blank" rel="noopener noreferrer">GitHub</a>
    </div>
  </section>
</main>`;
}

export const pages = [
  {
    file: 'index.html',
    key: 'top',
    title: 'Portfolio Theme — Web Production',
    description: '営業先の担当者が安心して相談できるWeb制作ポートフォリオ。WordPressを中心に、目的整理から実装まで一貫して形にします。',
    bodyFn: topBody,
  },
  {
    file: 'works.html',
    key: 'works',
    title: 'Works — Portfolio Theme',
    description: '制作実績一覧。担当範囲と成果を整理して掲載しています。',
    bodyFn: worksBody,
  },
  {
    file: 'about.html',
    key: 'about',
    title: 'About — Portfolio Theme',
    description: '目的を整理し、伝わる形まで責任を持つWeb制作者のプロフィール。',
    bodyFn: aboutBody,
  },
  {
    file: 'service.html',
    key: 'service',
    title: 'Service — Portfolio Theme',
    description: 'Webサイト制作、WordPress構築、LP制作、保守改善のサービス内容。',
    bodyFn: serviceBody,
  },
  {
    file: 'contact.html',
    key: 'contact',
    title: 'Contact — Portfolio Theme',
    description: 'Web制作のご相談はこちらから。目的、参考サイト、希望納期などをお聞かせください。',
    bodyFn: contactBody,
  },
];

export function renderPage(page) {
  return layout({
    title: page.title,
    description: page.description,
    body: page.bodyFn(),
    active: page.key,
  });
}
