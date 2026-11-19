# Entersoftgroup website

Rebuild of www.entersoftgroup.com in PHP 8.4 + HTML/CSS + a little vanilla JS, following WEBSITE-BUILD-SPEC.md. No database, no build step, no CDN, no cookies.

## File map

```
site/                       upload the CONTENTS of this folder to public_html/
  index.php                 front controller (the only PHP file the web can reach)
  .htaccess                 rewrites, blocks, security + cache headers, canonical 301
  .env / .env.example       per-environment settings (.env is not in git: create it, see below)
  manifest.webmanifest      install metadata (relative URLs, works in any folder)
  favicon.ico icon.svg apple-touch-icon.png og-default.jpg
  assets/                   css/main.css (inlined into each page), js/main.js, img/, fonts/ (cached 1 year)
  includes/                 blocked from the web
    bootstrap.php           errors, CSP nonce, .env, maintenance mode
    functions.php           e(), url(), abs_url(), asset(), picture(), route(), load_env(), og_tags()
    routes.php              every URL: / /about /team /contact
    redirects.php           old *.html URLs → 301 to the new page, or 410 for removed theme demo pages
    content.php             phone, email, links, team names, numbers (language-neutral)
    lang/ckb.php en.php ar.php   ALL visible text per language  ← edit wording here
    pages/                  home, about, team, contact
    partials/               layout (head/header/footer), contact buttons, team grid, quote band
    errors/                 403 404 405 410 429 500 503
  data/                     blocked; PHP writes php-error.log here; maintenance.flag goes here
```

## Languages and theme

- Kurdish Sorani is the default at `/`, English is at `/en/` and Arabic is at `/ar/`. Each page links its two other versions (`hreflang`), and the switcher in the top strip keeps the visitor on the same page.
- Old `*.html` URLs from the previous English site redirect to the matching `/en/` page.
- The theme toggle (Light / Dark) follows the device until the visitor clicks it; the choice is then stored in `localStorage` key `esg-theme`. The active button always shows the theme on screen. With JS off the site follows the device and the switch is hidden.
- Fonts: Archivo + Figtree for Latin; Noto Kufi Arabic (headings, subset) + Vazirmatn (body) for Kurdish/Arabic. **If you add Kurdish/Arabic text with new letters, re-run the Kufi subset** (see CREDITS.md) or those letters will fall back to Vazirmatn.

## Where content lives

All wording is in `includes/lang/{ckb,en,ar}.php` (one file per language, same keys). Phone, email, team names and numbers are in `includes/content.php`. Page titles and descriptions are at the bottom of each `includes/pages/*.php`. Team photos: `assets/img/team-<name>-370.{webp,avif}` (370×480).

To replace a photo: export 370×480 WebP and AVIF with the same name. Then add the new file to `CREDITS.md`.

## Admin password

None: the site has no admin or login.

## First setup (any machine)

1. Copy `.env.example` to `.env`.
2. Fill each `MAINT_KEY` with `php -r 'echo bin2hex(random_bytes(16));'`, using a different key per section.
3. Locally (XAMPP): put the `site` folder in `htdocs/`, then open `http://localhost/site/`. The `[local]` section is chosen automatically for folders under `htdocs`.
4. The same folder, unchanged, picks `[production]` on Hostinger.

PHP: the host runs 8.4 (set it in hPanel → Advanced → PHP Configuration). The code uses only syntax PHP 8.3 and 8.4 both run; it was tested on PHP 8.3.6 with Apache 2.4 locally. Extensions needed: `mbstring` (standard on Hostinger).

## Deploy

**Behind Cloudflare:** the page body is wrapped in `<!--email_off-->` … `<!--/email_off-->`, so Cloudflare's Email Address Obfuscation leaves the email links alone. Without it Cloudflare swaps them for "[email protected]" and injects `email-decode.min.js`, which the CSP blocks (no nonce). Keep the markers, or turn off Scrape Shield → Email Address Obfuscation in Cloudflare. Rocket Loader must stay off for the same reason.

1. Back up: hPanel → File Manager → zip `public_html` and download it. This zip is the rollback copy. There is no database.
2. Turn maintenance on: create an empty `data/maintenance.flag`. Visitors get 503 + `Retry-After`. To bypass it yourself, set a browser cookie `maint` = the production `MAINT_KEY`.
3. Upload the code (SFTP or File Manager). Never overwrite `data/`.
4. Upload `.env` only if it changed. Then set it to mode 600.
5. Smoke test with the bypass cookie: `/`, `/about`, `/team`, `/contact`, `/nope` (404), `/about.html` (301).
6. LiteSpeed Cache: hPanel → Advanced → Cache Manager → Purge all.
7. Turn maintenance off: delete `data/maintenance.flag`.

Rollback: restore the zip from step 1.

**Never upload:** `README.md`, `CREDITS.md`, `STATUS.md`, `.env.example` (harmless but not needed), and the `*.json` provenance sidecars in `assets/img/` (the web cannot reach them, but they're not needed). The rest of the repo stays off the server too: `../_source`, `../.impeccable`, `../.claude`, `../.devtools`, `PRODUCT.md`, `DESIGN.md`. The `.htaccess` blocks `.md`, `.json`, `.env` and dotfiles if they are uploaded by mistake.

Permissions: files 644, folders 755, `.env` 600, `data/` writable by PHP.

## Backup / restore

There is no database. The site is its files, so the deploy zip is the backup. Restore: unzip it into `public_html/`. The Hostinger account's own backups are a second copy. Keep one copy off the server, e.g. in this Git repository.

## DNS sheet (fill in from the registrar / Hostinger)

| Record | Value |
|---|---|
| A `@` / `www` | Hostinger server IP (hPanel → Hosting → Details) |
| AAAA | Hostinger IPv6 if offered |
| MX | the mail host for info@entersoftgroup.com |
| SPF (TXT) | `v=spf1 include:<mail host> ~all` |
| DKIM | from the mail host |
| DMARC (TXT `_dmarc`) | `v=DMARC1; p=quarantine; rua=mailto:info@entersoftgroup.com` |
| CAA (optional) | `0 issue "letsencrypt.org"` (include the host's CA, or SSL renewal breaks) |

The canonical host is `CANONICAL_HOST` in `.env [production]`, currently `www.entersoftgroup.com`. `.htaccess` upgrades http to https on the same host. `bootstrap.php` then sends any other host to `https://CANONICAL_HOST` with a 301. `robots.txt` and `sitemap.xml` are generated routes, so canonical, og:url, sitemap and robots all follow `.env`. That makes a test copy on another domain just a different `.env`, for example `CANONICAL_HOST = "ramyar-salah.freedev.app"` with the folder uploaded to `public_html/entersoft/`.

## Libraries / supply chain

No PHP or JS libraries.

| Asset | Version | Source | License |
|---|---|---|---|
| Archivo (variable, wght, latin) | Fontsource 5.3.0 | npm `@fontsource-variable/archivo` (Google Fonts / Omnibus-Type) | OFL-1.1, `assets/fonts/OFL-archivo.txt` |
| Figtree (variable, wght, latin) | Fontsource 5.3.0 | npm `@fontsource-variable/figtree` (Erik Kennedy) | OFL-1.1, `assets/fonts/OFL-figtree.txt` |

## Maintenance routine (suggested: monthly)

- Read `data/php-error.log`, then empty it.
- Click every page and footer link; check that tel/WhatsApp/email still work.
- Check the PHP version in hPanel: 8.4 has security support until 31 Dec 2028.
- Check SSL and domain expiry; keep auto-renew and registrar lock on.
- Font licences need no updates; there are no other libraries.
- External uptime monitor (e.g. a free 5-minute check) emailing the owner.
- Search Console + Bing Webmaster: DNS-verified on the client's account, sitemap submitted.

## Incident steps

1. Turn maintenance on.
2. Change the hosting, FTP and email passwords, then regenerate `MAINT_KEY`.
3. Restore the last good zip.
4. Tell the client.

## Ownership

The client (Entersoftgroup) owns the content, photos and logo. The code was written for the client; reusable snippets remain the developer's, as agreed in the contract.
