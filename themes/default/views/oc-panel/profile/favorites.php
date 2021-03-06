<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="page-header">
	<h1><?=__('My Favorites')?></h1>
	<small><a target='_blank' href='http://docs.yclas.com/add-chosen-ads-favourites/'><?=__('Read more')?></a></small>		
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><?=__('Advertisement') ?></th>
                        <th><?=__('Favorited') ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach($favorites as $favorite):?>
                        <tr id="tr<?=$favorite->id_favorite?>">
                            <td><a target="_blank" href="<?=Route::url('ad', array('controller'=>'ad','category'=>$favorite->ad->category->seoname,'seotitle'=>$favorite->ad->seotitle))?>"><?= wordwrap($favorite->ad->title, 15, "<br />\n"); ?></a></td>
                            <td><?= Date::format($favorite->created, core::config('general.date_format'))?></td>
                            <td>
                                <a 
                                    href="<?=Route::url('oc-panel', array('controller'=>'profile', 'action'=>'favorites','id'=>$favorite->id_ad))?>" 
                                    class="btn btn-danger index-delete index-delete-inline" 
                                    title="<?=__('Are you sure you want to delete?')?>" 
                                    data-id="tr<?=$favorite->id_favorite?>" 
                                    data-btnOkLabel="<?=__('Yes, definitely!')?>" 
                                    data-btnCancelLabel="<?=__('No way!')?>">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>