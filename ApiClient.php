<?php
/**
 * Created by PhpStorm.
 * User: Gerhard
 * Date: 12/9/2017
 * Time: 12:58 PM
 */

namespace BittrexApi;

require 'vendor/autoload.php';

spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'BittrexApi\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__.'\\' ;

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

class ApiClient
{
    private $apiKey = 'd89923574d854210ab1e68f9df16ef8a';
    private $apiSecret = '0fb33cb37f0441cfb570c65f6fc406ea';
    private $baseUri = 'https://bittrex.com/api/v1.1';

    public function call($endpoint, $parameters = array()){
        $apikey = $this->apiKey;
        $apisecret = $this->apiSecret;
        $nonce = time();

        $parameters = http_build_query($parameters);

        $uri = $this->baseUri.'/'.$endpoint.'?apikey='.$apikey.'&nonce='.$nonce;

        //if($parameters){
            $uri .= '&'.$parameters;
        //}

        echo $parameters;

        echo $uri;

        $sign = hash_hmac('sha512',$uri,$apisecret);
        $ch = curl_init($uri);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('apisign:'.$sign));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $execResult = curl_exec($ch);
        $obj = json_decode($execResult);

        //var_dump($obj);

        return $obj;

        /*$client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/user', [
            'auth' => ['user', 'pass']
        ]);
        echo $res->getStatusCode();
// "200"
        echo $res->getHeader('content-type');
// 'application/json; charset=utf8'
        echo $res->getBody();
// {"type":"User"...'

// Send an asynchronous request.
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();*/
    }

}