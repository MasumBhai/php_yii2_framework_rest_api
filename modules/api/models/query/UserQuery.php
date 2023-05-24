<?php

namespace app\modules\api\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\api\models\Person]].
 *
 * @see \app\modules\api\models\Person
 */
class UserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\api\models\Person[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\api\models\Person|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
