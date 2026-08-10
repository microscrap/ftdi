---
type: Trap
title: "EEPROM write is destructive"
description: "ftdi_write_eeprom / erase helpers can permanently change or brick device identity — treat as expert-only."
resource: src/Helpers/ftdi.php
tags: [trap, eeprom, ftdi, destructive]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-10T21:23:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: EEPROM helpers listed in API table
  - id: helpers
    resource: src/Helpers/ftdi.php
    title: write/erase EEPROM helpers
---

# Symptom

After calling EEPROM write/erase helpers, the device no longer enumerates with the expected VID/PID, serial, or strings — or becomes unusable until recovered with vendor tools.

# Cause

Helpers such as `ftdi_write_eeprom`, `ftdi_write_eeprom_location`, and `ftdi_erase_eeprom` pass through to **ext-ftdi** / libftdi and can permanently mutate on-device EEPROM.[^helpers][^readme]

`set_ft232h_cbus` and related EEPROM build/decode helpers prepare or inspect EEPROM data; combining them with write paths is still destructive if committed to the chip.[^helpers]

This package does **not** add safety rails, confirmations, or dry-run modes — bindings only.[^readme]

# Mitigation

- Default to **read / decode** (`ftdi_read_eeprom`, `ftdi_eeprom_decode`, getters) unless Angel explicitly needs a write.
- Backup EEPROM buffers before any write path.
- Never invent “helpful” auto-write flows in agents or demos.
- Prefer higher packages for product-level configuration only when they document safe procedures.

# Related

* [Helpers → FTDI → ext](../architecture/helpers-ftdi-ext.md)
* [Package (0.7)](../orientation/package.md)

[^readme]: EEPROM helpers listed in API table
[^helpers]: write/erase EEPROM helpers
