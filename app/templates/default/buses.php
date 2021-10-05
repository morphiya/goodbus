<div class="content__body">
    <div class="body__sticky">
        <div class="body__topbar">
            <div class="body__filter">
                <form class="filter__form" action="buses" method="post">
                    <input class="filter__botton botton" type="submit" value ="Пошук">
                    <p class="filter__lable">Автобус</p>
                    <input class="filter__input" type="text" name="search_bus">
                </form>
            </div>
            <a href="#" class="topbar__addbotton botton">Додати автобус</a>
        </div>
        <div class="body__titlerow">
            <div class="titlerow__titles">
                <div class="bus__item1 data_item">Номер автобусу</div>
                <div class="bus__item2 data_item">Бал</div>
                <div class="bus__item3 data_item">Клас</div>
                <div class="bus__item4 data_item">Марка та модель автобусу</div>
                <div class="bus__item5 data_item">Місць</div>
                <div class="bus__item6 data_item">Рік випуску</div>
            </div>
            <div class="titlerow__bottons">
                <a href="#" class="bus__item8 data_item">  </a>
                <a href="#" class="bus__item9 data_item">  </a>
            </div>
        </div>
    </div>
    <?php
        foreach ($args as $bus => $bus_card) {
            @include '../app/templates/default/bus_row.php';
        }
    ?>
</div>
</div>
</div>
</body>
</html>
