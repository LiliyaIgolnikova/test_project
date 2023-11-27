<?php
namespace App\Controller;
use App\Entity\Category;
use App\Entity\Product;
use App\Controller\DataBaseController;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/site.com/category', name: 'app_category')]
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $category = $categoryRepository->findAll();
        $product = $productRepository->findAll();
        $i = 0;
        for ($id = 0; $id < count($category); $id++)
        {
            $category[$id] = $category[$id]->getName();
            $str = "";
            for($id_p = 0; $id_p < count($product); $id_p++)
            {
                if ($category[$id] == $product[$id_p]->getCategory()->getName())
                {
                    $str .=' '.$product[$id_p]->getName();
                }
            }
            $productsName[$i] = $str;
            $i++;
        }
        return $this->render('category.html.twig', [
            'category' => $category,
            'productsName' => $productsName
        ]);
    }
}
?>