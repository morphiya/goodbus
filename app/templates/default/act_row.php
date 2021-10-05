<div class="body__actrow body__row">
    <div class="actrow__general">
        <div class="general__act">
            <div class="act__item1 data_item"> <?php echo $args[$i]['route']; ?> </div>
            <div class="act__item2 data_item"> <?php echo $args[$i]['bus']; ?> </div>
            <div class="act__item3 data_item"> <?php echo $args[$i]['date']; ?> </div>
            <div class="act__item4 data_item"> <?php echo $args[$i]['total_point']; ?> </div>
            <div class="act__item5 data_item"> <?php echo $args[$i]['class']; ?> </div>
            <div class="act__item6 data_item"> <?php echo $args[$i]['brand'].' '.$args[$i]['model']; ?> </div>
            <div class="act__item7 data_item"> <?php echo $args[$i]['atp']; ?> </div>
        </div>
        <div class="general__bottons">
            <a href="#" class="act__item8 data_item">  </a>
            <a href="#" class="act__item9 data_item">  </a>
        </div>
    </div>
    <div class="actrow__total">
        <div class="total__column1 total__column">
            <div class="total__row1 total__row">
                <div class="row1__lable row__lable">Рік випуску ТЗ:</div>
                <div class="row1__data row__data"> <?php echo $args[$i]['year']; ?> </div>
                <div class="row1__point row__point"><?php echo $args[$i]['point_year']; ?></div>
            </div>
            <div class="total__row2 total__row">
                <div class="row2__lable row__lable">Пасажиромісткість:</div>
                <div class="row2__data row__data"><?php echo $args[$i]['total_capacity']; ?></div>
                <div class="row2__point row__point"><?php echo $args[$i]['point_capacity']; ?></div>
            </div>
            <div class="total__row3 total__row">
                <div class="row3__lable row__lable">з них місць для сидіння:</div>
                <div class="row3__data row__data"><?php echo $args[$i]['seat_capacity']; ?></div>
                <div class="row3__empty row__empty"></div>
            </div>
        </div>
        <div class="total__column2 total__column">
            <div class="total__row4 total__row">
                <div class="row4__lable row__lable">стан дверей:</div>
                <div class="row4__point row__point">
                    <?php echo $args[$i]['param01'] == 1 ? '0.1' : '0'; ?>
                </div>
            </div>
            <div class="total__row5 total__row">
                <div class="row5__lable row__lable">стан люків:</div>
                <div class="row5__point row__point">
                    <?php echo $args[$i]['param02'] == 1 ? '0.2' : '0'; ?>
                </div>
            </div>
            <div class="total__row6 total__row">
                <div class="row6__lable row__lable">стан сидінь:</div>
                <div class="row6__point row__point">
                    <?php echo $args[$i]['param03'] == 1 ? '0.2' : '0'; ?>
                </div>
            </div>
            <div class="total__row7 total__row">
                <div class="row7__lable row__lable">стан поручнів:</div>
                <div class="row7__point row__point">
                    <?php echo $args[$i]['param04'] == 1 ? '0.2' : '0'; ?>
                </div>
            </div>
        </div>
        <div class="total__column3 total__column">
            <div class="total__row8 total__row">
                <div class="row8__lable row__lable">стан підлоги:</div>
                <div class="row8__point row__point">
                    <?php echo $args[$i]['param05'] == 1 ? '0.2' : '0'; ?>
                </div>
            </div>
            <div class="total__row9 total__row">
                <div class="row9__lable row__lable">стан штор:</div>
                <div class="row9__point row__point">
                    <?php echo $args[$i]['param06'] == 1 ? '0.1' : '0'; ?>
                </div>
            </div>
            <div class="total__row10 total__row">
                <div class="row10__lable row__lable">зміни у конструкції:</div>
                <div class="row10__point row__point">
                    <?php echo $args[$i]['param07'] == 1 ? '0.2' : '0'; ?>
                </div>
            </div>
            <div class="total__row11 total__row">
                <div class="row11__lable row__lable">інформація у салоні:</div>
                <div class="row11__point row__point">
                    <?php echo $args[$i]['param08'] == 1 ? '0.1' : '0'; ?>
                </div>
            </div>
        </div>
        <div class="total__column4 total__column">
            <div class="total__row12 total__row">
                <div class="row12__lable row__lable">наявність вогнегасника:</div>
                <div class="row12__point row__point">
                    <?php echo $args[$i]['param09'] == 1 ? '0.1' : '0'; ?>
                </div>
            </div>
            <div class="total__row13 total__row">
                <div class="row13__lable row__lable">наявність аптечки:</div>
                <div class="row13__point row__point">
                    <?php echo $args[$i]['param10'] == 1 ? '0.1' : '0'; ?>
                </div>
            </div>
            <div class="total__row14 total__row">
                <div class="row14__lable row__lable">наявність трафаретів:</div>
                <div class="row14__point row__point">
                    <?php echo $args[$i]['param11'] == 1 ? '0.1' : '0'; ?>
                </div>
            </div>
            <div class="total__row15 total__row">
                <div class="row15__lable row__lable">справний кондиціонер:</div>
                <div class="row15__point row__point">
                    <?php echo $args[$i]['param12'] == 1 ? '1' : '0'; ?>
                </div>
            </div>
        </div>
        <div class="total__column5 total__column">
            <div class="total__row16 total__row">
                <div class="row16__lable row__lable">зовнішній вигляд:</div>
                <div class="row16__point row__point">
                    <?php echo $args[$i]['param13'] == 1 ? '0.5' : '0'; ?>
                </div>
            </div>
            <div class="total__row17 total__row">
                <div class="row17__lable row__lable">пристосований для<br>людей з інвалідністтю:</div>
                <div class="row17__point row__point">
                    <?php echo $args[$i]['param14'] == 1 ? '1' : '0'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

