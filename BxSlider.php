<?php
class BxSlider extends CWidget
{
	public $htmlOptions = array();
	public $options = array();
	public $items = array();
	public $cssFile = null;

	public function init()
	{
		if ( empty($this->htmlOptions['id']) ) {
			$this->htmlOptions['id'] = $this->getId();
		}
		$this->registerClientScript();
	}
 
    public function run()
    {
    	echo CHtml::openTag('ul', $this->htmlOptions);
    	if( !empty($this->items) ){
    		foreach ($this->items as $item) {
    			echo CHtml::openTag('li');
    			echo $item;
    			echo CHtml::closeTag('li');
    		}
    		
    	}
    	echo CHtml::closeTag('ul');

    	$default_options = array(
			'mode' => 'horizontal',
			'slideSelector' => '',
			'infiniteLoop' => true,
			'hideControlOnEnd' => false,
			'speed' => 500,
			'easing' => null,
			'slideMargin' => 0,
			'startSlide' => 0,
			'randomStart' => false,
			'captions' => false,
			'tickerHover' => false,
			'adaptiveHeight' => false,
			'adaptiveHeightSpeed' => 500,
			'video' => false,
			'useCSS' => true,
			'preloadImages' => 'visible',
			'responsive' => true,
			'slideZIndex' => 50,
			'wrapperClass' => 'bx-wrapper',
		);
    	if( empty($this->options) ){
    		$this->options = $default_options;
    	}else{
    		$this->options = array_merge($default_options, $this->options);
    	}

    	$js_options = CJavaScript::encode($this->options);

		Yii::app()->getClientScript()->registerScript(__CLASS__, "
			$(document).ready(function(){
				$('#".$this->htmlOptions['id']."').bxSlider($js_options);
			});
		");
    }

    protected function registerClientScript()
    {
		$assets = dirname(__FILE__).'/dist';
		$baseUrl = Yii::app()->assetManager->publish($assets);

        $cs = Yii::app()->clientScript;

        $cs->registerCoreScript('jquery', CClientScript::POS_END);
        $cs->registerScriptFile($baseUrl.'/jquery.bxslider.min.js', CClientScript::POS_END);
        
        if( empty($this->cssFile) ){
        	$cs->registerCssFile($baseUrl.'/jquery.bxslider.css');
        }else{
        	$cs->registerCssFile($this->cssFile);
        }
        
    }
}
?>
