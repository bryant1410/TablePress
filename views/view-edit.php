<?php
/**
 * Edit Table View
 *
 * @package TablePress
 * @subpackage Edit Table View
 * @author Tobias Bäthge
 * @since 1.0
 */

/**
 * Edit Table View class
 */
class TablePress_Edit_View extends TablePress_View {

	/*
	 * Set up the view with data and do things that are specific for this view
	 *
	 * @param string $action Action for this view
	 * @param array $data Data for this view
	 */
	public function setup( $action, $data ) {
		parent::setup( $action, $data );

		add_thickbox();
		$this->admin_page->enqueue_style( 'edit' );
		$this->admin_page->enqueue_script( 'edit', array( 'jquery', 'jquery-ui-sortable', 'json2' ), false );

		$this->page_title = __( 'Edit table', 'tablepress' );

		$this->add_meta_box( 'table-information', __( 'Table Information', 'tablepress' ), array( &$this, 'postbox_table_information' ), 'normal' );
		$this->add_text_box( 'head', array( &$this, 'textbox_head' ), 'normal' );
	}

	/*
	 *
	 */
	public function postbox_table_information( $data, $box ) {
		_e( 'Table Information:', 'tablepress' );
	}

	/*
	 *
	 */
	public function textbox_head( $data, $box ) {
		?>
		<p><?php _e( 'head text box', 'tablepress' ); ?></p>
		<p><?php echo $this->page_title; ?></p>
		<?php
	}

	/*
	 * Return the content for the help tab for this screen
	 */
	protected function help_tab_content() {
		return 'Help for the Edit Table screen';
	}

} // class TablePress_Edit_View