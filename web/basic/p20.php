<HTML>
<HEAD>
    <TITLE>P20 in PHP</TITLE>
</HEAD>
<BODY>
<h1>程序设计基础题P20 in JavaScript</h1>
<H2>1. 随机产生一些1-100之间的整数，直到产生的数为50为止。</H2>
<?php
function p01($start, $end, $target)
{
    $arr = range($start, $end);
    $times = 1;
    while (true) {
        $current = array_rand($arr, 1);
        if ($current == $target)
            break;
        echo $current . " ";
        ++$times;
    }
    echo $target . "<br>";
    echo $times . "<br>";
}

p01(1, 100, 50);
?>
<H2>2. 计算1-1000之间能同时被3和5整除的整数的和。</H2>
<?php
function p02($start, $end, $p, $q)
{
    for ($s = 0, $i = $start; $i <= $end; $i++)
        if ($i % $p == 0 && $i % $q == 0)
            $s += $i;
    echo $s . "<br>";
}

p02(1, 1000, 3, 5);
?>

<h2>3. 打印下列图形：</h2>
<h2 align="center">&nbsp;1</h2>
<h2 align="center">121</h2>
<h2 align="center">&nbsp;12321</h2>
<h2 align="center">&nbsp;121</h2>
<h2 align="center">&nbsp;1</h2>
<?php
function p03($row)
{
    for ($i = 1; $i <= $row; $i++) {
        for ($j = 1; $j <= $row - $i; $j++)
            echo "&nbsp";
        for ($j = 1; $j <= $i; $j++)
            echo $j;

        for ($j = $i - 1; $j >= 1; $j--)
            echo $j;
        echo("<br>");
    }
    for ($i = $row - 1; $i >= 1; $i--) {
        for ($j = 1; $j <= $row - $i; $j++)
            echo "&nbsp";
        for ($j = 1; $j <= $i; $j++)
            echo $j;

        for ($j = $i - 1; $j >= 1; $j--)
            echo $j;
        echo("<br>");
    }
}

p03(9);
?>
<H2>4. 一百匹马驮一百块瓦，一匹大马可以驮3块，一匹母马可驮2块，小马2匹可驮1块。试编程求需要各种马多少匹？</H2>
<?php
function solve($a, $b, $c, $n, $m)
{
    for ($x = 0; $x <= $n; $x++)
        for ($y = 0; $y <= $n; $y++) {
            $z = $n - $x - $y;
            if ($x * $a + $y * $b + $z * $c == $m)
                echo($x . " " . $y . " " . $z . "<br>");
        }
}

solve(3, 2, 1 / 2, 100, 100);
?>
<H2>5.有三种纪念邮票，第一种每套一张售价2元，第二种每套一张售价4元，第三种每套9张售价2元。现用100元买了100张邮票，问这三种邮票各买几张？
</H2>
<?php
solve(2, 4, 2 / 9, 100, 100);
?>
<h2>6.
    赵、钱、孙、李、周五人围着一张圆桌吃饭。饭后，周回忆说："吃饭时，赵坐在钱旁边，钱的左边是孙或李"；李回忆说："钱坐在孙左边，我挨着孙坐"。结果他们一句也没有说对。请问，他们在怎样坐的？
</h2>
<?php
function left($p, $q)
{
    return $p + 1 == $q || $p == 5 && $q == 1;
}

function right($p, $q)
{
    return left($q, $p);
}

function adj($p, $q)
{
    return left($p, $q) || right($p, $q);
}

function p06()
{
    $n = 5;
    $zhao = 1;
    for ($qian = 2; $qian <= $n; $qian++)
        for ($sun = 2; $sun <= $n; $sun++)
            for ($li = 2; $li <= $n; $li++) {
                $zhou = 15 - $zhao - $qian - $sun - $li;
                if ($qian == $sun || $qian == $li || $qian == $zhou || $sun == $li || $sun == $zhou || $li == $zhou)
                    continue;
                $ap = adj($zhao, $qian);
                $aq = left($sun, $qian) || left($li, $qian);
                $bp = left($qian, $sun);
                $bq = adj($li, $sun);
                if (!$ap && !$aq && !$bp && !$bq) {
                    echo($zhao . "&nbsp" . $qian . "&nbsp" . $sun . "&nbsp" . $li . "&nbsp" . $zhou . "<br>");
                }
            }
}

p06();
?>
<h2>7.
    找数。一个三位数，各位数字互不相同，十位数字比个位、百位数字之和还要大，且十位、百位数字之和不是质数。编程找出所有符合条件的三位数。
    注：1. 不能手算后直接打印结果。 2. "质数"即"素数"，是指除1和自身外，再没有其它因数的大于1的自然数。</h2>
<?php
function prime($n)
{
    if ($n < 0)
        $n = -$n;
    if ($n == 2)
        return true;
    if ($n % 2 == 0 || $n < 2)
        return false;
    for ($i = 2; $i * $i <= $n; $i++)
        if ($n % $i == 0)
            return false;
    return true;
}

function p07()
{
    for ($n = 100; $n <= 999; $n++) {
        $c = $n % 10;
        $b = ($n % 100 - $c) / 10;
        $a = ($n - $b * 10 - $c) / 100;
        if ($a != $b && $b != $c && $c != $a && $b > ($a + $c) && !prime($a + $b))
            echo($n . "&nbsp");
    }
    echo("<br>");
}

p07();
?>
<h2>8. 选人。一个小组共五人，分别为A、B、C、D、E。现有一项任务，要他们中的3个人去完成。
    已知：（1）A、C不能都去；（2）B、C不能都不去；（3）如果C去了，D、E就只能去一个，且必须去一个；
    （4）B、C、D不能都去；（5）如果B去了，D、E就不能都去。编程找出此项任务该由哪三人去完成的所有组合。</h2>
<?php
function imply($p, $q)
{
    return !$p || $q;
}

function p08()
{
    for ($a = 0; $a <= 1; $a++)
        for ($b = 0; $b <= 1; $b++)
            for ($c = 0; $c <= 1; $c++)
                for ($d = 0; $d <= 1; $d++)
                    for ($e = 0; $e <= 1; $e++) {
                        $t = array();
                        $t [0] = $a + $c <= 1;
                        $t [1] = $b + $c > 0;
                        $t [2] = imply($c == 1, $d + $e == 1);
                        $t [3] = $b + $c + $d <= 2;
                        $t [4] = imply($b == 1, $d + $e <= 1);
                        $t [5] = $a + $b + $c + $d + $e == 3;
                        if ($t [0] && $t [1] && $t [2] && $t [3] && $t [4] && $t [5])
                            echo($a . " " . $b . " " . $c . " " . $d . " " . $e . "<br>");
                    }
}

p08();
?>
<h2>9.
    输入一个字符串，内有数字和非数字字符。如A123X456Y7A，302ATB567BC，打印字符串中所有连续（指不含非数字字符）的数字所组成的整数，并统计共有多少个整数。
</h2>
<?php

$row = 'A123X456Y7A';
$arr = preg_split("/[\\D+]/", $row);
foreach ($arr as $item)
    if (preg_match("/\\d+/", $item))
        echo $item, "<br>";
?>
<h2>10.
    A、B、C三人进入决赛，赛前A说："B和C得第二，我得第一"；B说："我进入前两名，丙得第三名"；C说："A不是第二，B不是第一"。比赛产生了一、二、三名，比赛结果显示：获得第一的选手全说对了，获得第二的选手说对了一句，获得第三的选手全说错了。编程求出A、B、C三名选手的名次。
</h2>
<?php
$arr = array(
    1,
    2,
    3
);
while (true) {
    shuffle($arr);
    $A = $arr [0];
    $B = $arr [1];
    $C = $arr [2];
    $ap = $B == 2 && $C == 2;
    $aq = $A == 1;
    $bp = $B <= 2;
    $bq = $C == 3;
    $cp = $A != 2;
    $cq = $B != 1;
    if ($A + $ap + $aq == 3 && $B + $bp + $bq == 3 && $C + $cp + $cq == 3) {
        print_r($arr);
        break;
    }
}
?>

<h2>11. 甲、乙、丙、丁四人共有糖若干块，甲先拿出一些糖分给另外三人，使他们三人的糖数加倍；
    乙拿出一些糖分给另外三人，也使他们三人的糖数加倍；丙、丁也照此办理，此时甲、乙、丙、丁四人各有16块 ，编程求出四个人开始各有糖多少块。</h2>
<?php
$N = 64;
$A = array();
$B = array();
for ($jia = $N / 2; $jia <= $N; $jia++)
    for ($yi = 0; $yi <= $N - $jia; $yi++)
        for ($bing = 0; $bing <= $N - $jia - $yi; $bing++) {
            $ding = $N - $jia - $yi - $bing;
            $A ["jia"] = $jia;
            $A ["yi"] = $yi;
            $A ["bing"] = $bing;
            $A ["ding"] = $ding;
            $B ["jia"] = $jia;
            $B ["yi"] = $yi;
            $B ["bing"] = $bing;
            $B ["ding"] = $ding;
            $A ["jia"] -= $A ["yi"] + $A ["bing"] + $A ["ding"];
            $A ["yi"] *= 2;
            $A ["bing"] *= 2;
            $A ["ding"] *= 2;
            $A ["yi"] -= $A ["jia"] + $A ["bing"] + $A ["ding"];
            $A ["jia"] *= 2;
            $A ["bing"] *= 2;
            $A ["ding"] *= 2;
            $A ["bing"] -= $A ["jia"] + $A ["yi"] + $A ["ding"];
            $A ["jia"] *= 2;
            $A ["yi"] *= 2;
            $A ["ding"] *= 2;
            $A ["ding"] -= $A ["jia"] + $A ["yi"] + $A ["bing"];
            $A ["jia"] *= 2;
            $A ["yi"] *= 2;
            $A ["bing"] *= 2;
            if (4 * $A ["jia"] == $N && 4 * $A ["yi"] == $N && 4 * $A ["bing"] == $N) {
                foreach ($B as $x)
                    echo($x . " ");

                echo '<br>';
            }
        }
?>

<h2>12. 截数问题:
    任意一个自然数，我们可以将其平均截取成三个自然数。例如自然数135768，可以截取成13,57,68三个自然数。如果某自然数不能平均截取(位数不能被3整除)，可将该自然数高位补零后截取。现编程从键盘上输入一个自然数N(N的位数<12)，计算截取后第一个数加第三个数减第二个数的结果。
</h2>
<?php
$n = '1357681';
$len = strlen($n);
for ($i = 0; $i < ($len % 3); $i++) {
    $n = '0' . $n;
}

$len = strlen($n);
echo $n . '&nbsp' . $len . '<br>';
$head = ( int )substr($n, 0, $len / 3);
$mid = ( int )substr($n, $len / 3, $len / 3);
$tail = ( int )substr($n, $len * 2 / 3, $len / 3);
echo $head . '<br>' . $tail . '<br>' . $mid;
?>

<h2>13. 从键盘输入一段英文，将其中的英文单词分离出来：已知单词之间的分隔符包括空格、 问号、句号(小数点)和分号。
    例如：输入：There are apples; oranges and peaches on the table. 输出：there are
    apples oranges and peaches on the table</h2>
<?php
$arr = preg_split("/\\W+/", 'There are apples; oranges and peaches on the table.');
foreach ($arr as $item)
    echo $item, "<br>";
?>
<h2>14. 山乡希望小学收到一箱捐赠图书，邮件上署名是"兴华中学高二班"，山乡希望小学校
    长送来了感谢信，可是兴华中学高二年级有四个班，校长找来了四个班的班长，问他们是哪
    个班做的这件好事。一班的班长说："是四班做的。"二班的班长说："是三班做的好事。"三 班的班长说："不是我们班。"
    四班的班长说："三班的班长说的不对。" 四个班的班长都说不是自己班做的，这就难坏了校长，后来得知四个班的班长中有两个
    说得是真话，有两个没有说真话，请你利用计算机的逻辑判断编一个程序，找出究竟是哪个 班做了这件好事。不能手算后直接打印结果。</h2>
<?php
function val($iBoolean)
{
    return $iBoolean ? 1 : 0;
}

function p14()
{
    for ($C1 = 0; $C1 <= 1; $C1++)
        for ($C2 = 0; $C2 <= 1; $C2++)
            for ($C3 = 0; $C3 <= 1; $C3++)
                for ($C4 = 0; $C4 <= 1; $C4++) {
                    $P1 = ($C4 == 1);
                    $P2 = ($C3 == 1);
                    $P3 = ($C3 == 0);
                    $P4 = (!$P3);
                    if (val($P1) + val($P2) + val($P3) + val($P4) == 2 && $C1 + $C2 + $C3 + $C4 == 1)
                        echo $C1, $C2, $C3, $C4, "<br>";
                }
}

p14();

?>
<h2>15. A，B，C，D，E五个人合伙夜间捕鱼，凌晨时都疲惫不堪，各自在河边的树丛中找地
    方睡着了，日上三竿，E第一个醒来，他将鱼数了数，平分成五分，把多余的一条扔进河中，
    拿走一份回家去了，D第二个醒来，他并不知道有人已经走了,照样将鱼平分成五分，又扔掉多余的一条，拿走自己的一份，接着C，B，A依次醒来，也都按同样的办法分鱼(平分成
    五份，扔掉多余的一条，拿走自己的一份)，问五人至少合伙捕到多少条鱼。
    也许你能用数学办法推出鱼的条数，但我们的要求你编出一个程序，让计算机帮你算出鱼的总数。</h2>
<?php
function p15($size)
{
    $A = array();
    $A [0] = 1;
    for ($i = 1; $i <= $size; $i++)
        $A [$i] = $A [$i - 1] * $size + 1;
    foreach ($A as $x)
        echo($x . " ");
}

p15(5);
?>
<h2>16. 试编程找出能被各位数字之和整除的一切两位数。</h2>
<?php
function p16()
{
    for ($n = 10; $n <= 99; $n++) {
        $a = $n % 10;
        $b = ($n - $a) / 10;
        if ($n % ($a + $b) == 0)
            echo($n . "&nbsp");
    }
    echo("<br>");
}

p16();
?>
<h2>17. 一个正整数的个位数字是6，如果把个位数字移到首位,所得到的数是原数的4倍，试编程找出满足条件的最小正整数。</h2>
<?php
function p17()
{
    for ($x = 1; ; $x++) {
        $pre = 10 * $x + 6;
        $after = ( int )("6" . $x);
        if ($after == 4 * $pre) {
            echo($pre . "<br>" . $after);
            break;
        }
    }
}

p17();
?>
<h2>18. 某本书的页码从1开始，小明算了算，总共出现了202个数1，试编程求这本书一共有多少页？</h2>
<?php
function ones($num)
{
    $result = 0;
    while ($num > 0) {
        $lastdigit = $num % 10;
        if ($lastdigit == 1)
            ++$result;
        $num = ($num - $lastdigit) / 10;
    }
    return $result;
}

function p18($pages)
{
    $sum = 0;
    for ($i = 1; $sum < $pages; $i++) {
        $sum += ones($i);
    }
    if ($sum == $pages)
        echo($i);
    else
        echo("impossible!");
}

p18(202);
?>
<h2>19. 从键盘上输入两个不超过32767的整数，试编程序用竖式加法形式显示计算结果。 例如: 输入 123, 85 显示:
    123 + 85 ------------- 208</h2>
<?php
function p19($ia, $ib)
{
    echo(" " . $ia . "<br>" . "+" . $ib . "<br>" . "----------<br> " . ($ia + $ib) . "<br>");
}

p19(123, 85);
?>


<H2>20.
    有30个男人女人和小孩同在一家饭馆进餐，共花了五十先令，其中男宾3先令，女宾2先令，小孩1先令。试编程求出男人女人小孩各多少人？</H2>
<?php
solve(3, 2, 1, 30, 50);
?>

</BODY>
</HTML>
