# STATUS — Entersoftgroup rebuild (dev-only, not uploaded)

Tested 18 Nov 2026 in a Linux container: PHP 8.3.6 (CLI + Apache 2.4.58 mod_php, `.htaccess` active), Chromium (Playwright), Lighthouse 12, Nu HTML Checker (vnu-jar), Impeccable detector.
Host: Hostinger, LiteSpeed, PHP 8.4. The code uses only syntax both versions run. Every "real host" check is marked `DEV`.

## Brief (Part A): confirmed answers, plus assumptions

| Field | Value | Source |
|---|---|---|
| project_name | Entersoftgroup website | old site |
| site_type | business_site | old site |
| goal | Call / WhatsApp / email Entersoftgroup | assumed from old site |
| audience | Suli businesses, mostly on phones | assumed |
| languages | [ckb (Sorani, RTL, default at /), en (/en/), ar (RTL, /ar/)] | **confirmed** (19 Nov) |
| pages | / · /about · /team · /contact (+ 301/410 for old URLs) | confirmed: "remake what is there"; the old site only had real content on its homepage |
| database | none | **confirmed** (links only, no form) |
| admin_area | no | assumed (Rule 1) |
| file_layout | multi-file | assumed |
| visual_direction | "Suli trilingual press": the assigned direction from a fresh Impeccable roll (seed:62f07d29bd8e264a) | **confirmed** (19 Nov redesign) |
| brand | logo navy #0c3f68 + orange #f7941e; real team photos | old site |
| artwork | client photos from the old site; no generation available | — |
| hosting / php_version | Hostinger, PHP 8.4 | **confirmed** |
| behind_cdn | no | assumed default |
| canonical_host | www.entersoftgroup.com | **assumed**: the user did not choose; the old site used www |
| deploy_path | root | assumed default (subfolder also tested) |
| integrations | tel:, wa.me, mailto:, Facebook link, Google Maps link (no embeds) | assumed from "links only" |
| visitor_regions | [iraq_krg] | assumed |
| pwa_level | 0 | assumed default |
| device_features | none | — |
| personal_data | none collected | from "links only" |
| accounts | none | — |
| og_images | default only | assumed default |
| ai_crawlers | allow | assumed default |
| google_business | unknown → DEV | — |
| maintenance, domain, content_rights | **[CLIENT]**, see Developer checklist | — |

## Items marked N/A (Rule 2)

Forms, rate limit, honeypot, CSRF, sessions, login, uploads, payments, SQLite/MySQL, backups of a DB, admin, PWA ≥1, device permissions, bilingual/RTL/Kurdish rules, per-page OG generation, RSS, privacy page and form notices, terms, EU/UK items. Reason for all of them: the brief has no form, no login, no DB, no personal data, English only and Iraq-only targeting.

## Traceability matrix

| ID | Requirement | Implementation | Test | Expected | Evidence | Status |
|---|---|---|---|---|---|---|
| D1-ssr | Server-rendered, works with JS off | PHP pages; JS only measures the nav | Playwright `javaScriptEnabled:false`: open the menu, click About | menu opens, navigates | `JS off: menu open=true`, `navigated to http://localhost/about` | ✅ |
| D1-canon | One canonical origin, one 301 | `.htaccess` http→https on the same host; bootstrap.php sends a wrong host to CANONICAL_HOST (http + wrong host = 2 hops) | `curl -I http://entersoftgroup.com/x` on the host | one 301 to https://www.entersoftgroup.com/x | localhost not redirected (200) ✅ | DEV |
| D1-urls | Clean URLs, one slash style | `index.php` | `/about/`, `//team` | 301 to the clean URL | `301 http://localhost/about`, `301 …/team` | ✅ |
| D1-tz | UTF-8 + Asia/Baghdad | bootstrap | read the log timestamps | Baghdad time | `[18-Nov-2026 23:46:15 Asia/Baghdad]` | ✅ |
| D1-php | PHP 8.4 on the host | hPanel | hPanel → PHP Configuration | 8.4 selected | — | DEV |
| D1-ver | Local vs host versions | — | `php -v`, `php -m` | 8.3.6 local; mbstring/intl/gd on | `PHP 8.3.6`, 3/3 extensions | ✅ |
| D1-err | 403 404 405 410 429 500 503 pages | `includes/errors/*` | curl each | right codes, styled, no detail | 404 19.7 KB styled; 405 + `Allow: GET, HEAD`; 410; 500 when .env is missing; 503 + Retry-After | ✅ |
| D1-err403 | 403 in site design | PHP 403 for `/index.php/x`; Apache-denied files get a branded inline ErrorDocument | curl `/.env` | 403, short branded HTML | `<title>Access denied \| Entersoftgroup</title>` (Apache's `Require` runs before rewrites, so a PHP page can't serve these) | ✅ |
| D1-maint | Maintenance 503 + bypass | `data/maintenance.flag` + `maint` cookie | touch the flag; curl with and without the cookie | 503 Retry-After 900 no-store / 200 | `HTTP/1.1 503`, `Retry-After: 900`, `bypass 200` | ✅ |
| D1-block | Indexes off; dotfiles, data, includes, md, php blocked | `.htaccess`, `data/.htaccess`, `includes/.htaccess` | curl `/.env /data/ /includes/bootstrap.php /index.php/x /README.md /.git/config /assets/x.php` | 403 | all 403 | ✅ |
| D1-tree | D1a tree | `site/` | inspect | matches | index.php, includes/{bootstrap,functions,routes}.php, pages, partials, errors, data, assets | ✅ (adds `includes/content.php` and `redirects.php` as helpers) |
| D1-ext | No external requests | self-hosted fonts and SVG | Playwright network + CSP listener | no foreign origins | 0 CSP violations; only localhost requests | ✅ |
| D1-boot | Shared bootstrap: no X-Powered-By, display_errors off, ob, fail-closed, nonce, no cookie | bootstrap.php | `curl -I` | no X-Powered-By, no Set-Cookie | none present; `cookies=0` in the browser | ✅ |
| D1-deploy | Deploy procedure | README | — | — | README §Deploy | ✅ |
| D1a-route | Route table, 404, 405 + Allow, HEAD | routes.php, route() | `/nope`, `POST /`, `HEAD /team` | 404 / 405 Allow / 200 | `404`, `405 Allow: GET, HEAD`, `HTTP/1.1 200 OK` | ✅ |
| D1a-base | Works at the root and in a subfolder | BASE, url(), asset() | Apache :8081 `/demo/shop/` (symlinked folder) | links and redirects stay in the folder | `/demo/shop/about/` → `301 …/demo/shop/about`; `/team.html` → `…/demo/shop/team`; all hrefs `/demo/shop/…` | ✅ |
| D1b-env | .env sections by folder; fail closed; no values exposed | load_env() | rename .env; grep pages for MAINT_KEY | 500 + log names the problem; 0 matches | `500`; `RuntimeException: .env is missing…`; 0 matches | ✅ |
| D1b-prod | ENV = production on the host | `[production]` | add a temporary `<?php echo ENV;` check, or see that the canonical is https://www… | production | — | DEV |
| D2-input | Encode on output | e() everywhere; no user input is used | payloads in the URL | shown as text / 404 | `<script>` path → 404, 0 reflections; `../../etc/passwd` → 404; `%2e%2e` → 400 | ✅ |
| D2-fail | Fail closed | exception + shutdown + warning→exception handlers | .env removed | styled 500, no trace | ✅ (same as D1b) | ✅ |
| D2-supply | Libraries listed | README table | — | — | 2 fonts, 0 libraries | ✅ |
| D2-forms…uploads | Forms, sessions, login, uploads, payments | — | — | — | no forms or accounts | N/A |
| D3-csp | Nonce CSP, no inline handlers or style="" | bootstrap; every `<script>`/`<style>` is nonced (error pages too) | Playwright `securitypolicyviolation` listener on 5 pages × 4 widths | 0 | 0 violations | ✅ |
| D3-hdr | HSTS (https only), nosniff, Referrer, Permissions, XFO, COOP, CORP | `.htaccess` | `curl -I` | present | all present locally; HSTS is set only when `HTTPS=on` | ✅ (HSTS on the host: DEV) |
| D3-corp | CORP cross-origin on OG/icons | `.htaccess` FilesMatch | `curl -I /og-default.jpg` | cross-origin | `Cross-Origin-Resource-Policy: cross-origin` | ✅ |
| D3-blank | noopener on target=_blank | templates | grep | all external links | WhatsApp, Facebook, Maps links have it | ✅ |
| D3-sectxt | security.txt | — | — | — | REC: no logins or personal data | N/A |
| D4-cache | Assets 1 year immutable; root files must-revalidate; HTML no-cache | `assets/.htaccess`, root FilesMatch, PHP header | `curl -I` | as specified | `public, max-age=31536000, immutable`; `max-age=0, must-revalidate`; `no-cache` | ✅ |
| D4-bfcache | No unload, no no-store on public pages | — | grep, headers | none | no `unload`; `Permissions-Policy unload=()` | ✅ |
| D4-gzip | Compression | LiteSpeed on the host; mod_deflate locally | `curl -I -H 'Accept-Encoding: gzip'` | gzip/br | `Content-Encoding: gzip` (HTML, CSS, SVG) | ✅ (br on LiteSpeed: DEV) |
| D5-cwv | LCP ≤ 2.5 s, CLS ≤ 0.1 | — | Lighthouse mobile (simulated 4G, 4× CPU) | within budget | `/` 1.7 s / 0 · `/about` 1.6 s / 0 · `/team` 1.5 s / 0 · `/contact` 1.4 s / 0; Performance 100 on all four | ✅ |
| D5-img | AVIF/WebP, width/height, LCP `fetchpriority=high`, lazy elsewhere | picture() | Lighthouse `lcp-lazy-loaded`; grep | pass | home: founder high, not lazy; team: first photo high | ✅ |
| D5-fonts | Self-hosted WOFF2, swap, preload, `font-size-adjust` | layout.php | Network panel | 2 woff2 from self | 35 KB + 20 KB | ✅ |
| D5-js | Defer, no long tasks | main.js 1.6 KB, defer | Lighthouse TBT | 0 ms | 0 ms | ✅ |
| D5-weight | Page budget ≤ 1 MB | — | Lighthouse total bytes | ≤ 1 MB | home 191 KiB, about 185 KiB after adding the stock images (perf 100, LCP 1.8 s / 1.6 s) | ✅ |
| D5-spec | Speculation Rules | layout.php | view source | present, nonced | present | ✅ |
| D5-critical | Critical CSS inlined | the whole CSS (19 KB, ~4.5 KB gzip) is inlined with a nonce | view source | — | ✅ | ✅ |
| D6 | Modern CSS, progressive, reduced motion | `@supports` for scroll-driven meters; `@view-transition` inside reduced-motion `no-preference`; anchor() with a fallback | reduced-motion screenshots | no overflow | 0 overflow at 320/360/768/1280/1440 | ✅ |
| D7-struct | Landmarks, one h1, heading order, lang/dir | layout + pages | Lighthouse a11y + Nu checker | no errors | Accessibility 100 ×4; Nu: 0 HTML errors | ✅ |
| D7-kbd | Keyboard, skip link, focus visible, not hidden by sticky header | `.skip-link`, `:focus-visible`, `scroll-padding-block-start` | Playwright Tab walk | skip link first, works, outline solid | `Tab1: Skip to content`, focus → `main`, no `[HIDDEN BY HEADER]` | ✅ |
| D7-contrast | AA contrast | tokens | Lighthouse + manual | AA | muted 7:1, white on navy 11:1, navy on orange 4.9:1; orange never text on white | ✅ |
| D7-targets | Targets ≥ 24 px (44 primary) | buttons ≥ 48 px, links ≥ 44 px | computed styles | — | ✅ | ✅ |
| D7-zoom | 200% / reflow at 320 px | intrinsic grids | Playwright 320 px; root font 200% | 0 overflow | 0 on all pages (after the contact-grid fix) | ✅ |
| D7-motion | reduced motion; `color-scheme` meta | CSS | — | — | `light` only (true support) | ✅ |
| D7-dark | Dark mode + Auto/Light/Dark switch (default Auto, stored only on change) | main.css tokens, layout.php early script, main.js | Playwright: device dark first visit; choose Light; next page; back to Auto; JS off | none / light persisted / persisted / cleared / switch hidden | all as expected | ✅ |
| D7-print | Print stylesheet | `@media print` | — | — | basic | ✅ |
| D7a-urls | One URL per language, hreflang ckb/en/ar + x-default, switcher to the same page, no auto-redirect | index.php prefix routing, layout.php hreflang + `.lang-switch` | curl `/`, `/en`, `/ar`, `/ckb/about`, `/en/` | 200 / 200 / 200 / 301→/about / 301→/en | ✅ (Playwright: switch on /ar → /en) | ✅ |
| D7a-rtl | dir=rtl, mirrored arrows only, logical properties, no letter-spacing on ckb/ar, line-height 1.85 | main.css `:lang(ckb)`, `[dir=rtl] .link-arrow .icon` | screenshots `light-ckb-*`, `light-ar-*` | mirrored layout | reviewed in renders | ✅ |
| D7a-digits | One digit system per language: Eastern Arabic in ckb/ar, Latin in en; phone forced LTR with `<bdo dir=ltr>` | `num()`, `phone_local()` | zoomed capture of the Call button in ckb/ar | `٠٧٧٠ ١٥٥ ٨٧٩٦` in the right order | z-actions captures | ✅ |
| D7a-font | Kurdish letters ڕ ڵ ۆ ێ ە ڤ پ چ ژ گ covered | Vazirmatn + Noto Kufi (subset) | fonttools cmap check | none missing | `missing: none` for both | ✅ |
| D7a-review | Native-speaker review of ckb/ar text | lang/ckb.php, lang/ar.php | a native speaker reads every page | approved wording | — | DEV |
| D7a-phone | Phone display / tel / wa.me | `iraq_mobile_local()`, `tel:+9647701558796`, `wa.me/9647701558796`, `<span dir=ltr>` | view source | — | ✅ | ✅ |
| D8-meta | Unique title, description, canonical, h1 | page meta arrays | curl 4 pages | unique | 4 different titles and descriptions; Lighthouse SEO 100 ×4 | ✅ |
| D8-sitemap | sitemap.xml with loc + lastmod | `/sitemap.xml` route (`pages/sitemap.php`), from abs_url + file mtimes | curl | 200 | 4 URLs, lastmod 2026-11-18 | ✅ |
| D8-robots | robots.txt with Sitemap, no secrets | `/robots.txt` route | curl | — | `Sitemap: https://www.entersoftgroup.com/sitemap.xml` | ✅ |
| D8-jsonld | LocalBusiness JSON-LD | layout.php | parsed JSON | valid | name, url, logo, telephone (E.164), email, address, sameAs; **no openingHours: not supplied** | ✅ |
| D8-icons | Favicon set + theme-color | root files | curl | 200 | ico 16/32/48, icon.svg, 180 px apple-touch | ✅ |
| D8-301 | Old URLs → one 301 / 410 | `includes/redirects.php` | curl `/about.html`, `/faq.html` | 301 / 410 | `301 …/about`; `410` | ✅ |
| D8-gsc | Search Console + Bing | — | — | — | — | DEV |
| D8a-tags | OG tags, absolute, non-empty | og_tags() | view source | present | og:title/description/url/image(+w/h/alt/type)/locale, twitter:card | ✅ |
| D8a-img | og-default.jpg 1200×630 < 300 KB | Pillow | `curl -I` | 200 jpeg | 200, image/jpeg, 39 312 B, CORP cross-origin | ✅ |
| D8a-preview | WhatsApp / Facebook / LinkedIn / Telegram / X previews | — | share each URL after launch | large card | — | DEV |
| D9 | PWA level 1 (installable; added for the SEO checker) | `manifest.webmanifest`, relative URLs, 192/512/maskable icons | curl | 200 application/manifest+json | ✅ | ✅ |
| D10-backup | Backup/restore documented | README | — | — | no DB: files only | ✅ |
| D10-monitor | Uptime, SSL and domain alerts | — | — | — | — | DEV |
| D10-readme | README sections | README.md | — | — | file map, content, deploy, backup, DNS, libraries, maintenance, never-upload, ownership | ✅ |
| D11 | Share / clipboard / push | — | — | — | no articles or copyable items | N/A |
| D12-track | No tracking, no cookies | — | private-window cookie count | 0 | `cookies=0` | ✅ |
| D12-privacy | Privacy page | — | — | — | no personal data collected | N/A |
| D12-identity | Name, phone and city on the contact page | contact.php | view | present | ✅ | ✅ |
| D12-ip | Licences recorded | CREDITS.md, OFL files | — | — | ✅ | ✅ |
| D12-copy | © year automatic | footer `date('Y')` | view | © 2026 | ✅ | ✅ |
| B-impeccable | Installed, direction round, finish review, DESIGN.md | `.claude/skills/impeccable` (npx install, project scope), `.impeccable/` | — | — | see Report | ✅ |
| B-detect | Detector on the source + running URLs | `impeccable detect site/`, `detect http://localhost/{,about,team,contact}` | — | 0 findings | exit 0, `[]` | ✅ |
| B.6-art | Every asset viewed rendered + in CREDITS | screenshots in `.impeccable/review/` | — | — | ✅ | ✅ |

## Report

- **Impeccable install method:** `npx impeccable install -y --providers=claude --scope=project` (skill v4.9.1, engine 0.1.24); telemetry off.
- **Modern Web Guidance (Google Chrome), v1.0.1:** used through its CLI. Guides applied: `navbar`, `optimize-image-priority`, `visually-stable-font-fallbacks`, `cross-document-transitions`, `typography`.
- **Direction:** the concept roll (seed:a59f9699f019a0e1) assigned a "Suli tea-house portrait wall" world. The user chose the standing exit instead, "Standard IT company site", and left the references to me. Build path: code-first, because this environment has no image generation.
- **Finish review:** run in-thread with Impeccable's degraded finish-reviewer. Its reviewer agent was installed mid-session and was not available as a subagent here. Round 1: `fix`, 1 material fix (contact email breaking at desktop width). Verdict pass: resolved, so `ship`, covering that fix. DESIGN.md and `.impeccable/design.json` were written by the in-thread documenter.
- **Detector:** 0 findings on the source and on all 4 rendered URLs.
- **Screenshots:** `.impeccable/review/{home,about,team,contact,nope}-{360,768,1280,1440}.png`, `menu-open-360.png`, `focus-skip.png`, `zoom200-contact.png`, `desktop.png`, `mobile.png`.
- **Known validator noise:** the Nu checker's CSS parser does not know `view-transition-name`, `@starting-style`, `@view-transition`, `transition-behavior` or `animation-timeline`. These are valid, Baseline or `@supports`-gated CSS. There are 0 HTML errors.

### [CLIENT] items left

0. Licence for the theme's stock photos, now used as captioned illustrative images at the user's request: confirm with AndroThemes or the original stock source, or replace them with Entersoftgroup's own photos.

1. Confirm the team photos, founder cut-out and training-room photo may be used, including consent from the people in the training photo.
2. Confirm WhatsApp is active on 0770 155 8796.
3. Opening hours: not on the old site, so left out of JSON-LD and the pages.
4. Canonical host: www assumed.
5. Google Business Profile: exists? If yes, its name, address and phone must match the site exactly.
6. Domain, hosting and email in the client's name; who maintains the site after launch.

### Developer checklist (DEV rows, in order)

1. hPanel: set PHP 8.4. Upload `site/` contents to `public_html/`. Create `.env` from `.env.example` with new MAINT_KEYs, mode 600.
2. `curl -I http://entersoftgroup.com/about` → one 301 to `https://www.entersoftgroup.com/about`. `curl -I https://www.entersoftgroup.com/` → `Strict-Transport-Security` present, no `X-Powered-By`, `content-encoding: br` or `gzip`.
3. `curl -I https://www.entersoftgroup.com/.env`, `/data/php-error.log`, `/includes/bootstrap.php`, `/index.php/x` → 403 (LiteSpeed must honour `.htaccess`).
4. Visit the site: the canonical in view-source is `https://www.entersoftgroup.com/…`, which proves ENV = production.
5. Maintenance test: create `data/maintenance.flag` → 503; set the bypass cookie → 200; delete the flag.
6. Real phones: Android Chrome and iPhone Safari, portrait and landscape. Tap Call, WhatsApp, Email and the menu. Open the site inside WhatsApp and Telegram.
7. Desktop Firefox: the menu and page transitions fall back cleanly (instant navigation).
8. Previews: Meta Sharing Debugger, LinkedIn Post Inspector, Telegram @WebpageBot, WhatsApp self-message, X draft → large card with the logo.
9. Search Console + Bing: DNS TXT verification on the client's account; submit the sitemap.
10. SSL Labs A; securityheaders.com review; uptime monitor; domain auto-renew + registrar lock.
11. Look at the screenshots: does this look made for Entersoftgroup? (Spec gate 3 DEV.)

### Extras beyond the brief

- `includes/redirects.php`: 301/410 for the old theme URLs (spec D8 "replacing a site").
- `includes/content.php`: one place to edit the text.

### Known issues needing a decision

- The old site's "Different languages" claim suggests a Kurdish/Arabic version of this site later. The structure supports adding one; that requires D7a.
- The training-room photo is only 400 px wide (the original is small). A larger original would look sharper on retina screens.

## Redesign (19 Nov 2026)
- Removed every theme stock photo. Replaced them with design made for this site: the real photos in natural colour, framed plates, registration marks, a cube-and-S ornament band and a trilingual "proof sheet". The proof sheet is real HTML text in all three scripts, not an image.
- Added three languages with hreflang, a trilingual sitemap and trilingual error pages.
- Added the theme switch.
- Results: Lighthouse mobile perf 99–100, a11y/BP/SEO 100 (6 URLs, 3 languages); Nu HTML 0 errors; detector 0 findings; 0 overflow and 0 console/CSP errors across 3 languages × 3 widths × light/dark.
