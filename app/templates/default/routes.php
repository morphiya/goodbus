<div class="content__body">
    <div class="body__sticky">
        <div class="body__topbar">
            <div class="body__filter">
                <form class="filter__form" action="routes" method="post">
                    <input class="filter__botton botton" type="submit" value ="Пошук">
                    <p class="filter__lable">Маршрут</p>
                    <input class="filter__input" type="text" name="search_route">
                    <p class="filter__lable">АТП</p>
                    <input class="filter__input" type="text" name="search_atp">
                </form>
            </div>
            <div class="body__bottons">
                <a href="#" class="topbar__addRouteBotton botton">Додати маршрут</a>
                <a href="#" class="topbar__addAtpBotton botton">Додати АТП</a>
            </div>
        </div>
        <div class="body__titlerow">
            <div class="titlerow__titles">
                <div class="route__item1 data_item">Маршрут</div>
                <div class="route__item2 data_item">Середній бал</div>
                <div class="route__item3 data_item">Автотранспортне підприємство</div>
                <div class="route__item4 data_item">Кількість актів</div>
                <div class="route__item5 data_item">Останній акт</div>
            </div>
            <div class="titlerow__bottons">
                <a href="#" class="route__item8 data_item">  </a>
                <a href="#" class="route__item9 data_item">  </a>
            </div>
        </div>
    </div>
    <?php
    for ($i = 0; $i < $count_row; $i++) {
        @include '../app/templates/default/route_row.php';
    }
    ?>
</div>
