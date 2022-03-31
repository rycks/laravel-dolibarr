<?php
namespace Caprel\Dolibarr\Traits;

use Illuminate\Support\Facades\Log;

trait DolibarrTrait
{
    private $token = null;
    private $login = null;
    private $password = null;
    private $auth_access = false;
    private $server_uri = null;
    private $user_agent = null;

    public function __construct(array $attributes = []) {
        // Log::debug("Constructeur du trait dolibarr");
        $this->token = config('dolibarr.api_key');
        $this->login = config('dolibarr.login');
        $this->password = config('dolibarr.password');
        $this->auth_access = config('dolibarr.auth_access');
        $this->server_uri = config('dolibarr.server_uri');
        $this->user_agent = config('dolibarr.user_agent');
        parent::__construct($attributes);
    }

    public function login($reset = 0)
    {
        $this->token = null;
        $loginParam = ["login" => $this->login, "password" => $this->password, "reset" => $reset];
        $curl = curl_init();
        $httpheader = [];
        if(isset($this->user_agent)) {
            $httpheader[] = 'User-Agent:'.$this->user_agent;
        }

        $url = $this->server_uri . "/api/index.php/login";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $httpheader);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $loginParam);

        if ($this->auth_access) {
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_USERPWD, $this->login. ":" . $this->password);
        }

        $tokenResult = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if (isset($tokenResult["success"]) && $tokenResult["success"]["code"] == "200") {
            $this->token = $tokenResult["success"]["token"];
        }
    }

    public function CallAPI($method, $url, $data = null)
    {
        $curl = curl_init();
        $httpheader = ['DOLAPIKEY: ' .$this->token];
        if(isset($this->user_agent)) {
            $httpheader[] = 'User-Agent:'.$this->user_agent;
        }

        $url = $this->server_uri."/api/index.php/" . $url;
        // Log::debug("DolibarrTrait::CallAPI with token = " . $this->token);

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                $httpheader[] = "Content-Type:application/json";

                if (null !== $data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }

                break;
            case "PUT":

                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                $httpheader[] = "Content-Type:application/json";

                if (null !== $data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }

                break;
            default:
                if (null !== $data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }
        // Optional Authentication:
        if ($this->auth_access) {
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_USERPWD, $this->login. ":" . $this->password);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $httpheader);

        $result = curl_exec($curl);

        curl_close($curl);

        return json_decode($result);
    }
}
