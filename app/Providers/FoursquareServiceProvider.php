<?php


namespace App\Providers;


use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class FoursquareServiceProvider extends ServiceProvider
{

    public function boot()
    {
        parent::boot();
    }

    public static function getConfig()
    {
        return app('config')->get('services')['foursquare'];
    }

    public static function getCategories()
    {
        $client = new \GuzzleHttp\Client();
        $curlClient = self::getConfig();
        $curlClient['locale'] = "en";//you can use browser lang
        try {
            $res = $client->get('https://api.foursquare.com/v2/venues/categories', ['query' => $curlClient, 'verify' => false]);
            $response = json_decode($res->getBody()->getContents());
            if ($response->meta->code == 200) {
                return ['status' => 1, 'categories' => $response->response->categories];
            } else {
                return ['status' => 0, 'categories' => []];
            }
        } catch (\Exception $exception) {
            return ['status' => 0, 'categories' => [], 'message' => $exception->getMessage()];
        }
    }

    public static function postExplore($near, $query, $limit = 10)
    {
        $client = new \GuzzleHttp\Client();
        $curlClient = self::getConfig();

        $curlClient['near'] = $near;
        $curlClient['query'] = $query;
        $curlClient['limit'] = $limit;
        try {

            $res = $client->get('https://api.foursquare.com/v2/venues/explore', ['query' => $curlClient, 'verify' => false]);
            $response = json_decode($res->getBody()->getContents());

            if ($response->meta->code == 200) {
                return ['status' => 1, 'venues' => $response->response->groups[0]->items];
            } else {
                return ['status' => 0, 'venues' => []];
            }
        } catch (\Exception $exception) {
            return ['status' => 0, 'venues' => [], 'message' => $exception->getMessage()];
        }
    }

}