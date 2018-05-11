<?php
$RESULT = 0; //--- 최종 결과


$inputString = $_GET['inputBox']; //----html 에서 받아온 문자열 (숫자, 연산자 혼합)

$inputString .= '='; //--- 문자열 더하기 + =

$StringChange;

$Shelter = '';

//--- 연산자, 숫자 기준으로 큐 를 나눠서 연산

$Number = array();
$Operator = array();

for ($i = 0; $i < strlen($inputString); $i++) {
    //---index 순회

    //---switch, case 로
    if ($inputString[$i] == '+' || $inputString[$i] == '-'
        || $inputString[$i] == '%' || $inputString[$i] == 'X' || $inputString[$i] == '='
    ) {
        array_push($Operator, $inputString[$i]);//--- 연산자 배열에 넣음
        array_push($Number, $Shelter);
        $Shelter =''; //--- 초기화
    } else {

        $Shelter .= $inputString[$i];
    }
}

$RESULT = array_shift($Number);

for($i =0 ; $i < sizeof($Operator) ; $i++){
    switch ($Operator[$i]){
        case '+':

            $RESULT += array_shift($Number);

            break;

        case '-':

            $RESULT -= array_shift($Number);
            break;

        case '%':
            $RESULT /= array_shift($Number);
            break;

        case 'X':
            $RESULT *= array_shift($Number);
            break;
    }
}

echo $RESULT;

?>