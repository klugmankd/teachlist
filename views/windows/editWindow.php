<span id="modal_close"><img src="img/buttons/closeButton.png" style="width: 25px; height: 25px" alt=""></span>
<div id="editTeacher">
<h3>Редагувати дані</h3>
<hr>
<label for="teacher_name">П.І.Б.</label>
<input type="text" id="teacher_name" name="name" class="animation" value="<?=$result['full_teacher_name']?>">
<label for="position">Посада</label>
<select class="updateSelect animation" name="position" id="position">
    <?php
    $sql_query = mysqli_query($connection, $sql_string[0]);
    while ($row = mysqli_fetch_array($sql_query)){
        if ($result['position_id'] == $row['id_position']){
            echo "<script>$(\"#position [value='".$result['position_id']."']\").attr(\"selected\", \"\");</script>";
        }
        ?>
        <option value="<?=$row['id_position']?>"><?=$row['position_name']?></option>
    <?php }?>
</select>
<label for="institution">Навчальний заклад</label>
<select class="updateSelect animation" name="institution" id="institution">
    <?php
    $sql_query = mysqli_query($connection, $sql_string[1]);
    while ($row = mysqli_fetch_array($sql_query)){
        if ($result['ei_id'] == $row['id_ei']){
            echo "<script>$(\"#institution [value='".$result['ei_id']."']\").attr(\"selected\", \"\");</script>";
        }
        ?>
        <option value="<?=$row['id_ei']?>"><?=$row['name_ei']?></option>
    <?php }?>
</select>
<label for="category">Категорія</label>
<select class="updateSelect animation" name="category" id="category">
    <?php
    $sql_query = mysqli_query($connection, $sql_string[2]);
    while ($row = mysqli_fetch_array($sql_query)){
        if ($result['category_id'] == $row['id_category']){
            echo "<script>$(\"#category [value='".$result['category_id']."']\").attr(\"selected\", \"\");</script>";
        }
        ?>
        <option value="<?=$row['id_category']?>"><?=$row['category']?></option>
    <?php }?>
</select>
<label for="rank">Педагогічне звання</label>
<select class="updateSelect animation" name="rank" id="rank">
    <?php
    $sql_query = mysqli_query($connection, $sql_string[3]);
    while ($row = mysqli_fetch_array($sql_query)){
        if ($result['rank_id'] == $row['id_rank']){
            echo "<script>$(\"#rank [value='".$result['rank_id']."']\").attr(\"selected\", \"\");</script>";
        }
        ?>
        <option value="<?=$row['id_rank']?>"><?=$row['teaching_rank']?></option>
    <?php }?>
</select>
<label for="pdd">ПДД</label>
<textarea class="animation" name="pdd" id="pdd"><?=$result['PDD']?></textarea>
<input type="button" id="update" class="button animation" value="Оновити" >
<input type="button" id="goToInsertPhoto" class="button animation" value="Додати фото" >
</div>
<div id="addPhoto" style="display: none;">
    <h3>Додати фото</h3>
    <hr>
    <form action="controllers/uploadController.php" method="post" enctype="multipart/form-data">
        <label>ID</label>
        <input type="text" name="id" class="updateSelect animation" value="<?=$result['id_teacher']?>">
        <label>Фото</label>
        <input type="file" name="img" id="img">
        <input type="submit" id="insertPhoto" class="button animation">
        <input type="button" id="goToUpdateTeacher" class="button animation" value="Редагувати дані" >
    </form>
</div>
<div id="messageShow">
    <div class='clear'><br></div>
</div>