<?php

namespace App\Repository;

use App\Entity\IngrediantEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IngrediantEntity>
 *
 * @method IngrediantEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method IngrediantEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method IngrediantEntity[]    findAll()
 * @method IngrediantEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngrediantEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IngrediantEntity::class);
    }

//    /**
//     * @return IngrediantEntity[] Returns an array of IngrediantEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IngrediantEntity
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
