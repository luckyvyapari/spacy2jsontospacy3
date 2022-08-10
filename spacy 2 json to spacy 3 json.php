function spacy2tospacy3() {
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/recruitnxt_ats/myText.json", "wb");
    $content = '';
    $content.= '{';
    $content.= '"classes": [
      "NAME","EMAIL_ADDRESS","LOCATION","LINKS","SKILLS","GRADUATION_YEAR","COLLEGE_NAME","DEGREE","GRADUATION_YEAR","COMPANIES_WORKED_AT"
    
    
  ],';
    $content.= '"annotations": [';
    $data = file_get_contents("http://localhost/recruitnxt_ats/del_json_annotation1.json");
    $json = json_decode($data, true);
    foreach ($json as $key => $value) {
        $content.= '["';
        $content.= str_replace(array("\r\n", "\n", "\r", '"', ","), ' ', cleanInput($value['content']));
        $content.= '",{"entities": [';
        if (!empty($value['annotation'])) {
            if (is_array($value['annotation'])) {
                $my_string_temp = "";
                foreach ($value['annotation'] as $key => $value_annotation) {
                    if (isset($value_annotation['label'][0])) {
                        if ($value_annotation['label'][0] == 'Name') {
                            $start_date = $value_annotation['points'][0]['start'];
                            $end_date = $value_annotation['points'][0]['end'];
                            $my_string_temp.= '  [ 
           ' . $start_date . ',   
            ' . $end_date . ',   
            "NAME"   
          ] , ';
                        }
                        if ($value_annotation['label'][0] == 'Email Address') {
                            $start_date = $value_annotation['points'][0]['start'];
                            $end_date = $value_annotation['points'][0]['end'];
                            $my_string_temp.= '  [ 
           ' . $start_date . ',   
            ' . $end_date . ',   
            "EMAIL_ADDRESS"   
          ] , ';
                        }
                        if ($value_annotation['label'][0] == 'Location') {
                            $start_date = $value_annotation['points'][0]['start'];
                            $end_date = $value_annotation['points'][0]['end'];
                            $my_string_temp.= '  [ 
           ' . $start_date . ',   
            ' . $end_date . ',   
            "LOCATION"   
          ] , ';
                        }
                        if ($value_annotation['label'][0] == 'Links') {
                            $start_date = $value_annotation['points'][0]['start'];
                            $end_date = $value_annotation['points'][0]['end'];
                            $my_string_temp.= '  [ 
           ' . $start_date . ',   
            ' . $end_date . ',   
            "LINKS"   
          ] , ';
                        }
                        if ($value_annotation['label'][0] == 'Skills') {
                            $start_date = $value_annotation['points'][0]['start'];
                            $end_date = $value_annotation['points'][0]['end'];
                            $my_string_temp.= '  [ 
           ' . $start_date . ',   
            ' . $end_date . ',   
            "SKILLS"   
          ] , ';
                        }
                        if ($value_annotation['label'][0] == 'Graduation Year') {
                            $start_date = $value_annotation['points'][0]['start'];
                            $end_date = $value_annotation['points'][0]['end'];
                            $my_string_temp.= '  [ 
           ' . $start_date . ',   
            ' . $end_date . ',   
            "GRADUATION_YEAR"   
          ] , ';
                        }
                        if ($value_annotation['label'][0] == 'Degree') {
                            $start_date = $value_annotation['points'][0]['start'];
                            $end_date = $value_annotation['points'][0]['end'];
                            $my_string_temp.= '  [ 
           ' . $start_date . ',   
            ' . $end_date . ',   
            "DEGREE"   
          ] , ';
                        }
                        if ($value_annotation['label'][0] == 'Graduation Year') {
                            $start_date = $value_annotation['points'][0]['start'];
                            $end_date = $value_annotation['points'][0]['end'];
                            $my_string_temp.= '  [ 
           ' . $start_date . ',   
            ' . $end_date . ',   
            "GRADUATION_YEAR"   
          ] , ';
                        }
                        if ($value_annotation['label'][0] == 'Companies worked at') {
                            $start_date = $value_annotation['points'][0]['start'];
                            $end_date = $value_annotation['points'][0]['end'];
                            $my_string_temp.= '  [ 
           ' . $start_date . ',   
            ' . $end_date . ',   
            "COMPANIES_WORKED_AT"   
          ] , ';
                        }
                    }
                }
                $my_string_temp = rtrim($my_string_temp, ',');
                $my_string_temp = substr($my_string_temp, 0, -1);
                $my_string_temp = substr($my_string_temp, 0, -1);
                $content.= $my_string_temp;
            }
        }
        $content.= '] }],'; /remove comma in last/
    }
    $content.= ' ]}';
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/recruitnxt_ats/myText.json", "wb");
    fwrite($fp, $content);
    fclose($fp);
    $data = file_get_contents("http://localhost/recruitnxt_ats/del_json_annotation1.json");
    $json = json_decode($data, true);
}
