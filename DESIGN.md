---
name: Entersoftgroup
description: Software and IT company in Sulaymaniyah; clean company site in the logo's navy and orange.
colors:
  brand-navy: "#0c3f68"
  navy-deep: "#082c4a"
  navy-ink: "#0d2236"
  brand-orange: "#f7941e"
  orange-ring: "#ffb04f"
  orange-hover: "#ffa53d"
  navy-bright: "#1b6aa8"
  footer-base: "#081827"
  ground: "#ffffff"
  tint: "#f1f5f9"
  tint-2: "#e4ecf3"
  line: "#d3dde7"
  ink: "#142333"
  muted: "#4a5b6d"
  on-navy-muted: "#c9d8e6"
typography:
  display:
    fontFamily: "Archivo, Segoe UI, Roboto, Arial, sans-serif"
    fontSize: "clamp(2.4rem, 1.5rem + 3.6vw, 4.6rem)"
    fontWeight: 780
    lineHeight: 1.12
    letterSpacing: "-0.03em"
  heading:
    fontFamily: "Archivo, Segoe UI, Roboto, Arial, sans-serif"
    fontSize: "clamp(1.9rem, 1.4rem + 2vw, 3rem)"
    fontWeight: 740
    lineHeight: 1.12
    letterSpacing: "-0.015em"
  title:
    fontFamily: "Archivo, Segoe UI, Roboto, Arial, sans-serif"
    fontSize: "clamp(1.2rem, 1.1rem + 0.45vw, 1.4rem)"
    fontWeight: 680
    lineHeight: 1.12
  body:
    fontFamily: "Figtree, Segoe UI, Roboto, Arial, sans-serif"
    fontSize: "clamp(1rem, 0.96rem + 0.2vw, 1.125rem)"
    fontWeight: 400
    lineHeight: 1.6
  small:
    fontFamily: "Figtree, Segoe UI, Roboto, Arial, sans-serif"
    fontSize: "clamp(0.875rem, 0.85rem + 0.1vw, 0.9375rem)"
    fontWeight: 600
    lineHeight: 1.3
rounded:
  sm: "8px"
  md: "12px"
  pill: "999px"
spacing:
  gutter: "clamp(1rem, 0.5rem + 2.5vw, 2rem)"
  section: "clamp(3.5rem, 2rem + 6vw, 7rem)"
  max-width: "76rem"
components:
  button-primary:
    backgroundColor: "{colors.brand-navy}"
    textColor: "{colors.ground}"
    rounded: "{rounded.pill}"
    padding: "0.65rem 1.3rem"
    height: "3rem"
  button-primary-hover:
    backgroundColor: "{colors.navy-deep}"
  button-secondary:
    backgroundColor: "{colors.ground}"
    textColor: "{colors.brand-navy}"
    rounded: "{rounded.pill}"
  button-accent:
    backgroundColor: "{colors.brand-orange}"
    textColor: "{colors.navy-ink}"
    rounded: "{rounded.pill}"
  contact-channel:
    backgroundColor: "{colors.ground}"
    textColor: "{colors.brand-navy}"
    rounded: "{rounded.md}"
    padding: "1rem 1.25rem"
---

# Design System: Entersoftgroup

## Overview

A clean, confident software-company site played straight (the client chose the category standard), carried by the two colours of the Entersoftgroup logo. Light, navy-tinted grounds; navy does the talking (headings, primary buttons, the quote band); orange is the single accent and appears where the logo's orange would: the founder's disc, the "+" on stated facts, icons, the focus ring on dark grounds. Real people and real facts only: no stock photography, no invented proof.

## Colors

### Primary
- **Brand navy `#0c3f68`**: headings, primary buttons, current-page indicator, the full-bleed "Get a quote" band. White on navy is 11:1.

### Secondary
- **Brand orange `#f7941e`**: accent only. Never text on white (2.2:1). Allowed: as a fill under navy text (4.9:1), as text on navy (4.9:1), for icons and the founder disc. The "+" on facts is navy.

### Neutral
- `ground #fff`, `tint #f1f5f9` (alternating sections, page heading band), `tint-2 #e4ecf3` (meter tracks, photo backdrops), `line #d3dde7` (rules, card borders), `ink #142333` (body), `muted #4a5b6d` (secondary text, 7:1 on white), `navy-ink #0d2236` (footer ground).

### Named Rules
- **The Logo Pair Rule**: only navy and orange carry colour; everything else is a navy-tinted neutral. No third hue.
- **Orange Is Never Body Text** on light grounds.

## Typography

Archivo (variable, wght) for every heading and number; Figtree (variable) for body and UI. Both self-hosted WOFF2, OFL, `font-display: swap`, preloaded. Fluid sizes with `clamp()`, max ≤ 2.5× min.

### Hierarchy
- Display (h1) 2.4–4.6rem / 780 / -0.03em, balanced.
- Heading (h2) 1.9–3rem / 740.
- Title (h3, names, channel values) 1.2–1.4rem / 680.
- Body 1–1.125rem / 1.6, measure ≤ 62ch, `text-wrap: pretty`.
- Small (labels, roles) 0.875–0.94rem / 600.
- Numbers use `tabular-nums`.

## Layout

Single centred column, max 76rem, fluid gutter. Mobile-first; two columns from 46rem (hero, split sections), quote band and contact go two-column from 56rem. Grids are intrinsic (`auto-fit/minmax`), not breakpoint-counted. Sections alternate white / tint, close with the navy quote band, then the navy-ink footer.

## Elevation & Depth

One soft shadow (`0 1px 2px` + `0 8px 24px -8px` navy at low alpha) for floating things: the open menu, the founder caption chip, the skills panel, hovered contact channels. Everything else is flat. The sticky header separates with a soft downward shadow, not a rule.

## Shapes

12px radius for panels and photos, 8px for small surfaces, pills for buttons and the menu trigger. The founder sits on an orange disc echoing the logo's round badge.

## Components

### Buttons
Pill, min 48px tall (44px small). Primary navy/white; secondary white with navy 1.5px border; accent orange with navy-ink text (on navy grounds); ghost-inverse white outline (on navy). Hover lifts 1px, press sinks 1px. Icons 1.15em, left of the label.

### Navigation
One `<nav>` list. Inline when the row fits (measured by script), otherwise a native `popover` panel anchored under a "Menu" pill. Current page: `aria-current`, shown as a filled navy pill with white text (inline and panel). Phone number button is the last item.

### Contact channel
Full-row link with a 44px navy icon disc, small label above a large navy value. Used for phone, WhatsApp, email, Facebook.

### Reasons list
A plain grid separated by generous gaps, orange line icon beside each h3. No cards, no rules.

### Team member
Portrait 370×480 at 12px radius with hairline frame, name (title style), role (muted). 2 columns on phones, 4 on desktop.

## Do's and Don'ts

### Do:
- Use only facts the company states (15+ years, 99+ projects, Kurdish/Arabic/English, 24/7 support).
- Keep call and WhatsApp one tap away on every page.
- Use the line icon sprite (24 grid, 1.5 stroke, `currentColor`).

### Don't:
- Don't add testimonials, client logos, portfolio items or counters the company hasn't supplied.
- Don't use stock photos as if they were the team or office.
- Don't put eyebrow/kicker labels above headings.
- Don't use one-sided borders or stripes (top/bottom/side rules, inset bars). Separate with space, background tint, full borders or soft shadow.
- Don't introduce gradients beyond the hero's subtle white-to-tint wash and the meter fill.
