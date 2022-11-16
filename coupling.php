<?php
//zavisnosti - dependencies (dependency)

interface ServiceInterface{
    public function doTheThing();
}

class Service
{
    //promenjen naziv funkcije doTask
    // nije vise backwards compatible
    public function doService(){
        echo "Servis uradio zadatak iz Adaptera preko doService";
    }
}

class ServiceAdapter implements ServiceInterface{
    private $service;
    public function __construct(Service $srv)
    {
        $this->service = $srv;
    }

    public function doTheThing()
    {
        //menjamo implementaciju service-a u adapteru
        $this->service->doService();
    }
}

class Client
{
    private $service;
    // invisible dependency
    // public function __construct()
    // {
    //     $this->service = new Service();
    // }

    //dependency injection pattern 
    public function __construct(ServiceInterface $srv)
    {
        //visible dependency
        $this->service = $srv;
    }

    public function doSomething(){
        $this->service->doTheThing();
    }
}

class NewService
{
    public function theMethod(){
        echo "Stampa iz NewService";
    }
}

class NewServiceAdapter implements ServiceInterface
{
    private $service;
    public function __construct(NewService $nsrv)
    {
        $this->service = $nsrv;
    }

    public function doTheThing()
    {
        $this->service->theMethod();
    }
}

$cli = new Client(new ServiceAdapter(new Service()));
// $cli = new Client(new ServiceInterface()); //Uncaught Error: Cannot instantiate interface ServiceInterface 
$cli->doSomething();
echo "<br>";
$new_cli = new Client(new NewServiceAdapter(new NewService()));
$new_cli->doSomething();

?>