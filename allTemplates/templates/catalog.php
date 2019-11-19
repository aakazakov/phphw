<h2>Каталог</h2>
<section style="display: grid; grid-template-columns: repeat(5, 1fr); grid-gap: 5px;">
<?foreach ($catalog as $value):?>
    <div style="display: flex; justify-content: center; padding: 5px; background-color: grey;">
        <a href="/product/card/?id=<?=$value['id']?>">
            <img src="https://placehold.co/180?text=<?=$value['name']?>">
        </a>
    </div>
<?endforeach;?>
</section>