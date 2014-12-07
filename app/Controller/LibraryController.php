<?php
class LibraryController extends AppController {
	public $uses = array('Document');

	public function index() {

		$conditions = array();

		if (isset($this->request->data['type'])) {
			$tipo_doc = $this->request->data['type'];
			switch ($tipo_doc) {
			case 1: // Link
				$conditions['Document.id_tipo_doc ='] = $tipo_doc;
				break;
			case 2: // File
				$conditions['Document.id_tipo_doc ='] = $tipo_doc;
				break;
			case 0: // All
				break;
			
			default:
				break;
			}
		}

		$docs = $this->Document->find('all', array('conditions' => $conditions, 'order' => array('Document.n_document ASC')));

        if (empty($docs)) {
            $this->set('result', 0);
        }

        $this->set('docs', $docs);

	}
}