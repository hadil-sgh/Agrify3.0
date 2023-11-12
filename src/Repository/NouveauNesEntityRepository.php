<?php

namespace App\Repository;

use App\Entity\NouveauNesEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NouveauNesEntity>
 *
 * @method NouveauNesEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method NouveauNesEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method NouveauNesEntity[]    findAll()
 * @method NouveauNesEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NouveauNesEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NouveauNesEntity::class);
    }

//    /**
//     * @return NouveauNesEntity[] Returns an array of NouveauNesEntity objects
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

//    public function findOneBySomeField($value): ?NouveauNesEntity
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
