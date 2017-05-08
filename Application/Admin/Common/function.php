<?

	 // 获取基金表数据
	 public function getFundData($num='',$fund){
         $array=array();
         //得到网页数据
          $json = file_get_contents('http://www.gffunds.com.cn/apistore/JsonService?service=BaseInfo&method=Fund&op=queryFundByGFCategory');
         //把json转换成数组
          $text = json_decode($json, true);
         //需要抽取的字段
          $data = ['FUNDCODE',
              'FUNDFULLNAME',
              'FUNDTYPEGF',
              'FUNDNAME',
              'WEBPRODUCTNAME',
              'YIELDTHISY',
              'NAVUNIT',
              'DAYINCREMENTRATE',
              'NAVACCUMULATED',
              'FUNDSTATUS',
              'CREATEDATEFA'];
            $col=['fund_code',
              'fund_fullname',
              'fund_type',
              'fund_name',
              'web_productname',
              'year_profit',
              'navunit',
              'day_up',
              'threemouth_up',
              'fund_status',
              'create_time' 
            ];
          if ($num == "") {
              $num = $text['totalrows'];
          } 
          for ($i = 0; $i < $num; $i++) { 
              $str = "";//新建空字符串 
              $douhao = '';

              //循环抽取的数组

              foreach ($data as $val) {

                  //将一个数组的值拼接成字符串

                  $str .= $douhao . $text['data'][$i][$val];

                  $douhao = ',';
              }
              //将字符串转化为新数组

              $pieces = explode(",", $str);
               
              $array[]=$pieces; 

          } 

          foreach ($array as $key) {
             foreach ($key as $k => $value) {
                    $a[$col[$k]]=$value;
                }
             $fund->add($a); 
          } 
          return true;

}