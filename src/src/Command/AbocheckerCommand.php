<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:abochecker',
    description: 'Add a short description for your command',
)]
class AbocheckerCommand extends Command
{

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Abochecker');
        $shopFile = $io->ask('Pfad für die WP-User Json','/opt/importfiles/pareyshop_user.json');
        $vzmagaFile = $io->ask('Pfad für die VZMAGA-User Json','/opt/importfiles/vzmaga_user.json');

        $shopUsers = json_decode(file_get_contents($shopFile),true);
        $vzmagaUsers = json_decode(file_get_contents($vzmagaFile),true);
        $counterFound = 0;
        $counterNotFound = 0;
        foreach($shopUsers as $key => $user){
                $io->text('(' . $key . '/' . count($shopUsers) . ') Checking user ' . $user['user_email']);

                $found = false;
                foreach($vzmagaUsers as $vzmagaUser){
                    if($vzmagaUser['EMAIL'] === $user['user_email']){
                        $found = true;
                        break;
                    }
                }
                if(!$found){
                    //$io->error('User ' . $user['user_email'] . ' nicht in VZMAGA gefunden');
                    $counterNotFound++;
                }else{
                    //$io->success('User ' . $user['user_email'] . ' gefunden');
                    $counterFound++;
                }
        }
        $io->text('Gefunden: ' . $counterFound);
        $io->text('Nicht gefunden: ' . $counterNotFound);
        return Command::SUCCESS;
    }
}
