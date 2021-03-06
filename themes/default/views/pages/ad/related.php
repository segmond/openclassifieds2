<?php defined('SYSPATH') or die('No direct script access.');?>

<?if(count($ads)):?>
    <h3><?=__('Related ads')?></h3>
    <?foreach($ads as $ad ):?>
        <div class="media">
            <?if($ad->get_first_image() !== NULL):?>
                <div class="media-left">
                    <?$images_base = (core::config('image.aws_s3_active')) ? ((Core::is_HTTPS()) ? 'https://' : 'http://').core::config('image.aws_s3_domain') : URL::base()?>
                    <a title="<?=HTML::chars($ad->title);?>" href="<?=Route::url('ad', array('controller'=>'ad','category'=>$ad->category->seoname,'seotitle'=>$ad->seotitle))?>">
                        <img class="media-object" style="width: 64px; height: 64px;" src="<?=$images_base?><?=$ad->get_first_image()?>" alt="<?= HTML::chars($ad->title)?>">
                    </a>
                </div>
            <?endif?>
            <div class="media-body">
                <h4 class="media-heading">
                    <?if($ad->featured >= Date::unix2mysql(time())):?>
                        <span class="label label-danger pull-right"><?=__('Featured')?></span>
                    <?endif?>
                    <a title="<?=HTML::chars($ad->title);?>" href="<?=Route::url('ad', array('controller'=>'ad','category'=>$ad->category->seoname,'seotitle'=>$ad->seotitle))?>"> <?=$ad->title; ?></a>
                </h4>
                <p><?=Text::limit_chars(Text::removebbcode($ad->description), 255, NULL, TRUE);?> 
                    <?if($ad->id_location != 1):?>
                        <a href="<?=Route::url('list',array('location'=>$ad->location->seoname))?>" title="<?=HTML::chars($ad->location->name)?>">
                            <span class="label label-default"><?=$ad->location->name?></span>
                        </a>
                    <?endif?>
                </p>
            </div>
        </div>
    <?endforeach?>
<?endif?>
