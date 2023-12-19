<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;
use ApprovalTests\Approvals;
use function ECSPrefix202306\dd;

/**
 * This unit test uses [Approvals](https://github.com/approvals/ApprovalTests.php).
 */
class DifferentItemsListTest extends TestCase
{
    public function testSevenDays(): void
    {
        ob_start();

        $argv = ["", "8"];
        include(__DIR__ . '/../fixtures/texttest_fixture.php');

        $output = ob_get_clean();

        Approvals::verifyString($output);
    }

    public function testOneDay(): void
    {
        ob_start();

        $argv = ["", "2"];
        include(__DIR__ . '/../fixtures/texttest_fixture.php');

        $output = ob_get_clean();

        Approvals::verifyString($output);
    }
}
