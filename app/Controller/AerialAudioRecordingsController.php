<?php
class AerialAudioRecordingsController extends AppController {
	public $uses = array('AerialAudioRecording', 'Categoria', 'Subcategoria');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

	public function index() {
		
        $this->cargarComboCategorias();
        $conditions = array();

        $item_name = null;
        if(isset($this->request->data['f_nombre']) && $this->request->data['f_nombre'] != "") {   
            $item_name = $this->request->data['f_nombre']; 
            $conditions['AerialAudioRecording.n_item LIKE'] = "%".$item_name."%";
        }
        $anio = null;
        if(isset($this->request->data['anio_select']) && $this->request->data['anio_select'] != 0) {                          
            $anio = $this->request->data['anio_select'];  
            $conditions['YEAR(AerialAudioRecording.f_creacion)'] = $anio;   
        }
        $id_subcategoria = null;
        if(isset($this->request->data['categorias_select']) && $this->request->data['categorias_select'] != 0) {                          
            $id_subcategoria = $this->request->data['categorias_select'];  
            $conditions['AerialAudioRecording.id_subcategoria'] = $id_subcategoria;      
        }
        $id_estacion = null;
        if(isset($this->request->data['estacion_select']) && $this->request->data['estacion_select'] != 0) {                          
            $id_estacion = $this->request->data['estacion_select'];
            $meses = $this->calcularMeses($id_estacion); 
            $conditions['MONTH(AerialAudioRecording.f_creacion) IN'] = $meses;     
        }

	$conditions['AerialAudioRecording.habilitado'] = 'S'; 

        $items = $this->AerialAudioRecording->find('all', array('conditions' => $conditions, 'order' => array('AerialAudioRecording.f_creacion DESC')));

        if (empty($items)) {
            $this->set('result', 0);
        }

        $this->set('items', $items);
        
    }

    public function cargarComboCategorias(){
        $this->set('categorias', $this->Subcategoria->find('all'));
    }

    public function cargarComboSubCategorias($id_categoria=null){    
        if ($id_categoria != null) {   
            if ($this->request->is('ajax')) {                
                $this->set('subcategorias', $this->Subcategoria->find('all', array('conditions' => array('Subcategoria.id_categoria' => $id_categoria))));
            }                     
        }           
    }

    public function calcularMeses($id_estacion){
        $meses = array();
        switch ($id_estacion) {
            case 1: // Otoño
                array_push($meses, 3, 4, 5);
                break;
            case 2: // Invierno
                array_push($meses, 6, 7, 8);
                break;
            case 3: // Primavera
                array_push($meses, 9, 10, 11);
                break;
            case 4: // Verano
                array_push($meses, 12, 1, 2);
                break;
            
            default:                
                break;        
        }
        return $meses;
    }
}
?>
