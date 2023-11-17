<?php

namespace App\Repository;

use App\Entity\TypedeReclamation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypedeReclamation>
 *
 * @method TypedeReclamation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypedeReclamation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypedeReclamation[]    findAll()
 * @method TypedeReclamation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypedeReclamationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypedeReclamation::class);
    }

//    /**
//     * @return TypedeReclamation[] Returns an array of TypedeReclamation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypedeReclamation
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
