<?php

namespace App\Controller;

use App\Entity\Player;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PlayerApiController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/api/players', name: 'get_players', methods: ['GET'])]
    public function getPlayers(): JsonResponse
    {
        $players = $this->entityManager->getRepository(Player::class)->findAll();

        $data = [];
        foreach ($players as $player) {
            $data[] = [
                'id' => $player->getId(),
                'firstName' => $player->getFirstName(),
                'lastName' => $player->getLastName(),
                'city' => $player->getCity(),
                'birthDate' => $player->getBirthDate(),
            ];
        }

        return new JsonResponse($data);
    }
}
