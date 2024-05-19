<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Repository\ProductCategoryRepository;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'search_results')]
    public function search(Request $request, ProductRepository $productRepository, ProductCategoryRepository $categoryRepository): Response
    {
        $query = $request->query->get('search');
        if (!$query) {
            return $this->redirectToRoute('homepage');
        }

        $products = $productRepository->searchByQuery($query);
        $categories = $categoryRepository->searchByQuery($query);

        return $this->render('search/index.html.twig', [
            'query' => $query,
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
