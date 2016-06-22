<?php

namespace yii\fluent\components;

use Yii;
use yii\fluent\models\Language;

class Translationable extends \yii\db\ActiveRecord
{

    /**
     * Return array of immutable attributes. Values will be flushed to source's anyway
     * @return array
     */

    public function immutables(){
        return [];
    }

    public function isImmutable($param){
        return in_array($param, $this->immutables());
    }

    public function rules(){
        return [
            [['source_id', 'lang_id'], 'required'],
            [['source_id', 'lang_id'], 'integer'],

        ];
    }


    /**
     * Detects whether node is translation
     * @return bool
     */
    public function isTranslation(){
        return $this->source_id != -1;
    }

    /**
     * Return real rootID
     * @return integer
     */
    public function getSourceID(){
        if($this->source_id == -1){
            return $this->id;
        }
        return $this->source_id;
    }

    /**
     * Is node translated to given language
     * @param integer $lang_id
     * @return bool
     */
    public function isTranslated($lang_id){
        if($this->lang_id == $lang_id || $lang_id == Language::getDefaultID()){
            return true;
        }

        // Searching entry in DB
        if($this->find()->where(['source_id' => $this->getSourceID(), 'lang_id' => $lang_id])->count() > 0){
            return true;
        }
        return false;
    }

    public function getTranslatedLanguages(){

    }

    public function getUntranslatedLanguages(){

    }

    /**
     * Returns node translated to given language (if any)
     * If strict is false -> may return source if there's no translation
     * @param integer $lang_id
     * @param bool $strict
     * @return mixed
     */
    public function getTranslation($lang_id = null, $strict = true){
        if($this->lang_id == $lang_id || $lang_id == Language::getDefaultID()){
            return $this;
        }

        $translation = $this->find()->where(['source_id' => $this->getSourceID(), 'lang_id' => $lang_id])->one();

        if(!$strict && $translation === null){
            return $this->getSource();
        }

        return $translation;
    }

    /**
     * Finds source node
     * @return $this|array|null|\yii\db\ActiveRecord
     */
    public function getSource(){
        if($this->source_id == -1){
            return $this;
        }

        return $this->find()->where(['id' => $this->getSourceID(), 'lang_id' => Language::getDefaultID()])->one();
    }

    /**
     * Flushes all changes to uneditable fields
     */
    public function beforeSave($insert)
    {
        if($this->source_id != -1) {
            $source = $this->getSource();
            foreach ($this->immutables() as $attribute) {
                $this->$attribute = $source->$attribute;
            }
        }
        return parent::beforeSave($insert);
    }

    /**
     * Changes all immutable fields in translations
     */
    public function afterSave($insert, $changedAttributes)
    {
        if(!$this->isTranslation()){
            $translations = $this->find()->where(['source_id' => $this->getSourceID()])->all();
            foreach ($translations as $translation){
                foreach ($this->immutables() as $attribute){
                    $translation->$attribute = $this->$attribute;
                }
                $translation->save();
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }
}
