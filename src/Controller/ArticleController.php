<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/api/article", name="api_article", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository)
    {                 
        return $this->json($articleRepository->findAll(), 200, [], ['groups' => 'article:read']);
    }
}
