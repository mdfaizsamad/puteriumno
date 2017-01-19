<?php
App::uses('ApiAppController', 'Api.Controller');

class CourseMarkBreakdownController extends ApiAppController {

    public function delete_breakdown($breakdown_id){

    	$this->loadModel('Assessment.CourseMarkBreakdown');

    	$breakdown = $this->CourseMarkBreakdown->find('all');

        $this->CourseMarkBreakdown->id = $breakdown_id;
        $this->CourseMarkBreakdown->delete();
    }

    public function lists(){
        $scheme = $this->request->query['scheme'];
        $aca_group = $this->request->query['aca_group'];
    	// $aca_group = 2;
    	$data = $master = [];

    	switch ($scheme) {
            case 'itp':
                $master = ['1'=>'Internship/Practical'];
                break;
    		case 'coc':
    			$this->loadModel('Assessment.CocuSchemeMaster');
    			$master = $this->CocuSchemeMaster->find('list',[
													'fields'=>'description',
													'conditions'=>[
														'CocuSchemeMaster.academic_group_id'=>$aca_group
														]
													]);

    			break;
    		case 'eng':
    			$this->loadModel('Assessment.EnglishSchemeMaster');
    			$master = $this->EnglishSchemeMaster->find('list',[
													'fields'=>'description',
													'conditions'=>[
														'EnglishSchemeMaster.academic_group_id'=>$aca_group
														]
													]);
    			
    			break;
    		case 'gen':
    			$this->loadModel('Assessment.GeneralSchemeMaster');
    			$master = $this->GeneralSchemeMaster->find('list',[
													'fields'=>'description',
													'conditions'=>[
														'GeneralSchemeMaster.academic_group_id'=>$aca_group
														]
													]);
    			
    			break;
    		case 'hon':
    			$this->loadModel('Assessment.HonourSchemeMaster');
    			$master = $this->HonourSchemeMaster->find('list',[
													'fields'=>'description',
													'conditions'=>[
														'HonourSchemeMaster.academic_group_id'=>$aca_group
														]
													]);
    			
    			break;
    		case 'mpu':
    			$this->loadModel('Assessment.MpuSchemeMaster');
    			$master = $this->MpuSchemeMaster->find('list',[
													'fields'=>'description',
													'conditions'=>[
														'MpuSchemeMaster.academic_group_id'=>$aca_group
														]
													]);
    			
    			break;
    		case 'mqa':
    			$this->loadModel('Assessment.MqaSchemeMaster');
    			$master = $this->MqaSchemeMaster->find('list',[
													'fields'=>'description',
													'conditions'=>[
														'MqaSchemeMaster.academic_group_id'=>$aca_group
														]
													]);
    			
    			break;
    		default:
    			$master = [];
    			break;
    	}

    	$data1[] = '--choose one--';
    	if(isset($master) && !empty($master)){
    		$data = $data1 + $master;
    	}

		$this->_serialized(compact('data'));
    }
}
