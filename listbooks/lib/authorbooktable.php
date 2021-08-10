<?php
namespace Listbooks;
 
use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\Entity\ReferenceField,
	Bitrix\Main\ORM\Fields\IntegerField;

Loc::loadMessages(__FILE__);

/**
 * Class AuthorbookTable
 * 
 * Fields:
 * <ul>
 * <li> BOOKID int optional
 * <li> AUTHORID int optional
 * </ul>
 *
 * @package Bitrix\Listbooks
 **/

class AuthorbookTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'mls_listbooks_authorbook';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return [
			new IntegerField(
				'ID',
				[
					'primary' => true,
				]
			),
			new IntegerField(
				'BOOKID',
				[
					'required' => true,
					'title' => Loc::getMessage('AUTHORBOOK_ENTITY_BOOKID_FIELD')
				]
			),
			new ReferenceField(
				'BOOK_ID',
				'Listbooks\BookTable',
				array('=this.BOOKID' => 'ref.ID'),
			),
			new IntegerField(
				'AUTHORID',
				[
					'required' => true,
					'title' => Loc::getMessage('AUTHORBOOK_ENTITY_AUTHORID_FIELD')
				]
			),
			new ReferenceField(
				'AUTHOR_ID',
				'Listbooks\AuthorTable',
				array('=this.AUTHORID' => 'ref.ID'),
			),
		];
	}
}