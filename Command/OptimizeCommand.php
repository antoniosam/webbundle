<?php
/**
 * Created by marcosamano
 * Date: 19/05/19
 */
namespace Ast\WebBundle\Command;


use Ast\SybadepBundle\Lib\BackupSync;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;


class OptimizeCommand extends  Command
{
    protected static $defaultName = 'webbundle:optimize:assets';

    private $project_dir;

    public function __construct($project_dir)
    {
        parent::__construct();
        $this->project_dir = $project_dir;
    }

    protected function configure()
    {
        $this
            ->setName(static::$defaultName)
            ->setDescription('Optimize assets')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tiempo_inicio = microtime(true);

        $proceso = true;
        $output->writeln([
            'Web Bundle ',// A line
            '========================================',// Another line
            '',// Empty line
        ]);

        $this->

        $output->writeln('Backup DB');
        if($this->backup->pedirBackupBD()){
            $output->writeln('Backup DB Download SUCCESS');
        }else{
            $output->writeln(['FAIL',$this->backup->getPeticion()->getError()]);
            $proceso = false;
        }

        if($proceso == true){
            $output->writeln(['','Backup Code']);
            if($this->backup->pedirBackupCode()){
                $output->writeln('Backup Code Download SUCCESS');
            }else{
                $output->writeln(['FAIL',$this->backup->getPeticion()->getError()]);
                $proceso = false;
            }
        }

        if($proceso == true){
            $output->writeln(['','Backup Assets']);
            if($this->backup->pedirBackupAssets()){
                $output->writeln('Backup Assets Download SUCCESS');
            }else{
                $output->writeln(['FAIL',$this->backup->getPeticion()->getError()]);
                $proceso = false;
            }
        }

        if($proceso == true){
            $output->writeln(['','Backup Uploads']);
            if($this->backup->pedirBackupUploads()){
                $output->writeln('Iniciando Descarga');
                $total = 0;
                $handle = fopen($this->backup->fileUploadsDownloaded(), "r");
                if ($handle) {
                    while(!feof($handle)){
                        $line = fgets($handle);
                        if(trim($line)!=''){
                            $total++;
                        }
                    }
                    fclose($handle);
                    $exitos = 0;
                    $errores = 0;
                    $fo = fopen($this->backup->fileUploadsDownloaded(),'r');
                    if ($fo) {
                        $progressBar = new ProgressBar($output, $total);
                        $progressBar->start();
                        $lineerrors = [];
                        while(!feof($fo)){
                            $line = fgets($fo);
                            if(trim($line)!=''){
                                if($this->backup->pedirArchivoUploaded(trim($line))){
                                    $exitos++;
                                }else{
                                    $errores++;
                                    $lineerrors[] = $this->backup->getPeticion()->getError();
                                }
                                $progressBar->advance();
                            }
                        }
                        fclose($fo);
                        $progressBar->finish();
                        $output->writeln('');
                        $output->writeln('Descarga Completa '.$total);
                        $output->writeln('Exitos: '.$exitos);
                        $output->writeln('Errores: '.$errores);
                        $output->writeln($lineerrors);
                    }
                }else{
                    $output->writeln('NO se puede leer el archivo '.$this->backup->filenameBackupUploads());
                }
            }else{
                $output->writeln(['FAIL',$this->backup->getPeticion()->getError()]);
                $proceso = false;
            }
        }

        if($proceso == true){
            $output->writeln(['','Backup Private Files']);
            if($this->backup->pedirBackupPrivateFiles()){
                $output->writeln('Iniciando Descarga');
                $total = 0;
                $handle = fopen($this->backup->filePrivatesDownloaded(), "r");
                if ($handle) {
                    while(!feof($handle)){
                        $line = fgets($handle);
                        if(trim($line)!=''){
                            $total++;
                        }
                    }
                    fclose($handle);
                    $exitos = 0;
                    $errores = 0;
                    $fo = fopen($this->backup->filePrivatesDownloaded(),'r');
                    if ($fo) {
                        $progressBar = new ProgressBar($output, $total);
                        $progressBar->start();

                        while(!feof($fo)){
                            $line = fgets($fo);
                            if(trim($line)!=''){
                                if($this->backup->pedirArchivoPrivado(trim($line))){
                                    $exitos++;
                                }else{
                                    $errores++;
                                }
                                $progressBar->advance();
                            }
                        }
                        fclose($fo);
                        $progressBar->finish();
                        $output->writeln('');
                        $output->writeln('Descarga Completa '.$total);
                        $output->writeln('Exitos: '.$exitos);
                        $output->writeln('Errores: '.$errores);
                    }
                }else{
                    $output->writeln('NO se puede leer el archivo '.$this->backup->filenameBackupUploads());
                }
            }else{
                $output->writeln(['FAIL',$this->backup->getPeticion()->getError()]);
                $proceso = false;
            }
        }


        $output->writeln(['','Comando Terminado, '.$this->timecommand($tiempo_inicio).' :)']);
    }

    private function timecommand($tiempo_inicio){
        $tiempo_fin = microtime(true);
        $seconds = round($tiempo_fin - $tiempo_inicio, 0);
        $hours = floor($seconds / 3600);
        $mins = floor($seconds / 60 % 60);
        $secs = floor($seconds % 60);
        if($secs == 0){
            $secs = round($tiempo_fin - $tiempo_inicio, 3);
        }

        return ($hours>0? $hours.'h ':'').($mins>0? $mins.'m ':''). $secs.'s';
    }
}