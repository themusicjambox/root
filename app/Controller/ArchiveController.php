<?php
class ArchiveController extends AppController {
	public $uses = array('Archive');

	public function index() {

		$conditions = array();
		$conditions['Archive.m_habilitado ='] = 'S'; 

		$jams = $this->Archive->find('all', array('conditions' => $conditions, 'order' => array('Archive.f_creacion DESC')));

        if (empty($jams)) {
            $this->set('result', 0);
        }

        $this->set('jams', $jams);

	}

}
?>