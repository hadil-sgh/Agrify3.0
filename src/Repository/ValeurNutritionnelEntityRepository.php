<?php

namespace App\Repository;

use App\Entity\ValeurNutritionnelEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ValeurNutritionnelEntity>
 *
 * @method ValeurNutritionnelEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValeurNutritionnelEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValeurNutritionnelEntity[]    findAll()
 * @method ValeurNutritionnelEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValeurNutritionnelEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValeurNutritionnelEntity::class);
    }

//    /**
//     * @return ValeurNutritionnelEntity[] Returns an array of ValeurNutritionnelEntity objects
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

//    public function findOneBySomeField($value): ?ValeurNutritionnelEntity
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
