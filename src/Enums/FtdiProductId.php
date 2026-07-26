<?php

namespace Microscrap\Bindings\FTDI\Enums;

/**
 * USB product IDs for FTDI devices ({@link FtdiVendorId::FTDI}).
 *
 * @see https://ftdichip.com/
 */
enum FtdiProductId: int
{
    case FT232R = 0x6001;
    case FT2232H = 0x6010;
    case FT4232H = 0x6011;
    case FT232H = 0x6014;
    case FT230X = 0x6015;
    case FT4232HP = 0x6043;
    case FT4232HA = 0x6048;
}
