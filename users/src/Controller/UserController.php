<?php
namespace App\Controller;

use App\Entity\User;
use App\Message\UserCreatedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;

class UserController extends AbstractController
{
    #[Route('/users', name: 'create_user', methods: ['POST'])]
    public function createUser(Request $request, EntityManagerInterface $em, MessageBusInterface $bus): Response
    {
        $data = json_decode($request->getContent(), true);

        $user = new User();
        $user->setEmail($data['email']);
        $user->setFirstName($data['firstName']);
        $user->setLastName($data['lastName']);

        $em->persist($user);
        $em->flush();

        // Dispatch user created event
        $bus->dispatch(new UserCreatedEvent($user->getId()));

        return new Response('User created', Response::HTTP_CREATED);
    }
}
