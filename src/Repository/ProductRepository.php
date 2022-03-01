<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }


/*    public function findByPagination($currentPage, $nbResult)
    {
        $qb = $this->createQueryBuilder('p')
            ->setMaxResults($nbResult);
        if ($currentPage == 1) {
            $qb->setFirstResult(0);
        } else {
            $qb->setFirstResult(($currentPage * $nbResult) - $nbResult);
        }
        return $qb->getQuery()->getResult();
    }*/

    public function search($searchFilters, $nbResult, $currentPage){
        $query = $this->createQueryBuilder('p')->leftJoin('p.category', 'categ');

        if(!is_null($searchFilters['searchBar'])){
            $query
                ->where('p.name LIKE :name')
                ->orWhere('p.description LIKE :description')
                ->orWhere('categ.label LIKE :label')
                ->setParameter('name', '%'.$searchFilters['searchBar'].'%')
                ->setParameter('description', '%'.$searchFilters['searchBar'].'%')
                ->setParameter('label', '%'.$searchFilters['searchBar'].'%');
        }

        $query->setMaxResults($nbResult);
        if ($currentPage == 1) {
            $query->setFirstResult(0);
        } else {
            $query->setFirstResult(($currentPage * $nbResult) - $nbResult);
        }

        return $query->getQuery()->getResult();
    }


    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}
