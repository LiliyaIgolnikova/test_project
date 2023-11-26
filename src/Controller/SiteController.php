<?php
namespace App\Controller;
use App\Entity\Category;
use App\Entity\Product;
use App\Controller\DataBaseController;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SiteController extends AbstractController
{
    #[Route('/site.com', name: 'app_site')]
    public function index(ManagerRegistry $doctrine, ProductRepository $productRepository): Response
    {   
        $repository = $doctrine->getRepository(Product::class);
        $product = $repository->findAll();
        $productName = array();
        for ($id = 0; $id < count($product); $id++)
        {
            $productName[$id] = $product[$id]->getName();
        }

        return $this->render('site.com.html.twig', [
            'productName' => $productName
        ]);
    }
}
?>