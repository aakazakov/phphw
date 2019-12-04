<strong>| Панель администратора |</strong>

<section class="status-btns" style="padding: 1vw 0;">
<?foreach ($orders as $value):?>
    <div style="padding: 1vw; border: 0.1vw dotted grey; width: fit-content;">
        <a href="/orders/anOrder/?sid=<?=$value['session_id']?>">Заказ #<?=$value['id']?></a> | <span>Статус: <?=$value['status']?></span> |
        <form action="/orders/status/?id=<?=$value['id']?>" method="post" style="display: flex; align-items: center;">
            <p>Новый статус:
                <select name="status">
                    <option value="оплачен">оплачен</option>
                    <option value="в работе">в работе</option>
                    <option value="обработан">обработан</option>
                </select>
            </p>
                <button type="submit">Ок</button>
        </form>
        <div>Kлиент: <?=$value['user_name']?> | E-mail: <?=$value['user_email']?></div>
    </div>
<?endforeach;?>
</section>
