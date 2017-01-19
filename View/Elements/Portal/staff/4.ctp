<style>
    .no-margin { margin: 0; }
    .table th { background: #999; color: #fff; text-align: center; }
</style>

<?php

      foreach($lec_section_data as $ls)
      {
        $sorted[$ls['CourseOffCourse']['course_id']][$ls['Section']['section_no']][] = $ls;
      }
      // debug($sorted);die;
 ?>
<?php foreach($sorted as $course_key => $level_1): ?>
    <div class='box box-danger'>
      <div class="box-header with-border">
          <h2 class="box-title" data-widget="collapse"><?= $courses[$course_key] ?></h2>
          <div class="box-tools">
              <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
          </div>
      </div>
      <div class='box-body'>

        <?php foreach($level_1 as $section_key => $level_2): ?>
              <?php 
                
                $attendance = [];
                $monthNum  = $level_2[0]['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['Semester']['month'];
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                $semester_month = $dateObj->format('F'); 
                $semester_year = $level_2[0]['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['Semester']['year'];
                
                if(!empty($level_2[0]['AttendanceMaster']))
                {
                  $attendance = $level_2[0]['AttendanceMaster']; 
                  $box_collapse = '';
                  $box_button = 'fa-minus';
                }
                else
                {
                  $box_collapse = 'collapsed-box';
                  $box_button = 'fa-plus';
                }
              ?>
              <div class='box box-success <?= $box_collapse ?>'>
                <div class="box-header with-border">
                    <h2 class="box-title" data-widget="collapse">SECTION: <?= $section_key ?></h2>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa <?= $box_button ?>"></i></button>
                    </div>
                </div>
                <div class='box-body'>   
                  <table>
                    <tr>
                      <th>ACADEMIC GROUP</th>
                      <td>&nbsp;:&nbsp;</td>
                      <td><?= strtoupper($academic_group[$level_2[0]['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['aca_group_id']]) ?></td>
                    </tr>
                    <tr>
                      <th>TIMELINE</th>
                      <td>&nbsp;:&nbsp;</td>
                      <td><?= strtoupper($timelines[$level_2[0]['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['aca_timeline_id']]) ?></td>
                    </tr>
                    <tr>
                      <th>SEMESTER</th>
                      <td>&nbsp;:&nbsp;</td>
                      <td><?= strtoupper($semester_month).' '.$semester_year ?></td>
                    </tr>
                  </table>

                    <?php if(!empty($attendance)): ?>
                        <table class='table table-bordered'>
                            <tr>
                              <th>Date</th>
                              <th>Day</th>
                              <th>Time</th>
                              <th>Location</th>
                              <th>Action</th>
                            </tr>
                        <?php foreach($attendance as $att): ?>

                            <tr>
                                <td align='center'><?= date('d-m-Y',strtotime($att['cla_date'])) ?></td>
                                <td align='center'><?= $att['cla_day'] ?></td>
                                <td align='center'><?= date('h:i A', strtotime($att['cla_time'])); ?></td>
                                <td align='center'><?= $att['cla_location'] ?></td>
                                <td align='center'>
                                  <a href="<?php echo Routed::url(array('plugin'=>'lecturer','controller'=>'attendance_masters','action'=>'view',$att['id'].'?page=4&academic_group='.$academic_group_id.'&timeline='.$timeline_id.'&semester='.$semester_id.'&course='.$course_id.'&section_no='.$section_no.'&study_centre='.$study_centre_id))?>" class="btn btn-xs btn-success">&nbsp;Update Student Attendance</a>
                                  <a href="<?php echo Routed::url(array('plugin'=>'lecturer','controller'=>'attendance_masters','action'=>'view_2',$att['id'].'?page=4&academic_group='.$academic_group_id.'&timeline='.$timeline_id.'&semester='.$semester_id.'&course='.$course_id.'&section_no='.$section_no.'&study_centre='.$study_centre_id))?>" class="btn btn-xs btn-primary">&nbsp;View Student Attendance</a>
                                </td>
                            </tr>
                        
                          <?php $section_id = $att['cla_section_id'] ?>
                        <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                      <div align='center'>
                        <a width='100%' href="<?php echo Routed::url(array('controller'=>'attendance_masters', 'plugin'=>'lecturer', 'action'=>'add', '?' => array(
                          'lecturer_id' => $level_2[0]['Lecturer']['id'],
                          'section_id'=> $level_2[0]['Section']['id'],
                          'section_no'=>$level_2[0]['Section']['section_no'],
                          'academic_group' => $level_2[0]['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['aca_group_id'],
                          'study_centre' => $level_2[0]['CourseOffCourse']['CourseOffDetail']['study_centre_id'],
                          'timeline' => $level_2[0]['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['aca_timeline_id'],
                          'course_id' => $level_2[0]['CourseOffCourse']['course_id'],
                          'semester' => $level_2[0]['CourseOffCourse']['CourseOffDetail']['CourseOffMaster']['aca_semester_id'])));?>" align='center' class="btn-sm btn-danger" id="add_subject">Generate Attendance Schedule</a>
                      </div>                        
                    <?php endif; ?>
                
                </div>
              </div>     
        <?php endforeach; ?>
      </div>
    </div>

<?php endforeach; ?>