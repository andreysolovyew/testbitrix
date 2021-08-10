<?
//require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . '/listbooks/autoload.php'); 

class GetListBooks 
	{

// Создаем метод:
// Получить количество книг одного автора с фамилией $Author, напечатанных в издательстве $Publishing
		public function CntBooks($Author, $Publishing)
		{

            $rowsBook = array();
            $rowsBookAuthor = array();
            
            // getList для ORM AuthorTable для поиска ID автора
            $resultAuthor = Listbooks\AuthorTable::getList(array(
                'select'  => array('ID'), // имена полей, которые необходимо получить в результате
                'filter'  => array('=LAST_NAME' => $Author), // описание фильтра для WHERE и HAVING
            ));
            if ($rowAuthor = $resultAuthor->fetch())
            {
                $rowsAuthor = $rowAuthor["ID"]; // ID автора
            }
            
            // getList для ORM AuthorbookTable для поиска ID книг автора
            $resultBookAuthor = Listbooks\AuthorbookTable::getList(array(
                'select'  => array('BOOKID'), // имена полей, которые необходимо получить в результате
                'filter'  => array('=AUTHORID' => $rowsAuthor), // описание фильтра для WHERE и HAVING
            ));
            while ($rowBookAuthor = $resultBookAuthor->fetch())
            {
                $rowsBookAuthor[] = $rowBookAuthor["BOOKID"]; // массив с ID книгами
            }

            // getList для ORM PublishingTable для поиска ID издательства 
            $resultPublishing = Listbooks\PublishingTable::getList(array(
                'select'  => array('ID'), // имена полей, которые необходимо получить в результате
                'filter'  => array('=TITLE' => $Publishing), // описание фильтра для WHERE и HAVING
            ));
            if ($rowPublishing = $resultPublishing->fetch())
            {
                $rowsPublishing = $rowPublishing["ID"]; // ID издательства
            }

            // getList для ORM \BookTable для выборки книг заданного издательства 
            $resultBook = Listbooks\BookTable::getList(array(
                'select'  => array('ID'), // имена полей, которые необходимо получить в результате
                'filter'  => array('=PUBLISHINGID' => $rowsPublishing, '=ID' => $rowsBookAuthor), // описание фильтра для WHERE и HAVING
            ));
            while ($rowBook = $resultBook->fetch())
            {
                $rowsBook[] = $rowBook; // массив книг с выборкой 
            }
            
			return count($rowsBook); // возвращаем количество выбранных записей (книг)
		}

        // Создаем метод:
        // Получить гонорар соавторов $Author1 и $Author2 книги $Book за полный тираж.
		public function SumBooks($Author1, $Author2, $Book)
		{
            $rowsAuthor = array();
            $rowsBookAuthor = array();
            
            // getList для ORM BookTable для поиска книги по названию 
            $resultBook = Listbooks\BookTable::getList(array(
                'select'  => array('ID', 'PUBLISHING_ID', 'COPIES_CNT'), // имена полей, которые необходимо получить в результате
                'filter'  => array('=TITLE' => $Book), // описание фильтра для WHERE и HAVING
            ));
            if ($rowBook = $resultBook->fetch())
            {
                $ID_BOOK = $rowBook["ID"]; // получаем ID книги
                $SUM_BOOK = $rowBook["COPIES_CNT"]*$rowBook["LISTBOOKS_BOOK_PUBLISHING_ID_AUTHOR_PROFIT"]; // получаем стоимость всего тиража
            }

            // getList для ORM AuthorTable для поиска ID выбранных авторов 
            $resultAuthor = Listbooks\AuthorTable::getList(array(
                'select'  => array('ID', 'LAST_NAME'), // имена полей, которые необходимо получить в результате
                'filter'  => array(
                    // 'LOGIC' => 'AND', // по умолчанию элементы склеиваются через AND
                    'LOGIC' => 'OR',
                    array(
                        '=LAST_NAME' => $Author1,
                    ),
                    array(
                        '=LAST_NAME' => $Author2,
                    ),
                )
            ));
            while ($rowAuthor = $resultAuthor->fetch())
            {
                $rowsAuthor[] = $rowAuthor["ID"]; // получаем массив с ID авторов
            }
            
            // getList для ORM AuthorbookTable для выборки авторов по ID книги
            $resultBookAuthor = Listbooks\AuthorbookTable::getList(array(
                'select'  => array('AUTHORID', 'AUTHOR_ID', 'BOOKID'), // имена полей, которые необходимо получить в результате
                'filter'  => array('=BOOKID' => $ID_BOOK), // описание фильтра для WHERE и HAVING
            ));
            while ($rowBookAuthor = $resultBookAuthor->fetch())
            {
                $rowsBookAuthor[] = $rowBookAuthor; // получаем массив соавторов выбранной книги
            }
            
            $SUM_AUTHOR = $SUM_BOOK / count($rowsBookAuthor); // гонорар 1 соавтора тиража книги
            $SUM_AUTHOR_ALL = $SUM_AUTHOR * count($rowsAuthor); // гонорар 2 сооавторов тиража книги

            return $SUM_AUTHOR_ALL; // возвращаем гонорар 2 сооавторов тиража книги
            
        }
	}

?>