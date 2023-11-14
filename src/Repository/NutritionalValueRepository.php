<?php

namespace App\Repository;

use App\Entity\NutritionalValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NutritionalValue>
 *
 * @method NutritionalValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method NutritionalValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method NutritionalValue[]    findAll()
 * @method NutritionalValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NutritionalValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NutritionalValue::class);
    }

//    /**
//     * @return NutritionalValue[] Returns an array of NutritionalValue objects
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

//    public function findOneBySomeField($value): ?NutritionalValue
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
