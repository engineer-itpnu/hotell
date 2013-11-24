<?php
namespace Hotel\reserveBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteExpiredReservesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('reserves:expired:delete')
            ->setDescription('Delete 1 Day old Reserves.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dateExpire = new \DateTime();
        $dateExpire->sub(new \DateInterval("P1D"));

        $em = $this->getContainer()->get("doctrine.orm.entity_manager");
        $qb = $em->createQueryBuilder()
            ->select("r")
            ->from("HotelreserveBundle:reserveEntity","r")
            ->innerJoin("r.blankEntities","b")
            ->where("b.status = :status")->setParameter("status","1")
            ->andWhere("r.DateCreate < :dateExpire")->setParameter("dateExpire",$dateExpire)
            ;
        $reserves = $qb->getQuery()->getResult();


        foreach($reserves as $reserve)
        {
            foreach($reserve->getBlankEntities() as $blank)
            {
                $blank->setStatus(0);
                $blank->setReserveEntity(null);
            }
            $em->remove($reserve);
        }
        $em->flush();

        $output->writeln("count: ".count($reserves));
    }
}