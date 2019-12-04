<?foreach ($goods as $key => $value):?>
    <div style="border-bottom: 0.1vw dotted grey; width: fit-content; padding: 0.2vw 0">
        <?=$key+1?>. <?=$value->name?> | Цена: <?=$value->price?> р. | Описание: <?=$value->description?>.
    </div>
<?endforeach;?>
