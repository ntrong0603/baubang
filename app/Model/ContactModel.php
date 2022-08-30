<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'contact';
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'updated_date';

    /**
     * Function get list product
     * @param $where condititon get list product
     * @param colection
     */
    public function gets($where = array())
    {
        $result = $this;
        if (!empty($where)) {
            $result = $result->where(function ($query) use ($where) {
                if (isset($where['name'])) {
                    $query->where('name', 'like', "%" . $where['name'] . "%");
                }
                if (isset($where['profection'])) {
                    $query->where('profection', 'like', "%" . $where['profection'] . "%");
                }
                if (isset($where['email'])) {
                    $query->where('email', 'like', "%" . $where['email'] . "%");
                }
                if (isset($where['phone'])) {
                    $query->where('phone', 'like', "%" . $where['phone'] . "%");
                }
            });
        }
        return $result->orderBy('id', "desc")->paginate(20);
    }
}
