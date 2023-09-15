<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Product\ProductService;
use App\Entity\Money;
use Faker\Factory;
use Symfony\Component\HttpFoundation\Request;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    #[Route('/create-product', name: 'create_product')]
    public function createProduct(ProductService $productService, Request $request): Response
    {
        $price = new Money(200, "USD");
        $productService->create("Fraise", $price);
        return $this->json(["status"=>200]);
    }

    #[Route('/get-product', name: 'get_product')]
    public function getProductAction(ProductService $productService, Request $request): Response
    {
        $products = $productService->getProductsByCurrency("USD");
        return $this->json(["status"=>200, "products" => $products]);
    }

    #[Route('/faker', name: 'faker')]
    public function faker(): Response
    {
        $faker = Factory::create();
        $name = $faker->name;
        $email = $faker->email;
        $address = $faker->address;

        return $this->render('test/fake_data.html.twig', [
            'name' => $name,
            'email' => $email,
            'address' => $address,
        ]);
    }
}
