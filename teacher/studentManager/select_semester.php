<div class="form-group">
    <select name="maHK" id="maHK" class="form-control">
    <?php
        $sql_semester = "select * from semester order by rank";
        $sql_semester_run = $connect->query($sql_semester);
        if($sql_semester_run->num_rows > 0){
            while($sql_semester_item = $sql_semester_run->fetch_assoc()){
                // echo ;
                ?>
                <option value="<?=$sql_semester_item['maHK']?>"><?=$sql_semester_item['name']?></option>
                    <!-- <label for="maHK<?=$index?>"><?=$sql_semester_item['name']?></label> -->
                    <!-- <input type="radio" id="maHK<?=$index?>" class="input_maHK" name="maHK" value="<?= $sql_semester_item['maHK'] ?>"><br> -->
                <?php
                // $index++;
            }
        }
    ?>
    </select>
</div>