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
</section>
<?if (count($products)):?>
    <hr>
    <p>Оформление заказа</p>
    <form action="/orders/issue" method="post">
        <input type="text" name="name" placeholder="ваше имя">
        <input type="tel" name="tel" placeholder="номер телефона">
        <input type="email" name="email" placeholder="e-mail">
        <button type="submit">Заказать</button>
    </form>
<?endif;?>
<?if (!count($products)):?>
    <strong>Ваша корзина пуста</strong>
<?endif;?>
