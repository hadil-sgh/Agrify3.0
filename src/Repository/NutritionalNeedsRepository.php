<?php

namespace App\Repository;

use App\Entity\NutritionalNeeds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NutritionalNeeds>
 *
 * @method NutritionalNeeds|null find($id, $lockMode = null, $lockVersion = null)
 * @method NutritionalNeeds|null findOneBy(array $criteria, array $orderBy = null)
 * @method NutritionalNeeds[]    findAll()
 * @method NutritionalNeeds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NutritionalNeedsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NutritionalNeeds::class);
    }

    /**
     * @return NutritionalNeeds[] Returns an array of NutritionalNeeds objects
     */
public function findByExampleField($field, $value): array
{
    return $this->createQueryBuilder('ab')
        ->andWhere("ab.{$field} = :val")
        ->setParameter('val', $value)
        ->orderBy('ab.id', 'ASC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult()
    ;
}

//    public function findOneBySomeField($value): ?NutritionalNeeds
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
