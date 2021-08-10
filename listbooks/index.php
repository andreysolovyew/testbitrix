<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Методы CntBooks и SumBooks");
$APPLICATION->AddChainItem("таблицы", "данные");
?> 

<?
// http://site.ru/listbooks/index.php
global $DB;
$results = $DB->Query("SHOW TABLES LIKE 'mls_listbooks_book'");

    if($row = $results->Fetch()){
        $CNT_ROWS = count($row);
     }

if ($CNT_ROWS) {

    echo '<b>Таблицы существуют</b><br><br>';
    echo '<a href="db_tables_del.php">Удалить таблицы "mls_listbooks"</a><br><br>';


    Bitrix\Main\Loader::registerAutoLoadClasses(null, [
        'GetListBooks' => '/listbooks/lib/class.php'
    ]);

    // Получить количество книг одного автора с фамилией F, напечатанных в издательстве P
    // Получить гонорар соавторов A и B книги С за полный тираж.

    $F = 'Соловьев';
    $P = 'Издательство 1';
    $A = 'Соловьев';
    $B = 'Иванов';
    $C = 'Книга 1';

    echo 'Кол-во книг автора с фамилией <b>"'.$F.'"</b>, напечатанных в издательстве <b>"'. $P . '"</b> - <b>'.GetListBooks::CntBooks($F, $P). '</b>шт.';
    echo '<br>';
    echo 'Гонорар соавторов с фамилиями <b>"'.$A.'"</b> и <b>"'.$B. '"</b> за книгу <b>"'.$C.'"<b> - <b>'.GetListBooks::SumBooks($A, $B, $C).'</b>';

} else {

    echo "<b>Таблицы не установлены</b><br><br>";
    echo '<a href="db_tables_add.php">Создать таблицы и заполнить демо</a>';

}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>