---
type: Architecture
title: "Helpers → FTDI → ext"
description: "Global helpers call Ftdi\\FTDI static methods 1:1 — no package intermediate wrapper class."
resource: src/Helpers/ftdi.php
tags: [architecture, bindings, ftdi, helpers]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-10T21:23:00Z" }
status: draft
sources:
  - id: helpers
    resource: src/Helpers/ftdi.php
    title: Helper file with function_exists guards
  - id: composer
    resource: composer.json
    title: Autoload files list for helpers
  - id: readme
    resource: README.md
    title: Helpers delegate to Ftdi\\FTDI
  - id: agents
    resource: AGENTS.md
    title: Agent wrap rules
---

# Call stack

Unlike `microscrap/open-gl` (helpers → `GL` → extension), this package has **no** intermediate wrapper class:[^readme][^helpers]

```
app / tests
    │
    └─ ftdi_usb_open(...)     # global helpers (libftdi-style names)
            └─► Ftdi\FTDI::ftdiUSBOpen(...)   # extension static API
                    └─► ext-ftdi / libftdi1
```

Rules:[^agents][^readme]

1. Helpers call `Ftdi\FTDI` static methods only.
2. There is **no** `Microscrap\Bindings\FTDI\FTDI` (or similar) wrapper in this package.
3. Do not invent a package wrapper to “match open-gl” unless Angel explicitly asks.

# Name mapping (illustrative)

| Helper | Extension static |
|--------|------------------|
| `ftdi_new()` | `FTDI::ftdiNew()` |
| `ftdi_usb_open($ctx, $vid, $pid)` | `FTDI::ftdiUSBOpen(...)` |
| `ftdi_read_data($ctx, $size)` | `FTDI::ftdiReadData(...)` |
| `set_ft232h_cbus($eeprom)` | `FTDI::setFT232HCbus(...)` (CBUS helper; non-`ftdi_` prefix) |
| `ftdi_get_pollfds($ctx)` | `FTDI::ftdiGetPollfds(...)` |
| `ftdi_pollfds_handle_timeouts($ctx)` | `FTDI::ftdiPollfdsHandleTimeouts(...)` |
| `ftdi_get_next_timeout($ctx)` | `FTDI::ftdiGetNextTimeout(...)` |
| `ftdi_handle_events_timeout($ctx, $timeout_us)` | `FTDI::ftdiHandleEventsTimeout(...)` |
| `ftdi_transfer_completed($tc)` | `FTDI::ftdiTransferCompleted(...)` |
| `ftdi_transfer_read_done($tc)` | `FTDI::ftdiTransferReadDone(...)` |

Helper names follow libftdi / C-ish snake_case; extension methods use the extension’s camelCase surface.[^helpers]

# Event pump (0.9.0)

Six 1:1 wrappers over the ext-ftdi libusb event-pump bindings:

| Helper | Signature |
|--------|-----------|
| `ftdi_get_pollfds` | `ftdi_get_pollfds(FTDIContext $ftdi): array` |
| `ftdi_pollfds_handle_timeouts` | `ftdi_pollfds_handle_timeouts(FTDIContext $ftdi): int` |
| `ftdi_get_next_timeout` | `ftdi_get_next_timeout(FTDIContext $ftdi): array` |
| `ftdi_handle_events_timeout` | `ftdi_handle_events_timeout(FTDIContext $ftdi, int $timeout_us): int` |
| `ftdi_transfer_completed` | `ftdi_transfer_completed(FTDITransferControl $tc): int` |
| `ftdi_transfer_read_done` | `ftdi_transfer_read_done(FTDITransferControl $tc): string\|false` |

After `ftdi_transfer_data_done` / `ftdi_transfer_read_done` / `ftdi_transfer_data_cancel` the control's `handle` and `bufHandle` are `0`; the extension frees the buffer. Do not call a terminal method twice on the same control.

# Autoload

Composer `autoload.files` registers a single helper module:[^composer]

- `src/Helpers/ftdi.php`

Each function is wrapped in `if (! function_exists(...))` so a prior definition wins.[^helpers]

# Objects and errors

- Context and related types remain extension DTOs (`FTDIContext`, `FTDIEeprom`, `FTDITransferControl`, `FTDIVersionInfo`) — passed through, not re-wrapped as package DataObjects.[^readme]
- C-style errors: helpers return extension return codes / strings; use `ftdi_get_error_string($ctx)`. No ServiceProvider-thrown framework exceptions from this package.[^readme]

# Related

* [1:1 extension wrap](../conventions/one-to-one-extension-wrap.md)
* [Enums for VID/PID](../conventions/enums-vid-pid.md)
* [`function_exists` load order](../traps/function-exists-load-order.md)

[^helpers]: Helper file with function_exists guards
[^composer]: Autoload files list for helpers
[^readme]: Helpers delegate to Ftdi\\FTDI
[^agents]: Agent wrap rules
