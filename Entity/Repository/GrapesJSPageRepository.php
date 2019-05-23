<?php
namespace HackOro\GrapesJSBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use HackOro\GrapesJSBundle\Entity\GrapesJSPage;

/**
 * Doctrine repository for Page entity
 */
class GrapesJSPageRepository extends EntityRepository
{
    /**
     * @param $title
     * @return null|GrapesJSPage
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByTitle($title)
    {
        $qb = $this->createQueryBuilder('hackoro_grapesjs_page');

        return $qb
            ->select('partial page.{id}')
            ->where('title = :title')
            ->setParameter('title', $title)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
