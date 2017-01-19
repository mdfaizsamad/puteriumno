<?php $data = $student_info ?>
<div class="row">
  <div class="col-md-12">
    <div id="withdraw" class="box box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Withdrawal</h3>
              <div class="pull-right">
                  <button id="withdraw" class="btn btn-box-tool opendiv" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo Routed::url(array('controller'=>'withdrawals', 'plugin'=>'withdrawal', 'action'=>'withdraw_request','withdraw'));?>" class="badge bg-blue pull-right colorBoxIframe applyclass" id='withdrawal'>Apply</a><br>
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 1px">#</th>
                  <th style="width: 15px">Date</th>
                  <th style="width: 30px">Status</th>
                  <th style="width: 10px">Action</th>
                </tr>
                <?php if(!empty($data['Withdrawal'])): ?>
                  <?php $i = 1; ?>
                  <?php foreach($data['Withdrawal'] as $with): ?>
                    <tr>
                      <td align='center'><?= $i ?></td>
                      <td align='center'><?= date('d-m-Y',strtotime($with['created'])) ?></td>
                      <td align='center'><?= $status_list[$with['stu_request_status_id']] ?></td>
                      <td align='center'><a href="<?php echo Routed::url(array('controller'=>'withdrawals', 'plugin'=>'withdrawal', 'action'=>'withdraw_status',$with['id']));?>" class="badge bg-blue colorBoxIframe applyclass" id='withdrawal'>View</a></td>
                    </tr>
                  <?php $i++ ?>
                  <?php endforeach; ?>
                <?php else: ?>
                <tr>
                  <td colspan='4' align='center'>No record found..</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
            </div>
      </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div id="deferment" class="box  box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Deferment</h3>
              <div class="pull-right">
                  <button id="deferment" class="btn btn-box-tool opendiv" data-widget="collapse" ><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo Routed::url(array('controller'=>'deferments', 'plugin'=>'deferment', 'action'=>'deferment_request','deferment'));?>" class="badge bg-blue pull-right colorBoxIframe applyclass" id='deferment'>Apply</a><br>
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 1px">#</th>
                  <th style="width: 15px">Date</th>
                  <th style="width: 30px">Status</th>
                  <th style="width: 10px">Action</th>
                </tr>
                <?php if(!empty($data['Deferment'])): ?>
                  <?php $i = 1; ?>
                  <?php foreach($data['Deferment'] as $defer): ?>
                    <tr>
                      <td align='center'><?= $i ?></td>
                      <td align='center'><?= date('d-m-Y',strtotime($defer['created'])) ?></td>
                      <td align='center'><?= $status_list[$defer['stu_request_status_id']] ?></td>
                      <td align='center'><a href="<?php echo Routed::url(array('controller'=>'deferments', 'plugin'=>'deferment', 'action'=>'deferment_status',$defer['id']));?>" class="badge bg-blue colorBoxIframe applyclass" id='withdrawal'>View</a></td>
                    </tr>
                  <?php $i++ ?>
                  <?php endforeach; ?>
                <?php else: ?>
                <tr>
                  <td colspan='4' align='center'>No record found..</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
            </div>
      </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div id="rc" class="box  box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Change Centre</h3>
              <div class="pull-right">
                  <button id="rc" class="btn btn-box-tool opendiv" data-widget="collapse" ><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo Routed::url(array('controller'=>'change_study_center_reqs', 'plugin'=>'changestudycenter', 'action'=>'change_rc_request','rc'));?>" class="badge bg-blue pull-right colorBoxIframe applyclass" id='rc'>Apply</a><br>
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 1px">#</th>
                  <th style="width: 15px">Date</th>
                  <th style="width: 30px">Status</th>
                  <th style="width: 10px">Action</th>
                </tr>
                <?php if(!empty($data['ChangeRC'])): ?>
                  <?php $i = 1; ?>
                  <?php foreach($data['ChangeRC'] as $changeRC): ?>
                    <tr>
                      <td align='center'><?= $i ?></td>
                      <td align='center'><?= date('d-m-Y',strtotime($changeRC['created'])) ?></td>
                      <td align='center'><?= $status_list[$changeRC['stu_request_status_id']] ?></td>
                      <td align='center'><a href="<?php echo Routed::url(array('controller'=>'change_study_center_reqs', 'plugin'=>'changestudycenter', 'action'=>'change_rc_status',$changeRC['id']));?>" class="badge bg-blue colorBoxIframe applyclass" id='rc'>View</a></td>
                    </tr>
                  <?php $i++ ?>
                  <?php endforeach; ?>
                <?php else: ?>
                <tr>
                  <td colspan='4' align='center'>No record found..</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
            </div>
      </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div id="changeprogram" class="box  box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Change Program</h3>
              <div class="pull-right">
                  <button class="btn btn-box-tool opendiv" data-widget="collapse" id='changeprogram'><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo Routed::url(array('controller'=>'change_programs', 'plugin'=>'change_program', 'action'=>'change_program_request','changeprogram'));?>" class="badge bg-blue pull-right colorBoxIframe applyclass" id='rc'>Apply</a><br>
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 1px">#</th>
                  <th style="width: 30px">Program Request</th>
                  <th style="width: 15px">Date</th>
                  <th style="width: 30px">Status</th>
                  <th style="width: 10px">Action</th>
                </tr>
                <?php if(!empty($data['ChangeProgram'])): ?>
                  <?php $i = 1; ?>
                  <?php foreach($data['ChangeProgram'] as $changeProgram): ?>
                    <tr>
                      <td align='center'><?= $i ?></td>
                      <td align='center'><?= $program_list[$changeProgram['program_request_id']] ?></td>
                      <td align='center'><?= date('d-m-Y',strtotime($changeProgram['created'])) ?></td>
                      <td align='center'><?= $status_list[$changeProgram['stu_request_status_id']] ?></td>
                      <td align='center'><a href="<?php echo Routed::url(array('controller'=>'change_programs', 'plugin'=>'change_program', 'action'=>'change_program_status',$changeProgram['id']));?>" class="badge bg-blue colorBoxIframe applyclass" id='rc'>View</a></td>
                    </tr>
                  <?php $i++ ?>
                  <?php endforeach; ?>
                <?php else: ?>
                <tr>
                  <td colspan='5' align='center'>No record found..</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
            </div>
      </div>
  </div>
</div>





<div class="row">
  <div class="col-md-12">
    <div class="box  box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Credit Transfer</h3>
              <div class="pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php if ($data['Detail']['actual_sem'] == 1): ?>
              <a href="<?php echo Routed::url(array('controller'=>'credit_transfers', 'plugin'=>'student', 'action'=>'add'));?>" class="badge bg-blue pull-right colorBoxIframe">Apply</a><br><br>
              <?php endif; ?>
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Request Course</th>
                  <th>Equivalent Course</th>
                  <th>Status</th>
                  <th style="width: 40px">Action</th>
                </tr>
                <?php if (!empty($data['CreditTransfer'])): ?>
                <?php foreach ($data['CreditTransfer'] as $i => $CreditTransfer):?>
                <?php
                          if ($CreditTransfer['status'] == 'N') {
                              $status = 'New';
                          } elseif ($CreditTransfer['status'] == 'A') {
                              $status = '<text style="color:green">Accepted</text>';
                          } elseif ($CreditTransfer['status'] == 'R') {
                              $status = '<text style="color:red">Rejected</text>';
                          } elseif ($CreditTransfer['status'] == 'K') {
                              $status = '<text style="color:blue">KIV</text>';
                          }

                        $link = Routed::url(array('controller'=>'credit_transfers', 'plugin'=>'student', 'action'=>'view', $CreditTransfer['id']));
                ?>
                <tr>
                  <td><?=$i+1?></td>
                  <td align='center'><?= $CreditTransfer['Course']['course_code'].' - '.$CreditTransfer['Course']['course_name'] ?></td>
                  <td align='center'><?= $CreditTransfer['course_name'] ?></td>
                  <td align='center'><?= $status ?></td>
                  <td><a href=<?= $link ?> class="badge bg-blue pull-right colorBoxIframe">View</a></td>
                </tr>
              <?php endforeach;?>
              <?php else: ?>
                <tr>
                  <td colspan='5' align='center'>No record found..</td>
                </tr>
              <?php endif; ?>
              </tbody></table>
            </div>

          </div>
  </div>
</div>



<div class="row">
  <div class="col-md-12">
    <div class="box  box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Exemption</h3>
              <div class="pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php if ($data['Detail']['actual_sem'] == 1): ?>
              <a href="<?php echo Routed::url(array('controller'=>'exemptions', 'plugin'=>'student', 'action'=>'add'));?>" class="badge bg-blue pull-right colorBoxIframe">Apply</a><br><br>
              <?php endif; ?>
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Request Course</th>
                  <th>Replacement Course</th>
                  <th>Status</th>
                  <th style="width: 40px">Action</th>
                </tr>
                <?php if (!empty($data['Exemption'])): ?>
                <?php foreach ($data['Exemption'] as $i => $Exemption):
                            if ($Exemption['status'] == 'N') {
                                $status = 'New';
                            } elseif ($Exemption['status'] == 'A') {
                                $status = '<text style="color:green">Accepted</text>';
                            } elseif ($Exemption['status'] == 'R') {
                                $status = '<text style="color:red">Rejected</text>';
                            } elseif ($Exemption['status'] == 'K') {
                                $status = '<text style="color:blue">KIV</text>';
                            }

                          $link = Routed::url(array('controller'=>'exemptions', 'plugin'=>'student', 'action'=>'view', $Exemption['id']));

                          if (!empty($Exemption['CourseReplacement'])) {
                              $exemption_course_code = $Exemption['CourseReplacement']['course_code'];
                              $exemption_course_name = $Exemption['CourseReplacement']['course_name'];
                          } else {
                              $exemption_course_code = $exemption_course_name = '';
                          }
                ?>
                <tr>
                  <td><?=$i+1?></td>
                  <td align='center'><?= $Exemption['Course']['course_code'].' - '.$Exemption['Course']['course_name'] ?></td>
                  <td align='center'><?= $exemption_course_code.' - '.$exemption_course_name ?></td>
                  <td align='center'><?= $status ?></td>
                  <td><a href="<?= $link ?>" class="badge bg-blue colorBoxIframe">View</a></td>
                </tr>
              <?php endforeach;?>
              <?php else: ?>
                <tr>
                  <td colspan='5' align='center'>No record found..</td>
                </tr>
              <?php endif; ?>
              </tbody></table>
            </div>

          </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box  box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Special Exam</h3>
              <div class="pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <a href="<?php echo Routed::url(array('controller'=>'special_exams', 'plugin'=>'assessment', 'action'=>'add'));?>" class="badge bg-blue pull-right colorBoxIframe">Apply</a><br><br>
              
                                <table class="table table-bordered table-condensed table-striped table-hovered table-responsive">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Course Code</th>
                                            <th>Course Name</th>
                                            <th>Request Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        foreach ($specialExams as $keys => $specialExam):
                                            ?>
                                          <?php 
                                            $data = [];
                                            foreach ($documentUploads as $keys => $values) {
                                              if($specialExam['SpecialExam']['id'] == $values['DocumentUpload']['master_id'])
                                              {
                                                $data['uploadId'] = $values['DocumentUpload']['id'];
                                                $data['filename'] = $values['DocumentUpload']['filename'];
                                              }
                                            }

                                            $uploadId = (isset($data['uploadId']) ? $data['uploadId'] : NULL);
                                            $uploadStatus = (isset($uploadId) ? 'btn-success' : 'btn-warning');
                                            $uploadReview = (isset($uploadId) ? true : false);
                                            $filename = (isset($data['filename']) ? $data['filename'] : NULL);

                                            ?>

                                            <tr>
                                                <td align='center'><?= $i ?></td>
                                                <td align='center'>
                                                    <?php echo ((!empty($specialExam['Course']['course_code'])) ? $specialExam['Course']['course_code'] : ''); ?>
                                                <td align='center'>
                                                    <?php echo ((!empty($specialExam['Course']['course_name'])) ? $specialExam['Course']['course_name'] : ''); ?>
                                                </td>
                                                <td align='center'>
                                                    <?php echo ((!empty($specialExam['Status']['name'])) ? str_replace('/Incomplete', '', $specialExam['Status']['name']) : ''); ?>
                                                </td>
                                                <td align='center'> 
                                                  <?php if(str_replace('/Incomplete', '', $specialExam['Status']['name'] != 'Rejected')): ?>
                                                  <a href="<?php echo Routed::url(array('controller'=>'portal','plugin'=>NULL ,'action'=>'invoice_special_exam',$_SESSION['Auth']['User']['id']));?>" class="badge bg-blue" target='_blank'>Invoice</a>
                                                  <?php echo (($uploadReview === true) ? $this->Html->link('View Attachment', '/uploads/' . $_SESSION['Auth']['User']['ic_ppt_no'] . '/' . $filename, array('class' => 'badge bg-green', 'target' => '_blank', 'full_base' => true)) : ''); ?>
                                                 <!--  <a href="<?php echo Routed::url(array('controller'=>'portal','plugin'=>NULL ,'action'=>'invoice_special_exam',$_SESSION['Auth']['User']['id']));?>" class="badge bg-red" target='_blank'>Print Form</a> -->
                                                  <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

            </div>

          </div>
  </div>
</div>


<?php

$this->Js->buffer(
"
$('.opendiv').click(function(e){
    window.location.hash = $(this).attr('id');
});
if(window.location.hash == '#withdraw'){
  $('#withdraw').removeClass('collapsed-box');
}
if(window.location.hash == '#deferment'){
  $('#deferment').removeClass('collapsed-box');
}
if(window.location.hash == '#rc'){
  $('#rc').removeClass('collapsed-box');
}
if(window.location.hash == '#changeprogram'){
  $('#changeprogram').removeClass('collapsed-box');
}

");

?>
