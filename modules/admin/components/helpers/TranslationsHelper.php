<?php
namespace yii\fluent\modules\admin\components\helpers;


use yii\fluent\models\Language;

class TranslationsHelper
{
    /**
     * Returns Translations links for Create action
     * @param $model
     * @return array
     */
    public static function getCreateItems($model, $urlPrefix){
        if($model->source_id == -1){
            return [
                ['label' => strtoupper(\yii\fluent\models\Language::getDefault()->title), 'icon' => 'fa fa-language', 'url' => [$urlPrefix.'/create']]
            ];
        }
        else{
            return TranslationsHelper::getUpdateItems($model, $urlPrefix);
        }
    }

    /**
     * Returns Translations links for Update action
     * @param $model
     * @return array
     */
    public static function getUpdateItems($model, $urlPrefix){
        $items = [];
        $defaultLang = \yii\fluent\models\Language::getDefault();

        $items[] = ['label' => strtoupper($defaultLang->title), 'icon' => 'fa fa-language', 'url' => [$urlPrefix.'/update', 'id' => $model->getSourceID()]];

        $langs = Language::getLangs();

        foreach ($langs as $lang){
            if($lang->id != $defaultLang->id){
                $translation = $model->getTranslation($lang->id);
                $items[] = ['label' => strtoupper($lang->title), 'icon' => 'fa fa-language',
                    'url' => ($translation === null || $translation->isNewRecord)? [$urlPrefix.'/create', 'lang_id' => $lang->id, 'source_id' => $model->getSourceID()] : [$urlPrefix.'/update', 'id' => $translation->id]
                ];
            }
        }

        return $items;
    }
}