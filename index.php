<?php
class mainClass
{
    public function customEncode($val)
    {
        if (!$val) {
            return false;
        }

        $key = sha1('EnCRypT10nK#Y!RiSRNn');
        $strLen = strlen($val);
        $keyLen = strlen($key);
        $j = 0;
        $crypttext = '';

        for ($i = 0; $i < $strLen; $i++) {
            $ordStr = ord(substr($val, $i, 1));
            if ($j == $keyLen) {
                $j = 0;
            }
            $ordKey = ord(substr($key, $j, 1));
            $j++;
            $crypttext .= strrev(base_convert(dechex($ordStr + $ordKey), 16, 36));
        }
        return $crypttext;
    }

    function customDecode($value)
    {
        if (!$value) {
            return false;
        }

        $key = sha1('EnCRypT10nK#Y!RiSRNn');
        $strLen = strlen($value);
        $keyLen = strlen($key);
        $j = 0;
        $decrypttext = '';

        for ($i = 0; $i < $strLen; $i += 2) {
            $ordStr = hexdec(base_convert(strrev(substr($value, $i, 2)), 36, 16));
            if ($j == $keyLen) {
                $j = 0;
            }
            $ordKey = ord(substr($key, $j, 1));
            $j++;
            $decrypttext .= chr($ordStr - $ordKey);
        }

        return $decrypttext;
    }

    function readFile($value)
    {
        $file = fopen("test.php", "r");
        $count = 0;
        $bcount = 0;
        //Gets each line till end of file is reached  
        while (($line = fgets($file)) !== false) {
            //Splits each line into words  
            $words = explode(" ", $line);
            foreach ($words as $key => $result) {
                //  print_r($result);die();
                if (strlen($result) >= 5 && strlen($result) <= 8) {
                    if (mb_substr($result, 0, 1) == 'b') {
                        $bcount++;
                    }
                }
            }
        }

        print("count of words in that file having length 5 to 8 and starting with letter b: " . $bcount);
        fclose($file);
    }

    function customRandom($value)
    {

        for ($i = 1; $i <= 50; $i++) {
            $n = microtime();
            $n = explode('.', $n)[1];
            $n = mb_substr($n, 1, 6);
            echo $i . " Number is: " . $n . "<br/>";
        }
    }

    function sqlQuery()
    {

        $sql = "INSERT INTO table3 (b, c, m) SELECT t1.b,t1.c,t2.m FROM table1 t1 LEFT JOIN table2 t2 on(t1.a=t2.a)";
    }
}

$obj = new mainClass();
$estring = 'Hello World';
//$evalue = $obj->customEncode($estring);

$dstring = 'i3j5r5t5l4c285x5r4g484';
//$dvalue = $obj->customDecode($dstring);


//$file = $obj->readFile($dstring);


//$rand = $obj->customRandom($dstring);

// print_r($rand);
// die;

?>
<html>

<head>
    <title>Give Css using js</title>
</head>

<body>
    <div class="container">
        <div id="content">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            and has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type bpecimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum bsages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
    </div>
</body>

</html>
<script>
    var text = document.getElementById("content");
    var par = document.getElementById("content");
    var str = text.innerHTML,
        reg = /and/ig;

    var toStr = String(reg);
    var color = (toStr.replace('\/g', '|')).substring(1);

    var colors = color.split("|");

    if (colors.indexOf("and") > -1) {
        str = str.replace(/and/g, '<span style="color:red;">and</span>');
    }
    document.getElementById("content").innerHTML = str;
</script>
