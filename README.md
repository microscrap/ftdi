# microscrap/ftdi — libFTDI bindings for PHP

> **Docs (production):** [ScrapyardIO · microscrap/ftdi 0.7.x](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/ftdi/0.7.x/overview)

[![Docs](https://img.shields.io/badge/docs-ScrapyardIO-0ea5e9?logo=readthedocs&logoColor=white)](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/ftdi/0.7.x/overview)
[![Packagist Version](https://img.shields.io/packagist/v/microscrap/ftdi.svg?label=packagist)](https://packagist.org/packages/microscrap/ftdi)
[![PHP Version Require](https://img.shields.io/packagist/php-v/microscrap/ftdi.svg)](https://packagist.org/packages/microscrap/ftdi)
[![License: MIT](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Requires ext-ftdi](https://img.shields.io/badge/ext--ftdi-%5E0.7-777bb4?logo=php&logoColor=white)](https://github.com/php-io-extensions/ftdi)

PHP helper library that wraps the [**ftdi**](https://github.com/php-io-extensions/ftdi) extension (`ext-ftdi`) with global functions and enums. Each helper delegates to `Ftdi\FTDI`.

This is the **bindings** package — not the native extension. Ecosystem docs: [`0.7.x`](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/ftdi/0.7.x/overview).

## Highlights

* C-ish global helper API (`ftdi_usb_open`, `ftdi_read_data`, etc.)
* Support for serial-only devices (for example FT232RL) and MPSSE-capable devices (for example FT232H)
* USB open/read/write/flush/reset operations
* EEPROM read/write/decode/build operations
* Async transfer submission and completion
* Optional VID/PID enums (`FtdiVendorId`, `FtdiProductId`) with **FULLY UPPERCASE** cases

## Requirements

* PHP `^8.4|^8.5|^8.6`
* **ext-ftdi** `^0.7.0` — install from [php-io-extensions/ftdi](https://github.com/php-io-extensions/ftdi)
* Runtime dependency of ext-ftdi:
  * Debian/Ubuntu/Raspberry Pi OS: `libftdi1-2` (dev package for builds: `libftdi1-dev`)
  * macOS: `brew install libftdi`

## Installation

Confirm **ext-ftdi** is loaded before using this package:

```bash
php -m | grep ftdi
```

Install the helper package:

```bash
composer require microscrap/ftdi:^0.7.0
```

Composer autoloads `src/Helpers/ftdi.php`, registering global helpers when installed. Helpers are only defined when a function name is not already taken (`function_exists` guard).

Suggested peers:

```bash
composer require microscrap/mpsse:^0.7.0          # MPSSE SPI/I2C/GPIO
composer require scrapyard-io/gpio-framework:^0.7 # higher adapters
```

## Usage

FTDI bindings are exposed as **global helper functions** (`ftdi_new`, `ftdi_usb_open`, etc).

Optional enums are available under:

* `Microscrap\Bindings\FTDI\Enums\FtdiVendorId`
* `Microscrap\Bindings\FTDI\Enums\FtdiProductId`

```php
<?php

use Microscrap\Bindings\FTDI\Enums\FtdiProductId;
use Microscrap\Bindings\FTDI\Enums\FtdiVendorId;

$ftdi = ftdi_new();
if ($ftdi->handle < 0) {
    throw new RuntimeException('ftdi_new failed');
}

ftdi_init($ftdi);

// FT232RL defaults: vendor 0x0403, product 0x6001
if (ftdi_usb_open($ftdi, FtdiVendorId::FTDI->value, FtdiProductId::FT232R->value) !== 0) {
    throw new RuntimeException(ftdi_get_error_string($ftdi));
}

ftdi_set_baudrate($ftdi, 115200);
ftdi_set_line_property($ftdi, 8, 1, 0); // 8N1

ftdi_write_data($ftdi, "hello\n", 6);
$response = ftdi_read_data($ftdi, 256);

ftdi_usb_close($ftdi);
ftdi_deinit($ftdi);
ftdi_free($ftdi);
```

Constants and enum values follow libftdi1 conventions. Prefer the shipped enums for VID/PID; other framing/bitmode constants come from your platform headers or higher packages (`microscrap/mpsse`).

There is **no** ServiceProvider / Chassis discovery in this package — bindings only.

---

## Global Helper API

### `ftdi_new(): Ftdi\FTDIContext`

Allocates a new libftdi1 context (`ftdi_new`). Check `$ctx->handle >= 0` before use.

### `ftdi_init(Ftdi\FTDIContext $ftdi): int`

Initialises an allocated context (`ftdi_init`). Returns `0` on success.

### `ftdi_deinit(Ftdi\FTDIContext $ftdi): void`

Deinitialises the context (`ftdi_deinit`) without freeing it.

### `ftdi_free(Ftdi\FTDIContext $ftdi): void`

Frees the context (`ftdi_free`). Do not use it afterward.

### `ftdi_usb_open(Ftdi\FTDIContext $ftdi, int $vendor, int $product): int`

Opens the first device matching vendor/product (`ftdi_usb_open`). Returns `0` on success.

### `ftdi_usb_close(Ftdi\FTDIContext $ftdi): int`

Closes the open USB connection (`ftdi_usb_close`).

### `ftdi_set_baudrate(Ftdi\FTDIContext $ftdi, int $baudrate): int`

Sets UART baud rate (`ftdi_set_baudrate`).

### `ftdi_set_line_property(Ftdi\FTDIContext $ftdi, int $bits, int $sbit, int $parity): int`

Sets line framing (`ftdi_set_line_property`).

### `ftdi_write_data(Ftdi\FTDIContext $ftdi, string $data, int $size): int`

Writes up to `$size` bytes (`ftdi_write_data`).

### `ftdi_read_data(Ftdi\FTDIContext $ftdi, int $size): string`

Reads up to `$size` bytes (`ftdi_read_data`).

### `ftdi_set_bitmode(Ftdi\FTDIContext $ftdi, int $bitmask, int $mode): int`

Enables/disables bitbang or MPSSE mode (`ftdi_set_bitmode`).

### `ftdi_get_error_string(Ftdi\FTDIContext $ftdi): string`

Returns the last libftdi1 error string (`ftdi_get_error_string`).

---

## Quick reference

| Helper | Signature |
|--------|-----------|
| `ftdi_new` | `ftdi_new(): Ftdi\FTDIContext` |
| `ftdi_init` | `ftdi_init(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_set_interface` | `ftdi_set_interface(Ftdi\FTDIContext $ftdi, int $iface): int` |
| `ftdi_deinit` | `ftdi_deinit(Ftdi\FTDIContext $ftdi): void` |
| `ftdi_free` | `ftdi_free(Ftdi\FTDIContext $ftdi): void` |
| `ftdi_set_usb_dev` | `ftdi_set_usb_dev(Ftdi\FTDIContext $ftdi, int $usbDevHandle): void` |
| `ftdi_get_library_version` | `ftdi_get_library_version(): Ftdi\FTDIVersionInfo` |
| `ftdi_usb_find_all` | `ftdi_usb_find_all(Ftdi\FTDIContext $ftdi, int $vendor, int $product): array` |
| `ftdi_list_free` | `ftdi_list_free(int $listHandle): void` |
| `ftdi_list_free2` | `ftdi_list_free2(int $listHandle): void` |
| `ftdi_usb_get_strings` | `ftdi_usb_get_strings(Ftdi\FTDIContext $ftdi, int $devHandle): array` |
| `ftdi_usb_get_strings2` | `ftdi_usb_get_strings2(Ftdi\FTDIContext $ftdi, int $devHandle): array` |
| `ftdi_usb_open_dev` | `ftdi_usb_open_dev(Ftdi\FTDIContext $ftdi, int $devHandle): int` |
| `ftdi_usb_open` | `ftdi_usb_open(Ftdi\FTDIContext $ftdi, int $vendor, int $product): int` |
| `ftdi_usb_open_desc` | `ftdi_usb_open_desc(Ftdi\FTDIContext $ftdi, int $vendor, int $product, string $description, string $serial): int` |
| `ftdi_usb_open_desc_index` | `ftdi_usb_open_desc_index(Ftdi\FTDIContext $ftdi, int $vendor, int $product, string $description, string $serial, int $index): int` |
| `ftdi_usb_open_bus_addr` | `ftdi_usb_open_bus_addr(Ftdi\FTDIContext $ftdi, int $bus, int $addr): int` |
| `ftdi_usb_open_string` | `ftdi_usb_open_string(Ftdi\FTDIContext $ftdi, string $description): int` |
| `ftdi_usb_close` | `ftdi_usb_close(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_usb_reset` | `ftdi_usb_reset(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_tci_flush` | `ftdi_tci_flush(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_tco_flush` | `ftdi_tco_flush(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_tcio_flush` | `ftdi_tcio_flush(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_usb_purge_rx_buffer` | `ftdi_usb_purge_rx_buffer(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_usb_purge_tx_buffer` | `ftdi_usb_purge_tx_buffer(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_usb_purge_buffers` | `ftdi_usb_purge_buffers(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_convert_baudrate_ut_export` | `ftdi_convert_baudrate_ut_export(int $baudrate, Ftdi\FTDIContext $ftdi): array` |
| `ftdi_set_baudrate` | `ftdi_set_baudrate(Ftdi\FTDIContext $ftdi, int $baudrate): int` |
| `ftdi_set_line_property` | `ftdi_set_line_property(Ftdi\FTDIContext $ftdi, int $bits, int $sbit, int $parity): int` |
| `ftdi_set_line_property2` | `ftdi_set_line_property2(Ftdi\FTDIContext $ftdi, int $bits, int $sbit, int $parity, int $breakType): int` |
| `ftdi_write_data` | `ftdi_write_data(Ftdi\FTDIContext $ftdi, string $data, int $size): int` |
| `ftdi_write_data_submit` | `ftdi_write_data_submit(Ftdi\FTDIContext $ftdi, string $data, int $size): Ftdi\FTDITransferControl` |
| `ftdi_read_data_submit` | `ftdi_read_data_submit(Ftdi\FTDIContext $ftdi, int $size): Ftdi\FTDITransferControl` |
| `ftdi_transfer_data_done` | `ftdi_transfer_data_done(Ftdi\FTDITransferControl $tc): int` |
| `ftdi_transfer_data_cancel` | `ftdi_transfer_data_cancel(Ftdi\FTDITransferControl $tc): void` |
| `ftdi_write_data_set_chunksize` | `ftdi_write_data_set_chunksize(Ftdi\FTDIContext $ftdi, int $chunksize): int` |
| `ftdi_write_data_get_chunksize` | `ftdi_write_data_get_chunksize(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_read_data` | `ftdi_read_data(Ftdi\FTDIContext $ftdi, int $size): string` |
| `ftdi_read_data_set_chunksize` | `ftdi_read_data_set_chunksize(Ftdi\FTDIContext $ftdi, int $chunksize): int` |
| `ftdi_read_data_get_chunksize` | `ftdi_read_data_get_chunksize(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_set_bitmode` | `ftdi_set_bitmode(Ftdi\FTDIContext $ftdi, int $bitmask, int $mode): int` |
| `ftdi_disable_bitbang` | `ftdi_disable_bitbang(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_read_pins` | `ftdi_read_pins(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_set_latency_timer` | `ftdi_set_latency_timer(Ftdi\FTDIContext $ftdi, int $latency): int` |
| `ftdi_set_timeouts` | `ftdi_set_timeouts(Ftdi\FTDIContext $ftdi, int $readTimeout, int $writeTimeout): void` |
| `ftdi_get_latency_timer` | `ftdi_get_latency_timer(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_poll_modem_status` | `ftdi_poll_modem_status(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_setflowctrl` | `ftdi_setflowctrl(Ftdi\FTDIContext $ftdi, int $flowctrl): int` |
| `ftdi_setflowctrl_xonxoff` | `ftdi_setflowctrl_xonxoff(Ftdi\FTDIContext $ftdi, int $xon, int $xoff): int` |
| `ftdi_setdtr` | `ftdi_setdtr(Ftdi\FTDIContext $ftdi, int $state): int` |
| `ftdi_setrts` | `ftdi_setrts(Ftdi\FTDIContext $ftdi, int $state): int` |
| `ftdi_setdtr_rts` | `ftdi_setdtr_rts(Ftdi\FTDIContext $ftdi, int $dtr, int $rts): int` |
| `ftdi_set_event_char` | `ftdi_set_event_char(Ftdi\FTDIContext $ftdi, int $eventch, int $enable): int` |
| `ftdi_set_error_char` | `ftdi_set_error_char(Ftdi\FTDIContext $ftdi, int $errorch, int $enable): int` |
| `ftdi_get_eeprom` | `ftdi_get_eeprom(Ftdi\FTDIContext $ftdi): Ftdi\FTDIEeprom` |
| `ftdi_eeprom_initdefaults` | `ftdi_eeprom_initdefaults(Ftdi\FTDIContext $ftdi, string $manufacturer, string $product, string $serial): int` |
| `ftdi_eeprom_set_strings` | `ftdi_eeprom_set_strings(Ftdi\FTDIContext $ftdi, string $manufacturer, string $product, string $serial): int` |
| `ftdi_eeprom_get_strings` | `ftdi_eeprom_get_strings(Ftdi\FTDIContext $ftdi): array` |
| `set_ft232h_cbus` | `set_ft232h_cbus(Ftdi\FTDIEeprom $eeprom): string` |
| `ftdi_eeprom_build` | `ftdi_eeprom_build(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_eeprom_decode` | `ftdi_eeprom_decode(Ftdi\FTDIContext $ftdi, int $verbose): int` |
| `ftdi_get_eeprom_value` | `ftdi_get_eeprom_value(Ftdi\FTDIContext $ftdi, int $valueName): int` |
| `ftdi_set_eeprom_value` | `ftdi_set_eeprom_value(Ftdi\FTDIContext $ftdi, int $valueName, int $value): int` |
| `ftdi_get_eeprom_buf` | `ftdi_get_eeprom_buf(Ftdi\FTDIContext $ftdi, int $size): string` |
| `ftdi_set_eeprom_buf` | `ftdi_set_eeprom_buf(Ftdi\FTDIContext $ftdi, string $buf): int` |
| `ftdi_set_eeprom_user_data` | `ftdi_set_eeprom_user_data(Ftdi\FTDIContext $ftdi, string $buf): int` |
| `ftdi_read_eeprom_location` | `ftdi_read_eeprom_location(Ftdi\FTDIContext $ftdi, int $addr): int` |
| `ftdi_read_eeprom` | `ftdi_read_eeprom(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_read_chip_id` | `ftdi_read_chip_id(Ftdi\FTDIContext $ftdi, ?int &$chip_id): int` |
| `ftdi_write_eeprom_location` | `ftdi_write_eeprom_location(Ftdi\FTDIContext $ftdi, int $addr, int $val): int` |
| `ftdi_write_eeprom` | `ftdi_write_eeprom(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_erase_eeprom` | `ftdi_erase_eeprom(Ftdi\FTDIContext $ftdi): int` |
| `ftdi_get_error_string` | `ftdi_get_error_string(Ftdi\FTDIContext $ftdi): string` |

## License

MIT. See [LICENSE](LICENSE).
