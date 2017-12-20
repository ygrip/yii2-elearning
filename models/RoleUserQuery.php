<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RolesUser]].
 *
 * @see RolesUser
 */
class RoleUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RolesUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RolesUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
