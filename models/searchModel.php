<?php
    include_once ('printModel.php');

    function search_by_subject ($connection, $subject) {
        $sql_string = "SELECT teachers.id_teacher, teachers.full_teacher_name, teacher_position.position_name 
									   FROM `teachers_with_subjects`, `teachers`, `teacher_position` 
									   where subject_id = ".$subject."
                                       and position_id = id_position
									   and teacher_id = id_teacher
                                       order by full_teacher_name";
        print_result_search($connection, $sql_string);
    }

    function search_by_rank ($connection, $rank) {
        $sql_string = "SELECT teachers.id_teacher, teachers.full_teacher_name, teacher_position.position_name
									   FROM `teachers`, `teacher_position`
									   where rank_id = ".$rank."
                                       and position_id = id_position 
                                       order by full_teacher_name;";
        print_result_search($connection, $sql_string);
    }

    function search_by_institution ($connection, $institution) {
        $sql_string = "SELECT teachers.id_teacher, teachers.full_teacher_name, teacher_position.position_name
									   FROM `teachers`, `teacher_position`
									   where ei_id = ".$institution."
                                       and position_id = id_position 
                                       order by full_teacher_name;";
        print_result_search($connection, $sql_string);
    }

    function search_by_rank_subject ($connection, $rank, $subject) {
        $sql_string = "SELECT teachers.id_teacher, teachers.full_teacher_name, teacher_position.position_name
									   FROM `teachers_with_subjects`, `teachers`, `teacher_position`
									   where teacher_id = id_teacher
									   and subject_id = ".$subject."
									   and rank_id = ".$rank."
                                       and position_id = id_position 
                                       order by full_teacher_name;";
        print_result_search($connection, $sql_string);
    }

    function search_by_institution_subject ($connection, $institution, $subject) {
        $sql_string = "SELECT teachers.id_teacher, teachers.full_teacher_name, teacher_position.position_name
									   FROM `teachers_with_subjects`, `teachers`, `teacher_position`
									   where teacher_id = id_teacher
									   and ei_id = ".$institution."
									   and subject_id = ".$subject."
                                       and position_id = id_position 
                                       order by full_teacher_name;";
        print_result_search($connection, $sql_string);
    }

    function search_by_rank_institution ($connection, $rank, $institution) {
        $sql_string = "SELECT teachers.id_teacher, teachers.full_teacher_name, teacher_position.position_name
									   FROM `teachers_with_subjects`, `teachers`, `teacher_position`
									   where teacher_id = id_teacher
									   and ei_id = ".$institution."
									   and rank_id = ".$rank."
                                       and position_id = id_position 
                                       order by full_teacher_name;";
        print_result_search($connection, $sql_string);
    }

    function search_by_rank_subject_institution ($connection, $institution, $rank, $subject) {
        $sql_string = "SELECT teachers.id_teacher, teachers.full_teacher_name, teacher_position.position_name
									   FROM `teachers_with_subjects`, `teachers`, `teacher_position`
									   where teacher_id = id_teacher
									   and ei_id = ".$institution."
									   and rank_id = ".$rank."
									   and subject_id = ".$subject."
                                       and position_id = id_position 
                                       order by full_teacher_name;";
        print_result_search($connection, $sql_string);
    }

    function search_by_name ($connection, $name) {
        $sql_string = "SELECT id_teacher, full_teacher_name, position_name
                              FROM teachers, teacher_position 
                              WHERE `full_teacher_name` 
                              LIKE '%".$name."%' 
                              AND position_id = id_position
                              ORDER BY full_teacher_name;";
        print_result_search($connection, $sql_string);
    }

    function search_by_name_return_id ($connection, $name) {
        $sql_string = "SELECT id_teacher
                              FROM teachers
                              WHERE `full_teacher_name` 
                              LIKE '$name%' 
                              ORDER BY full_teacher_name;";
        $sql_query = mysqli_query($connection, $sql_string);
        $result = mysqli_fetch_array($sql_query);
        return $result;
    }