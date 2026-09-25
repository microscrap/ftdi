<?php

declare(strict_types=1);

use Ftdi\FTDIContext;
use Ftdi\FTDITransferControl;

$expected = [
    'ftdi_get_pollfds'             => [[FTDIContext::class], 'array'],
    'ftdi_pollfds_handle_timeouts' => [[FTDIContext::class], 'int'],
    'ftdi_get_next_timeout'        => [[FTDIContext::class], 'array'],
    'ftdi_handle_events_timeout'   => [[FTDIContext::class, 'int'], 'int'],
    'ftdi_transfer_completed'      => [[FTDITransferControl::class], 'int'],
    'ftdi_transfer_read_done'      => [[FTDITransferControl::class], 'string|false'],
];

it('defines the event-pump helpers with 1:1 signatures', function () use ($expected) {
    foreach ($expected as $name => [$params, $return]) {
        expect(function_exists($name))->toBeTrue($name);
        $fn = new ReflectionFunction($name);
        expect(array_map(fn ($p) => (string) $p->getType(), $fn->getParameters()))->toBe($params, $name);
        expect((string) $fn->getReturnType())->toBe($return, $name);
    }
});
