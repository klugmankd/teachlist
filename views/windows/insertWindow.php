<span id="modal_close"><img src="img/buttons/closeButton.png" style="width: 25px; height: 25px" alt=""></span>
<div id="addTeacher" style="display: block">
<h3>Додати вчителя</h3>
<hr>
<label for="teacher_name">П.І.Б.</label>
<input type="text" id="teacher_name" name="name" class="animation">
<label for="position">Посада</label>
<select class="updateSelect animation" name="position" id="position">
    <option selected></option>
    <?php
    $sql_query = mysqli_query($connection, $sql_string[0]);
    while ($row = mysqli_fetch_array($sql_query)){ ?>
        <option value="<?=$row['id_position']?>"><?=$row['position_name']?></option>
    <?php }?>
</select>
<label for="institution">Навчальний заклад</label>
<select class="updateSelect animation" name="institution" id="institution">
    <option selected></option>
    <?php
    $sql_query = mysqli_query($connection, $sql_string[1]);
    while ($row = mysqli_fetch_array($sql_query)){ ?>
        <option value="<?=$row['id_ei']?>"><?=$row['name_ei']?></option>
    <?php }?>
</select>
<label for="category">Категорія</label>
<select class="updateSelect animation" name="category" id="category">
    <option selected></option>
    <?php
    $sql_query = mysqli_query($connection, $sql_string[2]);
    while ($row = mysqli_fetch_array($sql_query)){ ?>
        <option value="<?=$row['id_category']?>"><?=$row['category']?></option>
    <?php }?>
</select>
<label for="rank">Педагогічне звання</label>
<select class="updateSelect animation" name="rank" id="rank">
    <option selected></option>
    <?php
    $sql_query = mysqli_query($connection, $sql_string[3]);
    while ($row = mysqli_fetch_array($sql_query)){ ?>
        <option value="<?=$row['id_rank']?>"><?=$row['teaching_rank']?></option>
    <?php }?>
</select>
<label for="pdd">ПДД</label>
<textarea class="animation" name="pdd" id="pdd"></textarea>
<input type="button" id="insertTeacher" class="button animation" value="Додати вчителя" >
<input type="button" id="goToInsertSubject" class="button animation" value="Додати предмет">
</div>
<div id="addSubject" style="display: none;">
    <h3>Додати предмет вчителю</h3>
    <hr>
    <label for="name_teacher">П.І.Б.</label>
    <select class="updateSelect animation" name="name_teacher" id="name_teacher">
        <option selected></option>
        <?php while ($row = mysqli_fetch_array($query)){?>
            <option value='<?=$row['id']?>'><?=$row['full_teacher_name']?></option>
        <?php } ?>
    </select>
    <label for="subject">Предмет</label>
    <select class="updateSelect animation" name="subject" id="subject">
        <option selected></option>
        <?php
        $sql_query = mysqli_query($connection, $sql_string[4]);
        while ($row = mysqli_fetch_array($sql_query)){ ?>
            <option value='<?=$row['id_subject']?>'><?=$row['subject']?></option>
        <?php }?>
    </select>
    <input type="button" id="insertSubject" class="button animation" value="Додати предмет">
    <input type="button" id="goToInsertTeacher" class="button animation" value="Додати вчителя" >
</div>
<div id="messageShow">
    <div class='clear'></div>
</div>