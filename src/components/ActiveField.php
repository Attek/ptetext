<?php
/**
 * Created by PhpStorm.
 * User: attek
 * Date: 2017/04/05
 * Time: 10:01
 */

namespace attek\text\components;
use yii\helpers\Html;

class ActiveField extends \yii\widgets\ActiveField
{
    public $template = "{label}\n{hint}\n{input}\n{error}";

    /**
     * hint('content') print question mark with anchor and use it with tooltip
     * @param bool|string $content
     * @param array $options
     * @return $this
     */
    public function hint($content, $options = [])
    {
        if (!empty($content) && !empty($options['slug'])) {
            if (!empty($content)) {
                $options['hint'] = Html::a(Html::tag('i', '', ['class' => 'fa fa-question-circle']), null,
                    ['data-placement' => 'top',  'data-toggle'=> 'popover', 'data-slug' => $options['slug'], 'title' => $content]);
                $options['tag'] = 'span';
                $this->parts['{hint}'] = Html::activeHint($this->model, $this->attribute, $options);
                return $this;
            } else {
                $this->parts['{hint}'] = '';
                return $this;
            }
        }
	    return parent::hint($content, $options);
    }
}