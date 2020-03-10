<?php

	Class Extension_Duration_Field extends Extension {

		public $field_table = 'tbl_fields_duration';



		/*------------------------------------------------------------------------------------------------*/
		/*  Installation  */
		/*------------------------------------------------------------------------------------------------*/

		public function install() {
			return Symphony::Database()
				->create($this->field_table)
				->ifNotExists()
				->fields([
					'id' => [
						'type' => 'int(11)',
						'auto' => true,
					],
					'field_id' => 'int(11)',
					'settings' => 'text'
				])
				->keys([
					'id' => 'primary',
					'field_id' => 'unique',
				])
				->execute()
				->success();
		}

		public function uninstall() {
			return Symphony::Database()
				->drop($this->field_table)
				->ifExists()
				->execute()
				->success();
		}
	}
