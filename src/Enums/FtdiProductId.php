<?php

namespace Microscrap\Bindings\FTDI\Enums;

/**
 * USB product IDs for FTDI devices ({@link FtdiVendorId::FTDI}).
 *
 * @see https://ftdichip.com/
 */
enum FtdiProductId: int
{
    case FT2232 = 0x6010;

    case FT4232 = 0x6011;

    case FT232H = 0x6014;

    case BusBlasterV2ChannelA = 0x8878;

    case BusBlasterV2ChannelB = 0x8879;

    case TurtelizerJtagRs232AdapterA = 0xBDC8;

    case AmontecJtagKey = 0xCFF8;

    case TiaoMultiProtocolAdapter = 0x8A98;
}
