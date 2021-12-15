<?php
declare(strict_types=1);

namespace Test\Weather\Model\Http;

use Exception;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Serialize\Serializer\Json;

class Client
{
    public const API_HOST_CONFIG_PATH = 'api/configuration/url';
    public const API_KEY_CONFIG_PATH = 'api/configuration/key';
    public const API_LON = 'api/configuration/lan';
    public const API_LAT = 'api/configuration/lat';

    /**
     * @var Curl
     */
    private Curl $curl;

    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeConfig;

    /**
     * @var Json
     */
    private Json $serializer;

    /**
     * Client constructor.
     *
     * @param Curl $curl
     * @param ScopeConfigInterface $scopeConfig
     * @param Json $serializer
     */
    public function __construct(
        Curl $curl,
        ScopeConfigInterface $scopeConfig,
        Json $serializer
    ) {
        $this->curl = $curl;
        $this->scopeConfig = $scopeConfig;
        $this->serializer = $serializer;
    }

    /**
     * Get data
     *
     * @return false|string
     * @throws Exception
     */
    public function getWeatherData()
    {
        $params = [
            'lon' => $this->scopeConfig->getValue(self::API_LON),
            'lat' => $this->scopeConfig->getValue(self::API_LAT)
        ];
        $url = $this->scopeConfig->getValue(self::API_HOST_CONFIG_PATH) .http_build_query($params);

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: " .parse_url($this->scopeConfig->getValue(self::API_HOST_CONFIG_PATH), PHP_URL_HOST),
                "x-rapidapi-key: " .$this->scopeConfig->getValue(self::API_KEY_CONFIG_PATH)
            ],
        ];

        $this->curl->setOptions($options);
        $this->curl->get($url);
        $response = $this->curl->getBody();

        return $this->serializer->unserialize($response);
    }
}
