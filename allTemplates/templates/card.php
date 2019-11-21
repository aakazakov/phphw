<div class="buy-btn" style="width:min-content; padding: 5px; border: 1px solid grey;">
    <img src="https://placehold.co/180?text=<?=$product->name?>">
    <h2><?=$product->name?></h2>
    <p><?=$product->description?></p>
    <span><?=$product->price?></span> р.
    <button class="buy" data-id="<?=$product->id?>" style="margin-left: 5px; padding: 2px 5px;">Купить</button>
</div>
