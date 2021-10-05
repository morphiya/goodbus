<div class="body__actrow body__row">
    <div class="actrow__general">
        <div class="general__act">
            <div class="bus__item1 data_item"> <?php echo $args[$bus]['bus']['bus'] ?> </div>
            <div class="bus__item2 data_item"> <?php echo $args[$bus]['bus']['actual_point'] ?> </div>
            <div class="bus__item3 data_item"> <?php echo $args[$bus]['bus']['class'] ?> </div>
            <div class="bus__item4 data_item"> <?php echo $args[$bus]['bus']['brand_model'] ?> </div>
            <div class="bus__item5 data_item"> <?php echo $args[$bus]['bus']['capacity'] ?> </div>
            <div class="bus__item6 data_item"> <?php echo $args[$bus]['bus']['year'] ?> </div>
        </div>
        <div class="general__bottons">
            <a href="#" class="bus__item8 data_item">  </a>
            <a href="#" class="bus__item9 data_item">  </a>
        </div>
    </div>
    <div class="actrow__info">
        <?php
            foreach ($args[$bus]['acts'] as $act => $info) {
                @include '../app/templates/default/bus_act.php';
            }
        ?>
    </div>
</div>

