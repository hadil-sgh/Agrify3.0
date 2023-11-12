<?php

namespace App\Repository;

use App\Entity\ValeurNutritionnelBesoinNutritionnelEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ValeurNutritionnelBesoinNutritionnelEntity>
 *
 * @method ValeurNutritionnelBesoinNutritionnelEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValeurNutritionnelBesoinNutritionnelEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValeurNutritionnelBesoinNutritionnelEntity[]    findAll()
 * @method ValeurNutritionnelBesoinNutritionnelEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValeurNutritionnelBesoinNutritionnelEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValeurNutritionnelBesoinNutritionnelEntity::class);
    }

//    /**
//     * @return ValeurNutritionnelBesoinNutritionnelEntity[] Returns an array of ValeurNutritionnelBesoinNutritionnelEntity objects
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

//    public function findOneBySomeField($value): ?ValeurNutritionnelBesoinNutritionnelEntity
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
