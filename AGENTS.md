# AGENTS.md — microscrap/ftdi

**Always read `.okf/index.md` first** before changing this package. Open only the concepts needed for the task; prefer `status: stable` when present. When you learn a durable package fact, update `.okf/` and append `.okf/log.md`.

## Role

Bindings-only Composer package over **ext-ftdi** (`php-io-extensions/ftdi` ^0.7.0). Global helpers + VID/PID enums. No GFX, no ServiceProvider, no Chassis/Core/Fabricate wiring.

## Rules

* Helpers call `Ftdi\FTDI` static methods **1:1** — there is **no** intermediate package wrapper class (unlike `microscrap/open-gl`’s `GL.php`).
* Keep helper coverage aligned with the extension surface documented in README; do not invent APIs.
* VID/PID tokens live in `src/Enums/*` as int-backed enums with **FULLY UPPERCASE** cases.
* Prefer `is_null($var)` over `$var === null`.
* No class-level constants; no ServiceProvider / Chassis discovery in this package.
* Extension DTOs (`FTDIContext`, `FTDIEeprom`, …) are public API — do not invent parallel DataObjects.
* Tests are minimal stubs — do not invent a CoverageDrift suite unless explicitly requested.
* Suggested peers only: `microscrap/mpsse`, `scrapyard-io/gpio-framework` — do not pull their APIs into this package.

## Quick OKF map

| Need | Concept |
|------|---------|
| Identity / scope | `.okf/orientation/package.md` |
| Docs site | `.okf/orientation/ecosystem-docs.md` |
| Call stack | `.okf/architecture/helpers-ftdi-ext.md` |
| Wrap rules | `.okf/conventions/one-to-one-extension-wrap.md` |
| Enums | `.okf/conventions/enums-vid-pid.md` |
| USB / ftdi_sio | `.okf/traps/usb-permissions-ftdi-sio.md` |
| Helper clash | `.okf/traps/function-exists-load-order.md` |
| EEPROM danger | `.okf/traps/eeprom-write-destructive.md` |
