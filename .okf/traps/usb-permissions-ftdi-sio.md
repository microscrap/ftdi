---
type: Trap
title: "USB permissions / ftdi_sio"
description: "Linux ftdi_sio / missing udev rules commonly block ftdi_usb_open even when ext-ftdi is loaded."
resource: src/Helpers/ftdi.php
tags: [trap, usb, linux, ftdi, permissions]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-10T21:23:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: Requirements and open usage
  - id: helpers
    resource: src/Helpers/ftdi.php
    title: ftdi_usb_open and error string helpers
  - id: composer
    resource: composer.json
    title: Requires ext-ftdi only
---

# Symptom

`ftdi_usb_open` (or related open helpers) fails even though `php -m | grep ftdi` shows the extension and the device is plugged in. `ftdi_get_error_string` may report access, busy, or driver-related failures.[^readme][^helpers]

# Cause

On Linux, the in-kernel `ftdi_sio` serial driver often claims FTDI devices first. Without a detach / blacklist / udev rule, userspace libftdi (via **ext-ftdi**) cannot open the device. Separately, insufficient USB permissions (no udev `MODE`/`GROUP` for the VID/PID) produce permission denials.[^readme]

This package only wraps the extension — it does not install udev rules or unload kernel modules.[^composer]

# Mitigation

- Confirm **ext-ftdi** and host libftdi are installed (see README OS packages).[^readme]
- On Linux: ensure the device is available to libusb/libftdi (unbind `ftdi_sio` / appropriate udev rules for `0x0403` products as needed).
- Check return codes and `ftdi_get_error_string($ctx)` after open attempts.[^helpers]
- Higher-level adapters may live in `scrapyard-io/gpio-framework` — still expect host USB setup to be correct.

# Related

* [Helpers → FTDI → ext](../architecture/helpers-ftdi-ext.md)
* [Package (0.7)](../orientation/package.md)

[^readme]: Requirements and open usage
[^helpers]: ftdi_usb_open and error string helpers
[^composer]: Requires ext-ftdi only
