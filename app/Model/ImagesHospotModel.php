<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImagesHospotModel extends Model
{
    protected $table = 'images_hotspot';
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'updated_date';

    /**
     * Function get list product
     * @param array $arrWhere condititon get list product
     * @param array $arrOrderBy array sort product
     * @param int $limit limit get product
     * @param colection
     */
    public function gets($arrCol = array(), $arrWhere = array(), $arrOrderBy = array(), $limit = 20, $paginate = true)
    {

        $result = $this;
        if (!empty($arrCol)) {
            $result = $result->select($arrCol);
        }
        if (!empty($arrWhere)) {
            $result = $result->where(function ($query) use ($arrWhere) {
                if (isset($arrWhere['hotspot'])) {
                    $query->where('hotspot', $arrWhere['name']);
                }
            });
        }
        if (!empty($arrOrderBy)) {
            foreach ($arrOrderBy as $sort) {
                if (!empty($sort['column']) && !empty($sort['value'])) {
                    $result = $result->orderBy($sort['column'], $sort['value']);
                }
            }
        }
        if ($limit == 1) {
            $result = $result->first();
        } else {
            if ($paginate) {
                $result = $result->paginate($limit);
            } else {
                if ($limit == 0) {
                    $result = $result->get();
                } else {
                    $result = $result->limit($limit)->get();
                }
            }
        }

        return $result;
    }
}
