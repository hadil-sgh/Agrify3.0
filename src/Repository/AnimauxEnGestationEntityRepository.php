<?php

namespace App\Repository;

use App\Entity\AnimauxEnGestationEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AnimauxEnGestationEntity>
 *
 * @method AnimauxEnGestationEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimauxEnGestationEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimauxEnGestationEntity[]    findAll()
 * @method AnimauxEnGestationEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimauxEnGestationEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimauxEnGestationEntity::class);
    }

//    /**
//     * @return AnimauxEnGestationEntity[] Returns an array of AnimauxEnGestationEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AnimauxEnGestationEntity
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
