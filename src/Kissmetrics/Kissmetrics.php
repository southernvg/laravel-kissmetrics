<?php 
namespace TagVenue\Kissmetrics;
use Illuminate\Support\Facades\Config;
use KISSmetrics\Client;

class Kissmetrics extends Client {
    protected $apiKey;
    private static $_instance;

    public function __construct($apiKey)
    {
        $this->setApiKey($apiKey);
        $transport = KISSmetrics\Transport\Sockets::initDefault();
        self::$_instance = parent::__construct($this->apiKey, $transport);
    }

    /**
     * @return Kissmetrics
     */
    public static function getInstance()
    {
        $apiKey = Config::get('kissmetrics.api_key');

        if (!isset(self::$_instance))
        {
            self::$_instance = new Kissmetrics($apiKey);
        }

        return self::$_instance;
    }

    protected function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}