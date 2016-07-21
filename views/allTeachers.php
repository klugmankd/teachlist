<div class="teachers" id="teacher_<?=$result['id']?>">
    <div id="name"><span>П.І.Б: </span><?=$result['full_teacher_name']?></div>
    <hr>
    <div class="buttons">
        <div class="edit" id="<?=$result['id']?>">
            <img src="img/buttons/editButton.png" alt="">
        </div>
        <div class="delete" id="<?=$result['id']?>">
            <img src="img/buttons/deleteButton.png" alt="">
        </div>
    </div>
    <br>
    <div id="position"><span>Посада: </span><?=$result['position_name']?></div>
    <div id="institution"><span>Навчальний заклад: </span><?=$result['educatioal_institution']?></div>
    <div id="category"><span>Категорія: </span><?=$result['category']?></div>
    <div id="rank"><span>Звання: </span><?=$result['teaching_rank']?></div>
    <div id="subject"><span>Предмети: </span><?=$subjects?></div>
    <div id="pdd"><span>ПДД: </span><?=$result['PDD']?></div>
</div>