<?php
namespace App\Repositories;

use App\Url as Model;

/**
 * Class UrlRepository
 *
 * @package App\Repositories
 */
class UrlRepository extends CoreRepository
{

    /**
     *
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get Model to edit
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Get url by token
     *
     * @param string $token
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getUrlByToken($token)
    {
        $result = $this->startConditions()
            ->select('url')
            ->where('token', $token)
            ->get();

        return $result;
    }

    /**
     * Add the new url
     *
     * @param string $url
     * @param strind $token
     *
     * @return void
     */
    public function addUrl($url, $token)
    {
        $result = $this->startConditions()->insert([
            'url' => $url,
            'token' => $token
        ]);
    }
}