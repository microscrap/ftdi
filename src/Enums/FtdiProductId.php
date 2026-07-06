<?php

namespace Microscrap\Bindings\FTDI\Enums;

/**
 * USB product IDs for FTDI devices ({@link FtdiVendorId::FTDI}).
 *
 * @see https://ftdichip.com/
 */
enum FtdiProductId: int
{
    case RS232L = 0x6001;

    case FT2232HL = 0x6010;

    case FT232H = 0x6014;
}
