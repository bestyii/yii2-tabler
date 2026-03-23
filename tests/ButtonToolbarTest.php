<?php

declare(strict_types=1);

namespace bestyii\tabler\tests;

use bestyii\tabler\ButtonToolbar;

class ButtonToolbarTest extends TestCase
{
    public function testButtonToolbarRendersGroupedButtons(): void
    {
        $html = ButtonToolbar::widget([
            'buttonGroups' => [
                [
                    'buttons' => [
                        [
                            'label' => 'Save',
                            'color' => 'primary',
                        ],
                        [
                            'label' => 'Preview',
                            'color' => 'secondary',
                        ],
                    ],
                ],
                [
                    'buttons' => [
                        [
                            'label' => 'Delete',
                            'color' => 'danger',
                        ],
                    ],
                ],
            ],
        ]);

        $this->assertStringContainsString('btn-toolbar', $html);
        $this->assertGreaterThanOrEqual(2, substr_count($html, 'btn-group'));
        $this->assertStringContainsString('Save', $html);
        $this->assertStringContainsString('Delete', $html);
    }
}
