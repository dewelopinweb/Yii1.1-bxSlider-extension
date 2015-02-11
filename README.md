# Yii1.1-bxSlider-extension
This extension is a wrapper for bxSlider

###Call the bxSlider widget

	$this->widget('ext.BxSlider.BxSlider', array(
		'items' => array(
		    CHtml::image($item->src, $item->alt_name, array('title'=>$item->title)),
		    CHtml::image($item->src, $item->alt_name, array('title'=>$item->title)),
		    CHtml::link(CHtml::image($item->src, $item->alt_name), $item->link)
		),
		'cssFile' => '/static/site/css/slider.css',
		'options' => array(
			'auto' => true,
			//'slideWidth' => 300,
		)
	));
