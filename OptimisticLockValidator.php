<?php

namespace mootensai\components;

use yii\validators\Validator;

class OptimisticLockValidator extends Validator {

    public function init() {
        parent::init();
        $this->message = 'Data sudah kadaluwarsa.';
    }

    /**
     * 
     * @param type $model
     * @param type $attribute
     */
    public function validateAttribute($model, $attribute) {
        if ($model->$attribute < $model->getOldAttribute($attribute)) {
            $this->addError($model, $attribute, $this->message);
        }
    }

}
