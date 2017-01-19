<style>
    .no-margin { margin: 0; }
    .table th { background: #999; color: #fff; text-align: center; }
    .outer {position:relative}
    .inner { overflow-x:scroll; overflow-y:visible; width:100%; margin-left:0; }
</style>
<?php //debug($data);die;
      $data = $student_info;
      //debug($data); ?>
<?php $total_credit_hours = $grand_total_credit_hours =  0; ?>
<?php foreach ($data['Result'] as $result): ?>
        <?php foreach ($result['ResultDetail'] as $res_det):  ?>
              <?php $total_credit_hours = $total_credit_hours + $res_det['Course']['credit_hours'] ?>
        <?php endforeach;?>
<?php endforeach; ?>

<?php if (!empty($data['Detail']['ProgramStructure'])): ?>
          <?php $grand_total_credit_hours = $data['Detail']['ProgramStructure']['total_credit_hours'] ?>
<?php endif; ?>

<div class="row">
  <div class="col-md-12">
          <div class="box box-warning  direct-chat ">
            <div class="box-header with-border">
              <h3 class="box-title">Student Biodata</h3>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <?php
                  $program = (!empty($data['Detail']['Program']['name']))?strtoupper($data['Detail']['Program']['name']):'-';
                  $sem_start = (!empty($data['Semester']))?strtoupper(date('F',strtotime($data['Semester']['month']))).' '.$data['Semester']['year']:'-';
                  $study_centre = (!empty($data['Detail']['study_centre_id']))?$study_centre_list[$data['Detail']['study_centre_id']]:'';
                  ?>
            <div class="row">
              <div class="col-md-4">
                <div class="box-body">
                  <ul class="nav nav-stacked">
                    <li><span><b>Program :</b> <?= strtoupper($program)  ?></span></li>
                    <li><span><b>Program Structure :</b> <?= strtoupper($data['Detail']['ProgramStructure']['name']) ?> </span></li>
                    <li><span><b>Total Credit Hour :</b> <?= $grand_total_credit_hours ?> </span></li>
                    <li><span><b>Study Centre :</b> <?= strtoupper($study_centre) ?> </span></li>
                  </ul>
                </div>
              </div>

              <div class="col-md-4">
                <div class="box-body">
                  <ul class="nav nav-stacked">
                    <li><span><b>Major :</b> <?= (!empty($data['Detail']['ProgramMajor']['name']))?strtoupper($data['Detail']['ProgramMajor']['name']):'-' ?></span></li>
                    <li><span><b>Current Semester :</b> <?= (!empty($data['Timeline']['CurrentSemester']))?strtoupper($data['Timeline']['CurrentSemester']['name']).' ('.strtoupper(date('F',strtotime($data['Timeline']['CurrentSemester']['month']))).' '.$data['Timeline']['CurrentSemester']['year'].')':'-' ?>
                      <?php (!empty($data['Timeline']['CurrentSemester']))?$data['Timeline']['CurrentSemester']['year']:'-' ?></span></li>
                    <li><span><b>Total Credit Taken :</b> <?= $total_credit_hours ?> </span></li>
                  </ul>
                </div>
              </div>

              <div class="col-md-4">
                <div class="box-body">
                  <ul class="nav nav-stacked">
                    <li><span><b>Intake :</b> <?= (!empty($data['Detail']['Intake']['name']))?strtoupper($data['Detail']['Intake']['name']):'-' ?></span></li>
                    <li><span><b>Timeline :</b> <?= (!empty($data['Timeline']['name']))?strtoupper($data['Timeline']['name']):'-' ?>&nbsp;</span></li>
                    <li><span><b>Available Credit Hour :</b> <?= $grand_total_credit_hours-$total_credit_hours ?> </span></li>
                  </ul>
                </div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

</div>

<!-- <a href="#" class="badge bg-blue pull-right">View</a> -->
<div class="pull-right">
  <a width='100%' href="<?php echo Routed::url('/student_enquiry');?>" align='center' class="btn-xs btn-warning colorBoxIframe" >Enquiry</a>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box  box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Course Registration</h3>
              <div class="pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <br>
              <!-- <a href="<?php echo Routed::url(array('controller'=>'course_reg_masters', 'plugin'=>'course_registration', 'action'=>'student_view'));?>" class="badge bg-blue pull-right">Course Registration</a><br><br> -->
              <?php if((!empty($data['CourseRegMaster'])) AND ($data['CourseRegMaster'][0]['is_confirm'] == 1)) { ?>
              <a href="<?php echo Routed::url(array('plugin'=>'course_registration','controller'=>'course_reg_masters','action'=>'student_drop'))?>" class="badge bg-blue pull-right"><i class="fa fa-pencil"></i>&nbsp;Course Registration</a><br><br>
              <!-- <a href="<?php echo Routed::url(array('plugin'=>'course_registration','controller'=>'course_reg_masters','action'=>'confirm_course'))?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i>&nbsp;Course Registration Slip</a> -->
              <?php } else { ?>
              <a href="<?php echo Routed::url(array('plugin'=>'course_registration','controller'=>'course_reg_masters','action'=>'student_view'))?>" class="badge bg-blue pull-right"><i class="fa fa-pencil"></i>&nbsp;Course Registration</a>
              <?php } ?>
              <a href="<?php echo Routed::url(array('plugin'=>'course_registration','controller'=>'course_reg_masters','action'=>'student_preview'))?>" class="badge bg-blue pull-right" style="margin-right:5px"><i class="fa fa-pencil"></i>&nbsp;PreCourse Registration</a><br><br>
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Semester Name</th>
                  <th>Status</th>
                  <th style="width: 40px">Action</th>
                </tr>
                <?php if (!empty($data['CourseRegMaster'])): ?>
                <?php foreach ($data['CourseRegMaster'] as $i => $CourseRegMaster):?>
                          <?php //if ($CourseRegMaster['is_confirm'] == 1): ?>
                          <tr>
                            <td><?=$i+1?></td>
                            <td align='center'><?= $CourseRegMaster['CourseOffMaster']['Semester']['name'].' ('.$CourseRegMaster['CourseOffMaster']['Semester']['year'].')' ?></td>
                            <td align='center'><?= (!empty($CourseRegMaster['SysStatus']))?$CourseRegMaster['SysStatus']['name']:'' ?></td>
                            <td align='center'><a href="<?php echo Routed::url(array('controller'=>'course_reg_masters', 'plugin'=>'course_registration', 'action'=>'confirm_course', $data['Master']['id'], $CourseRegMaster['id']));?>" class="badge bg-blue">View</a></td>
                          </tr>
                          <?php //endif; ?>
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
              <h3 class="box-title">Results</h3>
              <div class="pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<?php if (!empty($student_result)): ?>
  <?php $semester_count = count($student_result); ?>
  <?php foreach ($student_result as $key => $result): ?>
    <?php if($key==0):
            $collapse = '';
            $minus_plus = 'fa-minus';
          else:
            $collapse = 'collapsed-box';
            $minus_plus = 'fa-plus';
          endif;
    ?>
<?php
          $semester_year = ($result['semester_name'])?$result['semester_name']:'<i>n/a</i>';
          $semester_name = "SEMESTER ".$semester_count.' ('.$semester_year.')';

?>
          <div class="box box-info <?= $collapse ?>">

                <div class="box-header with-border">
                    <h3 class="box-title" data-widget="collapse"><?= $semester_name ?></h3>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa <?= $minus_plus ?> "></i></button>
                    </div>
                </div>

              <div class="box-body">
                          <table class='table'>
                            <tr>
                              <th width='15%'>Course Code</th>
                              <th width='30%' style='text-align:left'>Course Name</th>
                              <th width='10%'>Result</th>
                              <th width='10%'>Status</th>
                            </tr>
                            <?php $total_credit_hours = 0 ?>
                            <?php if (!empty($result['ResultDetail'])): ?>
                                  <?php foreach ($result['ResultDetail'] as $i => $course): ?>
                                          <tr>
                                            <td align='center'><?= $course['Course']['course_code'] ?></td>
                                            <td><?= $course['Course']['course_name'] ?></td>
                                            <td align='center'><?= $course['grade'] ?></td>
                                            <td align='center'><?= @$status_list[$course['course_status_id']] ?></td>
                                          </tr>
                                          <?php $total_credit_hours = $total_credit_hours + $course['Course']['credit_hours'] ?>
                                  <?php endforeach; ?>
                                  <?php if($result['semester'] != 0): ?>
                                  <tr>
                                    <td colspan=1>&nbsp;</td>
                                    <td colspan=3>
                                      <div class='pull-right col-md-3'>
                                        <b>GPA:</b>&nbsp;&nbsp;<?= number_format($result['gpa'],2) ?>
                                        <br>
                                        <b>CGPA:</b>&nbsp;&nbsp;<?= number_format($result['cgpa'],2) ?>
                                        <br>
                                        <b>STATUS:</b>&nbsp;&nbsp;<?= (!empty($status_list[$result['semester_status']]))?$status_list[$result['semester_status']]:'-' ?>
                                      </div>
                                      <div class='pull-left col-md-9'>
                                        <b>TOTAL CREDIT:</b>&nbsp;&nbsp;<?= $result['tot_cdt_hours'] ?>
                                        <br>
                                        <b>TOTAL ACCUMULATIVE:</b>&nbsp;&nbsp;<?= $result['tot_cum_cdt_hours'] ?>
                                      </div>
                                    </td>
                                  </tr>
                                  <?php endif; ?>
                            <?php else: ?>
                            <table>
                              <tr>
                                <td colspan=4 align='center'>No record found..</td>
                              </tr>
                            </table>
                            <?php endif; ?>
                          </table>
                </div>
            </div>
      <?php if($semester_count != 1)
              $semester_count--; 
      ?>
  <?php endforeach; ?>
<?php else: ?>
<div class="box box-info">

<div class="box-body">

  <table class='table'>
      <tr>
        <th width='30%'>Subject</th>
        <th width='20%'>Code</th>
        <th width='20%'>Course Type</th>
        <th wodth='20%'>Type</th>
        <th width='10%'>Result</th>
      </tr>
      <tr>
        <td colspan=5 align='center'>No record found..</td>
      </tr>
   </table>

 </div>
</div>
<?php endif; ?>

<!-- CREDIT TRANSFER & EXEMPTION -->

<?php if (!empty($student_credit_exemption)): ?>
          <div class="box box-info collapsed-box">

              <div class="box-header with-border">
                  <h3 class="box-title" data-widget="collapse">CREDIT TRANSFER / EXEMPTED COURSES</h3>
                  <div class="box-tools">
                      <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
                  </div>
              </div>

              <div class="box-body">
                <table class='table'>
                  <tr>
                    <th width='15%'>Course Code</th>
                    <th width='30%' style='text-align:left'>Course Name</th>
                    <th width='10%'>Result</th>
                    <th width='10%'>Status</th>
                  </tr>
                  <?php $total_credit_hours = 0 ?>
                  <?php if (!empty($student_credit_exemption)): ?>
                        <?php foreach ($student_credit_exemption as $i => $course): ?>
                                <?php foreach($course['ResultDetail'] as $c): ?>
                                <tr>
                                  <td align='center'><?= $c['Course']['course_code'] ?></td>
                                  <td><?= $c['Course']['course_name'] ?></td>
                                  <td align='center'><?= $c['grade'] ?></td>
                                  <td align='center'><?= @$status_list[$c['course_status_id']] ?></td>
                                </tr>
                                <?php $total_credit_hours = $total_credit_hours + $c['Course']['credit_hours'] ?>
                              <?php endforeach; ?>
                        <?php endforeach; ?>

                  <?php else: ?>
                  <table>
                    <tr>
                      <td colspan=4 align='center'>No record found..</td>
                    </tr>
                  </table>
                  <?php endif; ?>
                </table>
              </div>
          </div>
<?php  endif; ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box  box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Course Audit</h3>
              <div class="pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="outer">
                <div class="inner">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th colspan='6'>Year</th>
                          <?php if($status == true) :
                              foreach($data_detail['ProgramStructure']['ProgramStructureCourse'] as $pscourse1) :
                          ?>
                          <th>Year <?php echo $pscourse1['year']?></th>
                          <?php endforeach; ?>
                          <?php endif;?>
                        </tr>
                        <tr>
                          <th colspan='6'>Semester</th>
                          <?php if($status == true) :
                              foreach($data_detail['ProgramStructure']['ProgramStructureCourse'] as $pscourse2) :
                          ?>
                          <th>Sem <?php echo $pscourse2['semester']?></th>
                          <?php endforeach; ?>
                          <?php endif;?>
                        </tr>
                        <tr>
                          <th>Name</th>
                          <th>Matric No</th>
                          <th>Program Structure</th>
                          <th>Major</th>
                          <th>Status</th>
                          <th>Action</th>
                          <?php
                            foreach($data_detail['ProgramStructure']['ProgramStructureCourse'] as $pscourse) :
                          ?>
                          <th><?php echo $pscourse['Course']['course_code']?></th>
                          <?php endforeach; ?>

                        </tr>
                      </thead>
                      <tbody>
                        <?php //debug($status);
                          $m=$n=0;
                        //  foreach($d as $t=>$data) : //debug($data);
                      ?>
                          <tr>
                            <td><?= h(strtoupper($d['name'])) ?></td>
                            <td><?= h($d['matric_no']) ?></td>
                            <td><?= h($d['program_structure']) ?></td>
                            <td><?= h($d['program_major']); ?></td>
                            <td><?= h($d['status']) ?></td>
                            <?php if(!empty($d['course_list'])) :?>
                            <td><a href="<?php echo Routed::url(array('plugin' => 'course_audit', 'controller' => 'course_audit_stu_masters', 'action' => 'view', $d['id'])) ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>&nbsp;View</a></td>
                            <?php else:?>
                            <td>&nbsp;</td>
                            <?php endif; ?>
                            <?php foreach($data_detail['ProgramStructure']['ProgramStructureCourse'] as $course): //debug($course); ?>
                            <?php if(isset($d['course_list'])): ?>
                                <?php if(in_array($course['course_id'],$d['course_list'])): ?>
                                        <td align="center"><i class="fa fa-check" ></i></td>
                                <?php else: ?>
                                        <td align="center"><i class="fa fa-times" ></i></td>
                                <?php endif; ?>
                            <?php else: ?>
                                        <td align="center"><i class="fa fa-times" ></i></td>
                            <?php endif;

                             ?>
                          <?php endforeach;
                              $m++;
                          ?>
                        </tr>

                      <?php
                        //endforeach; ?>
                      </tbody>
                    </table>
                  </div></div>
            </div>
            <!-- /.box-body -->
<!--             <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div> -->
<!--           </div>
  </div> -->
</div>
