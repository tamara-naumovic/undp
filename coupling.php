<?php
//zavisnosti - dependencies (dependency)

interface ServiceInterface{
    public function doTheThing();
}

class Service
{
    public function doTask(){
        echo "Servis uradio zadatak iz Adaptera";
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
        $this->service->doTask();
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

$cli = new Client(new ServiceAdapter(new Service()));
$cli->doSomething();

?>