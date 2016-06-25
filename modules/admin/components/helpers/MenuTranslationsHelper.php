<?php
namespace yii\fluent\modules\admin\components\helpers;


use yii\fluent\models\Language;

class MenuTranslationsHelper
{
    /**
     * Returns Translations links for Create action
     * @param $model
     * @return array
     */
    public static function getCreateItems($model){
        if($model->source_id == -1){
            return [
                ['label' => strtoupper(\yii\fluent\models\Language::getDefault()->title), 'icon' => 'fa fa-language', 'url' => ['menu/create-item', 'menu_id' => $model->menu_id]]
            ];
        }
        else{
            return MenuTranslationsHelper::getUpdateItems($model);
        }
    }

    /**
     * Returns Translations links for Update action
     * @param $model
     * @return array
     */
    public static function getUpdateItems($model){
        $items = [];
        $defaultLang = \yii\fluent\models\Language::getDefault();

        $items[] = ['label' => strtoupper($defaultLang->title), 'icon' => 'fa fa-language', 'url' => ['menu/update-item', 'id' => $model->getSourceID()]];

        $langs = Language::getLangs();

        foreach ($langs as $lang){
            if($lang->id != $defaultLang->id){
                $translation = $model->getTranslation($lang->id);
                $items[] = ['label' => strtoupper($lang->title), 'icon' => 'fa fa-language',
                    'url' => ($translation === null || $translation->isNewRecord)? ['menu/create-item', 'lang_id' => $lang->id, 'source_id' => $model->getSourceID(), 'menu_id' => $model->menu_id] : ['menu/update-item', 'id' => $translation->id]
                ];
            }
        }

        return $items;
    }
}