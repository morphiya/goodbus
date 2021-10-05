    <div class="bus__row">
        <div class="bus__actitem1 bus__actitem">
            <div class="bus__lable">Дата акту:</div>
            <div class="bus__data"> <?php echo $args[$bus]['acts'][$act]['date'] ?> </div>
        </div>
        <div class="bus__actitem2 bus__actitem">
            <div class="bus__lable">Маршрут:</div>
            <div class="bus__data"> <?php echo $args[$bus]['acts'][$act]['route'] ?> </div>
        </div>
        <div class="bus__actitem3 bus__actitem">
            <div class="bus__lable">Бал:</div>
            <div class="bus__data"> <?php echo $args[$bus]['acts'][$act]['total_point'] ?> </div>
        </div>
        <div class="bus__actitem4 bus__actitem">
            <div class="bus__lable">АТП:</div>
            <div class="bus__data"><?php echo $args[$bus]['acts'][$act]['atp'] ?></div>
        </div>
        <div class="bus__actitem5 bus__actitem">
            <div class="bus__lable">Проблеми:</div>
            <div class="bus__data"><?php echo $args[$bus]['acts'][$act]['problems'] ?></div>
        </div>
    </div>

