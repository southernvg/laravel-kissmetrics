<?php 
namespace TagVenue\Kissmetrics;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use KISSmetrics\Client;

class Kissmetrics extends Client {
    protected $apiKey;
    private static $_instance;

    public function __construct($apiKey)
    {
        $this->setApiKey($apiKey);
        $transport = \KISSmetrics\Transport\Sockets::initDefault();
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

    /**
     * Identify user with provided ID and match it with existing cookie.
     *
     * @param string $id
     * @return $this
     */
    public function identify($id)
    {
        parent::identify($id);
        if ($cookie = $this->getCookie()) {
            $this->alias($cookie);
        }
        
        return $this;
    }

    /**
     * Get current Kissmetrics user cookie
     *
     * @return string|null
     */
    protected function getCookie()
    {
        return isset($_COOKIE['km_ai'])? $_COOKIE['km_ai'] : null;
    }

    protected function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}