<div id="modal_form">
    <span id="modal_close">X</span>
    <div class="profileTeacherModal">
<!--        <div class="profilePhotoModal" style="background: url('../img/--><?//=$result['url_img']?>/*') center; background-size: cover">*/
/*        </div>*/
/*        <div style="text-align: left; display: none">*/
/*            <p>*/<?//=$result['PDD']?><!--</p>-->
        </div>
        <div id="interests" style="display: block">
            <span class="interests">П.І.Б.<hr></span>
            <div id="pib" class="interese">
                <?=$result['full_teacher_name']?>
            </div>
            <span class="interests" onclick="anichanged('#institution','#position', '#category', '#rank'); return false">Навчальний заклад<hr></span><br>
            <div id="institution" class="interese" style="display: none">
                <?=$result['education_institution']?>
            </div>
            <span class="interests" onclick="anichanged('#position','#institution', '#category', '#rank'); return false">Посада<hr></span><br>
            <div id="position" class="interese" style="display: none">
                <?=$result['position_name']?>
            </div>
            <span class="interests" onclick="anichanged('#category','#position','#institution', '#rank'); return false">Категорія<hr></span><br>
            <div id="category" class="interese" style="display: none">
                <?=$result['category']?>
            </div>
            <span class="interests" onclick="anichanged('#rank', '#category','#position','#institution'); return false">Педагогічне звання<hr></span><br>
            <div id="rank" class="interese" style="display: none">
                <?=$result['teaching_rank']?>
            </div>
        </div>
    </div>
</div>
<div id="overlay"></div>