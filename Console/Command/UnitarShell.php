<?php
App::uses("Role", "Model");
App::uses("Status", "Model");
App::uses("AppModel", "Model");

class UnitarShell extends AppShell
{
    public function startup()
    {
        Configure::write('Cache.disable', true);
        CakeLog::config('console', array(
            'engine' => 'SyslogLog',
            'types' => array('info', 'error', 'warning'),
            'scopes' => array('console')
        ));
    }
    public function check_unowned_applicant()
    {
        $this->MasterStatus= new AppModel(array('name' => Inflector::classify("MasterStatus"), 'table' => "app_statuses", 'ds' => "default"));
        $this->User = new AppModel(array('name' => Inflector::classify("User"), 'table' => "users", 'ds' => "default"));
        $this->Master= new AppModel(array('name' => Inflector::classify("Master"), 'table' => "app_masters", 'ds' => "default"));

        $options =  ['conditions'=>['MasterStatus.status_id !='.Status::NewIncomplete], 'recursive'=>-1, 'order'=>['MasterStatus.status_id'=>'ASC']];
        $options['fields']=["MasterStatus.id","MasterStatus.master_id"];
        $master_status  = $this->MasterStatus->find('all', $options);
        $master_status = Hash::extract($master_status, "{n}.MasterStatus.master_id");
        $options['conditions']=[];
        $options['conditions']['NOT']['MasterStatus.master_id'] = $master_status;
        $options['conditions']['MasterStatus.status_id']= Status::NewIncomplete;
        $master_ids = $this->MasterStatus->find('all', $options);
        $master_ids = Hash::extract($master_ids, "{n}.MasterStatus.master_id");
        $t = $this->Master->find('all', [
          'conditions'=>[
            'Master.id'=>$master_ids,
            'Master.owned_id'=>null
          ],
          'fields'=>['Master.id']
        ]);
        $master_ids = Hash::extract($t, "{n}.Master.id");
        $a= $this->User->find('all', [
          'conditions'=>['User.user_role_id'=>Role::MarketingStaff],
          'fields'=>['User.id']
        ]);
        $a = Hash::extract($a, "{n}.User.id");
        $data=[];
        foreach ($master_ids as $id) {
            if (empty($b)) {
                $b=$a;
            }
            $index=array_rand($b);
            $user_id = $b[$index];
            unset($b[$index]);
            $data[] = ["assigned_id"=>1,"modifier_id"=>1,'id'=>$id,'owned_id'=>$user_id];
        }

        $this->Master->saveAll($data);

        $this->_stop();
    }

    public function sentmail()
    {
        App::uses('CakeEmail', 'Network/Email');
        $start = microtime();
        $date = date('Y-m-d H:i:s');
        $this->SentMail= new AppModel(array('name' => Inflector::classify("SentMail"), 'table' => "app_sent_mails", 'ds' => "default"));

        if ($mails = $this->SentMail->find('all', [
                'conditions'=>['SentMail.status'=>false],
                'limit'=>100
            ])) {
            $counts=0;
            foreach ($mails as $mail) {
                try {
                    $email = new CakeEmail("gmail");
                    $email->subject($mail['SentMail']['subject']);
                    $email->to($mail['SentMail']['email']);
                    if ($email->send($mail['SentMail']['body'])) {
                        $this->SentMail->id = $mail['SentMail']['id'];
                        $this->SentMail->saveField('status', true);
                    }
                    $counts++;
                } catch (Exception $e) {
                    $s = microtime() - $start;
                    file_put_contents(TMP.DS.'logs'.DS.'cronjob.log', "[$date] Sent Mail : $s msecs failed for id ".$mail['SentMail']['id'].PHP_EOL, FILE_APPEND | LOCK_EX);
                    $this->SentMail->id = $mail['SentMail']['id'];
                    $this->SentMail->saveField('status', true);
                }
            }
            $start = microtime() - $start;
            $logmsg = "[$date] Sent Mail : $start msecs with $counts sent email(s)".PHP_EOL;
          #CakeLog::write('cronjob', $logmsg);
          file_put_contents(TMP.DS.'logs'.DS.'cronjob.log', $logmsg, FILE_APPEND | LOCK_EX);
        }
        $this->_stop();
    }
}
