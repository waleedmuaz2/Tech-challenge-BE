<?php
namespace App\MessageHandler;

use App\Message\UserCreatedEvent;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserCreatedEventHandler implements MessageHandlerInterface
{
    public function __invoke(UserCreatedEvent $event)
    {
        file_put_contents('/var/log/notifications.log', sprintf("User created with ID: %d\n", $event->getUserId()), FILE_APPEND);
    }
}
