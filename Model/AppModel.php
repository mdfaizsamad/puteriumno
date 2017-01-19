<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Model', 'Model');
App::uses('CakeTime', 'Utility');
/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model
{
    public $cacheQueries = false;
    public $cacheSources  = false;


    public function beforeSave($options = array())
    {
        if ($user_id = CakeSession::read('Auth.User.id')) {
            if (empty($this->id)) {
                $this->data[$this->alias]['creator_id'] = $this->data[$this->alias]['modifier_id'] = $user_id;
            } else {
                $this->data[$this->alias]['modifier_id'] = $user_id;
            }
        }
        return true;
    }
    protected function _afterFind($results)
    {
        if (!isset($results[$this->alias])) {
            foreach ($results as $i => $result) {
                if (is_array($result)) {
                    if (isset($result[$this->alias])) {
                        $results[$i][$this->alias] = $this->_afterFind($result);
                    } else {
                        $results[$i] = $this->_afterFind($result);
                    }
                } else {
                    $results[$i] = trim($result);
                }
            }
        } else {
            $_results = $results[$this->alias];
            foreach ($_results as $i => $result) {
                if (is_array($result)) {
                    if (isset($result[$this->alias])) {
                        $results[$i][$this->alias] = $this->_afterFind($result);
                    } else {
                        $results[$i] = $this->_afterFind($result);
                    }
                } else {
                    $results[$i] = trim($result);
                }
            }
            $results[$this->alias] = $_results;
        }
        return $results;
    }
    // public function afterFind( $results, $primary = false){
    //   return parent::afterFind( $this->_afterFind($results), $primary );
    // }

    public function dateFormatBeforeSave($dateString)
    {
        $strtotime = CakeTime::format($dateString, '%Y-%m-%d');
        return $strtotime;
    }
    public function dateFormatAfterFind($dateString)
    {
        $strtotime = CakeTime::format($dateString, '%d-%m-%Y');
        return $strtotime;
        // return date('d-m-Y', strtotime($dateString));
    }
    static protected $cacheFind= [];
    public function find($type = 'first',$options=[]){
        $ky = md5($type.json_encode($options));
        if(isset(AppModel::$cacheFind[$this->alias][$ky]))
            return AppModel::$cacheFind[$this->alias][$ky];

        AppModel::$cacheFind[$this->alias][$ky] = parent::find($type,$options);
        return AppModel::$cacheFind[$this->alias][$ky];
    }
}
