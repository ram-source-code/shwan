---
name: Entersoftgroup
description: Sulaymaniyah software and IT company; a two-ink trilingual proof sheet set in Kurdish, Arabic and English.
colors:
  ink-navy: "#0c3f68"
  navy-deep: "#082c4a"
  navy-ink: "#0d2236"
  ink-orange: "#f7941e"
  orange-hover: "#ffa53d"
  orange-text: "#9a4f00"
  stock-white: "#ffffff"
  stock-tint: "#eef3f8"
  body-text: "#142333"
  muted-text: "#475a6d"
  frame-soft: "#c6d3e0"
  plate-muted: "#c9d8e6"
  photo-ground: "#e4ecf3"
  plate-dark: "#06111b"
  stock-dark: "#0a1824"
  stock-tint-dark: "#0f2234"
  heading-dark: "#f2f6fa"
  body-text-dark: "#dbe4ec"
  muted-text-dark: "#a9b8c7"
  frame-dark: "#8fb0cf"
  frame-soft-dark: "#29425a"
  orange-text-dark: "#f7a640"
  paper-dark: "#dfe8f1"
typography:
  display:
    fontFamily: "Archivo, Segoe UI, Roboto, Arial, sans-serif"
    fontSize: "clamp(2.4rem, 1.4rem + 4vw, 5rem)"
    fontWeight: 850
    lineHeight: 1.08
    letterSpacing: "-0.025em"
  display-arabic-script:
    fontFamily: "Noto Kufi Arabic, Archivo, Tahoma, sans-serif"
    fontSize: "clamp(2rem, 1.2rem + 3.4vw, 4.2rem)"
    fontWeight: 850
    lineHeight: 1.45
    letterSpacing: "0"
  headline:
    fontFamily: "Archivo, Segoe UI, Roboto, Arial, sans-serif"
    fontSize: "clamp(1.9rem, 1.4rem + 2vw, 3rem)"
    fontWeight: 800
    lineHeight: 1.08
    letterSpacing: "-0.025em"
  title:
    fontFamily: "Archivo, Segoe UI, Roboto, Arial, sans-serif"
    fontSize: "clamp(1.2rem, 1.1rem + 0.45vw, 1.4rem)"
    fontWeight: 700
    lineHeight: 1.08
    letterSpacing: "0"
  proof:
    fontFamily: "Archivo, sans-serif"
    fontSize: "clamp(1.5rem, 1.25rem + 1vw, 2.1rem)"
    fontWeight: 750
    lineHeight: 1.4
  body:
    fontFamily: "Figtree, Segoe UI, Roboto, Arial, sans-serif"
    fontSize: "clamp(1rem, 0.96rem + 0.2vw, 1.125rem)"
    fontWeight: 400
    lineHeight: 1.6
  body-arabic-script:
    fontFamily: "Vazirmatn, Figtree, Tahoma, sans-serif"
    fontSize: "clamp(1rem, 0.96rem + 0.2vw, 1.125rem)"
    fontWeight: 400
    lineHeight: 1.85
    letterSpacing: "0"
  label:
    fontFamily: "Figtree, Segoe UI, Roboto, Arial, sans-serif"
    fontSize: "clamp(0.875rem, 0.85rem + 0.1vw, 0.9375rem)"
    fontWeight: 650
    lineHeight: 1.35
rounded:
  frame: "4px"
  inner: "2px"
spacing:
  gutter: "clamp(1rem, 0.5rem + 2.5vw, 2rem)"
  section: "clamp(3.5rem, 2rem + 6vw, 7rem)"
  container: "76rem"
components:
  button-primary:
    backgroundColor: "{colors.ink-navy}"
    textColor: "{colors.stock-white}"
    rounded: "{rounded.frame}"
    padding: "0.65rem 1.35rem"
    height: "3rem"
  button-primary-hover:
    backgroundColor: "{colors.navy-deep}"
  button-primary-dark:
    backgroundColor: "{colors.ink-orange}"
    textColor: "{colors.navy-ink}"
  button-secondary:
    backgroundColor: "transparent"
    textColor: "{colors.ink-navy}"
    rounded: "{rounded.frame}"
    padding: "0.65rem 1.35rem"
    height: "3rem"
  button-accent:
    backgroundColor: "{colors.ink-orange}"
    textColor: "{colors.navy-ink}"
    rounded: "{rounded.frame}"
    padding: "0.65rem 1.35rem"
  button-accent-hover:
    backgroundColor: "{colors.orange-hover}"
  fact-box:
    backgroundColor: "{colors.stock-white}"
    textColor: "{colors.ink-navy}"
    rounded: "{rounded.frame}"
    padding: "0.9rem 1.1rem"
  proof-panel:
    backgroundColor: "{colors.stock-white}"
    textColor: "{colors.ink-navy}"
    rounded: "{rounded.frame}"
    padding: "1.5rem"
  proof-panel-lead:
    backgroundColor: "{colors.ink-navy}"
    textColor: "{colors.stock-white}"
    rounded: "{rounded.frame}"
    padding: "1.5rem"
  plate:
    backgroundColor: "{colors.stock-tint}"
    rounded: "{rounded.frame}"
    padding: "0.75rem"
  channel:
    backgroundColor: "{colors.stock-white}"
    textColor: "{colors.body-text}"
    rounded: "{rounded.frame}"
    padding: "1rem 1.25rem"
    height: "4.5rem"
  edition-strip:
    backgroundColor: "{colors.ink-navy}"
    textColor: "{colors.stock-white}"
    height: "2.75rem"
---

# Design System: Entersoftgroup

## Overview

**Creative North Star: "The Suli Trilingual Press"**

The site is a two-colour proof sheet pulled in a Sulaymaniyah print shop that sets every line in three scripts. Light mode is bright white stock; dark mode is the navy-black printing plate itself. There are only two inks, the logo's navy and orange, and every surface is either stock, a tint of stock, or a solid plate of ink. Separation happens with full four-sided frames, ornament rows and space, never with hairline rules or single-edge accents.

Density is calm and phone-first: big type in the page language, then the same claim proofed in the other two scripts at small size, then the real team and a way to call. The world refuses the IT-category default (blue gradient, laptop hero, icon-card grid) and equally refuses the vintage-newspaper costume: no distressed textures, no column rules, no fake mastheads with dates and prices.

Kurdish (Sorani, `ckb`) is the default language and is RTL, as is Arabic; English is LTR. The theme is Auto by default and follows the system, with explicit Light and Dark overrides.

**Key Characteristics:**
- Two inks only (navy, orange) on white stock or a navy-black plate.
- Every container is a closed four-sided frame (2px) with a 4px corner.
- Registration marks and the logo-derived cube ornament are the only decoration.
- Each script gets its own type pair and its own line height; Arabic-script text is never letter-spaced.
- Real photography only, in full natural colour, inside framed plates. People's faces are never recoloured.
- Flat: the one blurred shadow in the system belongs to the floating menu.

## Colors

Two printing inks and their grounds; the dark theme swaps white stock for the inked plate rather than inverting the palette.

### Primary
- **Logo Navy Ink** (`ink-navy`): headings, frames, primary buttons, the edition strip, the lead proof panel, the quote band and the footer plate in light mode. It is the ink everything is printed in.
- **Deep Navy** (`navy-deep`): hover state of navy buttons.
- **Navy Ink Black** (`navy-ink`): text set on orange (accent buttons, active language and theme chips, text selection).

### Secondary
- **Logo Orange Ink** (`ink-orange`): the second ink. Accent buttons on plates, the ornament band, active language/theme chips, the founder plate's disc, link-hover underlines, focus ring in dark mode, and the primary button fill in dark mode.
- **Orange Ink, Hover** (`orange-hover`): hover of orange fills.
- **Orange Text, Light** (`orange-text`): orange when it must carry text or icons on white stock (proof labels, reason and channel icons, lead team role); the raw ink fails contrast as text on white.
- **Orange Text, Dark** (`orange-text-dark`): the same role on the dark plate.

### Neutral
- **White Stock** (`stock-white`): page ground in light mode, inside of every frame.
- **Tinted Stock** (`stock-tint`): alternating section bands, page heroes, the visit panel, and the paper ground of photo plates.
- **Body Ink** (`body-text`) and **Muted Ink** (`muted-text`): running text and secondary text (labels, leads, roles).
- **Soft Frame** (`frame-soft`): the quieter frame for proof-strip chips and contact channels at rest.
- **Plate Muted** (`plate-muted`): secondary text on a navy plate.
- **Photo Ground** (`photo-ground`): neutral fill behind photos while loading.
- **Dark Plate** (`plate-dark`): in dark mode, the edition strip, lead proof panel, quote band and footer sink to near-black so they still read as the deepest ink.
- **Dark Stock** (`stock-dark`, `stock-tint-dark`): dark page ground and its tint band.
- **Dark Ink Set** (`heading-dark`, `body-text-dark`, `muted-text-dark`): headings, body and muted text on the dark plate.
- **Dark Frames** (`frame-dark`, `frame-soft-dark`): frames lighten to a pale navy so the box still draws in dark mode.
- **Dark Paper** (`paper-dark`): photo plates keep a light paper ground in dark mode, so the photos read as prints on the dark wall.

### Named Rules
**The Two Inks Rule.** Only navy and orange are inks. Any new colour must be a tint of the stock, a shade of one ink, or an overprint of the two. No third hue, no gradients.

**The Stock And Plate Rule.** Dark mode is not an inversion. White stock becomes the navy-black plate; frames lighten; the primary button changes ink from navy to orange (`ink-orange` on `navy-ink`) and the focus ring turns orange. Both token sets are defined three times: `:root` for light, `prefers-color-scheme: dark` guarded by `:root:not([data-theme="light"])` for Auto, and `:root[data-theme="dark"]` for the explicit override.

**The Orange Carries No Text On White Rule.** On white stock, orange text and icons use `orange-text`; raw `ink-orange` is a fill, a mark or an underline only.

## Typography

**Latin Display Font:** Archivo (variable, 100 to 900), with Segoe UI, Roboto, Arial
**Latin Body Font:** Figtree (variable, 300 to 900), with Segoe UI, Roboto, Arial
**Kurdish/Arabic Display Font:** Noto Kufi Arabic, subset to the Arabic Unicode ranges, with Archivo, Tahoma
**Kurdish/Arabic Body Font:** Vazirmatn, subset to the Arabic Unicode ranges, with Figtree, Tahoma

**Character:** A heavy wood-type Latin grotesque (Archivo at 800 to 850) beside a sturdy geometric Kufi for Arabic script; the bodies are friendly humanist sans faces that keep Kurdish and Arabic open and readable on phones. All four are self-hosted WOFF2; the Arabic-script faces carry a `unicode-range` so Latin pages never download them.

### Hierarchy
- **Display** (850, `clamp(2.4rem, 1.4rem + 4vw, 5rem)`, 1.08; Arabic script `clamp(2rem, 1.2rem + 3.4vw, 4.2rem)`, 1.45): the page headline, one per page.
- **Headline** (800, `clamp(1.9rem, 1.4rem + 2vw, 3rem)`): section titles; fact numerals use the display face at this size, weight 850, tabular figures.
- **Proof** (750, `clamp(1.5rem, 1.25rem + 1vw, 2.1rem)`, 1.4; Arabic script 1.7): the three-script claim on the proof sheet, each panel in its own script's display face.
- **Title** (700, `clamp(1.2rem, 1.1rem + 0.45vw, 1.4rem)`): reason headings, member names, leads.
- **Body** (400, `clamp(1rem, 0.96rem + 0.2vw, 1.125rem)`, 1.6 Latin / 1.85 Arabic script): running text, kept to 62ch in prose blocks.
- **Label** (650 to 700, `clamp(0.875rem, 0.85rem + 0.1vw, 0.9375rem)`): fact labels, channel names, proof-strip chips, the edition strip. Sentence case; never uppercase, never tracked.

### Named Rules
**The Script Owns Its Metrics Rule.** On `:lang(ckb)` and `:lang(ar)` the font tokens swap to Noto Kufi Arabic + Vazirmatn, body line height rises to 1.85, heading line height to 1.45, and letter-spacing is 0 everywhere. Negative tracking (`-0.025em`) is a Latin display device only.

**The Each Line In Its Own Script Rule.** When one surface sets text from several languages (edition strip, proof sheet, proof strip, language switch), each run carries its own `lang` and `dir` and picks its script's face. Brand and personal names are set in Archivo, `dir="ltr"`, `translate="no"`.

## Layout

A single centred container (`76rem`) with a fluid gutter (`clamp(1rem, 0.5rem + 2.5vw, 2rem)`); sections breathe on a fluid rhythm (`clamp(3.5rem, 2rem + 6vw, 7rem)`) and alternate white stock with tinted-stock bands. Layout is written entirely in logical properties (`inline-size`, `margin-inline`, `inset-inline-start`, `padding-block`), so every page mirrors for RTL without a second stylesheet.

Breakpoints: below 46rem the hero stacks with the founder plate first and cropped short, buttons go full width under 30rem, and the proof strip moves under the lead; at 46rem the hero becomes a 1.15fr / 0.85fr split, splits go two-up, and the team grid goes from 2 to 4 columns; at 56rem the quote band and contact grid split; the footer grows from 1 to 2 (36rem) to 4 columns (64rem). Repeating sets (proof sheet, reasons, channels) use `auto-fit` grids with `minmax(min(100%, 17 to 21rem), 1fr)`.

### Named Rules
**The Mirror Only What Points Rule.** In RTL, only directional glyphs flip (`scale: -1 1` on the link arrow and anything marked as flippable); logos, the cube ornament, registration marks, photos and the phone glyph do not.

**The Native Digits Rule.** Kurdish and Arabic pages render numerals in Eastern Arabic digits (facts, phone number, copyright year); English uses Western digits. Phone numbers are always wrapped in `<bdo dir="ltr">` so the digit groups never reorder.

## Elevation & Depth

Flat by construction. Depth is printed, not lit: a plate of solid ink sits behind white stock, a tinted band separates sections, and frames close every box. The one blurred shadow is the floating mobile menu popover, the only element that actually lifts above the page.

### Shadow Vocabulary
- **Floating Menu** (`box-shadow: 0 1px 2px rgb(12 63 104 / 0.08), 0 10px 28px -12px rgb(12 63 104 / 0.3)`; dark `0 1px 2px rgb(0 0 0 / 0.4), 0 10px 28px -12px rgb(0 0 0 / 0.7)`): the popover navigation only; removed when the nav docks into the header on wide screens.

### Named Rules
**The Printed Not Lit Rule.** No other blurred drop shadows. If something needs to stand forward, put it on a plate of ink or inside a frame.

**The True Colour Rule.** Photos of the real team and office print in their own colours. Tinting people navy or orange (duotone, multiply overprint) was tried and rejected: it bleached the founder's face and made the team look cold. The press world lives in the frames, marks, type and ornaments, not on faces.

## Shapes

Every container is a closed rectangle: a 2px frame on all four sides (1.5px for small chips) with a slightly softened 4px corner; images inside plates take a 2px corner. Two drawn devices come from the press and the logo: the registration mark (a circle crossed by full-length hairlines) placed overlapping a frame corner or edge, and the cube-and-S ornament, a hexagonal cube repeated as a band (40 by 20px tile) and used as a bullet glyph in the edition strip and reasons. Circles appear only as the founder's orange disc.

### Named Rules
**The Four Sides Rule.** A border is all four sides or none. No single-edge borders, no accent stripes, no column rules, no underline bars under headings.

## Components

### Buttons
Stamped ink blocks: solid, square-shouldered, no gradient.
- **Shape:** 4px corner, 2px border, minimum height 3rem (2.75rem small).
- **Primary:** navy ink with white text in light mode; orange ink with navy-ink text in dark mode. Used for Call (with the phone number in `<bdo dir="ltr">`).
- **Secondary:** transparent with a navy frame and navy text; hover fills with tinted stock. Used for WhatsApp.
- **On a plate:** accent (orange ink, navy-ink text) for the primary action, and an inverse ghost (white frame, white text) for the second.
- **Hover / Focus:** colour shift over 0.2s on an expo-out ease, plus a 1px lift (motion permitting); focus is a 3px solid ring offset 3px, navy in light, orange in dark and on plates.

### Masthead and Navigation
- **Edition strip:** a full-width navy (dark: near-black) band holding the brand name in Archivo, the company line in all three scripts with cube bullets (hidden below 46rem), the language switch (native names, active language as an orange chip) and the Auto/Light/Dark theme switch (three icon buttons in a thin framed group, active in orange).
- **Framed nav box:** below the strip, the logo and navigation sit in a full 2px framed box inside the gutter, never a bare bar. Wide screens show links inline with a small Call button; narrow screens show a framed Menu button opening a framed popover list. The current page is a navy (dark: orange) filled chip. The logo swaps to its dark variant on the plate.

### Fact Boxes
Labelled numerals. Each fact is a framed white box: big display numeral (850, tabular, native digits) with its label beneath in muted label type. Every number carries its label.

### Proof Sheet and Proof Strip
- **Proof sheet:** the product's truth set three times, one framed panel per script, the current language first as a solid navy plate panel; each panel ends with a small framed label naming the language and a registration mark.
- **Proof strip:** under the hero headline, the same headline in the other two scripts as small soft-framed chips with registration-mark bullets.

### Framed Plates
Photos are always printed into a plate: a 2px frame, tinted paper ground, 0.5 to 1.25rem inset. The founder plate adds two registration marks overlapping its frame and a framed caption box (name in Archivo, role in muted text) that overlaps the frame's start edge. Team plates are 370 by 480 portraits, duotone with multiply overprint; the training room plate likewise.

### Reasons Sheet
A single large framed sheet with a registration mark at its corner, holding an `auto-fit` grid of reasons, each a title with a cube glyph in orange text and a muted paragraph. No per-item cards, no icon discs.

### Ornament Band
A 20px row of the cube-and-S ornament in orange ink (CSS mask of the ornament SVG), used to close the proof sheet and to open the footer. It is the section divider instead of a rule.

### Contact Channels
Framed rows (soft frame at rest, full frame on hover): a 1.9rem line icon in orange text, the channel name as a muted label, and the value in Archivo; phone values in `<bdo dir="ltr">`. Beside them, the visit panel: a tinted framed box with the address.

### Quote Plate Band
A full-width navy plate (dark: near-black) with a white headline, plate-muted text, the email inline, and the plate button pair (orange accent + inverse ghost).

### Footer
The plate continues: ornament band at top, the round logo badge and name, then visit, contact and page columns with small orange column headings, links white with faint underlines that turn orange on hover, and a darker base row with the year in native digits.

### Motion
Language changes run a cross-document view transition: the page fades and the headline re-inks with a short press impression (slight scale settle). Buttons lift 1px, link arrows nudge in their reading direction, team photos scale 1.03 on hover. All of it is disabled under `prefers-reduced-motion`.

## Do's and Don'ts

### Do:
- **Do** close every container with a 2px frame on all four sides and a 4px corner.
- **Do** keep to two inks: navy `#0c3f68` and orange `#f7941e`, on white stock or the navy-black plate.
- **Do** define every colour token for light, Auto-dark and explicit dark, and keep Auto as the default theme.
- **Do** set Kurdish and Arabic in Noto Kufi Arabic + Vazirmatn with line height 1.85 and no letter-spacing.
- **Do** write layout in logical properties and mirror only directional arrows in RTL.
- **Do** render digits as Eastern Arabic in ckb/ar and wrap every phone number in `<bdo dir="ltr">`.
- **Do** print photos in natural colour inside framed plates; flat backgrounds may be matched to `#e4ecf3` paper (as on Shwan's and Arya's cards).
- **Do** separate sections with tinted bands, ornament rows and space.
- **Do** label every fact and source every claim from real company information.

### Don't:
- **Don't** use one-sided borders, accent stripes, column rules or heading underline bars.
- **Don't** use blurred drop shadows anywhere except the floating menu popover.
- **Don't** use stock photos; only the real team, founder and training room.
- **Don't** build icon-disc cards or icon-card grids.
- **Don't** put eyebrows or kickers above headings.
- **Don't** fabricate proof: no invented testimonials, client logos, ratings or numbers.
- **Don't** add a third hue or a gradient.
- **Don't** letter-space or uppercase Arabic-script text.
