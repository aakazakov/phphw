<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
</head>
<body style="padding: 1vw;">
    <?if ($auth):?>
        Привет,  <?=$username?>
        <a style="padding: 2px 5px; margin-left: 5px;
        background-color: lightgray; text-decoration:none;"
        href="/auth/logout/">Выход</a>
    <?else:?>
        <form action="/auth/login/" method="POST">
            <input type="text" name="login" placeholder="Логин">
            <input type="text" name="pass" placeholder="Пароль">
            <input type="submit" name="submit" value="Войти">
        </form>
    <?endif;?><hr>
    <?=$menu?>
    <?=$content?>
    <script>
        'use strict';

        const buy = (event) => {
            if (event.target.tagName !== 'BUTTON') {
                return;
            }
            const id = event.target.dataset.id;
            (
                async () => {
                    const response = await fetch('/basket/addToBasket/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json',
                        }),
                        body: JSON.stringify({
                            'id': id,
                        }),
                    });
                    const answer = await response.json();
                    console.log(answer.response, answer.id);
                }
            )();
        };

        document.querySelector('.buy-btn').addEventListener('click', buy);
    </script>
</body>
</html>
