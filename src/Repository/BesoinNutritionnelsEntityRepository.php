<?php

namespace App\Repository;

use App\Entity\BesoinNutritionnelsEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BesoinNutritionnelsEntity>
 *
 * @method BesoinNutritionnelsEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method BesoinNutritionnelsEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method BesoinNutritionnelsEntity[]    findAll()
 * @method BesoinNutritionnelsEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BesoinNutritionnelsEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BesoinNutritionnelsEntity::class);
    }

//    /**
//     * @return BesoinNutritionnelsEntity[] Returns an array of BesoinNutritionnelsEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BesoinNutritionnelsEntity
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
