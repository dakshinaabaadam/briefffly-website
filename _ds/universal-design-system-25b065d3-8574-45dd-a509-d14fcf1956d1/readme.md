# Universal Design System

A from-scratch, brand-agnostic design system for premium, modern creative websites. No company, codebase, or Figma file was attached — this system was built by design decisions made here (documented below), not sourced from an existing product. If a real brand's assets ever get attached to this project, treat that as ground truth over what's written here.

## Purpose

A flexible foundation for prototyping marketing sites, portfolios, case studies, and pitch decks across SaaS, AI, fintech, agency, corporate, editorial, and luxury contexts. Minimal/editorial aesthetic: quiet layouts, generous whitespace, a serif display voice paired with a clean grotesque body face, one confident accent color.

## Sources

None attached. Fonts, colors, and components below were originated for this system (see "Decisions" in each token file's comments and the Visual Foundations section). No logo exists — the wordmark is rendered in the display serif wherever a mark would go.

## Content Fundamentals

- **Voice:** direct, editorial, confident without being salesy. Short declarative sentences. Avoid hype words ("revolutionary", "game-changing", "seamless").
- **Person:** second person ("you") for product copy and CTAs; first person plural ("we") sparingly, for company/about voice.
- **Casing:** sentence case everywhere — headlines, buttons, nav labels. No ALL CAPS except eyebrow labels (small caps-style tags above headlines), which use letter-spacing instead of uppercase-as-shouting.
- **Punctuation:** periods omitted on headlines and short UI labels; used on body copy and full sentences. Em dashes used sparingly for a single aside, not as a tic.
- **Emoji:** none. Iconography carries visual weight instead.
- **Example headline:** "Work that speaks for itself" — not "🚀 Unleash Your Creative Potential!!!"
- **Example button copy:** "View the work", "Start a project", "Read the case study" — verb-first, specific, no "Learn more" as a catch-all.

## Visual Foundations

**Color:** near-white paper background (#fbfaf8), warm charcoal ink (#1c1a17) rather than pure black, one accent used sparingly for links, active states, and small highlights, never as a dominant fill. The accent is theme-driven, not a fixed hex: `--accent` is computed from `--accent-hue`/`--accent-chroma`/`--accent-lightness` in OKLCH (defaults to a warm amber, hue 70), so retheming the whole system to a different accent color is a one-line token change — `--accent-hover`, `--accent-light`, and `--accent-tint` derive automatically. Semantic success/danger/info colors are muted, desaturated versions, not stock red/green.

**Type:** Spectral (serif) for display/headlines, Manrope (sans) for body/UI, IBM Plex Mono for code/data labels. Display sizes are large and set tight (-0.02em letter-spacing, 1.08 line-height); body copy is set loose and readable (1.6 line-height). Eyebrow labels use wide letter-spacing (0.14em) instead of bold or color to create hierarchy.

**Spacing:** 4px base scale (4/8/12/16/24/32/48/64/96/128/192), used consistently for gaps, padding, and section rhythm. Sections breathe — 64–192px of vertical space between major blocks is normal, not excessive.

**Backgrounds:** flat paper or white; no gradients, no repeating textures or patterns. Full-bleed imagery is used for hero/case-study moments only, always with real photography (placeholders in this kit), never illustration or 3D render clichés.

**Borders & shadows:** hairline 1px borders (--border-subtle / --border-default) for structure, not shadow-heavy cards. Shadows are soft and low-opacity (6–12% black), used only to lift floating elements (dropdowns, modals) off the page — cards on the page itself typically use a border, not a shadow.

**Corner radii:** small and consistent — 4px default, 2px for tight controls (checkboxes, tags), 8px for larger surfaces (modals, image frames). No pill-shaped cards; pill radius (999px) is reserved for badges/tags and toggle controls only.

**Hover/press states:** hover darkens (ink or accent moves ~15% toward black) rather than lightens; no opacity fades on hover for solid buttons. Press state is a slight scale-down (0.98) plus a darker shade — no color inversion.

**Motion:** minimal and functional. 120ms for micro-interactions (hover, focus), 220ms for standard transitions (menus, accordions), 400ms for page-level reveals. Standard ease is `cubic-bezier(.4,0,.2,1)` — no bounce, no spring, no elastic overshoot.

**Transparency/blur:** blur is reserved for sticky nav bars over scrolled content (backdrop-filter blur) and modal scrims — never decorative.

**Imagery tone:** photography is warm-neutral, naturally lit, minimal grain — editorial rather than glossy stock. This kit uses labeled placeholders; swap in real photography before shipping.

## Iconography

No icon font or SVG sprite was provided, so this system links **Lucide** (MIT-licensed, CDN-hosted, geometric/thin-stroke — matches the editorial, quiet aesthetic) as the default icon set: `https://unpkg.com/lucide@latest/dist/umd/lucide.js` or the `lucide-react` package pattern rendered as inline SVG in components. Icons are used at 20–24px, single 1.5px stroke weight, colored `currentColor` so they inherit text color. No emoji, no unicode symbol icons.

## Intentional additions

No source defined a component inventory (nothing was attached), so a standard primitive set was authored from scratch, sized to a marketing/editorial site's needs: Button, IconButton, Input, Textarea, Select, Checkbox, Radio, Switch, Tag, Badge, Card, Tabs, Accordion, Dialog, Tooltip, Nav, Footer.

## Index

- `styles.css` — root stylesheet, imports everything under `tokens/`
- `tokens/` — colors, typography, spacing, effects (shadow/motion), fonts
- `components/forms/` — Button, IconButton, Input, Textarea, Select, Checkbox, Radio, Switch
- `components/feedback/` — Badge, Tag, Tooltip, Dialog
- `components/navigation/` — Nav, Tabs, Footer
- `components/content/` — Card, Accordion
- `ui_kits/marketing-site/` — homepage, portfolio, about, blog, contact, case study, pricing
- `templates/pitch-deck/` — slide deck template (title, section, comparison, big quote, image, closing)
- `assets/` — no logo provided; wordmark rendered in Spectral wherever a mark is needed
- `guidelines/` — foundation specimen cards (colors, type, spacing, shadow, motion)

## Caveats

Built with no attached brand materials — every visual and voice decision here is a placeholder direction, not a real company's system. Fonts are Google Fonts (Spectral, Manrope, IBM Plex Mono), not a licensed custom typeface. No logo exists.
