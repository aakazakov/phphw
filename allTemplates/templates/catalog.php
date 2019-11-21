<h2>Каталог</h2>
<section class="catalog" style="display: grid; grid-template-columns: repeat(5, 1fr); grid-gap: 5px; max-width: 70%;">
<?foreach ($catalog as $value):?>
    <div style="display: flex; flex-direction: column; align-items: center; padding: 5px; background-color: grey;">
        <a href="/product/card/?id=<?=$value['id']?>">
            <img src="https://placehold.co/180?text=<?=$value['name']?>">
        </a>
        <button class="buy" data-id="<?=$value['id']?>">Купить</button>
    </div>
<?endforeach;?>
</section>

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
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    'id': id
                })
            });
            const answer = await response.json();
            console.log(answer.response, answer.id);
        }
        )();
    };

    document.querySelector('.catalog').addEventListener('click', buy);
</script>
