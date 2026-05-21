<?php

use Ftdi\FTDI;
use Ftdi\FTDIContext;
use Ftdi\FTDIEeprom;
use Ftdi\FTDITransferControl;
use Ftdi\FTDIVersionInfo;

if(!function_exists('ftdi_init'))
{
    function ftdi_init(FTDIContext $ftdi): int
    {
        return FTDI::ftdiInit($ftdi);
    }
}

if(!function_exists('ftdi_new'))
{
    function ftdi_new(): FTDIContext
    {
        return FTDI::ftdiNew();
    }
}

if(!function_exists('ftdi_set_interface'))
{
    function ftdi_set_interface(FTDIContext $ftdi, int $iface): int
    {
        return FTDI::ftdiSetInterface($ftdi, $iface);
    }
}

if(!function_exists('ftdi_deinit'))
{
    function ftdi_deinit(FTDIContext $ftdi): void
    {
        FTDI::ftdiDeinit($ftdi);
    }
}

if(!function_exists('ftdi_free'))
{
    function ftdi_free(FTDIContext $ftdi): void
    {
        FTDI::ftdiFree($ftdi);
    }
}

if(!function_exists('ftdi_set_usb_dev'))
{
    function ftdi_set_usb_dev(FTDIContext $ftdi, int $usbDevHandle): void
    {
        FTDI::ftdiSetUSBDev($ftdi, $usbDevHandle);
    }
}

if(!function_exists('ftdi_get_library_version'))
{
    function ftdi_get_library_version(): FTDIVersionInfo
    {
        return FTDI::ftdiGetLibraryVersion();
    }
}

if(!function_exists('ftdi_usb_find_all'))
{
    function ftdi_usb_find_all(FTDIContext $ftdi, int $vendor, int $product): array
    {
        return FTDI::ftdiUSBFindAll($ftdi, $vendor, $product);
    }
}

if(!function_exists('ftdi_list_free'))
{
    function ftdi_list_free(int $listHandle): void
    {
        FTDI::ftdiListFree($listHandle);
    }
}

if(!function_exists('ftdi_list_free2'))
{
    function ftdi_list_free2(int $listHandle): void
    {
        FTDI::ftdiListFree2($listHandle);
    }
}

if(!function_exists('ftdi_usb_get_strings'))
{
    function ftdi_usb_get_strings(FTDIContext $ftdi, int $devHandle): array
    {
        return FTDI::ftdiUSBGetStrings($ftdi, $devHandle);
    }
}

if(!function_exists('ftdi_usb_get_strings2'))
{
    function ftdi_usb_get_strings2(FTDIContext $ftdi, int $devHandle): array
    {
        return FTDI::ftdiUSBGetStrings2($ftdi, $devHandle);
    }
}

if(!function_exists('ftdi_usb_open_dev'))
{
    function ftdi_usb_open_dev(FTDIContext $ftdi, int $devHandle): int
    {
        return FTDI::ftdiUSBOpenDev($ftdi, $devHandle);
    }
}

if(!function_exists('ftdi_usb_open'))
{
    function ftdi_usb_open(FTDIContext $ftdi, int $vendor, int $product): int
    {
        return FTDI::ftdiUSBOpen($ftdi, $vendor, $product);
    }
}

if(!function_exists('ftdi_usb_open_desc'))
{
    function ftdi_usb_open_desc(FTDIContext $ftdi, int $vendor, int $product, string $description, string $serial): int
    {
        return FTDI::ftdiUSBOpenDesc($ftdi, $vendor, $product, $description, $serial);
    }
}

if(!function_exists('ftdi_usb_open_desc_index'))
{
    function ftdi_usb_open_desc_index(FTDIContext $ftdi, int $vendor, int $product, string $description, string $serial, int $index): int
    {
        return FTDI::ftdiUSBOpenDescIndex($ftdi, $vendor, $product, $description, $serial, $index);
    }
}

if(!function_exists('ftdi_usb_open_bus_addr'))
{
    function ftdi_usb_open_bus_addr(FTDIContext $ftdi, int $bus, int $addr): int
    {
        return FTDI::ftdiUSBOpenBusAddr($ftdi, $bus, $addr);
    }
}

if(!function_exists('ftdi_usb_open_string'))
{
    function ftdi_usb_open_string(FTDIContext $ftdi, string $description): int
    {
        return FTDI::ftdiUSBOpenString($ftdi, $description);
    }
}

if(!function_exists('ftdi_usb_close'))
{
    function ftdi_usb_close(FTDIContext $ftdi): int
    {
        return FTDI::ftdiUSBClose($ftdi);
    }
}

if(!function_exists('ftdi_usb_reset'))
{
    function ftdi_usb_reset(FTDIContext $ftdi): int
    {
        return FTDI::ftdiUSBReset($ftdi);
    }
}

if(!function_exists('ftdi_tci_flush'))
{
    function ftdi_tci_flush(FTDIContext $ftdi): int
    {
        return FTDI::ftdiTCIFlush($ftdi);
    }
}

if(!function_exists('ftdi_usb_purge_rx_buffer'))
{
    function ftdi_usb_purge_rx_buffer(FTDIContext $ftdi): int
    {
        return FTDI::ftdiUSBPurgeRXBuffer($ftdi);
    }
}

if(!function_exists('ftdi_tco_flush'))
{
    function ftdi_tco_flush(FTDIContext $ftdi): int
    {
        return FTDI::ftdiTCOFlush($ftdi);
    }
}

if(!function_exists('ftdi_usb_purge_tx_buffer'))
{
    function ftdi_usb_purge_tx_buffer(FTDIContext $ftdi): int
    {
        return FTDI::ftdiUSBPurgeTXBuffer($ftdi);
    }
}

if(!function_exists('ftdi_tcio_flush'))
{
    function ftdi_tcio_flush(FTDIContext $ftdi): int
    {
        return FTDI::ftdiTCIOFlush($ftdi);
    }
}

if(!function_exists('ftdi_usb_purge_buffers'))
{
    function ftdi_usb_purge_buffers(FTDIContext $ftdi): int
    {
        return FTDI::ftdiUSBPurgeBuffers($ftdi);
    }
}

if(!function_exists('ftdi_convert_baudrate_ut_export'))
{
    function ftdi_convert_baudrate_ut_export(int $baudrate, FTDIContext $ftdi): array
    {
        return FTDI::ftdiConvertBaudrateUTExport($baudrate, $ftdi);
    }
}

if(!function_exists('ftdi_set_baudrate'))
{
    function ftdi_set_baudrate(FTDIContext $ftdi, int $baudrate): int
    {
        return FTDI::ftdiSetBaudrate($ftdi, $baudrate);
    }
}

if(!function_exists('ftdi_set_line_property'))
{
    function ftdi_set_line_property(FTDIContext $ftdi, int $bits, int $sbit, int $parity): int
    {
        return FTDI::ftdiSetLineProperty($ftdi, $bits, $sbit, $parity);
    }
}

if(!function_exists('ftdi_set_line_property2'))
{
    function ftdi_set_line_property2(FTDIContext $ftdi, int $bits, int $sbit, int $parity, int $breakType): int
    {
        return FTDI::ftdiSetLineProperty2($ftdi, $bits, $sbit, $parity, $breakType);
    }
}

if(!function_exists('ftdi_write_data'))
{
    function ftdi_write_data(FTDIContext $ftdi, string $data, int $size): int
    {
        return FTDI::ftdiWriteData($ftdi, $data, $size);
    }
}

if(!function_exists('ftdi_write_data_submit'))
{
    function ftdi_write_data_submit(FTDIContext $ftdi, string $data, int $size): FTDITransferControl
    {
        return FTDI::ftdiWriteDataSubmit($ftdi, $data, $size);
    }
}

if(!function_exists('ftdi_read_data_submit'))
{
    function ftdi_read_data_submit(FTDIContext $ftdi, int $size): FTDITransferControl
    {
        return FTDI::ftdiReadDataSubmit($ftdi, $size);
    }
}

if(!function_exists('ftdi_transfer_data_done'))
{
    function ftdi_transfer_data_done(FTDITransferControl $tc): int
    {
        return FTDI::ftdiTransferDataDone($tc);
    }
}

if(!function_exists('ftdi_transfer_data_cancel'))
{
    function ftdi_transfer_data_cancel(FTDITransferControl $tc): void
    {
        FTDI::ftdiTransferDataCancel($tc);
    }
}

if(!function_exists('ftdi_write_data_set_chunksize'))
{
    function ftdi_write_data_set_chunksize(FTDIContext $ftdi, int $chunksize): int
    {
        return FTDI::ftdiWriteDataSetChunksize($ftdi, $chunksize);
    }
}

if(!function_exists('ftdi_write_data_get_chunksize'))
{
    function ftdi_write_data_get_chunksize(FTDIContext $ftdi): int
    {
        return FTDI::ftdiWriteDataGetChunksize($ftdi);
    }
}

if(!function_exists('ftdi_read_data'))
{
    function ftdi_read_data(FTDIContext $ftdi, int $size): string
    {
        return FTDI::ftdiReadData($ftdi, $size);
    }
}

if(!function_exists('ftdi_read_data_set_chunksize'))
{
    function ftdi_read_data_set_chunksize(FTDIContext $ftdi, int $chunksize): int
    {
        return FTDI::ftdiReadDataSetChunksize($ftdi, $chunksize);
    }
}

if(!function_exists('ftdi_read_data_get_chunksize'))
{
    function ftdi_read_data_get_chunksize(FTDIContext $ftdi): int
    {
        return FTDI::ftdiReadDataGetChunksize($ftdi);
    }
}

if(!function_exists('ftdi_set_bitmode'))
{
    function ftdi_set_bitmode(FTDIContext $ftdi, int $bitmask, int $mode): int
    {
        return FTDI::ftdiSetBitmode($ftdi, $bitmask, $mode);
    }
}

if(!function_exists('ftdi_disable_bitbang'))
{
    function ftdi_disable_bitbang(FTDIContext $ftdi): int
    {
        return FTDI::ftdiDisableBitbang($ftdi);
    }
}

if(!function_exists('ftdi_read_pins'))
{
    function ftdi_read_pins(FTDIContext $ftdi): int
    {
        return FTDI::ftdiReadPins($ftdi);
    }
}

if(!function_exists('ftdi_set_latency_timer'))
{
    function ftdi_set_latency_timer(FTDIContext $ftdi, int $latency): int
    {
        return FTDI::ftdiSetLatencyTimer($ftdi, $latency);
    }
}

if(!function_exists('ftdi_set_timeouts'))
{
    function ftdi_set_timeouts(FTDIContext $ftdi, int $readTimeout, int $writeTimeout): void
    {
        FTDI::ftdiSetTimeouts($ftdi, $readTimeout, $writeTimeout);
    }
}

if(!function_exists('ftdi_get_latency_timer'))
{
    function ftdi_get_latency_timer(FTDIContext $ftdi): int
    {
        return FTDI::ftdiGetLatencyTimer($ftdi);
    }
}

if(!function_exists('ftdi_poll_modem_status'))
{
    function ftdi_poll_modem_status(FTDIContext $ftdi): int
    {
        return FTDI::ftdiPollModemStatus($ftdi);
    }
}

if(!function_exists('ftdi_setflowctrl'))
{
    function ftdi_setflowctrl(FTDIContext $ftdi, int $flowctrl): int
    {
        return FTDI::ftdiSetFlowCtrl($ftdi, $flowctrl);
    }
}

if(!function_exists('ftdi_setflowctrl_xonxoff'))
{
    function ftdi_setflowctrl_xonxoff(FTDIContext $ftdi, int $xon, int $xoff): int
    {
        return FTDI::ftdiSetFlowCtrlXonXoff($ftdi, $xon, $xoff);
    }
}

if(!function_exists('ftdi_setdtr'))
{
    function ftdi_setdtr(FTDIContext $ftdi, int $state): int
    {
        return FTDI::ftdiSetDtr($ftdi, $state);
    }
}

if(!function_exists('ftdi_setrts'))
{
    function ftdi_setrts(FTDIContext $ftdi, int $state): int
    {
        return FTDI::ftdiSetRts($ftdi, $state);
    }
}

if(!function_exists('ftdi_setdtr_rts'))
{
    function ftdi_setdtr_rts(FTDIContext $ftdi, int $dtr, int $rts): int
    {
        return FTDI::ftdiSetDtrRts($ftdi, $dtr, $rts);
    }
}

if(!function_exists('ftdi_set_event_char'))
{
    function ftdi_set_event_char(FTDIContext $ftdi, int $eventch, int $enable): int
    {
        return FTDI::ftdiSetEventChar($ftdi, $eventch, $enable);
    }
}

if(!function_exists('ftdi_set_error_char'))
{
    function ftdi_set_error_char(FTDIContext $ftdi, int $errorch, int $enable): int
    {
        return FTDI::ftdiSetErrorChar($ftdi, $errorch, $enable);
    }
}

if(!function_exists('ftdi_get_eeprom'))
{
    function ftdi_get_eeprom(FTDIContext $ftdi): FTDIEeprom
    {
        return FTDI::ftdiGetEeprom($ftdi);
    }
}

if(!function_exists('ftdi_eeprom_initdefaults'))
{
    function ftdi_eeprom_initdefaults(FTDIContext $ftdi, string $manufacturer, string $product, string $serial): int
    {
        return FTDI::ftdiEepromInitDefaults($ftdi, $manufacturer, $product, $serial);
    }
}

if(!function_exists('ftdi_eeprom_set_strings'))
{
    function ftdi_eeprom_set_strings(FTDIContext $ftdi, string $manufacturer, string $product, string $serial): int
    {
        return FTDI::ftdiEepromSetStrings($ftdi, $manufacturer, $product, $serial);
    }
}

if(!function_exists('ftdi_eeprom_get_strings'))
{
    function ftdi_eeprom_get_strings(FTDIContext $ftdi): array
    {
        return FTDI::ftdiEepromGetStrings($ftdi);
    }
}

if(!function_exists('set_ft232h_cbus'))
{
    function set_ft232h_cbus(FTDIEeprom $eeprom): string
    {
        return FTDI::setFT232HCbus($eeprom);
    }
}

if(!function_exists('ftdi_eeprom_build'))
{
    function ftdi_eeprom_build(FTDIContext $ftdi): int
    {
        return FTDI::ftdiEepromBuild($ftdi);
    }
}

if(!function_exists('ftdi_eeprom_decode'))
{
    function ftdi_eeprom_decode(FTDIContext $ftdi, int $verbose): int
    {
        return FTDI::ftdiEepromDecode($ftdi, $verbose);
    }
}

if(!function_exists('ftdi_get_eeprom_value'))
{
    function ftdi_get_eeprom_value(FTDIContext $ftdi, int $valueName): int
    {
        return FTDI::ftdiGetEepromValue($ftdi, $valueName);
    }
}

if(!function_exists('ftdi_set_eeprom_value'))
{
    function ftdi_set_eeprom_value(FTDIContext $ftdi, int $valueName, int $value): int
    {
        return FTDI::ftdiSetEepromValue($ftdi, $valueName, $value);
    }
}

if(!function_exists('ftdi_get_eeprom_buf'))
{
    function ftdi_get_eeprom_buf(FTDIContext $ftdi, int $size): string
    {
        return FTDI::ftdiGetEepromBuf($ftdi, $size);
    }
}

if(!function_exists('ftdi_set_eeprom_buf'))
{
    function ftdi_set_eeprom_buf(FTDIContext $ftdi, string $buf): int
    {
        return FTDI::ftdiSetEepromBuf($ftdi, $buf);
    }
}

if(!function_exists('ftdi_set_eeprom_user_data'))
{
    function ftdi_set_eeprom_user_data(FTDIContext $ftdi, string $buf): int
    {
        return FTDI::ftdiSetEepromUserData($ftdi, $buf);
    }
}

if(!function_exists('ftdi_read_eeprom_location'))
{
    function ftdi_read_eeprom_location(FTDIContext $ftdi, int $addr): int
    {
        return FTDI::ftdiReadEepromLocation($ftdi, $addr);
    }
}

if(!function_exists('ftdi_read_eeprom'))
{
    function ftdi_read_eeprom(FTDIContext $ftdi): int
    {
        return FTDI::ftdiReadEeprom($ftdi);
    }
}

if(!function_exists('ftdi_read_chip_id'))
{
    function ftdi_read_chip_id(FTDIContext $ftdi, ?int &$chip_id): int
    {
        $r = FTDI::ftdiReadChipId($ftdi);
        $chip_id = $r['chipid'];
        return $r['result'];
    }
}

if(!function_exists('ftdi_write_eeprom_location'))
{
    function ftdi_write_eeprom_location(FTDIContext $ftdi, int $addr, int $val): int
    {
        return FTDI::ftdiWriteEepromLocation($ftdi, $addr, $val);
    }
}

if(!function_exists('ftdi_write_eeprom'))
{
    function ftdi_write_eeprom(FTDIContext $ftdi): int
    {
        return FTDI::ftdiWriteEeprom($ftdi);
    }
}

if(!function_exists('ftdi_erase_eeprom'))
{
    function ftdi_erase_eeprom(FTDIContext $ftdi): int
    {
        return FTDI::ftdiEraseEeprom($ftdi);
    }
}

if(!function_exists('ftdi_get_error_string'))
{
    function ftdi_get_error_string(FTDIContext $ftdi): string
    {
        return FTDI::ftdiGetErrorString($ftdi);
    }
}
