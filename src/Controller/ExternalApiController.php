<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ExternalApiController extends AbstractController
{
    #[Route('/api/external/getDoc', name: 'api_external')]
    public function getSymfonyDoc(HttpClientInterface $httpClient): JsonResponse
    {
        $response = $httpClient->request('GET', 'https://api.github.com/repos/symfony/symfony-docs');
        return new JsonResponse($response->getContent(), $response->getStatusCode(), []);
    }
}
