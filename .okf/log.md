# Log

## 2026-08-10

* **Creation**: Initial OKF v0.2 bundle for `microscrap/ftdi` 0.7.0 from package sources + `okf/SPEC.md` (GoogleCloudPlatform/knowledge-catalog).
* **Creation**: [Package (0.7)](/orientation/package.md), [Ecosystem docs](/orientation/ecosystem-docs.md).
* **Creation**: [Helpers → FTDI → ext](/architecture/helpers-ftdi-ext.md) — direct helpers → `Ftdi\FTDI` (no intermediate wrapper, unlike open-gl).
* **Creation**: Conventions — [1:1 extension wrap](/conventions/one-to-one-extension-wrap.md), [Enums for VID/PID](/conventions/enums-vid-pid.md).
* **Creation**: Traps — [USB permissions / ftdi_sio](/traps/usb-permissions-ftdi-sio.md), [`function_exists` load order](/traps/function-exists-load-order.md), [EEPROM write is destructive](/traps/eeprom-write-destructive.md).
* **Creation**: Subdirectory indexes under `orientation/`, `architecture/`, `conventions/`, `traps/`; root [index.md](/index.md).
* **Creation**: Root `AGENTS.md` — read `.okf/index.md` first + quick concept map.
* Pattern mirrored from `microscrap/open-gl` OKF layout; adapted for bindings-only helpers over `ext-ftdi` (no CoverageDrift suite, no `GL.php`-style wrapper).
* All new concepts left `status: draft` pending Angel human verification.
