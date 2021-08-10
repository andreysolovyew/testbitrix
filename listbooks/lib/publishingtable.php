<?php
namespace Listbooks; 

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator;

Loc::loadMessages(__FILE__);

/**
 * Class PublishingTable
 * 
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> TITLE string(255) optional
 * <li> CITY string(255) optional
 * <li> AUTHOR_PROFIT int optional
 * </ul>
 *
 * @package Bitrix\Listbooks
 **/

class PublishingTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'mls_listbooks_publishing';
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
					'title' => Loc::getMessage('PUBLISHING_ENTITY_ID_FIELD')
				]
			),
			new StringField(
				'TITLE',
				[
					'validation' => [__CLASS__, 'validateTitle'],
					'title' => Loc::getMessage('PUBLISHING_ENTITY_TITLE_FIELD')
				]
			),
			new StringField(
				'CITY',
				[
					'validation' => [__CLASS__, 'validateCity'],
					'title' => Loc::getMessage('PUBLISHING_ENTITY_CITY_FIELD')
				]
			),
			new IntegerField(
				'AUTHOR_PROFIT',
				[
					'title' => Loc::getMessage('PUBLISHING_ENTITY_AUTHOR_PROFIT_FIELD')
				]
			),
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
	 * Returns validators for CITY field.
	 *
	 * @return array
	 */
	public static function validateCity()
	{
		return [
			new LengthValidator(null, 255),
		];
	}
}