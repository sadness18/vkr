<?php
    function get_files_on_server($link) // функция переноса выбранных файлов на сервер в папку files
    {
        foreach($_FILES["select_file"]["error"] as $key => $error)
        {
            if($error == UPLOAD_ERR_OK)
            {
                $tmp_name = $_FILES["select_file"]["tmp_name"][$key];
                $name = $_FILES["select_file"]["name"][$key];
                $correct_name = iconv("UTF-8", "windows-1251", $name);
                $dir = $_SERVER['DOCUMENT_ROOT'].'/files/'.$correct_name;
                move_uploaded_file($tmp_name, $dir);
                $res[$key] = parse_excel_file($dir);
                add_data_in_db($link, $res, $key);
            }
        }
        return $res;
    }

    function parse_excel_file( $filename ) // функция "вытаскивания" данных из excel в массив php
    {
        // путь к библиотеки от корня сайта
        require_once '/Classes/PHPExcel.php';
        $result = array();
        // получаем тип файла (xls, xlsx), чтобы правильно его обработать
        $file_type = PHPExcel_IOFactory::identify( $filename );
        // создаем объект для чтения
        $objReader = PHPExcel_IOFactory::createReader( $file_type );
        $objPHPExcel = $objReader->load( $filename ); // загружаем данные файла
        $result = $objPHPExcel->getActiveSheet()->toArray(); // выгружаем данные

        return $result;
    }

    function add_data_in_db($link, $res, $key) // функция добавления данных из excel файл в БД в таблицу maintable
    {
        $company_name = trim($res[$key][3][2]);
        $sql = "SELECT id FROM company_name WHERE name = ('".$company_name."')";
        $result = $link->query($sql);
        if (!$result)
            print_r("Запрос не сработал: ".$link->error);
        
        if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $company_name_id = $row["id"];
            }
            //echo("aaa");
        }
        
        $str_with_date = $res[$key][2][0];
        $normal_date = mb_substr($str_with_date, 167, 4)."-".mb_substr($str_with_date, 164, 2)."-".mb_substr($str_with_date, 161, 2);
        
        $source_id = 1;
        for ($i = 14; $i < 21; $i++)
        {
            if ($i == 15)
                continue;
            
            $sql = "INSERT INTO maintable VALUES (NULL, '".$company_name_id."', '".$normal_date."', '".$source_id."', '".$res[$key][$i][2]."'
            , '".$res[$key][$i][3]."', '".$res[$key][$i][4]."', '".$res[$key][$i][5]."', '".$res[$key][$i][6]."', '".$res[$key][$i][7]."'
            , '".$res[$key][$i][8]."', '".$res[$key][$i][9]."', '".$res[$key][$i][10]."', '".$res[$key][$i][11]."', '".$res[$key][$i][12]."'
            , '".$res[$key][$i][13]."', '".$res[$key][$i][14]."', '".$res[$key][$i][15]."', '".$res[$key][$i][16]."', '".$res[$key][$i][17]."'
            , '".$res[$key][$i][18]."', '".$res[$key][$i][19]."', '".$res[$key][$i][20]."', '".$res[$key][$i][21]."', '".$res[$key][$i][22]."'
            , '".$res[$key][$i][23]."', '".$res[$key][$i][24]."', '".$res[$key][$i][25]."', '".$res[$key][$i][26]."', '".$res[$key][$i][27]."'
            , '".$res[$key][$i][28]."', '".$res[$key][$i][29]."', '".$res[$key][$i][30]."', '".$res[$key][$i][31]."', '".$res[$key][$i][32]."'
            , '".$res[$key][$i][33]."', '".$res[$key][$i][34]."', '".$res[$key][$i][35]."', '".$res[$key][$i][36]."', '".$res[$key][$i][37]."'
            , '".$res[$key][$i][38]."')";
            
            $result = $link->query($sql);
            if (!$result)
                print_r("Запрос не сработал: ".$link->error);
            
            $source_id++;
        }
        
    }
?>
