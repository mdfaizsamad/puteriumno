<?php

class AttachmentsController extends ApiAppController
{
    protected $allowedextensions = array('png', 'jpg', 'gif','zip','pdf');
    public function edu_detail_add($education_id=null)
    {
        if (!$this->request->is('post')) {
            $status = 'error';
            $msg = "Request error";
            $code = '501';
        } elseif (empty($this->data)||!isset($this->data['File'])) {
            $status = 'error';
            $msg = "Form data upload error";
            $code = '501';
        } elseif (!isset($this->data['File']['error']) || $this->data['File']['error']!=0) {
            $status = 'error';
            $msg = "Error uploading file";
            $code = '501';
        } elseif (!empty($this->allowedextensions)&&!in_array(strtolower(pathinfo($this->data['File']['name'], PATHINFO_EXTENSION)), $this->allowedextensions)) {
            $status = 'error';
            $msg = "File extension error";
            $code = '501';
        } elseif (empty($this->Auth->user())) {
            $status = 'error';
            $msg = "Unable to authorize user";
            $code = '501';
        } elseif ($this->data['File']['size'] > 16777215) {
            $status = 'error';
            $msg = "Exceed maximum size of 16MB";
            $code = '501';
        } else {
            $file = $this->data['File'];
            $msg = $file;
            $applicant_id = $this->Auth->user('id');
            $this->loadModel('Api.ApplicantEducation');
            $data = $this->ApplicantEducation->findByIdAndMasterId($education_id, $applicant_id);
            $data[$this->ApplicantEducation->alias]['attachment'] = file_get_contents($file['tmp_name']);
            $data[$this->ApplicantEducation->alias]['attachment_type'] =$file['type'];
            if ($this->ApplicantEducation->save($data)) {
                $status = 'success';
                $code = '200';
                $msg = "Attachment save successfully";
            } else {
                $status = 'error';
                $code = '501';
                $msg = "Attachment save error";
            }
        }
        if ($status !== 'success') {
            $this->Flash->error($msg);
        } else {
            $this->Flash->success($msg);
        }
        $this->_serialized(compact('status', 'msg', 'code'));
    }

    public function edu_detail_view($education_id=null)
    {
        $this->loadModel('Api.ApplicantEducation');
        $data = $this->ApplicantEducation->findById(330);
        // debug('hello world');
        // debug(!empty($data['ApplicatEducation']['attachment'));
        // die;
        if (!empty($data)&&!empty($data['ApplicantEducation']['attachment'])) {
            // $this->autoRender  =false;
            $this->response->type($data['ApplicantEducation']['attachment_type']);
            $this->response->body($data['ApplicantEducation']['attachment']);
            $this->response->send();
            return $this->response;
        }
        $this->_serialized(compact('status', 'msg', 'code'));
    }
}
