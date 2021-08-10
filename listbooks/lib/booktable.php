<?php
namespace Listbooks; 

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\Entity\ReferenceField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator;

Loc::loadMessages(__FILE__);

/**
 * Class BookTable
 * 
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> TITLE string(255) optional
 * <li> YEAR string(255) optional
 * <li> COPIES_CNT int optional
 * <li> PUBLISHINGID int mandatory
 * </ul>
 *
 * @package Bitrix\Listbooks
 **/

class BookTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'mls_listbooks_book';
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
					'autocomplete' => true,
					'title' => Loc::getMessage('BOOK_ENTITY_ID_FIELD')
				]
			),
			new StringField(
				'TITLE',
				[
					'validation' => [__CLASS__, 'validateTitle'],
					'title' => Loc::getMessage('BOOK_ENTITY_TITLE_FIELD')
				]
			),
			new StringField(
				'YEAR',
				[
					'validation' => [__CLASS__, 'validateYear'],
					'title' => Loc::getMessage('BOOK_ENTITY_YEAR_FIELD')
				]
			),
			new IntegerField(
				'COPIES_CNT',
				[
					'title' => Loc::getMessage('BOOK_ENTITY_COPIES_CNT_FIELD')
				]
			),
			new IntegerField(
				'PUBLISHINGID',
				[
					'required' => true,
					'title' => Loc::getMessage('BOOK_ENTITY_PUBLISHINGID_FIELD')
				]
			),
			new ReferenceField(
				'PUBLISHING_ID',
				'Listbooks\PublishingTable',
				array('=this.PUBLISHINGID' => 'ref.ID'),
			)
		];
	}

	/**
	 * Returns validators for TITLE field.
	 *
	 * @return array
	 */
	public static function validateTitle()
	{
		return [
			new LengthValidator(null, 255),
		];
	}

	/**
	 * Returns validators for YEAR field.
	 *
	 * @return array
	 */
	public static function validateYear()
	{
		return [
			new LengthValidator(null, 255),
		];
	}
}