<?php

namespace App\Repository;

use App\Entity\NutritionalValueNeeds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NutritionalValueNeeds>
 *
 * @method NutritionalValueNeeds|null find($id, $lockMode = null, $lockVersion = null)
 * @method NutritionalValueNeeds|null findOneBy(array $criteria, array $orderBy = null)
 * @method NutritionalValueNeeds[]    findAll()
 * @method NutritionalValueNeeds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NutritionalValueNeedsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NutritionalValueNeeds::class);
    }

//    /**
//     * @return NutritionalValueNeeds[] Returns an array of NutritionalValueNeeds objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NutritionalValueNeeds
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
