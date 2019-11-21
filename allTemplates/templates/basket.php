<h2>Корзина</h2>

<section class="buy-btn" style="display: grid; grid-template-columns: repeat(5, 1fr); grid-gap: 5px; max-width: 70%;">
<?if (count($products) == 0):?>
    <strong>Ваша корзина пуста</strong>
<?endif;?>
<?foreach ($products as $value):?>
    <div style="display: flex; flex-direction: column; align-items: center; padding: 5px; background-color: grey;">
        <a href="/product/card/?id=<?=$value['id_prod']?>">
            <img src="https://placehold.co/180?text=<?=$value['name']?>">
        </a>
        <button class="buy" data-id="<?=$value['id_basket']?>">Удалить</button>
    </div>
<?endforeach;?>
</section>
