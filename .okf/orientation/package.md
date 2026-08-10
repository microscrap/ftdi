---
type: Orientation
title: Package (0.7)
description: "microscrap/ftdi 0.7.0 — libFTDI PHP helpers over ext-ftdi; no ServiceProvider, no intermediate wrapper class."
resource: .
tags: [orientation, ftdi, microscrap, bindings, 0.7]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-10T21:23:00Z" }
status: draft
sources:
  - id: composer
    resource: composer.json
    title: Package name, version, PHP, autoload helpers
  - id: readme
    resource: README.md
    title: Package README
  - id: helpers
    resource: src/Helpers/ftdi.php
    title: Global ftdi_* helpers
  - id: agents
    resource: AGENTS.md
    title: Agent rules for this package
---

# What it is

Composer package `microscrap/ftdi` at **0.7.0** — PHP global helpers and VID/PID enums over the [**php-io-extensions/ftdi**](https://github.com/php-io-extensions/ftdi) extension (`ext-ftdi`).[^composer][^readme]

| Field | Value |
|-------|-------|
| Name | `microscrap/ftdi` |
| Version | `0.7.0` |
| PHP | `^8.4\|^8.5\|^8.6`[^composer] |
| Namespace | `Microscrap\Bindings\FTDI\` → `src/`[^composer] |
| Require | `ext-ftdi` `^0.7.0`[^composer] |
| Suggest | `microscrap/mpsse` `^0.7`, `scrapyard-io/gpio-framework` `^0.7`[^composer] |
| Homepage | Ecosystem docs overview (see [Ecosystem docs](ecosystem-docs.md))[^composer] |
| Discovery | **None** — no provider / Chassis registration in this package[^readme] |
| Role | Bindings layer only (helpers + enums; helpers call `Ftdi\FTDI` directly)[^helpers][^readme] |

Autoloads `src/Helpers/ftdi.php` global `ftdi_*` helpers (plus `set_ft232h_cbus`), each guarded with `function_exists`.[^composer][^helpers]

# What it is not

- Not `php-io-extensions/ftdi` (the native extension) — this package *wraps* that extension via helpers.[^readme]
- Not an intermediate static wrapper class package — unlike `microscrap/open-gl`'s `GL.php`, helpers call `Ftdi\FTDI` **1:1** with no package-owned wrapper.[^helpers]
- Not MPSSE protocol helpers — those belong in `microscrap/mpsse` (suggested peer).[^composer]
- Not higher UART/USB adapters — those belong in `scrapyard-io/gpio-framework` (suggested peer).[^composer]
- Not a ServiceProvider package — no Chassis/Core/Fabricate/Machine coupling.[^readme][^agents]

# Public surface (summary)

| Layer | Location | Role |
|-------|----------|------|
| Helpers | `src/Helpers/ftdi.php` | Exact C / libftdi-style names (`ftdi_usb_open`, …) plus `set_ft232h_cbus` |
| Extension API | `Ftdi\FTDI` | Static methods called directly by helpers |
| Enums | `src/Enums/*` | Optional VID/PID tokens (`FtdiVendorId`, `FtdiProductId`) |
| DTOs | Extension types | `Ftdi\FTDIContext`, `FTDIEeprom`, `FTDITransferControl`, `FTDIVersionInfo` passed through |

# Related

| Topic | Concept |
|-------|---------|
| Call stack | [Helpers → FTDI → ext](../architecture/helpers-ftdi-ext.md) |
| Wrap rules | [1:1 extension wrap](../conventions/one-to-one-extension-wrap.md) |
| Enums | [Enums for VID/PID](../conventions/enums-vid-pid.md) |
| Docs site | [Ecosystem docs](ecosystem-docs.md) |
| Extension | `php-io-extensions/ftdi` 0.7.0 |

[^composer]: Package name, version, PHP, autoload helpers
[^readme]: Package README
[^helpers]: Global ftdi_* helpers
[^agents]: Agent rules for this package
