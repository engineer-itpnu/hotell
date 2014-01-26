<?php
namespace Hotel\reserveBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteExpiredReservesCommand extends ContainerAwareCommand
{
    private $expireDays = 1;


}