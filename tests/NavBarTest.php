<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\Nav;
use bestyii\tabler\NavBar;

class NavBarTest extends TestCase
{
    public function testNavBarRendersBrandToggleAndCollapseContainer(): void
    {
        ob_start();
        NavBar::begin([
            'brandLabel' => 'BestYii',
            'brandUrl' => '/',
        ]);
        echo Nav::widget([
            'items' => [
                [
                    'label' => 'Dashboard',
                    'url' => ['/site/index'],
                ],
            ],
        ]);
        NavBar::end();
        $html = (string) ob_get_clean();

        $this->assertStringContainsString('navbar-brand', $html);
        $this->assertStringContainsString('navbar-toggler', $html);
        $this->assertStringContainsString('navbar-collapse', $html);
        $this->assertStringContainsString('Dashboard', $html);
    }
}
