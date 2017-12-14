<?php

class GeoIP {
    protected $fp;
    protected $ip;
    protected $state;
    protected $city;
   
   public function __construct ($ip)
    {
        $this->fp = fopen("http://www.freegeoip.net/csv/$ip", "r");
        $data = fgetcsv($this->fp);
        
        $this->ip = $data[0];
        $this->state = $data[3];
        $this->city = $data[5];
        
    }
       
    public function getIp()
    {
        return $this->ip;
    }
    
    public function getState()
    {
        return $this->state;
    }
    
    public function getCity()
    {
        return $this->city;
    }
    
    public function __destruct ()
    {
        fclose($this->fp);
    }

}