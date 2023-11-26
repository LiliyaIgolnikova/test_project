<?php
namespace App\Controller;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DataBaseController extends AbstractController 
{
    #[Route('/create_data', name: 'data_create')]
    public function createData(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $category = new Category();
        $category->setName('Освещение');
        $entityManager->persist($category);

        $product = new Product();
        $product->setCategory($category);
        $product->setName('Лампа');
        $entityManager->persist($product);
        $entityManager->flush();

        $product = new Product();
        $product->setCategory($category);
        $product->setName('Светильник');
        $entityManager->persist($product);
        $entityManager->flush();


        $category = new Category();
        $category->setName('Мебель');
        $entityManager->persist($category);

        $product = new Product();
        $product->setCategory($category);
        $product->setName('Диван');
        $entityManager->persist($product);
        $entityManager->flush();

        $product = new Product();
        $product->setCategory($category);
        $product->setName('Стол');
        $entityManager->persist($product);
        $entityManager->flush();


        $category = new Category();
        $category->setName('Техника');
        $entityManager->persist($category);

        $product = new Product();
        $product->setCategory($category);
        $product->setName('Принтер');
        $entityManager->persist($product);
        $entityManager->flush();

        $product = new Product();
        $product->setCategory($category);
        $product->setName('Наушники');
        $entityManager->persist($product);
        $entityManager->flush();

        return new Response();
    }
}