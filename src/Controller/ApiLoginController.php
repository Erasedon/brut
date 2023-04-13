<?php

namespace App\Controller;

use App\Entity\Users;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'app_api_login')]
    public function index(Request $request, TokenStorageInterface $tokenStorage): JsonResponse
    {
        $client = HttpClient::create();

        $username = $request->get('_username');
        $password = $request->get('_password');

        if (!$username || !$password) {
            return $this->json([
                'message' => 'Missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $response = $client->request(
            'POST',
            'http://127.0.0.1:8000/api/login_check',
            [
                'body' => [
                    'username' => $username,
                    'password' => $password,
                ],
            ]
        );

        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();

        if ($statusCode !== Response::HTTP_OK) {
            return $this->json([
                'status' => $statusCode,
                'contentType' => $contentType,
                'response' => $content,
            ], Response::HTTP_UNAUTHORIZED);
        }

        $data = json_decode($content, true);
        $token = $data['token'];
        $user = $tokenStorage->getToken()->getUser();
        return $this->json([
            'user' => $user->getUserIdentifier(),
            'token' => $token,
        ]);
    }
}
