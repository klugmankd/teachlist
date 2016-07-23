<?php
    $array_sql_string = array("SELECT * FROM subjects;","SELECT id_ei, name_ei FROM educational_institution;", "SELECT * FROM teaching_rank;");
    $array_sql_query = array();
    for ($i = 0; $i < 3; $i++) {
        $array_sql_query[$i] = mysqli_query($connection, $array_sql_string[$i]);
    }
?>
<!--<div id="secondSection"></div>-->
<div class="section" id="search">
    <h2>Пошук<hr></h2>
        <input type="text" id="searchLine" class="animation" name="word" autocomplete="off" placeholder="кого шукаємо?">
        <div id="searchCategory">
            <select class="category" name="subject" id="">
                <option selected value="">За предметом</option>
                <?php while ($result = mysqli_fetch_array($array_sql_query[0])) {?>
                <option value="<?=$result['id_subject']?>"><?=$result['subject']?></option>
                <?php }?>
            </select>
            <select class="category" name="institution" id="">
                <option selected value="">За закладом</option>
                <?php while ($result = mysqli_fetch_array($array_sql_query[1])) {?>
                <option value="<?=$result['id_ei']?>"><?=$result['name_ei']?></option>
                <?php }?>
            </select>
            <select class="category" name="rank" id="">
                <option selected value="">За званням</option>
                <?php while ($result = mysqli_fetch_array($array_sql_query[2])) {?>
                <option value="<?=$result['id_rank']?>"><?=$result['teaching_rank']?></option>
                <?php }?>
            </select>
        </div>
    <div id="search_result"></div>
</div>