<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'updated_date';

    /**
     * Function update info product
     * @param array $data data need update
     * @param array $arrWhere condition update
     * @param colection
     */
    public function updateData($data, $arrWhere = array())
    {
    }

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
                if (isset($arrWhere['type'])) {
                    $query->where('type', $arrWhere['type']);
                }
                if (isset($arrWhere['status'])) {
                    $query->where('status', $arrWhere['status']);
                }
                if (isset($arrWhere['name'])) {
                    $query->where('name_hotspot', 'like', "%" . $arrWhere['name'] . "%")
                        ->orWhere('name', 'like', "%" . $arrWhere['name'] . "%");
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
