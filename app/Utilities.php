<?php
    function EnFa($number, $EnOrFa = 'en'){
        $EnOrFa = strtolower($EnOrFa);
        $en = array("0","1","2","3","4","5","6","7","8","9");
        $fa = array("۰","۱","۲","۳","۴","۵","۶","۷","۸","۹");
        if($EnOrFa == 'en')
            return str_replace($fa, $en, $number);
        if ($EnOrFa == 'fa')
            return str_replace($en, $fa, $number);
    }
?>
