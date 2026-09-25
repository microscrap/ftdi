## 2026-09-23
* **Update**: 0.9.0 line over ext-ftdi 0.9.0. New helpers `ftdi_get_pollfds`, `ftdi_pollfds_handle_timeouts`, `ftdi_get_next_timeout`, `ftdi_handle_events_timeout`, `ftdi_transfer_completed`, `ftdi_transfer_read_done`. Note: after `ftdi_transfer_data_done` / `ftdi_transfer_read_done` / `ftdi_transfer_data_cancel` the control's `handle` and `bufHandle` are `0`; the extension frees the buffer. Pest added as require-dev with one signature test.

## 2026-09-14
* **Update**: relabeled 0.7.0 → 0.8.0 with `ext-posi` / `ext-ftdi` 0.8.0. No code change.

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
