<?php

class Select extends Connection{
    
    public function print_result_search ($sql_string){
        $sql_query = mysqli_query($this->connect_db(), $sql_string);
        while ($result = mysqli_fetch_array($sql_query)) {
            include('../views/searchContent.php');
        }
        $this->disconnect_db();
    }

    public function print_one_teacher ($criteria) {
        $sql_string = "SELECT * FROM teachers_view WHERE id = $criteria";
        $sql_query = mysqli_query($this->connect_db(), $sql_string);
        $result = mysqli_fetch_array($sql_query);
        $this->disconnect_db();
        return $result;
    }

    public function print_all_teachers () {
        $sql_string = "SELECT * FROM teachers_view order by full_teacher_name";
        $sql_query = mysqli_query($this->connect_db(), $sql_string);
        $this->disconnect_db();
        return $sql_query;
    }

    public function print_all_subjects () {
        $sql_string = "SELECT * FROM subjects";
        $sql_query = mysqli_query($this->connect_db(), $sql_string);
        $this->disconnect_db();
        return $sql_query;
    }

    public function print_subjects_by_teacher_id ($id) {
        $string = "";
        $sql_string = "SELECT subject FROM teacher_with_subject_view WHERE id_teach = $id";
        $sql_query = mysqli_query($this->connect_db(), $sql_string);
        while ($row = mysqli_fetch_array($sql_query)) {
            $string .= $row['subject'].", ";
        }
        $string = substr($string, 0, -2);
        $this->disconnect_db();
        return $string;
    }
}