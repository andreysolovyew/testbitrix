<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Удалить таблицы из базы");
$APPLICATION->AddChainItem("таблицы", "данные");
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
?> 

<?
// http://site.ru/about/db_tables_del.php
global $DB;
$results = $DB->Query("SHOW TABLES LIKE 'mls_listbooks_book'");

    if($row = $results->Fetch()){
        $CNT_ROWS = count($row);
     }

if ($CNT_ROWS) {

    $arrErrors = $DB->RunSqlBatch($_SERVER["DOCUMENT_ROOT"]."/listbooks/install/db/".strtolower($DB->type)."/uninstall.sql");
    echo "<b>Таблицы удалены</b><br><br>";
    echo '<a href="db_tables_add.php">Создать таблицы и заполнить демо</a>';

} else {

    echo "<b>Таблицы не установлены</b><br><br>";
    echo '<a href="db_tables_add.php">Создать таблицы и заполнить демо</a>';
}

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>