<div class="content__body">
    <div class="body__sticky">
        <div class="body__topbar">
            <div class="body__filter">
                <form class="filter__form" action="acts" method="post">
                    <input class="filter__botton botton" type="submit" value ="Пошук">
                    <p class="filter__lable">Автобус</p>
                    <input class="filter__input" type="text" name="search_bus">
                    <p class="filter__lable">Маршрут</p>
                    <input class="filter__input" type="text" name="search_route">
                    <p class="filter__lable">Дата акту</p>
                    <input class="filter__input" type="date" name="search_date">
                </form>
            </div>
            <a href="#" class="topbar__addbotton botton">Додати акт</a>
        </div>
        <div class="body__titlerow">
            <div class="titlerow__titles">
                <div class="act__item1 data_item">Маршрут</div>
                <div class="act__item2 data_item">Номер автобусу</div>
                <div class="act__item3 data_item">Дата акту</div>
                <div class="act__item4 data_item">Бал</div>
                <div class="act__item5 data_item">Клас</div>
                <div class="act__item6 data_item">Марка та модель автобусу</div>
                <div class="act__item7 data_item">Автотранспортне підприємство</div>
            </div>
            <div class="titlerow__bottons">
                <a href="#" class="act__item8 data_item">  </a>
                <a href="#" class="act__item9 data_item">  </a>
            </div>
        </div>
    </div>
    <?php
    for ($i = 0; $i < $count_row; $i++) {
        @include '../app/templates/default/act_row.php';
    }
    ?>

</div>
</div>
</body>
</html>