---
okf_version: "0.2"
---

# microscrap/ftdi Knowledge Bundle

Package knowledge for `microscrap/ftdi` (libFTDI PHP helpers over **ext-ftdi**, v0.7.0).
Read this index first; open only the concepts needed for the task.

**Trust rule:** Prefer `status: stable`. Treat `deprecated` as historical only. New agent-written concepts stay `status: draft` until a human verifies them.
**Placement:** This bundle lives at the **package root** only — never under `src/`.
**Links:** Concept cross-links use paths relative to each file.
**Scope:** Document the bindings-only helpers package. Do **not** invent ServiceProviders, GFX, MPSSE protocol layers, or Fabricate remaps here — those belong in peers (`microscrap/mpsse`, `scrapyard-io/gpio-framework`, tubes).
**Dist note:** `.okf/` and root `AGENTS.md` are `export-ignore` in `.gitattributes` so Composer dist packages do not ship this bundle.

# Orientation

* [Package (0.7)](orientation/package.md) - Composer identity, namespace, helpers over ext-ftdi.
* [Ecosystem docs](orientation/ecosystem-docs.md) - Published 0.7.x overview and docs site entrypoint.

# Architecture

* [Helpers → FTDI → ext](architecture/helpers-ftdi-ext.md) - Call stack: global helpers call `Ftdi\FTDI` 1:1 (no intermediate wrapper).

# Conventions

* [1:1 extension wrap](conventions/one-to-one-extension-wrap.md) - Helpers → `Ftdi\FTDI`; DTO passthrough; no package wrapper class.
* [Enums for VID/PID](conventions/enums-vid-pid.md) - Int-backed enums; FULLY UPPERCASE cases; no class constants.

# Traps

* [USB permissions / ftdi_sio](traps/usb-permissions-ftdi-sio.md) - Kernel driver and udev conflicts block opens.
* [`function_exists` load order](traps/function-exists-load-order.md) - Autoload order; first definition wins.
* [EEPROM write is destructive](traps/eeprom-write-destructive.md) - Write/erase can brick or re-VID devices.

# Log

* [Directory update log](log.md)
