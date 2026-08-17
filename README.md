# True Diesel Ltd. — website

Custom, self-hosted WordPress site. Heavy-duty truck and trailer repair and
diagnostics.

## What is in this repository

The repository root is the WordPress web root, but only the custom theme is
tracked. WordPress core, plugins, uploads, and `wp-config.php` are excluded by
a whitelist-style `.gitignore` — see the comments in that file for why.

```
wp-content/themes/truediesel/   the entire deliverable
docs/                           runbooks and architecture notes
```

## Theme layout

| Path | Purpose |
| --- | --- |
| `style.css` | Theme metadata only. Not enqueued. |
| `functions.php` | Bootstrap. Loads `inc/`. |
| `inc/setup.php` | Theme supports, menus, image sizes, widget areas. |
| `inc/enqueue.php` | Asset loading and `filemtime` cache busting. |
| `inc/cleanup.php` | Removes unused core output. |
| `inc/template-tags.php` | Small markup helpers used by templates. |
| `template-parts/` | Reusable markup fragments. |
| `assets/css/` | Hand-authored CSS, layered tokens → components. |
| `assets/js/` | Hand-authored vanilla JS. |
| `assets/svg/` | Hand-authored truck SVG (Stage 5). |

## No build step

There is no `package.json`, no bundler, and nothing to compile. Edit a file,
reload the page. Cache busting comes from each asset's modification time, so a
save is enough to invalidate browser and CDN copies.

## Conventions

- Never hardcode a colour, font, or spacing value outside
  `assets/css/tokens.css`.
- Never hardcode a URL or filesystem path. Use `TD_URI`, `TD_DIR`, and
  `home_url()` — the site has to survive the move to the production hostname.
- Every dynamic value that reaches markup gets escaped at the point of output
  (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`).
- Prefix every global function with `td_`.

## Environments

| | Host | Web root | Database |
| --- | --- | --- | --- |
| Dev | `truediesel.test` (LAN) | `/var/www/truediesel-dev` | `td_dev` |
| Prod | via Cloudflare Tunnel (Stage 11) | `/var/www/truediesel-prod` | `td_prod` |

Both run on the same machine with separate PHP-FPM pools and separate system
users, so dev experiments cannot reach production.
