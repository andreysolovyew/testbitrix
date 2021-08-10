<?php
namespace Listbooks; 

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator;

Loc::loadMessages(__FILE__);

/**
 * Class AuthorTable
 * 
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> FIRST_NAME string(255) optional
 * <li> LAST_NAME string(255) optional
 * <li> SECOND_NAME string(255) optional
 * <li> CITY string(255) optional
 * </ul>
 *
 * @package Bitrix\Listbooks
 **/

class AuthorTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'mls_listbooks_author';
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
					'title' => Loc::getMessage('AUTHOR_ENTITY_ID_FIELD')
				]
			),
			new StringField(
				'FIRST_NAME',
				[
					'validation' => [__CLASS__, 'validateFirstName'],
					'title' => Loc::getMessage('AUTHOR_ENTITY_FIRST_NAME_FIELD')
				]
			),
			new StringField(
				'LAST_NAME',
				[
					'validation' => [__CLASS__, 'validateLastName'],
					'title' => Loc::getMessage('AUTHOR_ENTITY_LAST_NAME_FIELD')
				]
			),
			new StringField(
				'SECOND_NAME',
				[
					'validation' => [__CLASS__, 'validateSecondName'],
					'title' => Loc::getMessage('AUTHOR_ENTITY_SECOND_NAME_FIELD')
				]
			),
			new StringField(
				'CITY',
				[
					'validation' => [__CLASS__, 'validateCity'],
					'title' => Loc::getMessage('AUTHOR_ENTITY_CITY_FIELD')
				]
			),
		];
	}

	/**
	 * Returns validators for FIRST_NAME field.
	 *
	 * @return array
	 */
	public static function validateFirstName()
	{
		return [
			new LengthValidator(null, 255),
		];
	}

	/**
	 * Returns validators for LAST_NAME field.
	 *
	 * @return array
	 */
	public static function validateLastName()
	{
		return [
			new LengthValidator(null, 255),
		];
	}

	/**
	 * Returns validators for SECOND_NAME field.
	 *
	 * @return array
	 */
	public static function validateSecondName()
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