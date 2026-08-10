---
type: Trap
title: "`function_exists` load order"
description: "Helpers skip definition when the name exists; first autoloaded definition wins."
resource: src/Helpers/ftdi.php
tags: [trap, autoload, helpers, ftdi]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-10T21:23:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: README note on function_exists guards
  - id: helpers
    resource: src/Helpers/ftdi.php
    title: function_exists guard pattern
  - id: composer
    resource: composer.json
    title: Autoload files entry
---

# Symptom

A `ftdi_*` (or `set_ft232h_cbus`) call behaves unlike this package’s wrap — or a redefinition / “missing helper” confusion appears when multiple packages define the same global name.

# Cause

Every helper is defined only when the name is free:[^helpers][^readme]

```php
if (! function_exists('ftdi_usb_open')) {
    function ftdi_usb_open(...): int
    {
        return FTDI::ftdiUSBOpen(...);
    }
}
```

Under the guard, **whichever package’s autoload files run first keeps the definition**. Composer `autoload.files` order depends on require graph / install order.[^composer]

# Mitigation

- Treat this package as the **canonical** `ftdi_*` helper source when present.[^readme]
- Avoid defining overlapping global `ftdi_*` helpers in application code or peer packages.
- Prefer calling `Ftdi\FTDI::*` directly when you must avoid global-name collisions entirely (same underlying API).[^helpers]

# Related

* [Helpers → FTDI → ext](../architecture/helpers-ftdi-ext.md)
* [1:1 extension wrap](../conventions/one-to-one-extension-wrap.md)

[^readme]: README note on function_exists guards
[^helpers]: function_exists guard pattern
[^composer]: Autoload files entry
