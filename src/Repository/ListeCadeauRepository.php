<?php

namespace App\Repository;

use App\Entity\ListeCadeau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListeCadeau>
 *
 * @method ListeCadeau|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeCadeau|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeCadeau[]    findAll()
 * @method ListeCadeau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeCadeauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeCadeau::class);
    }

    //    /**
    //     * @return ListeCadeau[] Returns an array of ListeCadeau objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ListeCadeau
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
