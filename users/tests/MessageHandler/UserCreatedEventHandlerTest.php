<?php

namespace App\Tests\MessageHandler;

use App\Message\UserCreatedEvent;
use App\MessageHandler\UserCreatedEventHandler;
use PHPUnit\Framework\TestCase;

class UserCreatedEventHandlerTest extends TestCase
{
    public function testInvoke(): void
    {
        $event = new UserCreatedEvent(1);
        $handler = new UserCreatedEventHandler();

        $handler($event);

        $this->assertStringContainsString('User created with ID: 1', file_get_contents('/var/log/notifications.log'));
    }
}
