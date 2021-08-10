<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавляем таблицы в базу");
$APPLICATION->AddChainItem("таблицы", "данные");
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
?> 

<?
// http://site.ru/db_tables_add.php
global $DB;
$results = $DB->Query("SHOW TABLES LIKE 'mls_listbooks_book'");

    if($row = $results->Fetch()){
        $CNT_ROWS = count($row);
     }

if ($CNT_ROWS) {

    echo '<b>Таблицы "mls_listbooks" уже существуют</b><br><br>';
    echo '<a href="index.php">Проверить запросы по заданию</a><br><br>';
    echo '<a href="db_tables_del.php">Удалить таблицы "mls_listbooks"</a>';

} else {

    $arrErrors = $DB->RunSqlBatch($_SERVER["DOCUMENT_ROOT"]."/listbooks/install/db/".strtolower($DB->type)."/install.sql");
    echo '<b>Таблицы "mls_listbooks" установлены</b><br><br>';
    echo '<a href="index.php">Проверить запросы по заданию</a><br><br>';
    echo '<a href="db_tables_del.php">Удалить таблицы "mls_listbooks"</a>';
}

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>