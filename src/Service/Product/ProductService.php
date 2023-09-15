<?php
namespace App\Service\Product;
use App\Entity\Product;
use App\Entity\Unit;
use App\Entity\Stock;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

class ProductService{

    public function __construct(
        private EntityManagerInterface $em,
        private UserPasswordHasherInterface $passwordHasher
    ){
    }

    public function create($name, $price){
        $em = $this->em;
        $p = new Product();
        $p->setName($name);
        $p->setPrice($price);

        $em->persist($p);
        $em->flush();
        return $p->getId();
    }

    public function getProductsByCurrency(){
        $usds = $this->em->getRepository(Product::class)->findBy(['price.currency' => 'USD']);
        return $usds;
    }
}