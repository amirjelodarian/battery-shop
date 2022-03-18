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

    function rndAnim(){
        $fadeName = [
            'fade-up',
            'fade-down',
            'fade-right',
            'fade-left',
            'fade-up-right',
            'fade-up-left',
            'fade-down-right',
            'fade-down-left',
            'flip-left',
            'flip-right',
            'flip-up',
            'flip-down',
            'zoom-in',
            'zoom-in-up',
            'zoom-in-up',
            'zoom-in-left',
            'zoom-in-right',
            'zoom-out',
            'zoom-out-up',
            'zoom-out-down',
            'zoom-out-right',
            'zoom-out-left',
            'fade-zoom-in'
        ];
        $aniName = '';
        while($aniName == '')
            $aniName = $fadeName[rand(0,count($fadeName))];
    }
?>
