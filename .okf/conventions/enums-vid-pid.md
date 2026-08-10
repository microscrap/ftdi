---
type: Convention
title: Enums for VID/PID
description: "FtdiVendorId / FtdiProductId are int-backed enums with FULLY UPPERCASE cases; no class constants."
resource: src/Enums/
tags: [convention, enums, ftdi, usb]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-10T21:23:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: Enum namespaces and UPPERCASE note
  - id: vendor
    resource: src/Enums/FtdiVendorId.php
    title: FtdiVendorId enum
  - id: product
    resource: src/Enums/FtdiProductId.php
    title: FtdiProductId enum
  - id: agents
    resource: AGENTS.md
    title: Enum case naming rule
---

# Why enums live here

Optional convenience tokens for common FTDI USB vendor/product IDs. Framing, bitmode, and other libftdi constants are **not** fully transcribed here — prefer platform headers or higher packages (`microscrap/mpsse`) for those.[^readme]

# Rules

- Use **int-backed** enums under `Microscrap\Bindings\FTDI\Enums\`.[^vendor][^product]
- Case names are **FULLY UPPERCASE** (e.g. `FtdiProductId::FT232H`).[^agents][^readme]
- No class-level constants in `src/`.[^agents]
- Pass `->value` (or accept `Enum|int` at call sites) into helpers that take raw `int` VID/PID.[^readme]

# Enum inventory (0.7.0)

| Enum | Cases (summary) |
|------|-----------------|
| `FtdiVendorId` | `FTDI` = `0x0403`[^vendor] |
| `FtdiProductId` | `FT232R`, `FT2232H`, `FT4232H`, `FT232H`, `FT230X`, `FT4232HP`, `FT4232HA`[^product] |

# Related

* [1:1 extension wrap](one-to-one-extension-wrap.md)
* [Package (0.7)](../orientation/package.md)

[^readme]: Enum namespaces and UPPERCASE note
[^vendor]: FtdiVendorId enum
[^product]: FtdiProductId enum
[^agents]: Enum case naming rule
