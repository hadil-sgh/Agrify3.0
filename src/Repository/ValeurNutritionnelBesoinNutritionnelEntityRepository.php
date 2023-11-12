<?php

namespace App\Repository;

use App\Entity\NutritionValueNeeds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NutritionValueNeeds>
 *
 * @method NutritionValueNeeds|null find($id, $lockMode = null, $lockVersion = null)
 * @method NutritionValueNeeds|null findOneBy(array $criteria, array $orderBy = null)
 * @method NutritionValueNeeds[]    findAll()
 * @method NutritionValueNeeds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NutritionValueNeedsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NutritionValueNeeds::class);
    }

//    /**
//     * @return NutritionValueNeeds[] Returns an array of NutritionValueNeeds objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NutritionValueNeeds
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
