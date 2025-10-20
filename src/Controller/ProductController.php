<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    // GET /api/products - Read all products
    #[Route('/api/products', name: 'app_product_index', methods: ['GET'])]
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $products = $em->getRepository(Product::class)->findAll();
        $data = [];

        foreach ($products as $product) {
            $createdAt = $product->getCreatedAt();
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'inventory_count' => $product->getInventoryCount(),
                'cost' => $product->getCost(),
                'selling_price' => $product->getSellingPrice(),
                'created_at' => $createdAt ? $createdAt->format('Y-m-d H:i:s') : null,
            ];
        }

        return $this->json($data);
    }

    // POST /api/products - Create a new product
    #[Route('/api/products', name: 'app_product_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $product = new Product();
        $product->setName($data['name'] ?? '');
        $product->setInventoryCount($data['inventory_count'] ?? 0);
        $product->setCost($data['cost'] ?? 0);
        $product->setSellingPrice($data['selling_price'] ?? 0);
        $product->setCreatedAt(new \DateTime()); // Set current datetime

        $em->persist($product);
        $em->flush();

        return $this->json([
            'message' => 'Product created!',
            'id' => $product->getId()
        ]);
    }

    // PUT /api/products/{id} - Update an existing product
    #[Route('/api/products/{id}', name: 'app_product_update', methods: ['PUT'])]
    public function update(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $product = $em->getRepository(Product::class)->find($id);

        if (!$product) {
            return $this->json(['message' => 'Product not found'], 404);
        }

        $data = json_decode($request->getContent(), true);

        $product->setName($data['name'] ?? $product->getName());
        $product->setInventoryCount($data['inventory_count'] ?? $product->getInventoryCount());
        $product->setCost($data['cost'] ?? $product->getCost());
        $product->setSellingPrice($data['selling_price'] ?? $product->getSellingPrice());

        $em->flush();

        return $this->json(['message' => 'Product updated!']);
    }

    // DELETE /api/products/{id} - Delete a product
    #[Route('/api/products/{id}', name: 'app_product_delete', methods: ['DELETE'])]
    public function delete(int $id, EntityManagerInterface $em): JsonResponse
    {
        $product = $em->getRepository(Product::class)->find($id);

        if (!$product) {
            return $this->json(['message' => 'Product not found'], 404);
        }

        $em->remove($product);
        $em->flush();

        return $this->json(['message' => 'Product deleted!']);
    }
}
