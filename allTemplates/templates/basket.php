<h2>Корзина</h2>
<section class="del-btns" style="display: grid; grid-template-columns: repeat(5, 1fr); grid-gap: 5px; max-width: 70%;">
<?foreach ($products as $value):?>
    <div id="<?=$value['id_basket']?>" style="display: flex; flex-direction: column; align-items: center; padding: 5px; background-color: grey;">
        <a href="/product/card/?id=<?=$value['id_prod']?>">
            <img src="https://placehold.co/180?text=<?=$value['name']?>">
        </a>
        <button class="del" data-id="<?=$value['id_basket']?>">Удалить</button>
    </div>
<?endforeach;?>
<?if (count($products) === 0):?>
    <strong>Ваша корзина пуста</strong>
<?endif;?>
</section>
