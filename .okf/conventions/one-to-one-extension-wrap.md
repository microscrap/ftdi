---
type: Convention
title: "1:1 extension wrap"
description: "Helpers call Ftdi\\FTDI 1:1; extension DTOs pass through; no package intermediate wrapper."
resource: src/
tags: [convention, bindings, ftdi]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-10T21:23:00Z" }
status: draft
sources:
  - id: agents
    resource: AGENTS.md
    title: Agent wrap rules
  - id: readme
    resource: README.md
    title: Package README wrap description
  - id: helpers
    resource: src/Helpers/ftdi.php
    title: Helper delegation to Ftdi\\FTDI
---

# Rule

Match peer bindings packages where applicable, with this package’s **direct** call path:[^agents][^readme]

1. Global helpers use libftdi-style / C-ish names (`ftdi_usb_open`, `ftdi_read_data`, …).[^helpers]
2. Helpers call `Ftdi\FTDI` static methods **directly** — there is no `Microscrap\Bindings\FTDI\*` wrapper class (unlike open-gl’s `GL.php`).[^helpers][^readme]
3. Extension DTOs (`FTDIContext`, `FTDIEeprom`, …) pass through unchanged — do not invent parallel DataObjects.[^readme]
4. Optional VID/PID tokens live in backed enums — see [Enums for VID/PID](enums-vid-pid.md).
5. Prefer `is_null($var)` over `$var === null`.[^agents]
6. No class-level constants in `src/` — use backed enums.[^agents]
7. No ServiceProvider / Chassis / Core / Fabricate wiring in this package.[^readme][^agents]
8. Tests are minimal stubs today — do **not** invent a CoverageDrift suite unless Angel asks (open-gl has one; this package does not).[^agents]

# Architecture link

Full call-stack diagram: [Helpers → FTDI → ext](../architecture/helpers-ftdi-ext.md).

[^agents]: Agent wrap rules
[^readme]: Package README wrap description
[^helpers]: Helper delegation to Ftdi\\FTDI
